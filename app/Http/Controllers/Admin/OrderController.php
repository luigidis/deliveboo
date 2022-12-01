<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderPlate;
use App\Plate;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request['id']) {
            $auth_user = Auth::user();
            if ($auth_user->is_admin) {
                $user = User::where('id', $request['id'])->first();
            } else {
                $user = User::where('id', $auth_user->id)->first();
            }
        } else $user = Auth::user();


        $restaurant = Restaurant::where('user_id', $user->id)->first();

        $plates = $restaurant->plates;
        $ordersId = [];

        foreach ($plates as $plate) {
            foreach ($plate->orders->pluck('id') as $id) {
                if (!in_array($id, $ordersId))
                    $ordersId[] = $id;
            }
        }

        rsort($ordersId);
        // dd($ordersId);
        $orders = [];
        foreach ($ordersId as $id) {
            $orders[] = Order::where('id', $id)->first();
        }

        // dd($orders);

        return view('admin.orders.index', compact('orders', 'restaurant'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function chart(Request $request)
    {
        if ($request['id']) {
            $auth_user = Auth::user();
            if ($auth_user->is_admin) {
                $user = User::where('id', $request['id'])->first();
            } else {
                $user = User::where('id', $auth_user->id)->first();
            }
        } else $user = Auth::user();

        $restaurant = Restaurant::where('user_id', $user->id)->first();

        $plates = $restaurant->plates;
        $ordersId = [];

        foreach ($plates as $plate) {
            foreach ($plate->orders->pluck('id') as $id) {
                if (!in_array($id, $ordersId))
                    $ordersId[] = $id;
            }
        }

        rsort($ordersId);
        // dd($ordersId);
        $orders = [];
        foreach ($ordersId as $id) {
            $orders[] = Order::where('id', $id)->first();
        }

        // Date
        $dates = [];
        foreach ($orders as $order) {
            $current_date = $order->created_at->toDateString();
            if (!in_array($current_date, $dates)) {
                $dates[] = $current_date;
            }
        }

        // conto gli ordini per data
        $count = [];
        foreach ($dates as $date) {
            $tot_order = 0;
            foreach ($orders as $order) {
                $current_date = $order->created_at->toDateString();
                if ($date == $current_date) {
                    $tot_order++;
                }
            }
            $count[] = $tot_order;
        }
        $data = [];
        $data[] = array_combine($dates, $count);

        ksort($data[0]);
        // dd($data[0]);
        // dd($dates, $count);
        return view('admin.orders.analytics', ['date' => array_keys($data[0]), 'orders' => array_values($data[0])], compact('restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     $userId = Auth::id();
    //     $restaurant = Restaurant::where('user_id', $userId)->first();
    //     $plates = Plate::where('restaurant_id', $restaurant->id)->get();

    //     return view('admin.orders.create', compact('plates', 'restaurant'));
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->validate([
            'status' => 'required|max:255',
            'total' => 'required|numeric',
            'name_client' => 'required|max:255',
            'surname_client' => 'required|max:255',
            'address_client' => 'required|max:255',
            'phone_client' => 'required|max:15|integer',
            'email_client' => 'required|max:255|email',
        ]);

        return redirect()->route('admin.orders.show', compact('newOrder'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order,  Request $request)
    {
        $plates_order = OrderPlate::where('order_id', $order->id)->get();
        $auth_user = Auth::user();
        $restaurant = Restaurant::where('user_id', $auth_user->id)->first();

        $quantity = [];

        if ($plates_order[0]->restaurant_id === $restaurant->id || $auth_user->is_admin) {

            $fullname_client = $order->name_client . ' ' . $order->surname_client;
            $status = ['Cancellato', 'In elaborazione', 'In lavorazione', 'Completato', 'In transito', 'In consegna'];
            $order_plate = OrderPlate::where('order_id', $order->id)->get();
            foreach ($order_plate as $plate) {
                $plates[] = Plate::find($plate->plate_id);
                $quantity[] = $plate->quantity;
            }
            // dd($plates);
            return view('admin.orders.show', compact('order', 'fullname_client', 'plates', 'status', 'quantity'));
        } else return redirect()->route('admin.home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        if ($request['id']) {
            $auth_user = Auth::user();
            if ($auth_user->is_admin) {
                $id = User::where('id', $request['id'])->first();
            } else {
                $id = User::where('id', $auth_user->id)->first();
            }
        } else $id = Auth::user();
        $params = $request->validate([
            'status' => 'required|max:255',
            // 'total' => 'required|numeric',
            // 'name_client' => 'required|max:255',
            // 'surname_client' => 'required|max:255',
            // 'address_client' => 'required|max:255',
            // 'phone_client' => 'required|max:15|integer',
            // 'email_client' => 'required|max:255|email',
        ]);

        $order->update($params);

        return redirect()->route('admin.orders.index', compact('id'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        // $plates = $order->plates;
        // $restId = $plates[0]->restaurant_id;
        // $order->delete();

        // return redirect()->route('admin.orders.index', ['id' => $restId]);
    }
}

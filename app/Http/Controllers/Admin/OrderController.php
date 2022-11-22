<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;
use App\OrderPlate;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();
        $restaurant = Restaurant::where('user_id', $userId)->first();

        // dd($restaurant);
        // dd($restaurant->plates->orders);

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
    public function chart()
    {
        $userId = Auth::id();
        $restaurant = Restaurant::where('user_id', $userId)->first();

        // dd($restaurant);
        // dd($restaurant->plates->orders);

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
        foreach ($ordersId as $id) {
            $orders[] = Order::where('id', $id)->first();
        }

        $dates = array();
        foreach ($orders as $order) {
            if (!in_array($order->created_at, $dates)) {
                array_push($dates, $order->created_at);
            }
        }

        $count = array();
        $tot_order = 0;
        foreach ($dates as $date) {
            foreach ($orders as $order) {
                if ($date == $order->created_at) {
                    $tot_order++;
                }
            }
            array_push($count, $tot_order);
        }
        // dd($data);

        return view('admin.orders.analytics', ['date' => $dates, 'orders' => $count]);
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
    public function show(Order $order)
    {
        $fullname_client = $order->name_client . ' ' . $order->surname_client;
        $status = ['Cancellato', 'In elaborazione', 'In lavorazione', 'Completato', 'In transito', 'In consegna'];
        $order_plate = OrderPlate::where('order_id', $order->id)->get();
        foreach ($order_plate as $plate) {
            $plates[] = Plate::find($plate->plate_id);
        }
        // dd($plates);
        return view('admin.orders.show', compact('order', 'fullname_client', 'plates', 'status'));
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

        return redirect()->route('admin.orders.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('admin.orders.index');
    }
}

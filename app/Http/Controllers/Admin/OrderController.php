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
        $orders = Order::join('order_plate', 'orders.id', '=', 'order_plate.order_id')
            ->join('plates', 'order_plate.plate_id', '=', 'plates.id')
            ->join('restaurants', 'plates.id', '=', 'restaurants.id')
            ->where('restaurants.id', $restaurant->id)
            ->get();

        return view('admin.orders.index', compact('orders', 'restaurant'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $userId = Auth::id();
        $restaurant = Restaurant::where('user_id', $userId)->first();
        $plates = Plate::where('restaurant_id', $restaurant->id)->get();

        return view('admin.orders.create', compact('plates', 'restaurant'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $order_plate = OrderPlate::where('order_id', $order->id)->get();    
        foreach($order_plate as $plate){
            $plates[] = Plate::find($plate->plate_id);
        }
        // dd($plates);
        return view('admin.orders.show', compact('order', 'fullname_client', 'plates'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

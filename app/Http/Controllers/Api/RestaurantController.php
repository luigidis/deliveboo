<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderPlate;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $success = true;
        $categories = Category::orderBy('name', 'asc')->get();

        return response()->json(compact('success', 'categories'));
    }

    public function search($params)
    {
        $restaurants = Restaurant::orderBy('name', 'asc')->with('categories')->get();

        $finalRestaurants = [];
        $new_cat = [];
        $categories = [];
        $name = '';
        $index = null;

        foreach (explode(',', $params) as $key => $category) {
            $new_cat[] = $category;
        }

        if (in_array('%', $new_cat)) {
            foreach ($new_cat as $key => $category) {
                if ($category === '%') {
                    $index = $key + 1;
                    break;
                }
                $categories[] = $category;
            }

            $name = $new_cat[$index];
        } else {
            $categories = $new_cat;
        }


        foreach ($restaurants as $key => $restaurant) {
            $rest_cat = $restaurant->categories;
            $rest_cat_names = [];

            $rest_name = $restaurant->name;

            foreach ($rest_cat as $key => $value) {
                $rest_cat_names[] = $value->name;
            }

            $bool = false;
            if (count($categories)) {
                foreach ($categories as $key => $category) {
                    if (in_array($category, $rest_cat_names))
                        $bool = true;
                    else {
                        $bool = false;
                        break;
                    }
                }
            } else
                $bool = true;

            if (!str_contains(strtolower($rest_name), strtolower($name)))
                $bool = false;

            if ($bool)
                $finalRestaurants[] = $restaurant;
        }

        return response()->json(compact('finalRestaurants'));
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
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $restaurant = Restaurant::where('slug', $slug)->with('categories')->first();

        if ($restaurant) {
            $plates = Plate::where('restaurant_id', $restaurant->id)->get();
            return response()->json([
                'restaurant' => $restaurant,
                'plates' => $plates,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function plateShow($slug)
    {
        $plate = Plate::where('slug', $slug)->first();

        if ($plate) {
            return response()->json([
                'plate' => $plate,
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
            ], 404);
        }
    }

    public function cartPlates($id)
    {
        $idArray = [];
        foreach (explode(',', $id) as $plate_id) {
            $idArray[] = $plate_id;
        }

        $plates = [];

        foreach ($idArray as $id) {
            $plates[] = Plate::where('id', $id)->first();
        }

        $restaurant = Restaurant::where('id', $plates[0]->restaurant_id)->first();

        return response()->json(compact('plates', 'restaurant'));
    }

    public function makeOrder($id, Request $request)
    {
        $idArray = [];
        foreach (explode(',', $id) as $plate_id) {
            $idArray[] = $plate_id;
        }

        $plates = [];

        $totalPrice = 0;

        foreach ($idArray as $key => $id) {
            $plates[] = Plate::where('id', $id)->first();
        }
        foreach ($plates as $key => $plate) {
            $totalPrice += $plate->price * $request['quantity_plate'][$key];
        }

        $restaurant = Restaurant::where('id', $plates[0]->restaurant_id)->first();

        $data = $request->all();

        $validator = Validator::make($data, [
            'name_client' => 'required|max:255|min:2',
            'surname_client' => 'required|max:255|min:2',
            'address_client' => 'required',
            'phone_client' => 'required|numeric|min:10|max:12',
            'email_client' => 'required|email',
        ]);

        $data['status'] = 'In elaborazione';
        $data['total'] = $totalPrice;

        // dd($request);
        $order = Order::create($data);

        $quantities = [];
        foreach ($request['quantity_plate'] as $quantity) {
            $quantities[] = $quantity;
        }

        for ($j = 0; $j < count($plates); $j++) {
            $paramsPivot = [
                'order_id' => $order->id,
                'plate_id' => $plates[$j]->id,
                'quantity' => $quantities[$j],
            ];

            $orderPlate = OrderPlate::create($paramsPivot);
        }

        return response()->json(compact('plates', 'restaurant', 'order', 'orderPlate'));
    }

    public function getBests()
    {
        // creo array di array plates[id_ristorante] = [piatti]
        $allRestaurants = Restaurant::all();
        $plates = [];
        foreach ($allRestaurants as $key => $restaurant) {
            $plate = Plate::where('restaurant_id', $restaurant->id)->get();
            $plates[$restaurant->id] = $plate;
        }

        // ne ricavo un array orders[id_ristorante] = numero ordini
        $orders = [];
        foreach ($plates as $key => $restaurantPlates) {
            $orders[$key] = 0;
            foreach ($restaurantPlates as $plate) {
                $orders[$key] += $plate->orders->count();
            }
        }

        // prendo gli id dei 6 ristoranti con più ordini
        $bests = [];
        $max = max($orders);
        while (count($bests) < 4) {
            $maxKey = array_keys($orders, $max);
            if ($maxKey) {
                if (gettype($maxKey) == 'array') {
                    foreach ($maxKey as $value) {
                        $bests[] = $value;
                        if (count($bests) == 4)
                            break;
                    }
                }
            }
            $max--;
        }

        // prendo i 6 ristoranti con più ordini
        $restaurants = [];
        foreach ($bests as $id) {
            $restaurants[] = Restaurant::where('id', $id)->with('categories')->first();
        }

        return response()->json(compact('orders', 'bests', 'restaurants'));
    }
}

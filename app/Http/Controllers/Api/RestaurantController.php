<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $result = Restaurant::orderBy('name', 'asc')->with('categories')->paginate(10);
        // $param = 'diocane';
        $success = true;
        $categories = Category::orderBy('name', 'asc')->get();

        return response()->json(compact('success', 'categories'));
    }

    public function search($categories)
    {
        $restaurants = Restaurant::orderBy('name', 'asc')->with('categories')->get();

        $finalRestaurants = [];
        $new_cat = [];

        foreach (explode(',', $categories) as $key => $category) {
            $new_cat[] = $category;
        }

        foreach ($restaurants as $key => $restaurant) {
            // tutte le cat del ristorante
            $rest_cat = $restaurant->categories;
            $rest_cat_names = [];

            foreach ($rest_cat as $key => $value) {
                $rest_cat_names[] = $value->name;
            }

            $bool = false;
            foreach ($new_cat as $key => $category) {
                if (in_array($category, $rest_cat_names))
                    $bool = true;
                else {
                    $bool = false;
                    break;
                }
            }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     // query che ritorna restaurant legato al mio user
    //     // mostrarla
    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function store(Request $request)
    // {
    //     //
    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    // public function show(Restaurant $restaurant)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $auth_user = Auth::user();


        if ($restaurant->user_id === $auth_user->id || $auth_user->is_admin) {
            return view('admin.restaurant.edit', compact('restaurant', 'categories'));
        } else return redirect()->route('admin.home');
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $params = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'p_iva' => 'required|max:255',
            'categories' => 'exists:categories,id|required',
            'image' => 'nullable|image|max:2048'
        ]);

        if ($params['name'] !== $restaurant->name) {
            $params['slug'] = Restaurant::getUniqueSlugFromTitle($params['title']);
        }

        if (array_key_exists('image', $params) && $params['image'] !== null) {
            Storage::disk('images')->delete($restaurant->image);
            $img_path = Storage::disk('images')->put('restaurant_covers', $request->file('image'));
            $params['image'] = $img_path;
        } else {
            $params['image'] = $restaurant->image;
        }

        $restaurant->update($params);

        if (array_key_exists('categories', $params)) {
            $restaurant->categories()->sync($params['categories']);
        } else {
            $restaurant->categories()->sync([]);
        }

        return redirect()->route('admin.home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $auth_user = Auth::user();


        if ($auth_user->is_admin || $auth_user->id === $restaurant->id) {
            $userId = $restaurant->user_id;
            $user = User::find($userId);
            if ($restaurant->image && Storage::disk('images')->exists($restaurant->image)) {
                Storage::disk('images')->delete($restaurant->image);
            }
            $restaurant->delete();
            $user->delete();
            if ($auth_user->is_admin)
                return redirect()->route('admin.home');
            return redirect('/');
        } else return redirect()->route('admin.home');
    }
}

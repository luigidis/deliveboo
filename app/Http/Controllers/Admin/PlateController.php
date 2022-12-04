<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plate;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
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
        $plates = Plate::orderby('name', 'asc')->where('restaurant_id', $restaurant->id)->get();

        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('admin.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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

        $params = $request->validate([
            'name' => 'required|max:255|min:5',
            'description' => 'required',
            'img' => 'required|image|max:2048',
            'price' => 'required|numeric|min:0.50|max:50',
            'is_visible' => 'required'
        ]);

        $params['slug'] = Plate::getUniqueSlugFromTitle($params['name']);
        $params['restaurant_id'] = $restaurant->id;

        if (array_key_exists('img', $params)) {
            $img_path = Storage::disk('images')->put('plate_covers', $request->file('img'));
            $params['img'] = $img_path;
        }

        $plate = Plate::create($params);

        return redirect()->route('admin.plates.show', $plate);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function show(Plate $plate)
    {
        $auth_user = Auth::user();
        $restaurant = Restaurant::where('user_id', $auth_user->id)->first();

        if ($restaurant->id === $plate->restaurant_id || $auth_user->is_admin) {
            return view('admin.plates.show', compact('plate'));
        } else return redirect()->route('admin.home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        $auth_user = Auth::user();
        $restaurant = Restaurant::where('user_id', $auth_user->id)->first();

        if ($restaurant->id === $plate->restaurant_id || $auth_user->is_admin) {
            return view('admin.plates.edit', compact('plate'));
        } else return redirect()->route('admin.home');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Plate $plate)
    {
        $params = $request->validate([
            'name' => 'required|max:255|min:5',
            'description' => 'required',
            'img' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0.50|max:50',
            'is_visible' => 'required'
        ]);

        if ($params['name'] !== $plate->name) {
            $params['slug'] = Plate::getUniqueSlugFromTitle($params['name']);
        }

        if (array_key_exists('img', $params) && $params['img'] !== null) {
            Storage::disk('images')->delete($plate->img);
            $img_path = Storage::disk('images')->put('plate_covers', $request->file('img'));
            $params['img'] = $img_path;
        } else {
            $params['img'] = $plate->img;
        }


        $plate->update($params);

        return redirect()->route('admin.plates.show', $plate);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plate $plate)
    {
        $auth_user = Auth::user();
        $restaurant = Restaurant::where('user_id', $auth_user->id)->first();

        if ($restaurant->id === $plate->restaurant_id || $auth_user->is_admin) {
            $plate->delete();
            return redirect()->route('admin.plates.index', ['id' => $plate->restaurant_id]);
        } else return redirect()->route('admin.home');
    }
}

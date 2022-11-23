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
        if ($request['id'])
            $user = User::where('id', $request['id'])->first();
        else
            $user = Auth::user();
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        $plates = Plate::orderby('name', 'asc')->where('restaurant_id', $restaurant->id)->get();

        return view('admin.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        $user = Auth::user();
        $restaurant = Restaurant::where('user_id', $user->id)->first();

        $params = $request->validate([
            'name' => 'required|max:255|min:5',
            'description' => 'required',
            'img' => 'required|image|max:2048',
            'price' => 'required|numeric|min:0|max:50',
            'is_visible' => 'required'
        ]);

        $params['slug'] = str_replace(' ', '-', $params['name']);
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
        return view('admin.plates.show', compact('plate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plate $plate
     * @return \Illuminate\Http\Response
     */
    public function edit(Plate $plate)
    {
        return view('admin.plates.edit', compact('plate'));
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
            'price' => 'required|numeric|min:0|max:50',
            'is_visible' => 'required'
        ]);

        $params['slug'] = str_replace(' ', '-', $params['name']);

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
        $plate->delete();
        return redirect()->route('admin.plates.index');
    }
}

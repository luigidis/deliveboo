<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Plate;
use App\Restaurant;
use Illuminate\Http\Request;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Restaurant $restaurant)
    {
        $plates = Plate::orderBy('restaurant_id')->get();
        return view('admin.plates.index',compact('plates'));
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
        

        $params = $request->validate([
            'name' => 'required|max:255|min:5',
            'description' => 'required',
            'img' => 'nullable|image|max:2048',
            'price' => 'required|numeric|min:0|max:50',
            'is_visible' =>'required'
        ]);

        $params['slug'] = str_replace(' ','-',$params['name']);

        
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

        $params['slug'] = str_replace(' ','-',$params['name']);
        
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

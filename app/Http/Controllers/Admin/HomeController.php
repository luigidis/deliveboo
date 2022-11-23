<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Restaurant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $id = Auth::user()->id;
        $user = Auth::user();
        if ($user->is_admin) {
            $users = User::all();
            // dd($users);
            $restaurants = Restaurant::all();
            return view('admin.superhome', compact('restaurants', 'users'));
        }
        $restaurant = Restaurant::where('user_id', $user->id)->first();
        return view('admin.home', compact('restaurant', 'user'));
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Restaurant;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     */
    protected function validator(Request $data)
    {
        return $data->validate([
            'name' => ['required', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'restaurant_name' => ['required', 'string', 'min:2', 'max:255'],
            'address' => ['required', 'string', 'min:4', 'max:255'],
            'phone' => ['required', 'int'],
            'p_iva' => ['required', 'int'],
            'categories' => ['exists:categories,id', 'required'],
            'image' => ['required', 'image', 'max:2048'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  Request $data
     * @return \App\User
     */
    protected function create(Request $data)
    {
        $params = $this->validator($data);

        $params['password'] = Hash::make($params['password']);

        $params['slug'] = Restaurant::getUniqueSlugFromTitle($params['restaurant_name']);

        $user = User::create($params);

        if (array_key_exists('image', $params)) {
            $img_path = Storage::disk('images')->put('restaurant_covers', $data->file('image'));
            $params['image'] = $img_path;
        }

        $restaurant = Restaurant::create([
            'name' => $params['restaurant_name'],
            'address' => $params['address'],
            'phone' => $params['phone'],
            'p_iva' => $params['p_iva'],
            'image' => $params['image'],
            'user_id' => $user->id,
        ]);

        if (array_key_exists('categories', $params)) {
            $restaurant->categories()->sync($params['categories']);
        } else {
            $restaurant->categories()->sync([]);
        }

        return $user;
    }
}

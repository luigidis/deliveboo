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
            'categories' => ['exists:categories,id', 'required']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $restaurant = Restaurant::create([
            'name' => $data['restaurant_name'],
            'address' => $data['address'],
            'phone' => $data['phone'],
            'p_iva' => $data['p_iva'],
            'user_id' => $user->id,
        ]);

        if (array_key_exists('categories', $data)) {
            $restaurant->categories()->sync($data['categories']);
        } else {
            // TODO: qua credo serva bloccare tutto e dare errore perché le categorie passate devono esistere
            $restaurant->categories()->sync([]);
        }

        return $user;
    }
}

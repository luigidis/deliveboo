<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('restaurants', 'Api\RestaurantController')->only('index', 'show');

Route::get('restaurants/categories/{categories}', 'Api\RestaurantController@search')->name('restaurants.search');

Route::get('plates/{slug}', 'Api\RestaurantController@plateShow')->name('restaurants.plateShow');

Route::get('cart/plates/{id}', 'Api\RestaurantController@cartPlates')->name('restaurants.cartPlates');

Route::get('orders/generate', 'Api\Orders\OrderController@generate');
Route::post('orders/payment', 'Api\Orders\OrderController@payment');
<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')
    ->prefix('admin')  //questo mi da il prefisso su admin/home in get
    ->name('admin.')    //questo mi da il "prefisso" per il name in admin.home
    ->namespace('Admin')    //questo mi da il prefisso per arrivare al Controller di riferimento Admin\HomeController
    ->group(function () {

        Route::get('/home', 'HomeController@index')->name('home');
        Route::resource('restaurant', 'RestaurantController')->only(['edit', 'update', 'destroy']);
        Route::resource('orders', 'OrderController');
        Route::get('/orders/analytics', 'OrderController@chart')->name('chart');
        Route::resource('categories', 'CategoryController');
        Route::resource('plates', 'PlateController');
    });

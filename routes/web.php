<?php

use Illuminate\Support\Facades\Route;
use App\Category;

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
    $categories = Category::all();
    return view('homepage', compact('categories'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('dashboard')
    ->namespace('Admin')
    ->middleware('auth')
    ->name('dashboard.')
    ->group( function () {

        Route::resource('users', 'UserController');
        Route::resource('plates', 'PlateController');

    });

Route::get('restaurant/{slug}', 'RestaurantController@restaurant')->name('shop.restaurant');
// Route::get('payment', 'RestaurantController@shop')->name('shop.payment.index');

Route::get('payment', 'PaymentController@index')->name('shop.payment.index');

Route::post('payment/checkout', 'PaymentController@checkout')->name('shop.payment.checkout');
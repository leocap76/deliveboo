<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InfoRestaurant;
use App\Category;
use App\Plate;
use App\User;

class RestaurantController extends Controller
{
    public function restaurant($slug) {

        $restaurant = User::with('categories', 'infoRestaurant', 'plates')->where('slug', $restaurant->infoRestaurant->slug)->get();

        dd($restaurant);

        return view('shop.restaurant');
    }
}

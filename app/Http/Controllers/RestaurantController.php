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

        $infoRestaurant = InfoRestaurant::where('slug', $slug)->first();

        $restaurant = $infoRestaurant->user;

        $categories = $restaurant->categories;

        $plates = $restaurant->plates;

        return view('shop.restaurant', compact('infoRestaurant','restaurant','categories','plates'));
    }

    public function shop() {
        return view('shop.payment');
    }
}

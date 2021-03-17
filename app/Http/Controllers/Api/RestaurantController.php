<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InfoRestaurant;
use App\Category;
use App\User;

class RestaurantController extends Controller
{
    public function categories()  {
        $categories = Category::all();

        return response()->json($categories);
    }

    public function restaurants($id) {
        $restaurants = User::with('infoRestaurant','categories')->get();

        $restaurant_all = [];

        foreach($restaurants as $restaurant) {
            
            foreach($restaurant->categories as $category) {
                // dd($category->getOriginal());
                if ($category->getOriginal()['pivot_category_id'] == $id) {
                    $restaurant_all[] = $restaurant;
                }
            }

        }

        return response()->json($restaurant_all);
    }

}

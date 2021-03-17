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
        $restaurants = User::all();
        $restaurant_all = [];
        
        foreach ($restaurants as $key => $restaurant) {

            foreach($restaurant->categories as $category) {
                if ($category->id == $id) {
                    $restaurant_categories = [];
                    $restaurant_info = [];
                    
                    $restaurant_categories[] = $restaurant->categories;
    
                    $restaurant_info[] = $restaurant->infoRestaurant;
    
                    $restaurant_all[$key] = array_merge($restaurant_categories, $restaurant_info);
                };
            }

        };


        return response()->json($restaurant_all);
    }

}

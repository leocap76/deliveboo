<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\InfoRestaurant;
use App\Category;
use App\User;
use App\Order;



class RestaurantController extends Controller
{

    // Prende tutti i ristoranti filtrati in base alla ricerca dell'utente
    public function all_restaurants($input)  {
        $all_restaurants = InfoRestaurant::where('name', 'LIKE', '%'.$input.'%')->limit(5)->get();

        return response()->json($all_restaurants);
    }

    // Prende tutti i ristoranti filtrati per categoria
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

    public function restaurantOrders($id){
        $user = Order::where('user_id', $id)->get();
        
        return response()->json($user);

    }
}

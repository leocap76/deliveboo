<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Category;

class RestaurantController extends Controller
{
    public function categories()  {
        $categories = Category::all();

        return response()->json($categories);
    }

}

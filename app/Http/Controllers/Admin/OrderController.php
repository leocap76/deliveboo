<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Order;
use App\User;

class OrderController extends Controller
{
    public function index() {

        $user = User::where('id', Auth::id())->first();

        $orders = Order::where('user_id', Auth::id())->get();

        return view('dashboard.orders', compact('user', 'orders'));
    }
}

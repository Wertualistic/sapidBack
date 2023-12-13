<?php

namespace App\Http\Controllers;

use App\Models\CompletedOrder;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $orders = Order::all();
        $completedOrders = CompletedOrder::all();
        return view('welcome', compact('products', 'orders', 'completedOrders'));
    }
}

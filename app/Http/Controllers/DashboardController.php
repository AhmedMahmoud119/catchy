<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index()
    {
        $customersCount = User::count();
        $ordersCount = Order::count();
        $ordersCompletedCount = Order::whereHas('orderStatus', function ($q) {
            $q->where('status','wc-completed');
        })->count();
        $productsCount = Product::count();

        return view('welcome',compact('customersCount','ordersCount','ordersCompletedCount'
            ,'productsCount'));
    }
}

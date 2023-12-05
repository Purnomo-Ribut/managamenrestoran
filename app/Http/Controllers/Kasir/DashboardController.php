<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;

class DashboardController extends Controller
{
    
    public function index()
    {
        $chef = User::where('role', 'chef')->get();
        $orders = Order::groupBy('customer_id')->select('customer_id')->take(3)->get();
        return view('kasir.dashboard', compact('orders', 'chef'));
    }

    public function test()
    {
        return 1;
    }

}

<?php

namespace App\Http\Controllers\Chef;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;
class DashboardController extends Controller
{
    
    public function index()
    {
        $totalOrder= Order::all()->count();
        $order = Order::all();
        $profil=Auth::user();
        //$detailOrder = Order::all();
        return view('chef.dashboard', compact('order','totalOrder','profil'));
    }

    public function test()
    {
        return 1;
    }

}

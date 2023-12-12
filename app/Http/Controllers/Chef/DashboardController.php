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
        $order=Order::all()->count();
        $profil=Auth::user();
        return view('chef.dashboard', compact('order','profil'));
    }

    public function test()
    {
        return 1;
    }

}

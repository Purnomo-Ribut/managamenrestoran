<?php

namespace App\Http\Controllers\Chef;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    
    
    public function index()
    {

        $userID = auth()->user()->id;

        $orderan = DB::table('tbl_orders')            
            ->where('user_id', $userID)
            ->count();

        $persenord = ($orderan / 50) * 100;

        $profil = Auth::user();
        $totalOrder = Order::where('user_id', $profil->id)->count();
        $order = Order::where('user_id', $profil->id)->get();
        return view('chef.dashboard', compact('order','totalOrder','profil', 'orderan','persenord'));

    }

    public function test()
    {
        return 1;
    }

}
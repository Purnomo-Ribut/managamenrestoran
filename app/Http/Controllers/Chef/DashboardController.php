<?php

namespace App\Http\Controllers\Chef;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    
    
    public function index()
    {
        $orders = \App\Order::all();

        $userID = auth()->user()->id;
        
        $now = Carbon::now();
        $orderan = DB::table('tbl_orders')
            ->where('user_id', $userID)
            ->whereMonth('created_at', $now->month)
            ->count();

        $persenord = ($orderan / 50) * 100;

        $profil = Auth::user();
        $totalOrder = Order::where('user_id', $profil->id)->count();
        $order = Order::where('user_id', $profil->id)->get();
        // dd($order[0]->orderDetails[0]->menu);
        // $details = OrderDetail::where('order_id', $order);
        // dd($profil->order);
        return view('chef.dashboard', compact('order','totalOrder','profil', 'orderan','persenord', 'orders'));

    }

    public function test()
    {
        return 1;
    }

}
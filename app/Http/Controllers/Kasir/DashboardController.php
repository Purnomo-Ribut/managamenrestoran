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
        // $orders = Order::groupBy('customer_id')->select('customer_id')->take(3)->get();
        // Mengambil data order yang status pembayarannya belum dibayar
        // Mengambil data order yang status pembayarannya belum dibayar
        $ordersBelumDibayar = Order::where('status_pembayaran', 'Belum - Dibayar')
            ->groupBy('customer_id')
            ->select('customer_id')
            ->take(3)
            ->get();

        // Mengambil data order yang status pembayarannya sudah dibayar
        $ordersSudahDibayar = Order::where('status_pembayaran', 'Sudah Dibayar')
             ->orderBy('created_at', 'desc')
            ->groupBy('customer_id')
            ->select('customer_id')
            ->take(3)
            ->get();

        


            return view('kasir.dashboard', compact('chef', 'ordersBelumDibayar', 'ordersSudahDibayar'));
        
    }

    public function test()
    {
        return 1;
    }
}

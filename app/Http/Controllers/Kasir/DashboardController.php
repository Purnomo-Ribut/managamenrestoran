<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\User;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{

    public function index()
    {
        $chef = User::where('role', 'chef')->get();
        // $orders = Order::groupBy('customer_id')->select('customer_id')->take(3)->get();
                
        // Mengambil data order yang status pembayarannya belum dibayar
        $ordersBelumDibayar = Order::where('status_pembayaran', 'Belum - Dibayar')
            ->groupBy('customer_id')
            ->select('customer_id',  DB::raw('MIN(order_code) as order_code'))
            ->take(3)
            ->get();
        
        // Mengambil data order yang status pembayarannya sudah dibayar
        $ordersSudahDibayar = Order::where('status_pembayaran', 'Sudah Dibayar')
            ->orderBy('created_at', 'desc')
            ->groupBy('customer_id')
            ->select('customer_id')
            ->take(3)
            ->get();

        // =====================================================
        // Mengambil total pendapatan hari ini
        $pendapatan = DB::table('tbl_orders')
        ->whereDate('created_at', now())
        ->sum('total');
       
        $targetPendapatan = 1000000; // 1 juta rupiah

        $persendp = ($pendapatan / $targetPendapatan) * 100;
        // =====================================================

        // =====================================================
        // Mengambil jumlah orderan hari ini
        $orderan = DB::table('tbl_orders')
        ->whereDate('created_at', now())
        ->count();

        $persenord = ($orderan / 10) * 100;
        // =====================================================

        // =====================================================
        // mengambil data kustomer 
        $pelanggan = DB::table('tbl_customers')
        ->whereDate('created_at', now())
        ->count();

        $persenpl = ($pelanggan / 10 ) * 100;
        // =====================================================
    
        return view('kasir.dashboard', compact('chef', 'ordersBelumDibayar', 'ordersSudahDibayar', 'pendapatan', 'orderan', 'persenord', 'persendp', 'pelanggan', 'persenpl'));
        
    }

    public function test()
    {
        return 1;
    }
}

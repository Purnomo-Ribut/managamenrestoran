<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\Order;
use Illuminate\Support\Facades\DB;

class DashboardManController extends Controller
{
    public function index()
    {
        // Menggunakan eloquent untuk mengambil semua data dari tabel Order
        $orders = \App\Order::all();
 
        // Menggunakan koleksi Laravel untuk menjumlahkan nilai dalam kolom 'total_harga'
        // $totalHarga = $orders->sum('total');
         // Mengambil total pendapatan hari ini
         $pendapatan = DB::table('tbl_orders')         
         ->sum('total');
        
         $targetPendapatan = 10000000; // 10 juta rupiah
 
         $persendp = ($pendapatan / $targetPendapatan) * 100;

        // Mengirimkan data ke view bersama dengan total harga
        return view('manager.manager', compact('pendapatan','persendp', 'orders'));        
    }
}

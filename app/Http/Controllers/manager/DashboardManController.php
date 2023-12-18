<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use app\Order;

class DashboardManController extends Controller
{
    public function index()
    {
        // Menggunakan eloquent untuk mengambil semua data dari tabel Order
        $orders = \App\Order::all();

        // Menggunakan koleksi Laravel untuk menjumlahkan nilai dalam kolom 'total_harga'
        $totalHarga = $orders->sum('total');

        // Mengirimkan data ke view bersama dengan total harga
        return view('manager.manager', [
            'orders' => $orders,
            'totalHarga' => $totalHarga,
        ]);
    }
}

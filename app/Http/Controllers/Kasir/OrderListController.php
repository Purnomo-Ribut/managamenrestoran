<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use App\Customer;

class OrderListController extends Controller
{

    public function index() 
    {
        $orders = Order::where('status_pembayaran', 'Sudah Dibayar')->get();
        return view('kasir.order.index', compact('orders'));
    }

    public function detail($id)
    {
        $orderDetails = OrderDetail::where('order_id', $id)->with('menu')->get();
        return view('kasir.order.detail', compact('orderDetails'));
    }

    public function order()
    {
        $orders = Order::where('status_pembayaran', 'Belum - Dibayar')->get();
        return view('kasir.order.index2', compact('orders'));
    }

    public function hapus($id)
    {        
        $order = Order::find($id);
        
        
        if ($order) {
            // hapus data customer berdasarkan relasi order dengan customer 
            $order->customer()->delete();

            // Hapus orderan di tabel order 
            $order->delete();            
            return redirect()->route('order.list')->with('success', 'Pesanan berhasil dihapus');
        } else {            
            return redirect()->route('order.list')->with('error', 'Pesanan tidak ditemukan');
        }
    }

}

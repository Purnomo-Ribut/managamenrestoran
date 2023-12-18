<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;

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

}

<?php

namespace App\Http\Controllers\Customer;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;
use Alert;
use App\Kategori;

class OrderController extends Controller
{
    
    public function addCart(Request $request)
    {
        $session = $request->session()->get('reserved');
        
        $cart = new Cart;
        $cart->customer_id = $session['id'];
        $cart->menu_id = $request->menu_id;
        $cart->qty = $request->quantity;
        $cart->price = (int)$request->price * (int)$request->quantity;
        $cart->description = $request->desc;
        $saved = $cart->save();

        if($saved){
            Alert::toast('Berhasil dimasukan ke keranjang', 'success');
            return redirect()->back();
        }

        return redirect()->back()->withErrors(['msg' => "Terjadi kesalahan"]);
    }

    public function removeCart($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        return redirect()->back();
    }

    public function checkout(Request $request)
    {
        $code = "PSN-".rand(100000,999999);
        
        $data = $request->except(['_token']);
        $session = $request->session()->get('reserved');
        $dataLength = count($data['menu_id']);

        $order = new Order;
        $order->customer_id = $session['id'];

        $order->user_id = 1;
        $order->total = 0;
        $order->status_pembayaran = "Belum - Dibayar";
        $order->metode_pembayaran = "kosong";
        $order->order_code = $code;
        $saved = $order->save();

        if($saved){
            for($i = 0; $i < $dataLength; $i++) {
                $orderDetail = new OrderDetail;
                $orderDetail->order_id = $order->id;
                $orderDetail->menu_id = $data['menu_id'][$i];
                $orderDetail->price = $data['price'][$i];
                $orderDetail->qty = $data['quantity'][$i];
                $orderDetail->save();
            }
            return redirect()->route('ordered');
        }

        return redirect()->back()->withErrors(['msg' => "Terjadi kesalahan"]); 
    }

    public function ordered()
    {
        $session = session()->get('reserved');
        $category = Kategori::first();
        $order = Order::where('customer_id', $session['id'])->first();
        $totalPrice = $order->orderDetails->sum('price');
        // dd($totalPrice);
        return view('Customer.cekout', compact('order', 'totalPrice', 'category'));
    }
    
}

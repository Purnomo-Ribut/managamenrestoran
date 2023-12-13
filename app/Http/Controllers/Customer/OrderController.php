<?php

namespace App\Http\Controllers\Customer;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDetail;

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
        $data = $request->except(['_token']);
        $session = $request->session()->get('reserved');
        $dataLength = count($data['menu_id']);

        $order = new Order;
        $order->customer_id = $session['id'];
        $order->user_id = 1;
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
            return redirect()->route('reservasi.logout');
        }

        return redirect()->back()->withErrors(['msg' => "Terjadi kesalahan"]); 
    }
    
}

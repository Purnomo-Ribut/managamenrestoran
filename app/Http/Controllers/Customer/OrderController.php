<?php

namespace App\Http\Controllers\Customer;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            return redirect()->route('makanan.index');
        }

        return redirect()->back()->withErrors(['msg' => "Terjadi kesalahan"]);
    }
    
}

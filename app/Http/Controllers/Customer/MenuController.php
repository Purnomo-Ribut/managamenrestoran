<?php

namespace App\Http\Controllers\Customer;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
class MenuController extends Controller
{
    public function index(){
        $session = session()->get('reserved');
        $menu = Menu::where('id_kategori', 1)->get();
        $carts = Cart::where('customer_id', $session['id'])->get();
        return view('Customer.menu', compact('menu', 'carts'));
    }

    public function minuman(){
        $menu = Menu::where('id_kategori', 2)->get();
        return view('Customer.minuman', compact('menu'));
    }
}

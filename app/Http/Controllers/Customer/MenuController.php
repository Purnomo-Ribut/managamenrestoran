<?php

namespace App\Http\Controllers\Customer;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Menu;
class MenuController extends Controller
{
    public function index($id = ""){
        $session = session()->get('reserved');
        $menu = Menu::where('id_kategori', $id)->get() ? Menu::where('id_kategori', $id)->get() : Menu::all();
        $carts = Cart::where('customer_id', $session['id'])->get();
        $categories = Kategori::all();
        return view('Customer.menu', compact('menu', 'carts', 'categories'));
    }
}

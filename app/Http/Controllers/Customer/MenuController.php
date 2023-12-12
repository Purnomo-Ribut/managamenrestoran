<?php

namespace App\Http\Controllers\Customer;

use App\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Menu;
class MenuController extends Controller
{
    public function index($id){
        $session = session()->get('reserved');
        $menu = Menu::where('id_kategori', $id)->get();
        $carts = Cart::where('customer_id', $session['id'])->get();
        $categories = Kategori::all();
        return view('Customer.menu', compact('menu', 'carts', 'categories'));
    }

    // public function minuman(){
    //     $menu = Menu::where('id_kategori', 2)->get();
    //     return view('Customer.minuman', compact('menu'));
    // }
}

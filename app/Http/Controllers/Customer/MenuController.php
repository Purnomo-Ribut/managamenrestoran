<?php

namespace App\Http\Controllers\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Menu;
class MenuController extends Controller
{
    public function index(){
        $menu = Menu::where('id_kategori', 1)->get();
        return view('Customer.menu', compact('menu'));
    }

    public function minuman(){
        $menu = Menu::where('id_kategori', 2)->get();
        return view('Customer.minuman', compact('menu'));
    }
}

<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelangganController extends Controller
{
    public function index()
    {

        // // $menus = Menu::all();
        // // return view('manager.lihat_menu', [
        // //     'menus' => $menus
        // // ]);
        // $menus = Menu::all();
        // $categories = Kategori::all();
        // // dd($menus[0]->Kategori);
        // return view('manager.lihat_menu', compact('menus', 'categories'));
        return view('manager.data_pelanggan');
        

    }
}

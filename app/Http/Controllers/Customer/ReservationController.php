<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
use App\Menu;

class ReservationController extends Controller
{

    public function index()
    {
        return view('customer.reservation');
    }

    public function store(Request $request)
    {
        $customer = new Customer;
        $menu = Kategori::where('nama', 'Makanan')->first();
        $categories = Kategori::all();

        $validation = $request->validate([
            'nama' => 'required',
            'no_meja' => 'required',
        ]);

        $customer->name = $request->nama;
        $customer->no_table = $request->no_meja;
        $saved = $customer->save();

        if($saved){
            $request->session()->put('reserved', ['id' => $customer->id, 'name' => $customer->name, 'no_table' => $customer->no_table]);
            return redirect()->route('makanan.index', $menu ? $menu->id : '');
        }

        return redirect()->back()->withErrors(['msg' => "Terjadi kesalahan"]);

    }

    public function flush()
    {
        session()->flush();
        return redirect()->route('reservasi');
    }

}

<?php

namespace App\Http\Controllers\manager;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', [
            'menus' => $menus
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi input jika diperlukan
        $request->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'deskripsi' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);


        // Buat objek baru berdasarkan model menu
        $menu = new Menu();
        $menu->id_kategori = $request->input('id_kategori');
        $menu->nama = $request->input('nama');
        $menu->harga = $request->input('harga');
        $menu->stock = $request->input('stock');
        $menu->deskripsi = $request->input('deskripsi');
        $menu->save();

        $menu->save();

        // Redirect atau kembali ke halaman tertentu setelah data disimpan
        // return redirect()->route('manager.manager')
        //     ->with('success', 'Kategori berhasil ditambahkan');
        return redirect(route('manager_index'))->with('success', 'Data menu berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        //
    }
}

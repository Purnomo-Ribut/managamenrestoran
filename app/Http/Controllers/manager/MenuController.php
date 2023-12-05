<?php

namespace App\Http\Controllers\manager;

use App\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Kategori;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;


class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $menus = Menu::all();
        // return view('manager.lihat_menu', [
        //     'menus' => $menus
        // ]);
        $menus = Menu::all();
        $categories = Kategori::all();
        // dd($menus[0]->Kategori);
        return view('manager.lihat_menu', compact('menus', 'categories'));
        

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

        // dd($request->all());

        // Validasi input jika diperlukan
        $request->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'image' => 'mimes:jpeg,png,jpg|max:1024',
            'deskripsi' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/assets/manager/gambarMenu');
            $imageName = basename($imagePath);
        } else {
            $imageName = null; // Atau tentukan nilai default jika tidak ada gambar yang diunggah
        }

        $menu = new Menu();
        $menu->id_kategori = $request->input('id_kategori');
        $menu->nama = $request->input('nama');
        $menu->harga = $request->input('harga');
        $menu->stock = $request->input('stock');
        $menu->image = $imageName;
        $menu->deskripsi = $request->input('deskripsi');
        $menu->save();

        return redirect(route('manager_index'))->with('success', 'Data menu berhasil Tambahkan');
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
    public function edit(Menu $menu, $id)
    {
        // $menu = Menu::where('id',$id) ->first();
        // return view('menu-edit', compact('menu'));
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
        $request->validate([
            'nama' => 'required',
            'id_kategori' => 'required',
            'harga' => 'required',
            'stock' => 'required',
            'image' => 'mimes:jpeg,png,jpg|max:1024',
            'deskripsi' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('public/assets/manager/gambarMenu');
            $imageName = basename($imagePath);
        } else {
            $imageName = null; // Atau tentukan nilai default jika tidak ada gambar yang diunggah
        }

        $menu->id_kategori = $request->input('id_kategori');
        $menu->nama = $request->input('nama');
        $menu->harga = $request->input('harga');
        $menu->stock = $request->input('stock');
        $menu->image = $imageName;
        $menu->deskripsi = $request->input('deskripsi');
        $menu->save();

        return redirect(route('manager_index'))->with('success', 'Data menu berhasil edit');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return redirect (route('lihat_menu')) -> with('success','Data Berhasil Di Hapus');
    }
}

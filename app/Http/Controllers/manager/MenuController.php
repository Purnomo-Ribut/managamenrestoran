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
            'image' => 'mimes:jpeg,png,jpg|max:1024',
            'deskripsi' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Dapatkan nama asli gambar

            // Simpan gambar dengan nama aslinya
            $imagePath = $image->storeAs('public/assets/manager/gambarMenu', $imageName);
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

        return redirect(route('lihat_menu'))->with('success', 'Data menu berhasil Tambahkan');
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
            'image' => 'mimes:jpeg,png,jpg|max:1024',
            'deskripsi' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);

        if ($request->hasFile('image')) {
            // Hapus gambar lama dari storage jika ada
            if ($menu->image) {
                Storage::delete('public/assets/manager/gambarMenu/' . $menu->image);
            }

            // Jika ada gambar yang diunggah, simpan gambar baru dengan nama aslinya
            $image = $request->file('image');
            $imageName = $image->getClientOriginalName(); // Dapatkan nama asli gambar

            // Simpan gambar baru dengan nama aslinya
            $imagePath = $image->storeAs('public/assets/manager/gambarMenu', $imageName);

            // Kemudian Anda dapat mengganti properti gambar pada entitas Anda dengan $imageName baru
            $menu->image = basename($imagePath);
        } else {
            // Jika tidak ada gambar yang diunggah, biarkan gambar yang sudah ada tetap sama
            $imageName = $menu->image;
        }


        $menu->id_kategori = $request->input('id_kategori');
        $menu->nama = $request->input('nama');
        $menu->harga = $request->input('harga');
        $menu->image = $imageName;
        $menu->deskripsi = $request->input('deskripsi');
        $menu->save();

        return redirect(route('lihat_menu'))->with('success', 'Data menu berhasil edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        // Hapus gambar dari storage
        if ($menu->image) {
            Storage::delete('public/assets/manager/gambarMenu/' . $menu->image);
        }

        // Hapus entri dari database
        $menu->delete();

        return redirect(route('lihat_menu'))->with('success', 'Data Berhasil Di Hapus');
    }
}

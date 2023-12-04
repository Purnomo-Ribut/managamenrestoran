<?php

namespace App\Http\Controllers\manager;

use App\Http\Controllers\Controller;
use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategoris = Kategori::all();
        return view('manager.lihat_kategori', compact('kategoris'));
    }

    // public function test()
    // {
    //     return view('manager.manager');
        
    // }

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
            'deskripsi' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);

        // Buat objek baru berdasarkan model Kategori
        $kategori = new Kategori();

        // Isi field dengan data dari form
        $kategori->nama = $request->input('nama');
        $kategori->deskripsi = $request->input('deskripsi');

        $kategori->save();

        // Redirect atau kembali ke halaman tertentu setelah data disimpan
        // return redirect()->route('manager.manager')
        //     ->with('success', 'Kategori berhasil ditambahkan');
        return redirect(route('manager_index'))->with('success', 'Data Kategori berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);

        $kategori->nama = $request->nama;
        $kategori->deskripsi = $request->deskripsi;
        $save = $kategori->save();

        if($save){
            return redirect()->route('manager_index')->with('success', 'Kategori berhasil diubah');
        }
        return redirect()->route('manager_index')->with('error', 'Kategori gagal diubah');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori)
    {
        //
    }
}

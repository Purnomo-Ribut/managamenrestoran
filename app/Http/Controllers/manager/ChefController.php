<?php

namespace App\Http\Controllers\manager;

use App\Chef;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class ChefController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chefs = Chef::all();
        return view('manager.chef', compact('chefs'));
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
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);

        // Buat objek baru berdasarkan model Kategori
        $chef= new Chef();

        // Isi field dengan data dari form
        $chef->name = $request->input('name');
        $chef->email = $request->input('email');
        $chef->password = $request->input('password');

        $chef->save();

        // Redirect atau kembali ke halaman tertentu setelah data disimpan
        // return redirect()->route('manager.manager')
        //     ->with('success', 'Kategori berhasil ditambahkan');
        return redirect(route('chef'))->with('success', 'Data chef berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function show(Chef $chef)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function edit(Chef $chef)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chef $chef)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);

        $chef->name = $request->name;
        $chef->email = $request->email;
        $chef->password = $request->password;

        $save =  $chef->save();
      
       if($save){
        return redirect()->route('chef')->with('success', 'chef berhasil diubah');
       }
       return redirect()->route('chef')->with('error', 'chef gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Chef  $chef
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chef $chef)
    {
        $chef->delete();
        return redirect (route('chef')) -> with('success','Data Berhasil Di Hapus');
    }
}

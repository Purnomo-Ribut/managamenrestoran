<?php

namespace App\Http\Controllers\manager;

use App\user;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $karyawans = user::all();
        return view('manager.karyawan', compact('karyawans'));
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
            'alamat' => 'required',
            'kota' => 'required',
            'gender' => 'required',
            'divisi' => 'required',
            'user' => 'required',
            'pass' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);

        // Buat objek baru berdasarkan model Kategori
        $karyawans = new user();

        // Isi field dengan data dari form
        $karyawans->name = $request->input('nama');
        $karyawans->alamat = $request->input('alamat');
        $karyawans->kota = $request->input('kota');
        $karyawans->gender = $request->input('gender');
        $karyawans->role = $request->input('divisi');
        $karyawans->password = bcrypt( $request->input('pass'));
        $karyawans->email = $request->input('user');

        $karyawans->save();

        // Redirect atau kembali ke halaman tertentu setelah data disimpan
        // return redirect()->route('manager.manager')
        //     ->with('success', 'Kategori berhasil ditambahkan');
        return redirect(route('karyawan'))->with('success', 'Data karyawan berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Karyawans  $karyawans
     * @return \Illuminate\Http\Response
     */
    public function show(user $karyawans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Karyawans  $karyawans
     * @return \Illuminate\Http\Response
     */
    public function edit(user $karyawans)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\user  $karyawans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, user $karyawans)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'gender' => 'required',
            'divisi' => 'required',
            // Sesuaikan dengan field yang dibutuhkan
        ]);

        $karyawans->name = $request->nama;
        $karyawans->alamat = $request->alamat;
        $karyawans->kota = $request->kota;
        $karyawans->gender = $request->gender;
        $karyawans->role = $request->divisi;

        $save =  $karyawans->save();
      
        // return redirect()->route('karyawan')->with('success', 'Karyawan berhasil diubah');
       if($save){
        return redirect()->route('karyawan')->with('success', 'Karyawan berhasil diubah');
       }
       return redirect()->route('karyawan')->with('error', 'Karyawan gagal diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Karyawans  $karyawans
     * @return \Illuminate\Http\Response
     */
    public function destroy(user $karyawans)
    {
        $karyawans->delete();
        return redirect (route('karyawan')) -> with('success','Data Berhasil Di Hapus');
    }
}

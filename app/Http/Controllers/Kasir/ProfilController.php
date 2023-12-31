<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use app\User;

class ProfilController extends Controller
{
    public function index()
    {
        return view('kasir/profil.index');
    }

    // controller update
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'gender' => 'required'
        ]);

        $user = User::findOrFail($id);


        $user->name = $request->input('nama');
        $user->alamat = $request->input('alamat');
        $user->kota = $request->input('kota');
        $user->gender = $request->input('gender');

        $simpan = $user->save();

        if ($simpan) {
            return redirect()->route('profil2')->with('success', 'Profil berhasil diubah');
        }
        return redirect()->route('profil2')->with('error', 'Profil gagal diubah');
    }

    // controller username
    public function user(Request $request, $id)
    {
        $request->validate([
            'user' => 'required'
        ]);

        $user = User::findOrFail($id);


        $user->email = $request->input('user');

        $simpan = $user->save();

        if ($simpan) {
            return redirect()->route('profil2')->with('berhasil', 'Username berhasil diubah');
        }
        return redirect()->route('profil2')->with('salah', 'Profil gagal diubah');
    }

    // password controller
    public function pass(Request $request, $id)
    {
        $request->validate([
            'passlama' => 'required',
            'passbaru' => 'required|confirmed',
        ], [
            'passbaru.confirmed' => 'Password Baru Tidak Sama',
        ]);


        $user = User::findOrFail($id);

        if (!Hash::check($request->passlama, $user->password)) {
            return redirect()->back()->with('salah2', 'Password Lama Salah');
        }

        $user->update(['password' => bcrypt($request->passbaru)]);

        return redirect()->route('logout1')->with('success', 'Password Berhasil Dirubah.');
    }
}

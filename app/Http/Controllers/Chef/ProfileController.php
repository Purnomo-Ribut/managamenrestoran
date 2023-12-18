<?php

namespace App\Http\Controllers\Chef;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Chef;

class ProfileController extends Controller
{
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
        $chef->password = Hash::make($request->password);

        $save =  $chef->save();
      
       if($save){
        return redirect()->route('chef')->with('success', 'chef berhasil diubah');
       }
       return redirect()->route('chef')->with('error', 'chef gagal diubah');
    }

    public function index()
    {
        $profil=Auth::user();
        return view('Chef.editprofil', compact('profil'));
    }

}



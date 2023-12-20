<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
        // $users = User::all(); // Ambil semua data pengguna
        return view('login/index');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            // return redirect()->intended(route('kasir.dashboard'));
            $user = Auth::user(); // mendapatkan data user

            if ($user->role == 'manager') {
                // Redirect ke halaman manager
                return redirect()->intended('/manager')->with('success', 'Anda Berhasil Login');
            } elseif ($user->role == 'kasir') {
                // Redirect ke halaman kasir
                return redirect()->intended('/kasir')->with('success', 'Anda Berhasil Login');
            } elseif ($user->role == 'chef') {
                // Redirect ke halaman chef
                return redirect()->intended('/chef')->with('success', 'Anda Berhasil Login');
            }
        }

        return redirect(route('login.index'))->withErrors('Email/password salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect(route('login.index'));
    }
}

// metode pak sandika
//     $credentials = $request->validate([
//         "email" => 'required|email:dns',
//         "password" => 'required'
//     ]);

//     if (Auth::attempt($credentials)) {
//         $request->session()->regenerate();
//         return redirect()->intended('dashboard');
//     }
    
//     // Handle authentication failure here
//     return redirect()->back()->with('error', 'Invalid email or password');
// }

// }
<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session; 
use App\User;

class LoginController extends Controller
{
    function index(){
        $users = User::all(); // Ambil semua data pengguna
        return view('login/index', ['users' => $users]);
    }

    public function login(Request $request)
    {   

        
        
        // Session::flash('email', $request->email);
        $request->validate([
            "email" => 'required',
            "password"  => 'required'
        ]);

        // data dari form
        $data = [
            "email" => $request->email,
            "password" => $request->password
        ];
        

        if(Auth::attempt($data)){
            return redirect('/dashboard');
        }else{
             return redirect('/')->with('error', 'Email atau password salah.');
        }
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
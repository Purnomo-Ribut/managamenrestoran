<?php

namespace App\Http\Controllers\Kasir;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    public function index()
    {
        return view('kasir.dashboard');
    }

    public function test()
    {
        return 1;
    }

}

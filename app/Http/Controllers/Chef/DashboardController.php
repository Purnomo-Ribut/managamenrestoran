<?php

namespace App\Http\Controllers\Chef;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    
    public function index()
    {
        return view('chef.dashboard');
    }

    public function test()
    {
        return 1;
    }

}

<?php

namespace App\Http\Controllers\manager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardManController extends Controller
{
    public function index()
    {
        // return view('manager.manager');
        $kategori = \App\Kategori::all();
        return view('manager.manager', [
            'kategori' => $kategori
        ]);
    }
}

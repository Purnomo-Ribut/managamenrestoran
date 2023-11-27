<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// rute awal
Route::get('/', function () {
    return view('login.index');
});

Route::get('/dashboard', function () {
    return view('kasir.dashboard');
});

Route::get('kasir/', 'Kasir\DashboardController@index')->name('kasir.dashboard');
Route::get('kasir/test', 'Kasir\DashboardController@test')->name('kasir.test');
Route::get('/manager', function () {
    return view('manager.manager');
});

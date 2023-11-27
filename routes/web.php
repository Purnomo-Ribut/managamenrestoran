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

Route::get('/', function () {
    return view('kasir.test');
});

Route::get('kasir/', 'Kasir\DashboardController@index')->name('kasir.dashboard');
Route::get('/manager', function () {
    return view('manager.manager');
});

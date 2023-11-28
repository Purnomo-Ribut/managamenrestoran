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
use App\Http\Controllers\manager\KategoriController;

// rute awal
Route::get('/', function () {
    return view('login.index');
});


Route::get('/dashboard', function () {
    return view('kasir.dashboard');
});


Route::get('kasir/', 'Kasir\DashboardController@index')->name('kasir.dashboard');
Route::get('kasir/test', 'Kasir\DashboardController@test')->name('kasir.tes');

//Route::get('link/', 'folderCotroller\KategoriController@index')->name('folder view.nama file blade');
Route::get('manager/', 'manager\KategoriController@index')->name('manager.manager');
// Route::get('manager/test', 'manager\KategoriController@test')->name('manager.test');
Route::get('kategori/', 'manager\KategoriController@index')->name('manager.manager');


Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');




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
use App\Http\Controllers\manager\MenuController;
use App\Http\Controllers\manager\DashboardManController;

// rute awal
// Route::get('/', function () {
//     return view('login/index');
// });

// prepare login
Route::get('/', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@authenticate')->name('authenticate');
Route::get('/logout', 'LoginController@logout')->name('logout');
// and login


Route::get('/dashboard', function () {
    return view('kasir.dashboard');
});

Route::prefix('kasir')->middleware('auth', 'role:kasir')->group(function() {
    Route::get('/', 'Kasir\DashboardController@index')->name('kasir.dashboard');
    Route::get('test', 'Kasir\DashboardController@test')->name('kasir.tes');

    Route::get('checkout/{idCustomer}', 'Kasir\CheckoutController@index')->name('kasir.checkout');
});


// role manager (auth)
Route::prefix('manager')->middleware('auth', 'role:manager')->group(function () {
    Route::get('/', 'manager\DashboardManController@index')->name('manager_index');

    //menu list
    Route::get('/manager/daftar-menu', [MenuController::class, 'index'])->name('lihat_menu');
    //daftar kategori
    Route::get('/manager/daftar-kategori', [KategoriController::class, 'index'])->name('lihat_kategori');

    // input data
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');

    //edit data menu
    Route::post('/manager/{menu}/edit', 'manager\MenuController@update')->name('updateMenu');
    // edit kategori
    Route::post('/kategori/{kategori}/edit', 'manager\KategoriController@update')->name('updateKategori');
});

Route::get('/menu', function(){return view('Customer.Menu');});
Route::get('/menu1', function(){return view('Customer.test');});

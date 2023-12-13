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
use App\Http\Controllers\manager\KaryawanController;
use App\Http\Controllers\manager\KategoriController;
use App\Http\Controllers\manager\MenuController;
use App\Http\Controllers\manager\DashboardManController;
use App\Http\Controllers\manager\PelangganController;
use App\Http\Controllers\manager\ChefController;

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
    Route::get('/daftar-menu', [MenuController::class, 'index'])->name('lihat_menu');
    //daftar kategori
    Route::get('/daftar-kategori', [KategoriController::class, 'index'])->name('lihat_kategori');
    // data pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('data_pelanggan');
    //data karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
    // data chef
    Route::get('/chefDash', [ChefController::class, 'index'])->name('chef');


    // input data
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
    Route::post('/chefDash', [ChefController::class, 'store'])->name('chef.store');

    //edit data menu
    Route::post('/manager/{menu}/edit', 'manager\MenuController@update')->name('updateMenu');
    // edit kategori
    Route::post('/kategori/{kategori}/edit', 'manager\KategoriController@update')->name('updateKategori');
    // edit kar
    Route::post('/karyawan/{karyawans}/edit', 'manager\KaryawanController@update')->name('updateKaryawan');
    // edit chef
    Route::post('/chef/{chef}/edit', 'manager\ChefController@update')->name('updateChef');


    Route::get('/kategori/{kategori}/delete', 'manager\KategoriController@destroy')->name('deleteKategori');
    Route::get('/menu/{menu}/delete', 'manager\MenuController@destroy')->name('deleteMenu');
    Route::get('/karyawan/{karyawans}/delete', 'manager\KaryawanController@destroy')->name('deleteKaryawan');
    Route::get('/chef/{chef}/delete', 'manager\ChefController@destroy')->name('deleteChef');
});

Route::get('/reservasi','Customer\ReservationController@index')->name('reservasi');
Route::post('/reservasi','Customer\ReservationController@store')->name('reservasi.store');

Route::middleware('registered')->group(function() {
    Route::get('/menu/{id?}','Customer\MenuController@index')->name('makanan.index');
    Route::get('/cart/remove/{id}','Customer\OrderController@removeCart')->name('remove.cart');
    Route::post('/cart/checkout','Customer\OrderController@checkout')->name('checkout.cart');
    // Route::get('/menu/minuman','Customer\MenuController@minuman')->name('minuman.index');
    
    Route::post('/cart','Customer\OrderController@addCart')->name('addcart');
    
    Route::get('/reservasi/flush','Customer\ReservationController@flush')->name('reservasi.logout');
});


//Customer
// Route::get('/menu/{id}','Customer\MenuController@index')->name('makanan.index');
Route::get('/tes', function () {
    return view('Customer.modal');
});

// CHEF

Route::get('chef/', 'Chef\DashboardController@index')->name('chef.dashboard');
Route::get('chef/test', 'Chef\DashboardController@test')->name('chef.tes');

Route::post('/chef/{chef}/edit', 'Chef\ProfileController@update')->name('EditProfile');
Route::get('chef/update/', 'Chef\ProfileController@index')->name('Edit.Chef');
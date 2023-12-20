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

// rute awal
// Route::get('/', function () {
//     return view('login/index');
// });

// prepare login
Route::get('/', 'LoginController@index')->name('login.index');
Route::post('/login', 'LoginController@authenticate')->name('authenticate');
Route::get('/logout', 'LoginController@logout')->name('logout');
// and login


// Route::get('/struk', function () {
//     return view('kasir/struk.index');
// });

Route::prefix('kasir')->middleware('auth', 'role:kasir')->group(function() {
    Route::get('/', 'Kasir\DashboardController@index')->name('kasir.dashboard');
    Route::get('test', 'Kasir\DashboardController@test')->name('kasir.tes');

    // checkout + detail
    Route::get('checkout/{idCustomer}', 'Kasir\CheckoutController@index')->name('kasir.checkout');

    // list transaksi
    Route::get('transaksi', 'Kasir\OrderListController@index')->name('transaksi.list');
    Route::get('transaksi/detail/{idOrder}', 'Kasir\OrderListController@detail')->name('transaksi.detail');

    // list orderan
    Route::get('order', 'Kasir\OrderListController@order')->name('order.list');

    // hapus order
    Route::get('/hapus/{id}', 'Kasir\OrderListController@hapus')->name('order.hapus');

    // profil
    Route::get('/profile', 'Kasir\ProfilController@index')->name('profil2');
    // update data profil dan user
    Route::post('/profile/profil/{id}', 'Kasir\ProfilController@update')->name('profil.update2');
    Route::post('/profile/user/{id}', 'Kasir\ProfilController@user')->name('user.update2');
    // update password
    Route::post('/profile/password/{id}', 'Kasir\ProfilController@pass')->name('pass.update2');

    // tambahkan pembayaran kasir
    Route::post('checkout/{idCustomer}', 'Kasir\CheckoutController@store')->name('bayar');

    // struk
    Route::get('struk/{idCustomer}', 'Kasir\StrukController@index')->name('struk');

    // cetak
    Route::get('struk/cetak', 'Kasir\StrukController@cetak')->name('cetak');


    // logout
    Route::get('/logout', 'LoginController@logout')->name('logout1');

    //
});


// role manager (auth)
Route::prefix('manager')->middleware('auth', 'role:manager')->group(function () {
    Route::get('/', 'manager\DashboardManController@index')->name('manager_index');

    //menu list
    Route::get('/daftar-menu', [MenuController::class, 'index'])->name('lihat_menu');
    //daftar kategori
    Route::get('/daftar-kategori', [KategoriController::class, 'index'])->name('lihat_kategori');
    //data karyawan
    Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan');
    // data chef

    // input data
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');

    //edit data menu
    Route::post('/manager/{menu}/edit', 'manager\MenuController@update')->name('updateMenu');
    // edit kategori
    Route::post('/kategori/{kategori}/edit', 'manager\KategoriController@update')->name('updateKategori');
    // edit kar
    Route::post('/karyawan/{karyawans}/edit', 'manager\KaryawanController@update')->name('updateKaryawan');
    // edit chef


    Route::get('/kategori/{kategori}/delete', 'manager\KategoriController@destroy')->name('deleteKategori');
    Route::get('/menu/{menu}/delete', 'manager\MenuController@destroy')->name('deleteMenu');
    Route::get('/karyawan/{karyawans}/delete', 'manager\KaryawanController@destroy')->name('deleteKaryawan');
    Route::get('/chef/{chef}/delete', 'manager\ChefController@destroy')->name('deleteChef');

    //logout
    Route::get('/logout', 'LoginController@logout')->name('logout3');
    // profil
    Route::get('/profil', 'manager\ProfilController@index')->name('profil');
    // update data profil dan user
    Route::post('/profil/profil/{id}', 'manager\ProfilController@update')->name('profil.update');
    Route::post('/profil/user/{id}', 'manager\ProfilController@user')->name('user.update');
    // update password
    Route::post('/profil/password/{id}', 'manager\ProfilController@pass')->name('pass.update');

     // logout
    Route::get('/logout', 'LoginController@logout')->name('logout2');
});

// CHEF
Route::prefix('chef')->middleware('auth', 'role:chef')->group(function () {
    Route::get('/', 'Chef\DashboardController@index')->name('chef.dashboard');


    // profil
    Route::get('/profile', 'Chef\ProfilController@index')->name('profil3');
    // update data profil dan user
    Route::post('/profile/profil/{id}', 'Chef\ProfilController@update')->name('profil.update3');
    Route::post('/profile/user/{id}', 'Chef\ProfilController@user')->name('user.update3');
    // update password
    Route::post('/profile/password/{id}', 'Chef\ProfilController@pass')->name('pass.update3');

     // logout
    Route::get('/logout', 'LoginController@logout')->name('logout3');

    Route::get('chef/test', 'Chef\DashboardController@test')->name('chef.tes');

    Route::post('/chef/{chef}/edit', 'Chef\ProfileController@update')->name('EditProfile');

    Route::get('chef/update/', 'Chef\ProfileController@index')->name('Edit.Chef');
});


// proses pesan
Route::middleware('registered')->group(function() {
    Route::get('/menu/{id?}','Customer\MenuController@index')->name('makanan.index');
    Route::get('/cart/remove/{id}','Customer\OrderController@removeCart')->name('remove.cart');
    Route::post('/cart/checkout','Customer\OrderController@checkout')->name('checkout.cart');
    Route::get('/order/cancel/{idOrder}','Customer\OrderController@cancelOrder')->name('cancel.order');
    // Route::get('/menu/minuman','Customer\MenuController@minuman')->name('minuman.index');


    Route::get('/ordered','Customer\OrderController@ordered')->name('ordered');
    Route::post('/cart','Customer\OrderController@addCart')->name('addcart');

    Route::get('/reservasi/flush','Customer\ReservationController@flush')->name('reservasi.logout');
});

// reservasi
Route::get('/reservasi','Customer\ReservationController@index')->name('reservasi');
Route::post('/reservasi','Customer\ReservationController@store')->name('reservasi.store');

// ordered
Route::get('/ordered','Customer\OrderController@ordered')->name('ordered');

//Customer
Route::get('/menu/{id}','Customer\MenuController@index')->name('makanan.index');
Route::get('/tes', function () {
    return view('Customer.modal');
});

// searching menu
Route::get('/search/menu', 'Customer\MenuController@search')->name('Search');






// Route::get('chef/update/', 'Chef\ProfileController@index')->name('Edit.Chef');


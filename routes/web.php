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

// rute awal
// Route::get('/', function () {
//     return view('login/index');
// });

// prepare login
route::get('/', 'LoginController@index');
route::post('/login', 'LoginController@login');
// and login


Route::get('/dashboard', function () {
    return view('kasir.dashboard');
});

Route::prefix('kasir')->group(function() {
    Route::get('/', 'Kasir\DashboardController@index')->name('kasir.dashboard');
    Route::get('test', 'Kasir\DashboardController@test')->name('kasir.tes');

    Route::get('checkout/{idCustomer}', 'Kasir\CheckoutController@index')->name('kasir.checkout');
    // Route::resource('checkout', 'Kasir\DashboardController');
});



Route::get('/manager', 'manager\KategoriController@index')->name('manager_index');
// Route::get('manager/test', 'manager\KategoriController@test')->name('manager.test');

Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');





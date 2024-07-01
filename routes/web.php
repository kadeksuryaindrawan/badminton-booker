<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GorController;
use App\Http\Controllers\JadwalLapanganController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LapanganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [LandingController::class, 'index']);
Route::get('/about-us', [LandingController::class, 'about']);
Route::get('/daftar-gor', [LandingController::class, 'gor']);
Route::get('/contact-us', [LandingController::class, 'contact']);
Route::get('/daftar-lapangan/{id}', [LandingController::class, 'lapangan'])->name('daftar-lapangan');
Route::get('/detail-lapangan/{id}', [LandingController::class, 'detail_lapangan'])->name('detail-lapangan');
Route::get('/get-jam', [LandingController::class, 'getJam'])->name('get-jam');
Route::get('/cart', [LandingController::class, 'cart'])->name('cart')->middleware('auth');
Route::post('/add-cart', [CartController::class, 'add'])->name('add-cart')->middleware('auth');
Route::delete('/delete-cart/{id}', [CartController::class, 'delete'])->name('delete-cart')->middleware('auth');
Route::get('/checkout', [PemesananController::class, 'index'])->name('checkout')->middleware('auth');
Route::post('/checkout-process', [PemesananController::class, 'checkout_process'])->name('checkout-process')->middleware('auth');
// Route::group(['middleware' => ['auth', 'role2:super admin,admin']], function () {
//     Route::resource('user', UserController::class);
//     Route::resource('gor', GorController::class);
// });

Route::group(['middleware' => ['auth', 'role:super admin']], function () {
    Route::resource('user', UserController::class);
    Route::resource('gor', GorController::class);
});

Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::resource('lapangan', LapanganController::class);
    Route::get('/daftar-jadwal/{id}', [JadwalLapanganController::class, 'index'])->name('daftar-jadwal');
    Route::get('/tambah-jadwal/{id}', [JadwalLapanganController::class, 'tambah'])->name('tambah-jadwal');
    Route::post('/add-jadwal/{id}', [JadwalLapanganController::class, 'add'])->name('add-jadwal');
    Route::get('/edit-jadwal/{id}', [JadwalLapanganController::class, 'edit'])->name('edit-jadwal');
    Route::put('/update-jadwal/{id}', [JadwalLapanganController::class, 'update'])->name('update-jadwal');
    Route::delete('/hapus-jadwal/{id}', [JadwalLapanganController::class, 'hapus'])->name('hapus-jadwal');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use App\Http\Controllers\GorController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LapanganController;
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

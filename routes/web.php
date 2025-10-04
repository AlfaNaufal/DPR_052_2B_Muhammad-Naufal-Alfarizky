<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaDprController;
use App\Http\Controllers\KomponenGajiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', [HomeController::class, 'index']);

// Rute untuk tamu (belum login)
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('login', [AuthController::class, 'login']);
});

// Rute untuk yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Rute khusus Admin
    Route::middleware('role:Admin')->prefix('admin')->name('admin.')->group(function () {
        // Route::get('dashboard', function () {
        //     return view('admin.dashboard');
        // })->name('admin.dashboard');
        Route::get('/dashboard', [AnggotaDprController::class, 'index'])->name('dashboard');
        Route::resource('anggota', AnggotaDprController::class)->parameters(['anggota' => 'anggota']);
        Route::resource('komponenGaji', KomponenGajiController::class);
        
    });

    // Rute khusus User
    Route::middleware('role:Public')->group(function () {
        Route::get('dashboard', function () {
            return view('public.dashboard');
        })->name('public.dashboard');
    });
});
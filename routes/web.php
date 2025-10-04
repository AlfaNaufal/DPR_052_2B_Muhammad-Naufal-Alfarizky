<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnggotaDprController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\KomponenGajiController;
use App\Http\Controllers\Public\AnggotaController;
use App\Http\Controllers\Public\PublicController;

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
        Route::resource('komponenGaji', KomponenGajiController::class)->parameters(['komponenGaji' => 'komponenGaji']);
        Route::resource('penggajian', PenggajianController::class);
        
    });

    // Rute khusus User
    Route::middleware('role:Public')->prefix('public')->name('public.')->group(function () {
        // Route::get('dashboard', function () {
        //     return view('public.dashboard');
        // })->name('public.dashboard');

        Route::get('/dashboard', [PublicController::class, 'index'])->name('dashboard');

        Route::get('/anggota/{anggota}', [PublicController::class, 'detailAnggota'])->name('anggota.detail');
        Route::get('/penggajian', [PublicController::class, 'tampilPenggajian'])->name('penggajian.index');
        Route::get('/penggajian/{anggota}', [PublicController::class, 'detailPenggajian'])->name('penggajian.detail');
    });
});
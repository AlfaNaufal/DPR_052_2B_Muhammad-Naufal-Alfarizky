<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

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
    // Jika perlu registrasi
    // Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
    // Route::post('register', [AuthController::class, 'register']);
});

// Rute untuk yang sudah login
Route::middleware('auth')->group(function () {
    // Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // Rute khusus Admin
    Route::middleware('role:Admin')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard');
        });
    });

    // Rute khusus User
    Route::middleware('role:Public')->group(function () {
        Route::get('/dashboard', function () {
            return 'Ini halaman user';
        });
    });
});
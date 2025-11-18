<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController; // <-- BARIS TAMBAHAN
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage.welcome');
});

// --- Rute Otentikasi ---
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// --- Rute Dashboard & Seller ---
Route::get('/dashboard', function () {
    return view('main.dashboard');
});

Route::get('/sellerconfirmation', function () {
    return view('seller-confirmation');
});

// ----------------------------------------
// Rute Detail Produk (Tambahan untuk fix error)
// ----------------------------------------
// Route ini mendefinisikan nama 'product.show' yang diperlukan oleh Blade.
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
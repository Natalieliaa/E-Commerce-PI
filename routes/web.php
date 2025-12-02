<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Halaman utama
Route::get('/', function () {
    return view('landingPage.welcome');
});

// --- Rute Otentikasi ---
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin/dashboard', function() {
    return view('admin.dashboard');
})->name('admin.dashboard')->middleware('auth:admin');

Route::get('/seller/dashboard', function() {
    return view('seller.dashboard');
})->name('seller.dashboard')->middleware('auth:seller');

Route::get('/customer/dashboard', [CustomerController::class, 'index'])
    ->name('customer.dashboard')
    ->middleware('auth:customer');

// --- Halaman daftar produk (pakai controller) ---
Route::get('/products', [ProductController::class, 'index'])->name('products.page');
Route::get('/product/{id}', [ProductController::class, 'detail'])->name('product.product-detail');


// =======================
//   HALAMAN CHECKOUT
// =======================

// GET /checkout -> terima ?slug=...&qty=...
Route::get('/checkout', function (Request $request, ProductController $productController) {

})->name('checkout');

// (opsional) POST /checkout untuk submit pesanan
Route::post('/checkout', function (Request $request) {
    // nanti di sini proses pesanan beneran
    return back()->with('success', 'Pesanan berhasil dibuat (dummy).');
})->name('checkout.submit');

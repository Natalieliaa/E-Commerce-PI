<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
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

// --- Rute Dashboard & Seller ---
Route::get('/dashboard', function () {
    return view('main.dashboard');
});

Route::get('/sellerconfirmation', function () {
    return view('seller-confirmation');
});

// --- Detail Produk ---
Route::get('/product/{slug}', [ProductController::class, 'show'])->name('productdetail');

// --- Halaman daftar produk (pakai controller) ---
Route::get('/products', [ProductController::class, 'index'])->name('products.page');


// =======================
//   HALAMAN CHECKOUT
// =======================

// GET /checkout -> terima ?slug=...&qty=...
Route::get('/checkout', function (Request $request, ProductController $productController) {
    $slug = $request->query('slug', '');
    $qty  = (int) $request->query('qty', 1);

    // cari produk dari controller
    $product = $productController->findBySlug($slug);
    if (! $product) {
        abort(404, 'Produk untuk checkout tidak ditemukan.');
    }

    $totalPrice = $product['price'] * $qty;

    rreturn view('landingPage.main.checkout', [
    'product'    => $product,
    'qty'        => $qty,
    'totalPrice' => $totalPrice,
   ]);
})->name('checkout');

// (opsional) POST /checkout untuk submit pesanan
Route::post('/checkout', function (Request $request) {
    // nanti di sini proses pesanan beneran
    return back()->with('success', 'Pesanan berhasil dibuat (dummy).');
})->name('checkout.submit');

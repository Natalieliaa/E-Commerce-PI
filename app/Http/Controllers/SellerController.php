<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class SellerController extends Controller
{
    // ================================
    // Dashboard Seller
    // ================================
    public function index()
    {

        return view('seller.dashboard');
    }

    public function storeProduct(Request $request)
{
    $validated = $request->validate([
        'nama_produk' => 'required|string|max:255',
        'deskripsi' => 'nullable|string|max:1000',
        'harga' => 'required|numeric|min:0',
        'stok' => 'required|integer|min:0',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' // Max 2MB
    ], [
        'nama_produk.required' => 'Nama produk wajib diisi',
        'harga.required' => 'Harga wajib diisi',
        'harga.numeric' => 'Harga harus berupa angka',
        'harga.min' => 'Harga tidak boleh negatif',
        'stok.required' => 'Stok wajib diisi',
        'stok.integer' => 'Stok harus berupa angka bulat',
        'stok.min' => 'Stok tidak boleh negatif',
        'gambar.image' => 'File harus berupa gambar',
        'gambar.mimes' => 'Format gambar harus JPG, JPEG, atau PNG',
        'gambar.max' => 'Ukuran gambar maksimal 2MB'
    ]);

    $data = $validated;
    $data['seller_id'] = AuthController::id();

    // Upload gambar
    if ($request->hasFile('gambar')) {
        $data['gambar'] = $request->file('gambar')->store('products', 'public');
    }

    Product::create($data);

    return redirect()->route('seller.products')
        ->with('success', 'Produk berhasil ditambahkan! 🎉');
}
    // Tampilkan pesanan untuk seller
public function orders()
{
    $sellerId = AuthController::id();

    // Ambil pesanan yang mengandung produk dari seller ini
    $orders = Order::whereHas('items.product', function($q) use ($sellerId) {
        $q->where('seller_id', $sellerId);
    })
    ->with(['user', 'items.product'])
    ->latest()
    ->get();

    // Filter items hanya yang dari seller ini
    foreach ($orders as $order) {
        $order->items = $order->items->filter(function($item) use ($sellerId) {
            return $item->product->seller_id == $sellerId;
        });
    }

    return view('seller.orders', compact('orders'));
}

// Update status pesanan
public function updateOrderStatus(Request $request, $id)
{
    $request->validate([
        'status' => 'required|in:processing,shipped,completed,cancelled'
    ]);

    $order = Order::findOrFail($id);
    $order->update(['status' => $request->status]);

    return back()->with('success', 'Status pesanan berhasil diupdate!');
}
//Delete product
    public function deleteProduct($id)
{
    // Pastikan produk milik seller yang login
    $product = Product::where('seller_id', Auth::id())->findOrFail($id);

    // Cek apakah produk ada di pesanan yang sedang diproses
    $hasActiveOrders = OrderItem::where('product_id', $product->id)
        ->whereHas('order', function($q) {
            $q->whereIn('status', ['pending', 'processing', 'shipped']);
        })
        ->exists();

    if ($hasActiveOrders) {
        return back()->with('error', 'Produk tidak dapat dihapus karena masih ada pesanan yang sedang diproses!');
    }

    // Hapus gambar dari storage
    if ($product->gambar) {
        Storage::disk('public')->delete($product->gambar);
    }

    // Hapus produk
    $product->delete();

    return back()->with('success', 'Produk berhasil dihapus! 🗑️');
}
}

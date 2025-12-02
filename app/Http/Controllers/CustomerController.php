<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    // Dashboard customer = tampilkan semua produk
    public function index()
    {
        $products = Product::with('seller')->latest()->get();
        return view('main.dashboard', compact('products'));
    }

    // Tambah ke cart
    public function addToCart(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        // Cek stok
        if ($product->stok < 1) {
            return back()->with('error', 'Produk habis!');
        }

        // Cek apakah sudah ada di cart
        $cartItem = Cart::where('user_id', Auth::id())
                        ->where('product_id', $id)
                        ->first();

        if ($cartItem) {
            // Update quantity
            if ($cartItem->quantity + 1 > $product->stok) {
                return back()->with('error', 'Stok tidak mencukupi!');
            }
            $cartItem->increment('quantity');
        } else {
            // Tambah baru
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $id,
                'quantity' => 1
            ]);
        }

        return back()->with('success', 'Produk ditambahkan ke keranjang! 🛒');
    }

    // Tampilkan cart
    public function cart()
    {
        $cartItems = Cart::where('user_id', Auth::id())
                        ->with('product')
                        ->get();

        $total = $cartItems->sum(function($item) {
            return $item->product->harga * $item->quantity;
        });

        return view('customer.cart', compact('cartItems', 'total'));
    }

    // Update quantity di cart
    public function updateCart(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $cartItem = Cart::where('user_id', Auth::id())->findOrFail($id);

        // Cek stok
        if ($request->quantity > $cartItem->product->stok) {
            return back()->with('error', 'Stok tidak mencukupi!');
        }

        $cartItem->update(['quantity' => $request->quantity]);

        return back()->with('success', 'Keranjang diupdate!');
    }

    // Hapus dari cart
    public function removeFromCart($id)
    {
        Cart::where('user_id', Auth::id())->findOrFail($id)->delete();
        return back()->with('success', 'Produk dihapus dari keranjang!');
    }

    // Halaman Checkout
    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())
                        ->with('product.seller')
                        ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.cart')
                           ->with('error', 'Keranjang kosong!');
        }

        $total = $cartItems->sum(function($item) {
            return $item->product->harga * $item->quantity;
        });

        return view('customer.checkout', compact('cartItems', 'total'));
    }

    // Proses Order
    public function processCheckout(Request $request)
    {
        $request->validate([
            'shipping_address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'notes' => 'nullable|string|max:500'
        ]);

        $cartItems = Cart::where('user_id', Auth::id())
                        ->with('product')
                        ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('customer.cart')
                           ->with('error', 'Keranjang kosong!');
        }

        // Cek stok semua produk
        foreach ($cartItems as $item) {
            if ($item->quantity > $item->product->stok) {
                return back()->with('error', "Stok {$item->product->nama_produk} tidak mencukupi!");
            }
        }

        DB::beginTransaction();

        try {
            // Hitung total
            $total = $cartItems->sum(function($item) {
                return $item->product->harga * $item->quantity;
            });

            // Buat order
            $order = Order::create([
                'order_number' => Order::generateOrderNumber(),
                'user_id' => Auth::id(),
                'total' => $total,
                'status' => 'pending',
                'shipping_address' => $request->shipping_address,
                'phone' => $request->phone,
                'notes' => $request->notes
            ]);

            // Buat order items & kurangi stok
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->harga,
                    'subtotal' => $item->product->harga * $item->quantity
                ]);

                // Kurangi stok produk
                $item->product->decrement('stok', $item->quantity);
            }

            // Hapus cart
            Cart::where('user_id', Auth::id())->delete();

            DB::commit();

            return redirect()->route('customer.order-success', $order->id)
                           ->with('success', 'Pesanan berhasil dibuat! 🎉');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Terjadi kesalahan! Silakan coba lagi.');
        }
    }

    // Halaman Order Success
    public function orderSuccess($orderId)
    {
        $order = Order::with('items.product')->findOrFail($orderId);

        // Pastikan order milik user yang login
        if ($order->user_id != Auth::id()) {
            abort(403);
        }

        return view('customer.order-success', compact('order'));
    }

    // Halaman My Orders
    public function myOrders()
    {
        $orders = Order::where('user_id', Auth::id())
                      ->with('items.product')
                      ->latest()
                      ->get();

        return view('customer.my-orders', compact('orders'));
    }
}

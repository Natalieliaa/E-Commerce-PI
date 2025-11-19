<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Sumber data produk (sementara hardcoded).
     * Nanti kalau sudah pakai database tinggal ganti bagian ini.
     */
    public function getProducts(): array
    {
        return [
            [
                'name'  => 'Rak Buku',
                'price' => 250000,
                'image' => 'rak buku.jpg',
                'stock' => 10,
            ],
            [
                'name'  => 'Gantungan',
                'price' => 25000,
                'image' => 'gantungan.jpg',
                'stock' => 25,
            ],
            [
                'name'  => 'Vas Rotan',
                'price' => 100000,
                'image' => 'vas rotan.jpg',
                'stock' => 15,
            ],
            [
                'name'  => 'Keranjang',
                'price' => 150000,
                'image' => 'keranjang.jpg',
                'stock' => 12,
            ],
            [
                'name'  => 'Bingkai Foto',
                'price' => 50000,
                'image' => 'bingkai foto.jpg',
                'stock' => 30,
            ],
            [
                'name'  => 'Storage',
                'price' => 120000,
                'image' => 'storage.jpg',
                'stock' => 20,
            ],
            [
                'name'  => 'Craft Lamp',
                'price' => 100000,
                'image' => 'craft lamp.jpg',
                'stock' => 18,
            ],
            [
                'name'  => 'Meja',
                'price' => 200000,
                'image' => 'meja.jpg',
                'stock' => 8,
            ],
            [
                'name'  => 'Tas Rotan',
                'price' => 90000,
                'image' => 'tas rotan.jpg',
                'stock' => 25,
            ],
        ];
    }

    /** Halaman list produk */
    public function index(\Illuminate\Http\Request $request)
    {
        $products = $this->getProducts();

        $q = trim((string) $request->query('q', ''));
        if ($q !== '') {
            $filtered = [];
            $qLower = mb_strtolower($q);
            foreach ($products as $p) {
                if (mb_stripos($p['name'], $q) !== false || mb_stripos((string)($p['image'] ?? ''), $q) !== false) {
                    $filtered[] = $p;
                } else {
                    // also check words inside name
                    $words = preg_split('/\s+/', $p['name']);
                    foreach ($words as $w) {
                        if (mb_stripos($w, $q) !== false) {
                            $filtered[] = $p;
                            break;
                        }
                    }
                }
            }

            $products = $filtered;
        }

        return view('landingPage.products', compact('products', 'q'));
    }

    /** Cari produk berdasarkan slug */
    public function findBySlug(string $slug): ?array
    {
        foreach ($this->getProducts() as $p) {
            if (Str::slug($p['name']) === $slug) {
                return $p;
            }
        }

        return null;
    }

    /** Halaman detail produk */
    public function show(string $slug)
    {
        $product = $this->findBySlug($slug);

        if (! $product) {
            abort(404, 'Produk tidak ditemukan');
        }

        return view('landingPage.productdetail', compact('product'));
    }
}

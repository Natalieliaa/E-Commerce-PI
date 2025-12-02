<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Str;

class ProductController extends Controller
{
 public function detail($id)
{
    $product = Product::findOrFail($id);

    $data = [
        'nama'  => $product->nama_produk,
        'harga' => $product->harga,
        'gambar' => $product->gambar,
        'stock' => $product->stock,
        'deskripsi'  => $product->deskripsi,
    ];

    return view('main.productdetail', ['product' => $data]);
}
}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products'; // kalau nama tabel 'products'

    use HasFactory;

    protected $fillable = [
        'seller_id',
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'gambar'
    ];

    // Relasi ke Seller
    public function seller()
    {
        return $this->belongsTo(User::class, 'seller_id');
    }
}

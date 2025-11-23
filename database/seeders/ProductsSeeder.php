<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            // Anyaman (Seller 1)
            [
                'id_seller' => 1,
                'nama_produk' => 'Tas Anyaman Pandan',
                'jenis_produk' => 'Anyaman',
                'harga' => 180000,
                'stock' => 15,
                'deskripsi' => 'Tas tangan dari daun pandan alami, ramah lingkungan dan elegan.',
                'gambar' => 'tas_anyaman.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 1,
                'nama_produk' => 'Keranjang Rotan Mini',
                'jenis_produk' => 'Anyaman',
                'harga' => 95000,
                'stock' => 25,
                'deskripsi' => 'Keranjang rotan multifungsi cocok untuk dekorasi rumah.',
                'gambar' => 'keranjang_rotan.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 1,
                'nama_produk' => 'Topi Anyaman Bambu',
                'jenis_produk' => 'Anyaman',
                'harga' => 85000,
                'stock' => 20,
                'deskripsi' => 'Topi bambu tradisional ringan dan tahan panas.',
                'gambar' => 'topi_bambu.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 1,
                'nama_produk' => 'Tikar Anyaman Pandan',
                'jenis_produk' => 'Anyaman',
                'harga' => 210000,
                'stock' => 10,
                'deskripsi' => 'Tikar anyaman pandan warna alami, cocok untuk piknik atau dekorasi.',
                'gambar' => 'tikar_pandan.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 1,
                'nama_produk' => 'Kotak Perhiasan Rotan',
                'jenis_produk' => 'Anyaman',
                'harga' => 120000,
                'stock' => 18,
                'deskripsi' => 'Kotak penyimpanan perhiasan dari rotan asli.',
                'gambar' => 'kotak_rotan.jpg',
                'rating' => 4,
            ],

            // Ukiran (Seller 2)
            [
                'id_seller' => 2,
                'nama_produk' => 'Patung Kayu Garuda',
                'jenis_produk' => 'Ukiran',
                'harga' => 450000,
                'stock' => 8,
                'deskripsi' => 'Patung kayu garuda ukiran tangan khas Bali dengan detail halus.',
                'gambar' => 'patung_garuda.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 2,
                'nama_produk' => 'Topeng Barong Mini',
                'jenis_produk' => 'Ukiran',
                'harga' => 220000,
                'stock' => 12,
                'deskripsi' => 'Topeng barong mini dari kayu mahoni untuk hiasan dinding.',
                'gambar' => 'topeng_barong.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 2,
                'nama_produk' => 'Ukiran Relief Bunga',
                'jenis_produk' => 'Ukiran',
                'harga' => 275000,
                'stock' => 10,
                'deskripsi' => 'Ukiran relief bunga dari kayu jati cocok untuk interior rumah.',
                'gambar' => 'relief_bunga.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 2,
                'nama_produk' => 'Tempat Lilin Kayu',
                'jenis_produk' => 'Ukiran',
                'harga' => 145000,
                'stock' => 20,
                'deskripsi' => 'Tempat lilin ukiran halus dari kayu trembesi.',
                'gambar' => 'tempat_lilin.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 2,
                'nama_produk' => 'Gantungan Kunci Kayu Nama',
                'jenis_produk' => 'Ukiran',
                'harga' => 35000,
                'stock' => 50,
                'deskripsi' => 'Souvenir gantungan kunci ukir nama custom.',
                'gambar' => 'gantungan_kunci.jpg',
                'rating' => 5,
            ],
        ]);
    }
}

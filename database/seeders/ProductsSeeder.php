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

            // Batik (Seller 3)
            [
                'id_seller' => 3,
                'nama_produk' => 'Kain Batik Tulis Pekalongan',
                'jenis_produk' => 'Batik',
                'harga' => 375000,
                'stock' => 10,
                'deskripsi' => 'Kain batik tulis asli dengan motif klasik megamendung.',
                'gambar' => 'batik_tulis.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 3,
                'nama_produk' => 'Baju Batik Wanita',
                'jenis_produk' => 'Batik',
                'harga' => 285000,
                'stock' => 18,
                'deskripsi' => 'Baju batik wanita elegan untuk acara formal maupun santai.',
                'gambar' => 'baju_batik.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 3,
                'nama_produk' => 'Kemeja Batik Pria Modern',
                'jenis_produk' => 'Batik',
                'harga' => 295000,
                'stock' => 15,
                'deskripsi' => 'Kemeja batik pria dengan potongan modern dan nyaman.',
                'gambar' => 'batik_pria.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 3,
                'nama_produk' => 'Tas Batik Kombinasi Kulit',
                'jenis_produk' => 'Batik',
                'harga' => 320000,
                'stock' => 12,
                'deskripsi' => 'Tas batik kombinasi kulit sintetis handmade.',
                'gambar' => 'tas_batik.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 3,
                'nama_produk' => 'Dompet Batik Unik',
                'jenis_produk' => 'Batik',
                'harga' => 125000,
                'stock' => 25,
                'deskripsi' => 'Dompet batik handmade motif parang.',
                'gambar' => 'dompet_batik.jpg',
                'rating' => 4,
            ],

            // Rajutan (Seller 4)
            [
                'id_seller' => 4,
                'nama_produk' => 'Taplak Meja Rajut',
                'jenis_produk' => 'Rajutan',
                'harga' => 125000,
                'stock' => 20,
                'deskripsi' => 'Taplak meja rajutan tangan dengan pola bunga klasik.',
                'gambar' => 'taplak_rajut.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 4,
                'nama_produk' => 'Boneka Rajut Amigurumi',
                'jenis_produk' => 'Rajutan',
                'harga' => 160000,
                'stock' => 10,
                'deskripsi' => 'Boneka rajut lucu dibuat dengan benang katun premium.',
                'gambar' => 'boneka_rajut.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 4,
                'nama_produk' => 'Tas Rajut Slingbag',
                'jenis_produk' => 'Rajutan',
                'harga' => 210000,
                'stock' => 14,
                'deskripsi' => 'Tas rajut slingbag dengan warna pastel lembut.',
                'gambar' => 'tas_rajut.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 4,
                'nama_produk' => 'Sarung Bantal Rajut',
                'jenis_produk' => 'Rajutan',
                'harga' => 95000,
                'stock' => 30,
                'deskripsi' => 'Sarung bantal dekorasi dari benang rajut lembut.',
                'gambar' => 'sarung_bantal.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 4,
                'nama_produk' => 'Topi Rajut Musim Dingin',
                'jenis_produk' => 'Rajutan',
                'harga' => 135000,
                'stock' => 16,
                'deskripsi' => 'Topi rajut hangat dan stylish untuk musim dingin.',
                'gambar' => 'topi_rajut.jpg',
                'rating' => 5,
            ],
        ]);
    }
}

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
                'nama_produk' => 'Tas Anyaman Rotan',
                'jenis_produk' => 'Anyaman',
                'harga' => 180000,
                'stock' => 15,
                'deskripsi' => 'Tas tangan elegan yang terbuat dari serat rotan pilihan, dianyam dengan teknik tradisional oleh pengrajin lokal. Dilengkapi tali kulit sintetis yang kokoh, tas ini adalah aksesori sempurna untuk gaya kasual, liburan, atau acara outdoor.
Spesifikasi:

Bahan Utama: Rotan Alam (Utuh)

Tali: Kulit Sintetis Premium

Dimensi: P 30 cm x L 10 cm x T 25 cm

Penutup: Kait Rotan atau Magnet

Keunggulan: Desain bohemian, ringan, kokoh, dan tahan lama.',
                'gambar' => 'tas rotan.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 1,
                'nama_produk' => 'Keranjang Rotan Mini',
                'jenis_produk' => 'Anyaman',
                'harga' => 95000,
                'stock' => 25,
                'deskripsi' => 'Keranjang serbaguna berukuran mini, ditenun dari rotan alami yang melalui proses pengeringan optimal. Ideal sebagai tempat penyimpanan perhiasan, kunci, atau dekorasi meja tamu. Desain minimalis memberikan sentuhan hangat pada ruangan.
Spesifikasi:

Bahan Utama: Rotan Alami Utuh

Ukuran: Diameter 15 cm, Tinggi 10 cm

Finishing: Clear Coat Doff (Mattes)

Keunggulan: Rotan berkualitas tinggi, multifungsi (penyimpanan atau dekorasi), dan mudah dibersihkan.',
                'gambar' => 'basket.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 1,
                'nama_produk' => 'Topi Anyaman',
                'jenis_produk' => 'Anyaman',
                'harga' => 85000,
                'stock' => 20,
                'deskripsi' => 'Topi bergaya pantai yang terbuat dari anyaman serat bambu atau pandan yang sangat ringan dan sejuk. Desainnya yang lebar memberikan perlindungan maksimal dari sinar matahari, cocok untuk gaya fashion dan perlindungan.
Spesifikasi:

Bahan Utama: Serat Bambu/Pandan Pilihan

Diameter: 40 cm (Lebar Lingkar Luar)

Fitur: Tali Dagur (Chin Strap)

Keunggulan: Sirkulasi udara baik, ringan, sejuk, dan memberikan kesan stylish yang kuat.',
                'gambar' => 'Topi anyaman.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 1,
                'nama_produk' => 'Tikar Anyaman',
                'jenis_produk' => 'Anyaman',
                'harga' => 210000,
                'stock' => 10,
                'deskripsi' => 'Tikar lantai tradisional berukuran besar, dibuat dari anyaman pandan lebar dan tebal. Sempurna sebagai alas santai keluarga di ruang tamu, teras, atau digunakan untuk acara seremonial. Memberikan nuansa alami dan autentik.
Spesifikasi:

Bahan Utama: Anyaman Pandan Lebar

Ukuran: 200 cm x 150 cm (Dapat digulung)

Tekstur: Lembut dan nyaman

Keunggulan: Mudah digulung dan disimpan, tahan lama, tekstur lembut, dan mudah dibersihkan.',
                'gambar' => 'Tikar anyaman.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 1,
                'nama_produk' => 'Kotak Perhiasan Rotan',
                'jenis_produk' => 'Anyaman',
                'harga' => 120000,
                'stock' => 18,
                'deskripsi' => 'Kotak penyimpanan perhiasan dengan desain elegan, terbuat dari anyaman rotan yang halus. Interior kotak dilapisi kain beludru (simulasi) untuk melindungi barang berharga Anda. Dilengkapi tutup yang pas dan kuat.
Spesifikasi:

Bahan Utama: Rotan dan Rangka Kayu

Interior: Lapisan Kain Beludru (Simulasi)

Ukuran: P 20 cm x L 15 cm x T 8 cm

Keunggulan: Kokoh, melindungi perhiasan dari debu, dan menjadi dekorasi meja yang menawan.',
                'gambar' => 'Kotak perhiasan.jpg',
                'rating' => 4,
            ],

            // Ukiran (Seller 2)
            [
                'id_seller' => 2,
                'nama_produk' => 'Jam dinding Ukir Kayu',
                'jenis_produk' => 'Ukiran',
                'harga' => 300000,
                'stock' => 8,
                'deskripsi' => 'Jam dinding dengan bingkai kayu ukiran tangan yang detail. Desain ukiran etnik atau floral memberikan sentuhan klasik dan mewah pada ruang tamu. Kayu solid memastikan ketahanan jangka panjang dan mesin jam yang akurat.
Spesifikasi:

Bahan Utama: Kayu Jati Solid Pilihan

Teknik: Ukiran Tangan Dalam

Diameter: 35 cm

Mesin: Quartz Akurat

Keunggulan: Kombinasi fungsionalitas dan seni, ukiran presisi, dan material kayu jati berkualitas tinggi.',
                'gambar' => 'Wall Clock Carved From Ash Wood.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 2,
                'nama_produk' => 'Alat makan Ukir Kayu',
                'jenis_produk' => 'Ukiran',
                'harga' => 50000,
                'stock' => 12,
                'deskripsi' => 'Set alat makan (sendok dan garpu) yang terbuat dari kayu food-grade, diukir minimalis pada bagian gagangnya. Produk ini memberikan pengalaman makan yang unik dan ramah lingkungan. Ideal untuk restoran, kafe, atau penggunaan sehari-hari.
Spesifikasi:

Bahan Utama: Kayu Sonokeling Food-Grade

Isi Set: 6 Sendok, 6 Garpu

Finishing: Beeswax Natural

Keunggulan: Ramah lingkungan, desain ergonomis, ukiran unik, dan aman untuk makanan',
                'gambar' => 'wooden cutlery.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 2,
                'nama_produk' => 'Ukiran cermin',
                'jenis_produk' => 'Ukiran',
                'harga' => 275000,
                'stock' => 10,
                'deskripsi' => 'Cermin dinding dengan bingkai kayu ukiran yang sangat tebal dan mewah. Ukiran menampilkan motif tradisional yang cocok untuk memperindah hallway atau kamar tidur. Bingkai kayu jati memberikan kesan elegan dan abadi.
Spesifikasi:

Bahan Utama: Kayu Jati

Ukuran Cermin: 50 cm x 70 cm

Teknik: Ukiran Timbul (Relief)

Keunggulan: Cermin berkualitas tinggi, bingkai ukiran yang kokoh, dan menambah nilai estetika ruangan.',
                'gambar' => 'ukiran cermin.jpg',
                'rating' => 5,
            ],
            [
                'id_seller' => 2,
                'nama_produk' => 'Tempat Lilin Kayu',
                'jenis_produk' => 'Ukiran',
                'harga' => 145000,
                'stock' => 20,
                'deskripsi' => 'Tempat lilin tiang/pilar dari kayu jati solid, diukir dengan motif minimalis vertikal. Selain berfungsi sebagai penopang lilin, produk ini juga menjadi dekorasi meja yang hangat dan artistik.
Spesifikasi:

Bahan Utama: Kayu Jati Solid

Desain: Ukiran Tiang/Pilar

Tinggi: 20 cm

Diameter Alas: 8 cm

Keunggulan: Desain stabil dan artistik, kayu jati asli, dan finishing halus',
                'gambar' => 'tempat lilin.jpg',
                'rating' => 4,
            ],
            [
                'id_seller' => 2,
                'nama_produk' => 'Gantungan Kunci Kayu Nama',
                'jenis_produk' => 'Ukiran',
                'harga' => 35000,
                'stock' => 50,
                'deskripsi' => 'Gantungan kunci personalisasi yang terbuat dari potongan kayu kecil, diukir laser atau pahat dengan inisial atau nama sesuai permintaan. Cocok sebagai hadiah unik, suvenir pernikahan, atau merchandise perusahaan.
Spesifikasi:

Bahan Utama: Kayu Maple/Sonokeling

Fitur: Ukiran Laser Presisi (Simulasi Kustomisasi)

Ukuran: 6 cm x 3 cm

Keunggulan: Ringan, personalisasi unik, dan hasil ukiran yang presisi',
                'gambar' => 'gantungan kunci nama.jpg',
                'rating' => 5,
            ],
        ]);
    }
}

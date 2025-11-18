<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SellersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sellers')->insert([
            [
                'nama' => 'Galeri Anyaman Nusantara',
                'no_telepon' => '081234567890',
                'email' => 'anyaman@nusantara.com',
            ],
            [
                'nama' => 'Ukir Kayu Bali',
                'no_telepon' => '081345678901',
                'email' => 'ukirbali@art.com',
            ],
            [
                'nama' => 'Batik Canting Ratu',
                'no_telepon' => '081456789012',
                'email' => 'batik@cantingratu.com',
            ],
            [
                'nama' => 'Rajut Cipta Karya',
                'no_telepon' => '081567890123',
                'email' => 'rajut@ciptakarya.com',
            ],
        ]);
    }
}

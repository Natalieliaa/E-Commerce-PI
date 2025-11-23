<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SellersSeeder extends Seeder
{
    public function run()
    {
        DB::table('sellers')->insert([
            [
                'nama' => 'Toko Andi',
                'no_telepon' => '081234567890',
                'alamat' => 'Jl. Malioboro No. 10, Yogyakarta',
                'email' => 'andi@seller.com',
                'password' => Hash::make('password123'),
            ],
            [
                'nama' => 'Toko Budi',
                'no_telepon' => '089876543210',
                'alamat' => 'Jl. Kaliurang KM 7, Sleman',
                'email' => 'budi@seller.com',
                'password' => Hash::make('budi12345'),
            ],
        ]);
    }
}

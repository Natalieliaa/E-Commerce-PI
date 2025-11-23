<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CustomersSeeder extends Seeder
{
    public function run()
    {
        DB::table('customers')->insert([
            [
                'nama' => 'Reva',
                'no_telepon' => '081200112233',
                'alamat' => 'Gunungkidul, DIY',
                'email' => 'reva@gmail.com',
                'password' => Hash::make('revapass123'),
            ],
            [
                'nama' => 'Lia',
                'no_telepon' => '085600998877',
                'alamat' => 'Bantul, DIY',
                'email' => 'lia@gmail.com',
                'password' => Hash::make('liapassword'),
            ],
        ]);
    }
}

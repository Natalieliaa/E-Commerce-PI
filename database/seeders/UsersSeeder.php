<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Jalankan database seeder.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // SELLER
            [
                'name' => 'Galeri Anyaman Nusantara',
                'email' => 'anyaman@nusantara.com',
                'password' => Hash::make('password'), // default
                'no_telepon' => '081234567890',
                'alamat' => 'Yogyakarta',
                'role' => 'seller',
            ],
            [
                'name' => 'Ukir Kayu Bali',
                'email' => 'ukirbali@art.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081345678901',
                'alamat' => 'Bali',
                'role' => 'seller',
            ],
            [
                'name' => 'Batik Canting Ratu',
                'email' => 'batik@cantingratu.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081456789012',
                'alamat' => 'Pekalongan',
                'role' => 'seller',
            ],
            [
                'name' => 'Rajut Cipta Karya',
                'email' => 'rajut@ciptakarya.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081567890123',
                'alamat' => 'Bandung',
                'role' => 'seller',
            ],

            // CUSTOMER
            [
                'name' => 'Rina Maharani',
                'email' => 'rina@example.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081222333444',
                'alamat' => 'Jl. Kaliurang Km 7, Sleman, Yogyakarta',
                'role' => 'customer',
            ],
            [
                'name' => 'Yoga Prasetyo',
                'email' => 'yoga@example.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081333444555',
                'alamat' => 'Jl. Parangtritis No.18, Bantul, Yogyakarta',
                'role' => 'customer',
            ],
            [
                'name' => 'Sari Puspita',
                'email' => 'sari@example.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081444555666',
                'alamat' => 'Jl. Malioboro No.22, Kota Yogyakarta',
                'role' => 'customer',
            ],
            [
                'name' => 'Dewi Lestari',
                'email' => 'dewi@example.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081555666777',
                'alamat' => 'Jl. Wates Km 10, Kulon Progo, Yogyakarta',
                'role' => 'customer',
            ],
            [
                'name' => 'Agus Saputra',
                'email' => 'agus@example.com',
                'password' => Hash::make('password'),
                'no_telepon' => '081666777888',
                'alamat' => 'Jl. Imogiri Timur No.15, Bantul, Yogyakarta',
                'role' => 'customer',
            ],
            [
                'name' => 'Ratna Kartika',
                'email' => 'ratna@example.com',
                'password' => Hash::make('password'),
                'no_telepon' => '082222333444',
                'alamat' => 'Jl. Prawirotaman No.12, Kota Yogyakarta',
                'role' => 'customer',
            ],
        ]);
    }
}

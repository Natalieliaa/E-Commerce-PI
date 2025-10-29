<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id(); // ID_Customer (PK)

            // Foreign Key: Menghubungkan ke tabel 'users' untuk otentikasi
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Data Pribadi Customer (sesuai skema dan formulir pendaftaran)
            $table->string('full_name'); // Nama_Customer
            $table->string('email')->unique(); // Untuk sinkronisasi dengan tabel users
            $table->string('phone_number')->nullable(); // No_Telepon
            $table->text('shipping_address')->nullable(); // Alamat Pengiriman

            // Kolom Tambahan (sesuai formulir pendaftaran)
            $table->string('profile_photo_path')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};

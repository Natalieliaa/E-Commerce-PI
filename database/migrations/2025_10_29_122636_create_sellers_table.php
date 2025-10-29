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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();

            // Foreign Key: Menghubungkan ke tabel 'users' untuk otentikasi
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            // Data Pribadi Seller (sesuai formulir pendaftaran)
            $table->string('full_name');
            $table->string('email')->unique(); // Email di sini disinkronkan dengan tabel users
            $table->string('phone_number')->nullable();

            // Data Toko (sesuai formulir pendaftaran)
            $table->string('store_name')->unique();
            $table->text('store_description')->nullable();
            $table->string('store_logo_path')->nullable();
            $table->string('shipping_address');

            // Status Konfirmasi (sesuai tampilan Admin)
            $table->enum('status', ['Pending', 'Approved', 'Rejected'])->default('Pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};

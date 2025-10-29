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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // ID_Produk (PK)

            // Foreign Key: ID_Seller (FK)
            // Menghubungkan produk ke seller yang membuatnya
            $table->foreignId('seller_id')->constrained('sellers')->onDelete('cascade');

            // Data Produk
            $table->string('product_name'); // Nama_Produk
            $table->string('product_type'); // Jenis_Produk (misal: Dekorasi, Furniture, dll.)
            $table->unsignedInteger('price'); // Harga (Menggunakan unsignedInteger untuk harga)
            $table->unsignedInteger('stock'); // Stok
            $table->text('description')->nullable(); // Deskripsi
            $table->json('images_paths')->nullable(); // Gambar (Menyimpan path gambar sebagai JSON array)
            $table->decimal('rating', 2, 1)->nullable(); // Rating (misal: 4.5)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

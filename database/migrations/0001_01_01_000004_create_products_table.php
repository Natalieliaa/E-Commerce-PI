<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
    $table->id('id_produk');
    $table->foreignId('id_seller')
          ->constrained('sellers')
          ->onDelete('cascade');
    $table->string('nama_produk');
    $table->string('jenis_produk');
    $table->integer('harga');
    $table->integer('stock');
    $table->text('deskripsi')->nullable();
    $table->string('gambar')->nullable();
    $table->integer('rating')->default(0);
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

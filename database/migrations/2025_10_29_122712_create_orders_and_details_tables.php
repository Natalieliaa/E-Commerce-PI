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
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // ID_Pesan (PK)

            // Foreign Key: ID_Customer (FK)
            // Menghubungkan pemesanan ke customer
            $table->foreignId('customer_id')->constrained('customers')->onDelete('cascade');

            // Data Pemesanan (Header)
            $table->timestamp('order_date'); // Tanggal_Pesan
            $table->decimal('total_amount', 10, 2); // Total nota
            $table->enum('status', ['pending', 'processing', 'shipped', 'completed', 'cancelled'])->default('pending'); // Status Pemesanan

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};

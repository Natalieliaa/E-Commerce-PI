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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // ID_Pembayaran (PK)

            // Foreign Key: ID_Pesan (FK)
            // Menghubungkan pembayaran ke pemesanan
            $table->foreignId('order_id')->constrained('orders')->onDelete('cascade');

            // Data Pembayaran
            $table->enum('payment_method', ['transfer', 'e-wallet', 'credit_card', 'cod']); // Metode_Pembayaran
            $table->timestamp('payment_date'); // Tanggal_Pembayaran
            $table->decimal('amount_paid', 10, 2); // Total bayar
            $table->enum('status', ['pending', 'paid', 'failed', 'refunded'])->default('pending'); // Status_Pembayaran

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};

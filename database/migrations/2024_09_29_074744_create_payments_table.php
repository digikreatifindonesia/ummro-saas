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
            $table->id(); // Primary key
            $table->foreignId('invoice_id')->constrained()->onDelete('cascade'); // Relasi ke tabel invoices
            $table->enum('method', ['credit_card', 'bank_transfer', 'ewallet']); // Metode pembayaran
            $table->decimal('amount', 8, 2); // Jumlah yang dibayarkan (setelah diskon)
            $table->enum('status', ['success', 'failed', 'pending'])->default('pending'); // Status pembayaran
            $table->string('transaction_reference')->nullable(); // Referensi transaksi pembayaran (opsional)
            $table->timestamp('paid_at')->nullable(); // Tanggal pembayaran sukses
            $table->timestamps(); // Timestamps untuk created_at dan updated_at
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

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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('subscription_id')->constrained()->onDelete('cascade');
            $table->string('invoice_number')->unique(); // Nomor invoice yang unik
            $table->decimal('amount', 8, 2); // Jumlah tagihan
            $table->decimal('discount', 8, 2)->default(0); // Diskon yang diterapkan (jika ada)
            $table->enum('status', ['paid', 'pending', 'failed'])->default('pending'); // Status pembayaran
            $table->timestamp('paid_at')->nullable(); // Tanggal pembayaran dilakukan
            $table->enum('payment_method', ['credit_card', 'bank_transfer', 'ewallet'])->nullable(); // Metode pembayaran
            $table->string('transaction_reference')->nullable(); // Referensi pembayaran eksternal (jika ada)
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};

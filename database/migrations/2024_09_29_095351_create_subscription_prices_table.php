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
        Schema::create('subscription_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('subscription_package_id')->constrained()->onDelete('cascade'); // Menghubungkan ke paket subscription
            $table->foreignId('country_id')->constrained()->onDelete('cascade'); // Menghubungkan ke negara
            $table->decimal('price', 8, 2); // Harga untuk negara tertentu
            $table->decimal('discount', 5, 2)->nullable(); // Diskon untuk harga tertentu (jika ada)
            $table->enum('discount_type', ['percentage', 'fixed'])->nullable(); // Tipe diskon (persentase atau tetap)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_prices');
    }
};

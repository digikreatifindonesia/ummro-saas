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
        Schema::create('subscription_packages', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama paket
            $table->decimal('price', 8, 2); // Harga paket
            $table->integer('duration'); // Durasi dalam hari
            $table->text('description')->nullable(); // Deskripsi paket
            $table->decimal('discount', 5, 2)->default(0); // Persentase diskon
            $table->enum('discount_type', ['percentage', 'fixed'])->nullable(); // Tipe diskon
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_packages');
    }
};

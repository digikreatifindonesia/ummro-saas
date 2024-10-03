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
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // Kode voucher
            $table->decimal('discount', 8, 2); // Diskon yang diberikan oleh voucher
            $table->integer('usage_limit')->nullable(); // Batas penggunaan (null untuk tidak terbatas)
            $table->integer('used')->default(0); // Jumlah yang sudah digunakan
            $table->timestamp('valid_until')->nullable(); // Tanggal kadaluwarsa voucher (optional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};

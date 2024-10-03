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
        Schema::table('countries', function (Blueprint $table) {
            //
            $table->string('capital')->nullable(); // Kolom untuk ibu kota
            $table->string('region')->nullable(); // Kolom untuk wilayah
            $table->string('phone_code')->nullable(); // Kolom untuk jumlah penduduk
            $table->string('currency_code')->nullable(); // Kolom untuk jumlah penduduk
            $table->string('thumbnail_flag')->nullable(); // Kolom untuk jumlah penduduk
            $table->boolean('status')->default(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('countries', function (Blueprint $table) {
            //
        });
    }
};

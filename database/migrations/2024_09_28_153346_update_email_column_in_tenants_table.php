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
        Schema::table('tenants', function (Blueprint $table) {
            //
            Schema::table('tenants', function (Blueprint $table) {
                // Ubah kolom email untuk menambahkan nilai default tanpa mendeklarasikan ulang unik
                $table->string('email')->default('default@example.com')->change();

                // Ubah kolom domain untuk menambahkan nilai default tanpa mendeklarasikan ulang unik
                $table->string('domain')->default('default-domain')->change();

                // Ubah kolom database untuk menambahkan nilai default tanpa mendeklarasikan ulang unik
                $table->string('database')->default('tenant_default')->change();
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            //
            $table->string('email')->unique()->nullable()->default(null)->change();

            // Kembalikan kolom domain ke nullable tanpa default
            $table->string('domain')->unique()->nullable()->default(null)->change();

            // Kembalikan kolom database ke nullable tanpa default
            $table->string('database')->unique()->nullable()->default(null)->change();
        });
    }
};

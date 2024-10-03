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
        Schema::table('subscription_packages', function (Blueprint $table) {
            //
            $table->dropColumn('price'); // Menghapus kolom price
            $table->dropColumn('discount'); // Menghapus kolom price
            $table->dropColumn('discount_type'); // Menghapus kolom price
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('subscription_packages', function (Blueprint $table) {
            //
        });
    }
};

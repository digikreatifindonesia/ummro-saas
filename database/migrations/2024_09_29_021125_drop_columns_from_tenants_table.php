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
            // Drop kolom yang ingin dihapus
            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('domain');
            $table->dropColumn('database');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenants', function (Blueprint $table) {
            //
            $table->string('name');
            $table->string('email')->unique();
            $table->string('domain')->unique();
            $table->string('database')->unique();
        });
    }
};

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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('voucher_id')->nullable()->constrained('vouchers')->onDelete('set null'); // Relasi dengan tabel vouchers
            $table->string('plan');
            $table->decimal('price', 8, 2);
            $table->decimal('discount', 8, 2)->default(0); // Diskon yang diterapkan
            $table->timestamp('started_at');
            $table->timestamp('expires_at')->nullable();
            $table->enum('status', ['active', 'inactive', 'cancelled'])->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};

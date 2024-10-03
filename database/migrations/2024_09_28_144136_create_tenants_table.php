<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTenantsTable extends Migration
{
    public function up()
    {
        Schema::create('tenants', function (Blueprint $table) {
            $table->string('id')->primary();  // ID tenant
            $table->string('name');           // Nama agen travel
            $table->string('email')->unique(); // Email kontak dari agen travel
            $table->string('domain')->unique(); // Subdomain atau domain tenant
            $table->string('database')->unique(); // Nama database yang akan digunakan oleh tenant
            $table->timestamps();              // Kolom timestamp
            $table->json('data')->nullable();  // Data tambahan dalam format JSON
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}

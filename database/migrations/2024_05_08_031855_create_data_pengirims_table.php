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
        Schema::create('data_pengirims', function (Blueprint $table) {
            $table->id();
            $table->string('NoPesanan')->required();
            $table->string('Nama')->required();
            $table->string('Alamat');
            $table->string('NoTelepon');    
            $table->string('Email');              
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengirims');
    }
};

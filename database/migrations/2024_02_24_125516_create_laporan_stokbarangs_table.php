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
        Schema::create('laporan_stokbarangs', function (Blueprint $table) {
            $table->id();
            $table->string('barang')->nullable();
            $table->date('tanggal')->nullable();
            $table->integer('stok_awal')->nullable();
            $table->integer('stok_akhir')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_stokbarangs');
    }
};

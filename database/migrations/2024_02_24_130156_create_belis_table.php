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
        Schema::create('belis', function (Blueprint $table) {
            $table->id();
            $table->string('keranjang', 128)->nullable();
            $table->string('pengguna', 128)->nullable();
            $table->string('alamat_pengiriman', 128)->nullable();
            $table->string('metode_pembayaran', 128)->nullable();
            $table->double('bayar')->nullable();
            $table->enum('proses_pesanan', ['proses', 'selesai', 'batal'])->default('proses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('belis');
    }
};

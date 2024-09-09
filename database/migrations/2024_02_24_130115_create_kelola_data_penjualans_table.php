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
        Schema::create('kelola_data_penjualans', function (Blueprint $table) {
            $table->id();
            // $table->decimal('penjualan', 15, 2);
            // $table->decimal('diskon', 15, 2)->nullable();
            // $table->decimal('pendapatan_komisi', 15, 2)->nullable();
            // $table->decimal('jasa_bank', 15, 2)->nullable();
            // $table->decimal('pendapatan_lainnya', 15, 2)->nullable();
            // $table->decimal('persediaan_barang_awal', 15, 2)->nullable();
            // $table->decimal('pembelian_barang', 15, 2)->nullable();
            // $table->decimal('biaya_pengiriman', 15, 2)->nullable();
            // $table->decimal('biaya_lain', 15, 2)->nullable();
            // $table->decimal('persediaan_barang_akhir', 15, 2)->nullable();
            $table->string('kode', 128)->nullable();
            $table->date('dated', 128)->nullable();
            $table->string('description', 128)->nullable();
            $table->integer('debit')->nullable();
            $table->integer('kredit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_data_penjualans');
    }
};

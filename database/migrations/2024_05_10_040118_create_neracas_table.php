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
        Schema::create('neracas', function (Blueprint $table) {
            $table->id();
            // $table->double('kas')->nullable();
            // $table->double('bank_bjb')->nullable();
            // $table->double('bank_bandung')->nullable();
            // $table->double('sewa_bayar_dimuka')->nullable();
            // $table->double('piutang')->nullable();
            // $table->double('persediaan')->nullable();
            // $table->double('inventaris')->nullable();
            // $table->double('investasi')->nullable();
            // $table->double('penyusutan_harta_tetap')->nullable();
            // $table->double('harta_tetap')->nullable();
            // $table->double('hutang')->nullable();
            // $table->double('alokasi_bop_komite')->nullable();
            // $table->double('alokasi_bop_pengelola')->nullable();
            // $table->double('alokasi_gaji_pengelola')->nullable();
            // $table->double('alokasi_gaji_tenaga_ahli')->nullable();
            // $table->double('alokasi_pengembangan_kapasitas')->nullable();
            // $table->double('alokasi_sewa_kantor_dan_peralatan')->nullable();
            // $table->double('modal_bdc')->nullable();
            // $table->double('modal_awal')->nullable();
            // $table->double('pemupukan_modal_dari_laba')->nullable();
            // $table->double('lr_tahun_lalu')->nullable();
            // $table->double('lr_tahun_berjalan')->nullable();
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
        Schema::dropIfExists('neracas');
    }
};

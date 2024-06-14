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
        Schema::create('laporan_kegiatan_events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('regist_id')->constrained('register_events')->onDelete('cascade');
            $table->double('sales_result')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporan_kegiatan_events');
    }
};

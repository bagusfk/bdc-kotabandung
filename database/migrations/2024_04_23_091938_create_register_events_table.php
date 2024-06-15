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
        Schema::create('register_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ksm_id')->nullable();
            $table->unsignedBigInteger('event_id')->nullable();
            $table->enum('status_validation', ['prosess','agree','disagree'])->default('prosess');
            $table->timestamps();
            $table->foreign('ksm_id')->references('id')->on('kelola_data_ksms')->onDelete('cascade');
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};

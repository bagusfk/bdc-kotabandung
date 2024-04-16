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
        Schema::create('kelola_data_events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name')->nullable();
            $table->string('event_organizer')->nullable();
            $table->date('event_date')->nullable();
            $table->string('event_poster')->nullable();
            $table->string('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kelola_data_events');
    }
};

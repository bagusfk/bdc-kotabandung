<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Enum;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('role')->enum('admin', 'kepalabagian', 'ksm', 'pembeli')->default('pembeli');
            $table->string('name');
            $table->string('password');
            $table->string('no_wa');
            $table->string('address')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('ksm_id')->nullable();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
            // $table->foreignId('city_id')->constrained('cities')->onDelete('cascade')->default(null);
            $table->foreign('ksm_id')->references('id')->on('kelola_data_ksms')->onDelete('cascade');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};

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
        Schema::create('log_books', function (Blueprint $table) {
            $table->id('log_id'); // Primary Key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK ke users
            $table->foreignId('lokasi_id')->constrained('lokasis')->onDelete('cascade'); // FK ke lokasi
            $table->date('tanggal_kunjungan'); // Tanggal kunjungan
            $table->string('keperluan'); // Keperluan mengakses
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_books');
    }
};

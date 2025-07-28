<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('device_accesses', function (Blueprint $table) {
            $table->id('access_id'); // Primary Key

            // Relasi ke log_books
            $table->unsignedBigInteger('log_id');
            $table->foreign('log_id')
                ->references('log_id')
                ->on('log_books')
                ->onDelete('cascade');

            // Relasi ke devices
            $table->unsignedBigInteger('device_id');
            $table->foreign('device_id')
                ->references('id')
                ->on('devices')
                ->onDelete('cascade');

            $table->dateTime('waktu_akses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('device_accesses');
    }
};

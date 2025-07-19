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
        Schema::create('device_accesses', function (Blueprint $table) {
            $table->id('access_id'); // Primary Key
            $table->unsignedBigInteger('log_id');
            $table->foreign('log_id')
                ->references('log_id')
                ->on('log_books')
                ->onDelete('cascade');
            $table->string('nama_perangkat');
            $table->string('jenis_perangkat');
            $table->dateTime('waktu_akses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('device_accesses');
    }
};

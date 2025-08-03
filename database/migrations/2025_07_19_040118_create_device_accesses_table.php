<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('device_accesses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('log_id')->constrained('log_books', 'log_id')->onDelete('cascade');
            $table->foreignId('device_id')->constrained('devices', 'device_id')->onDelete('cascade');
            $table->timestamp('waktu_akses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('device_accesses');
    }
};

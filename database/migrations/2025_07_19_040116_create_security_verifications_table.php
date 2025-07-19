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
        Schema::create('security_verifications', function (Blueprint $table) {
            $table->id('verification_id'); // Primary Key
            $table->foreignId('log_id')->constrained('log_books')->onDelete('cascade'); // FK ke log_books
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // FK ke verifikator
            $table->enum('status_verification', ['disetujui', 'ditolak', 'pending'])->default('pending');
            $table->text('catatan')->nullable();
            $table->dateTime('tgl_verification')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('security_verifications');
    }
};

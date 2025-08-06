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

            // Input manual oleh admin/petugas
            $table->string('nama_pengunjung');
            $table->string('asal_pengunjung'); // ✅ Instansi/perusahaan/lembaga

            // Petugas/admin yang input
            $table->foreignId('input_by')->constrained('users')->onDelete('cascade');

            // Lokasi kunjungan
            $table->unsignedBigInteger('lokasi_id');
            $table->foreign('lokasi_id')
                ->references('lokasi_id')
                ->on('locations')
                ->onDelete('cascade');

            $table->date('tanggal_kunjungan');
            $table->string('keperluan');

            $table->datetime('waktu_masuk')->nullable();
            $table->datetime('waktu_keluar')->nullable();


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

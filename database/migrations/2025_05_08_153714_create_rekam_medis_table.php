<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi: membuat tabel rekam_medis
     */
    public function up(): void
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->id(); // Primary key

            // Foreign key ke tabel pasien (pastikan tabel 'pasiens' ada)
            $table->unsignedBigInteger('pasien_id');
            $table->foreign('pasien_id')->references('id')->on('pasiens')->onDelete('cascade');

            // Informasi medis
            $table->date('tanggal_periksa');      // Tanggal pemeriksaan
            $table->text('keluhan');              // Keluhan pasien
            $table->text('diagnosa');             // Diagnosa dokter
            $table->text('tindakan')->nullable(); // Tindakan medis (opsional)
            $table->text('resep_obat')->nullable(); // Resep obat (opsional)

            // Info tambahan (opsional)
            $table->string('dokter')->nullable(); // Nama dokter, jika tidak menggunakan tabel dokter

            // Waktu dibuat dan diubah
            $table->timestamps();
        });
    }

    /**
     * Rollback migrasi: hapus tabel rekam_medis
     */
    public function down(): void
    {
        Schema::dropIfExists('rekam_medis');
    }
};
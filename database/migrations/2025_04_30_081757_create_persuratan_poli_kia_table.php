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
        Schema::create('surat_kontrol', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftaran');
            $table->string('nomor');
            $table->date('tanggal');
            $table->string('kepada');
            $table->text('diagnosa')->nullable();
            $table->date('rencana_kontrol')->nullable();
            $table->date('tanggal_tanda_tangan')->nullable();
            $table->string('penandatangan')->nullable();
            $table->timestamps();
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran');
        });

        Schema::create('surat_kematian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftaran');
            $table->string('nomor');
            $table->date('tanggal_masuk_rs')->nullable();
            $table->time('waktu_masuk_rs')->nullable();
            $table->date('tanggal_kematian')->nullable();
            $table->time('waktu_kematian')->nullable();
            $table->string('tempat_kematian')->nullable();
            $table->text('diagnosa')->nullable();
            $table->date('tanggal_tanda_tangan')->nullable();
            $table->string('penandatangan')->nullable();
            $table->timestamps();
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surat_kontrol');
        Schema::dropIfExists('surat_kematian');
    }
};

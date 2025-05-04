<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('transaksi_p_anak');

        Schema::create('transaksi_p_anak', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftaran');

            $table->string('nama')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->integer('umur')->nullable();
            $table->string('nama_ibu')->nullable();

            $table->integer('umur_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('agama_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->text('alamat_ibu')->nullable();

            $table->string('notelp_ibu')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->integer('umur_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('agama_ayah')->nullable();

            $table->string('pendidikan_ayah')->nullable();
            $table->text('alamat_ayah')->nullable();
            $table->string('notelp_ayah')->nullable();
            $table->string('keadaan_umum')->nullable();
            $table->string('kesadaran')->nullable();

            $table->text('keluhan')->nullable();
            $table->integer('tensi')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('lingkar_dada')->nullable();
            $table->integer('respirasi')->nullable();

            $table->integer('nadi')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->integer('lingkar_kepala')->nullable();
            $table->string('goldarah')->nullable();
            $table->integer('suhu')->nullable();

            $table->integer('lingkar_perut')->nullable();
            $table->integer('lila')->nullable();
            $table->string('tipe_pasien')->nullable();
            $table->string('unit_layanan')->nullable();
            $table->string('kunjungan')->nullable();

            $table->text('obat')->nullable();
            $table->string('bidan')->nullable();
            $table->text('diagnosa')->nullable();
            $table->string('kode_tindakan')->nullable();

            $table->timestamps();
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi_p_anak');
    }
};

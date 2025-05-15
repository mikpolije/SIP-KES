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
        Schema::create('detail_kondisis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->string('keluhan')->nullable();

            // Objective
            $table->double('sistole')->nullable();
            $table->double('diastole')->nullable();
            $table->double('berat_badan')->nullable();
            $table->double('tinggi_badan')->nullable();
            $table->double('suhu')->nullable();
            $table->double('spo02')->nullable();
            $table->double('respiration_rate')->nullable();
            $table->double('nadi')->nullable();

            $table->string('plan')->nullable();
            $table->string('assesment')->nullable();

            // Pengkajian Fungsional
            $table->boolean('alat_bantu')->nullable();
            $table->boolean('protesa')->nullable();
            $table->boolean('cacat_tubuh')->nullable();
            $table->boolean('mandiri')->nullable();
            $table->boolean('dibantu')->nullable();
            $table->boolean('adl')->nullable();

            // Pemeriksaan Fisik
            $table->string('ku_dan_kesadaran')->nullable();
            $table->string('kepala_dan_leher')->nullable();
            $table->string('dada')->nullable();
            $table->string('perut')->nullable();
            $table->string('ekstrimitas')->nullable();
            $table->string('status_lokalis')->nullable();
            $table->string('penatalaksanaan')->nullable();

            // Discharge Planning
            $table->boolean('umur_65')->nullable();
            $table->boolean('keterbatasan_mobilitas')->nullable();
            $table->boolean('perawatan_lanjutan')->nullable();
            $table->boolean('bantuan')->nullable();
            $table->boolean('masuk_kriteria')->nullable();

            // Edukasi
            $table->string('hasil_pemeriksaan_fisik')->nullable();
            $table->string('hasil_pemeriksaan')->nullable();
            $table->string('penunjang')->nullable();
            $table->string('hasil_asuhan')->nullable();
            $table->string('lain_lain')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('rencana_asuhan')->nullable();
            $table->string('hasil_pengobatan')->nullable();
            $table->string('keterangan_edukasi')->nullable();

            // Rencana tindak lanjut
            $table->string('rawat_jalan')->nullable();
            $table->string('rawat_inap')->nullable();
            $table->string('rujuk')->nullable();
            $table->date('tanggal_pulang_paksa')->nullable();
            $table->date('meninggal')->nullable();

            $table->string('kondisi_saat_keluar')->nullable();
            $table->timestamps();

            $table->foreign('pasien_id')
                ->references('id')
                ->on('pasiens')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_kondisis');
    }
};

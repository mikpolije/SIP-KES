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
        Schema::create('kondisi_pasiens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->date('tanggal_masuk');
            $table->string('sarana_transportasi_kedatangan');
            $table->time('jam_masuk');
            $table->string('kondisi_pasien_tiba');
            $table->string('triase');
            $table->string('riwayat_alergi');
            $table->string('keluhan')->nullable();
            $table->integer('berat_badan');
            $table->integer('tinggi_badan');
            $table->integer('lingkar_perut');
            $table->string('imt');
            $table->string('nafas');
            $table->string('sistol');
            $table->string('diastol');
            $table->float('suhu');
            $table->string('nadi');

            $table->enum('kepala', ['normal', 'tidak normal'])->nullable();
            $table->enum('mata', ['normal', 'tidak normal'])->nullable();
            $table->enum('tht', ['normal', 'tidak normal'])->nullable();
            $table->enum('leher', ['normal', 'tidak normal'])->nullable();
            $table->enum('thorax', ['normal', 'tidak normal'])->nullable();
            $table->enum('abdomen', ['normal', 'tidak normal'])->nullable();
            $table->enum('extemitas', ['normal', 'tidak normal'])->nullable();
            $table->enum('genetalia', ['normal', 'tidak normal'])->nullable();
            $table->enum('ecg', ['normal', 'tidak normal'])->nullable();
            $table->enum('ronsen', ['normal', 'tidak normal'])->nullable();
            $table->enum('terapi', ['normal', 'tidak normal'])->nullable();
            $table->enum('kie', ['normal', 'tidak normal'])->nullable();
            $table->enum('pemeriksaan_penunjang', ['normal', 'tidak normal'])->nullable();

            $table->string('jalur_nafas')->nullable();
            $table->string('pola_nafas')->nullable();
            $table->string('gerakan_dada')->nullable();
            $table->string('kulit')->nullable();
            $table->string('turgor')->nullable();
            $table->string('akral')->nullable();
            $table->string('spo')->nullable();

            $table->string('kesadaran')->nullable();
            $table->string('mata_neurologi')->nullable();
            $table->string('motorik')->nullable();
            $table->string('verbal')->nullable();
            $table->string('kondisi_umum')->nullable();
            $table->string('laborat')->nullable();
            $table->string('laboratorium_farmasi')->nullable();

            $table->boolean('aktivitas_fisik')->nullable();
            $table->boolean('konsumsi_alkohol')->nullable();
            $table->boolean('makan_buah_sayur')->nullable();
            $table->boolean('merokok')->nullable();
            $table->boolean('riwayat_keluarga')->nullable();
            $table->boolean('riwayat_penyakit_terdahulu')->nullable();

            $table->foreign('pasien_id')
                ->references('id')
                ->on('pasiens')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kondisi_pasiens');
    }
};

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
        // Hapus tabel jika sudah ada
        Schema::dropIfExists('transaksi_p_kehamilan');

        // Buat ulang tabel
        Schema::create('transaksi_p_kehamilan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftaran');

            $table->string('pendampingan')->nullable();
            $table->text('keluhan_utama')->nullable();
            $table->date('pertama_haid')->nullable();
            $table->integer('jumlah_anak')->nullable();
            $table->string('usia_kehamilan')->nullable();

            $table->string('menarche')->nullable();
            $table->string('lama_haid')->nullable();
            $table->string('banyak_haid')->nullable();
            $table->string('warna_haid')->nullable();
            $table->string('diagnosa_kebidanan')->nullable();

            $table->string('kode_tindakan_kehamilan')->nullable();
            $table->decimal('tinggi_badan', 5, 2)->nullable();
            $table->decimal('berat_badan', 5, 2)->nullable();
            $table->decimal('penambahan_bb', 5, 2)->nullable();
            $table->decimal('berat_janin', 5, 2)->nullable();

            $table->decimal('tinggi_fundus', 5, 2)->nullable();
            $table->decimal('lingkar_perut', 5, 2)->nullable();
            $table->decimal('lila', 5, 2)->nullable();
            $table->decimal('hb_level', 5, 2)->nullable();
            $table->string('siklus_haid')->nullable();

            $table->string('dismenore')->nullable();
            $table->string('flour_albus')->nullable();
            $table->string('hipertensi')->nullable();
            $table->string('hipertiroid')->nullable();
            $table->string('diabetes')->nullable();

            $table->string('penyakit_jantung')->nullable();
            $table->string('tuberculosis')->nullable();
            $table->string('asap_rokok')->nullable();
            $table->string('penyuluhan_kie')->nullable();
            $table->string('penambah_darah')->nullable();

            $table->string('suplemen_makanan')->nullable();
            $table->string('rujukan_pelayanan')->nullable();
            $table->date('hpht')->nullable();
            $table->date('hpl')->nullable();
            $table->date('his')->nullable();

            $table->string('jam')->nullable();
            $table->string('lendir')->nullable();
            $table->string('darah')->nullable();
            $table->string('ketuban')->nullable();
            $table->text('keluhan')->nullable();

            $table->text('riwayat_persalinan')->nullable();
            $table->text('riwayat_alergi')->nullable();
            $table->string('tekanan_darah')->nullable();
            $table->decimal('suhu', 4, 2)->nullable();
            $table->string('nadi')->nullable();

            $table->string('oedema')->nullable();
            $table->text('palpasi')->nullable();
            $table->text('teraba')->nullable();
            $table->string('djj')->nullable();
            $table->string('kontrakssi')->nullable();

            $table->text('pemeriksaan_dalam')->nullable();
            $table->text('hasil_vt')->nullable();
            $table->text('penilaian')->nullable();
            $table->text('observasi')->nullable();

            $table->timestamps();

            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_p_kehamilan');
    }
};

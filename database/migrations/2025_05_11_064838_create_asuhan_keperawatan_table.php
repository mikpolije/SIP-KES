<?php

use App\Models\Pendaftaran;
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
        Schema::create('asuhan_keperawatan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            // strings
            $table->string('alasan_masuk')->nullable();
            $table->string('diagnosa_medis')->nullable();
            $table->string('riwayat_penyakit')->nullable();
            $table->string('sistole')->nullable();
            $table->string('distole')->nullable();
            $table->string('suhu')->nullable();
            $table->string('nadi')->nullable();
            $table->string('pernapasan')->nullable();
            $table->string('pernapasan_lain')->nullable();
            $table->string('berat_badan')->nullable();
            $table->string('tinggi_badan')->nullable();
            $table->string('lila')->nullable();
            $table->string('bentuk_makanan')->nullable();
            $table->string('minum')->nullable();
            $table->string('kebutuhan_cairan_lain')->nullable();
            $table->string('frekuensi_bak')->nullable();
            $table->string('frekuensi_bak_jumlah')->nullable();
            $table->string('frekuensi_bak_lain')->nullable();
            $table->string('frekuensi_bab')->nullable();
            $table->string('frekuensi_bab_warna')->nullable();
            $table->string('frekuensi_bab_bau')->nullable();
            $table->string('frekuensi_bab_konsistensi')->nullable();
            $table->string('frekuensi_bab_terakhir')->nullable();
            $table->string('gaya_berjalan_lain')->nullable();
            $table->string('jumlah_tidur')->nullable();
            $table->string('is_obat_tidur_note')->nullable();
            $table->string('is_obat_tidur_dosis')->nullable();
            $table->string('kebutuhan_aktifitas_lain')->nullable();
            $table->string('kebutuhan_emosional_lain')->nullable();
            $table->string('kebutuhan_penyuluhan_lain')->nullable();
            $table->string('is_berbicara_note')->nullable();
            $table->string('is_pembicaraan')->nullable();
            $table->string('is_disorientasi_note')->nullable();
            $table->string('kebutuhan_komunikasi_lain')->nullable();
            $table->string('kegiatan_sehari_hari')->nullable();
            $table->string('kegiatan_rumah_sakit')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('resiko_jatuh_note')->nullable();
            $table->string('tingkat_ketergantungan_note')->nullable();
            $table->string('rontgen')->nullable();
            $table->string('lab')->nullable();
            $table->string('lain_lain')->nullable();
            $table->string('berat_badan_naik')->nullable();

            // booleans is_*
            $table->boolean('is_sianosis')->default(false);
            $table->boolean('is_nyeri_dada')->default(false);
            $table->boolean('is_haus')->default(false);
            $table->boolean('is_mukosa_mulut')->default(false);
            $table->boolean('is_edema')->default(false);
            $table->boolean('is_biasa_olahraga')->default(false);
            $table->boolean('is_biasa_rom')->default(false);
            $table->boolean('is_obat_tidur')->default(false);
            $table->boolean('is_nyeri')->default(false);
            $table->boolean('is_karaganda_turun')->default(false);
            $table->boolean('is_pakai_alat_bantu')->default(false);
            $table->boolean('is_wajah_tegang')->default(false);
            $table->boolean('is_kontak_mata')->default(false);
            $table->boolean('is_bingung')->default(false);
            $table->boolean('is_perasaan_tidak_mampu')->default(false);
            $table->boolean('is_perasaan_tidak_berharga')->default(false);
            $table->boolean('is_kritik_diri')->default(false);
            $table->boolean('is_pengetahuan_penyakit')->default(false);
            $table->boolean('is_pengetahuan_makanan')->default(false);
            $table->boolean('is_pengetahuan_obat')->default(false);
            $table->boolean('is_penglihatan')->default(false);
            $table->boolean('is_pendengaran')->default(false);
            $table->boolean('is_penciuman')->default(false);
            $table->boolean('is_pengecapan')->default(false);
            $table->boolean('is_perabaan')->default(false);
            $table->boolean('is_berbicara')->default(false);
            $table->boolean('is_disorientasi')->default(false);
            $table->boolean('is_menarik_diri')->default(false);
            $table->boolean('is_apatis')->default(false);
            $table->boolean('is_punya_asuransi_kesehatan')->default(false);

            // booleans can_*
            $table->boolean('can_mandi')->default(false);
            $table->string('can_mandi_dibantu')->nullable();
            $table->boolean('can_berpakaian')->default(false);
            $table->string('can_berpakaian_dibantu')->nullable();
            $table->boolean('can_makan')->default(false);
            $table->string('can_makan_dibantu')->nullable();
            $table->boolean('can_bab_bak')->default(false);
            $table->string('can_bab_bak_dibantu')->nullable();
            $table->boolean('can_transfering')->default(false);
            $table->string('can_transfering_dibantu')->nullable();

            // enums
            $table->enum('nafsu_makan', ['baik', 'kurang', 'tidak_ada'])->nullable();
            $table->enum('turgor', ['baik', 'sedang', 'kurang'])->nullable();
            $table->enum('gaya_berjalan', ['pelan', 'diseret', 'goyah', 'tremor'])->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asuhan_keperawatan');
    }
};

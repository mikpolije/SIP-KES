<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::dropIfExists('transaksi_persalinan');

        Schema::create('transaksi_persalinan', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pendaftaran');
            $table->integer('id_bidan');
            $table->string('tempat_persalinan')->nullable();
            $table->text('alamat_persalinan')->nullable();
            $table->text('catatan_rujukan')->nullable();
            $table->text('alasan_merujuk')->nullable();
            $table->string('tempat_merujuk')->nullable();
            $table->string('pendamping')->nullable();
            $table->string('partogram')->nullable();
            $table->text('masalah_lain_kala_i')->nullable();
            $table->string('penatalaksana')->nullable();
            $table->string('hasil')->nullable();
            $table->string('eposotormy')->nullable();
            $table->string('tindakan_eposotormy')->nullable();
            $table->string('gawat_janin')->nullable();
            $table->string('tindakan_gawat_janin')->nullable();
            $table->string('destosia')->nullable();
            $table->string('tindakan_destosia')->nullable();
            $table->string('waktu_kala_iii')->nullable();
            $table->string('waktu_oksitosin')->nullable();
            $table->string('tindakan_waktu_oksitosin')->nullable();
            $table->string('waktu_ulang_oksitosin')->nullable();
            $table->string('tindakan_waktu_ulang_oksitosin')->nullable();
            $table->string('penegangan_tali')->nullable();
            $table->string('tindakan_penegangan_tali')->nullable();
            $table->string('uteri')->nullable();
            $table->string('tindakan_uteri')->nullable();
            $table->string('atoni_uteri')->nullable();
            $table->string('tindakan_atoni_uteri')->nullable();
            $table->string('plasenta_lahir')->nullable();
            $table->string('tindakan_plasenta_lahir')->nullable();
            $table->string('plasenta_tidak_lahir')->nullable();
            $table->string('tindakan_plasenta_tidak_lahir')->nullable();
            $table->string('laserasi')->nullable();
            $table->string('tindakan_laserasi')->nullable();
            $table->string('laserasi_perineum')->nullable();
            $table->string('penjahitan')->nullable();
            $table->string('alasan_penjahitan')->nullable();
            $table->string('jumlah_pendarahan')->nullable();
            $table->text('masalah_lain_kala_iii')->nullable();
            $table->text('penatalaksanaan_masalah')->nullable();
            $table->string('hasil_kala_iii')->nullable();
            $table->string('ku')->nullable();
            $table->string('td')->nullable();
            $table->string('nadi')->nullable();
            $table->string('napas')->nullable();
            $table->text('masalah_kala_iv')->nullable();
            $table->string('normal')->nullable();
            $table->string('cacat_bawaan')->nullable();
            $table->text('masalah_lain_bayi')->nullable();
            $table->text('tindakan_masalah_lain_bayi')->nullable();
            $table->string('cek_asfiksia')->nullable();
            $table->string('asfiksia')->nullable();
            $table->string('cek_pemberian_asi')->nullable();
            $table->string('pemberian_asi')->nullable();
            $table->string('jam_pemberian_asi')->nullable();
            $table->string('cek_penatalaksanaan')->nullable();
            $table->text('penatalaksanaan')->nullable();
            $table->date('hpht')->nullable();
            $table->string('his')->nullable();
            $table->string('lendir')->nullable();
            $table->string('darah')->nullable();
            $table->string('ketuban')->nullable();
            $table->text('keluhan')->nullable();
            $table->text('riwayat_persalinan_lalu')->nullable();
            $table->text('riwayat_alergi')->nullable();
            $table->string('tekanan_darah_o')->nullable();
            $table->string('suhu')->nullable();
            $table->string('nadi_o')->nullable();
            $table->string('odema')->nullable();
            $table->text('palpasi')->nullable();
            $table->string('teraba')->nullable();
            $table->string('djj')->nullable();
            $table->string('kontraksi')->nullable();
            $table->text('pemeriksaan_dalam')->nullable();
            $table->string('oleh')->nullable();
            $table->string('hasil_v1')->nullable();
            $table->string('a')->nullable();
            $table->text('observasi_kala_i')->nullable();
            $table->timestamps();
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transaksi_persalinan');
    }
};

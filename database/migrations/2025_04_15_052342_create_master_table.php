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
        Schema::create('dokter', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('nama');
            $table->string('no_telepon', 100);
            $table->string('alamat', 100);
            $table->string('no_sip', 100)->unique();
            $table->string('nip', 100)->unique();
            $table->string('gelar_depan', 50);
            $table->string('gelar_belakang', 50);
            $table->string('jadwal_layanan', 50);
            $table->string('ttd')->nullable();
            $table->softDeletes();
        });

        Schema::create('perawat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat', 100);
            $table->string('no_telepon', 100);
            $table->string('no_sip', 100)->unique();
            $table->string('email');
            $table->string('unit', 100);
        });

        Schema::create('data_pasien', function (Blueprint $table) {
            $table->string('no_rm', 6)->primary();
            $table->string('nik_pasien', 16)->unique();
            $table->string('nama_lengkap', 255);
            $table->string('nama_ibu_kandung', 255);
            $table->string('tempat_lahir_pasien', 100);
            $table->date('tanggal_lahir_pasien');
            $table->unsignedTinyInteger('jenis_kelamin'); // 0-4

            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghucu', 'Lainnya']);
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O']);

            $table->text('alamat_pasien');
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();

            $table->unsignedBigInteger('id_provinsi');
            $table->unsignedBigInteger('id_kota');
            $table->unsignedBigInteger('id_kecamatan');
            $table->unsignedBigInteger('id_desa');

            $table->string('kewarganegaraan', 3);
            $table->string('kode_pos', 10);
            $table->string('nomor_telepon_pasien', 30);

            $table->unsignedTinyInteger('pendidikan_pasien'); // 0-8
            $table->unsignedTinyInteger('pekerjaan_pasien');  // 0-5
            $table->unsignedTinyInteger('status_perkawinan'); // 1-4

            $table->timestamps();
        });

        Schema::create('wali_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm', 6);
            $table->string('nama_lengkap', 255);
            $table->string('no_telepon', 100);
            $table->string('hubungan', 100)
                ->comment('1. Diri Sendiri;   2. Orang Tua;  3. Anak;  4. Suami/Istri;  5. Kerabat/Saudara;  6. Lain-lain (free text)');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->date('tanggal_lahir');
            $table->text('alamat_lengkap');
            $table->timestamps();

            $table->foreign('no_rm')
                ->references('no_rm')
                ->on('data_pasien')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });

        Schema::create('anak', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['L', 'P']);
        });

        Schema::create('bidan', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jadwal', 100);
            $table->string('asal', 100);
        });

        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->unsignedBigInteger('id_poli');
            $table->string('no_rm', 6);

            $table->foreign('no_rm')
                ->references('no_rm')
                ->on('data_pasien')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_dokter')
                ->references('id')
                ->on('dokter')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_wali_pasien')
                ->references('id')
                ->on('wali_pasien')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('icd10', function (Blueprint $table) {
            $table->id();
            $table->string('code', 6)->unique();
            $table->string('display');
            $table->string('version', 10);
        });

        Schema::create('icd9', function (Blueprint $table) {
            $table->id();
            $table->string('code', 6)->unique();
            $table->string('display');
            $table->string('version');
        });

        Schema::create('general_consent_rawat_inap', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->boolean('isTahuHak'); // Mengetahui hak pasien
            $table->boolean('isSetujuAturan'); // Menyetujui aturan klinik
            $table->boolean('isSetujuPerawatan'); // Menyetujui perawatan
            $table->boolean('isPahamPrivasi'); // Memahami kerahasiaan
            $table->boolean('isBukaInfoAsuransi'); // Membuka info untuk asuransi
            $table->boolean('isIzinkanKeluarga'); // Mengizinkan akses keluarga
            $table->boolean('isPahamPenolakan'); // Memahami hak penolakan
            $table->boolean('isPahamSiswa'); // Memahami partisipasi siswa

            $table->boolean('isBeriWewenang');
            $table->string('nama_penerima')->nullable();
            $table->string('hubungan_penerima')->nullable();

            $table->boolean('isBeriAkses');
            $table->string('nama_keluarga')->nullable();
            $table->string('hubungan_keluarga')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokter');
        Schema::dropIfExists('perawat');
        Schema::dropIfExists('pasien');
        Schema::dropIfExists('wali_pasien');
        Schema::dropIfExists('anak');
        Schema::dropIfExists('bidan');
        Schema::dropIfExists('pendaftaran');
        Schema::dropIfExists('icd10');
        Schema::dropIfExists('icd9');
        Schema::dropIfExists('general_consent_rawat_inap');
    }
};

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
            $table->string('no_rm', 6)->unique()->primary();
            $table->string('nik', 16)->unique();
            $table->string('no_identitas_lain', 50)->unique()->nullable();
            $table->string('nama_lengkap');
            $table->string('nama_ibu_kandung');
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->unsignedInteger('jenis_kelamin')
                ->comment(
                    '
                    0. Tidak diketahui;
                    1. Laki-laki;
                    2. Perempuan;
                    3. Tidak dapat ditentukan;
                    4. Tidak mengisi;
                    '
                );
            $table->enum('agama', ['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghuchu', 'Penghayat', 'Lain-lain']);
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O']);
            $table->string('suku', 100);

            $table->text('alamat_lengkap');
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->foreignId('id_provinsi')
                ->references('id')
                ->on('provinces')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_kota')
                ->references('id')
                ->on('cities')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_kecamatan')
                ->references('id')
                ->on('districts')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_desa')
                ->references('id')
                ->on('villages')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->string('kode_negara', 3);
            $table->string('kode_pos', 10);
            $table->string('nomor_telepon', 30);

            $table->unsignedInteger('pendidikan')->comment(
                '
                0. Tidak sekolah;
                1. SD;
                2. SLTP sederajat;
                3. SLTA sederajat;
                4. D1-D3 sederajat;
                5. D4;
                6. S1;
                7. S2;
                8. S3
                '
            );
            $table->unsignedInteger('pekerjaan')->comment(
                '
                0. Tidak bekerja;
                1. PNS;
                2. TNI/POLRI;
                3. BUMN;
                4. Pegawai Swasta/Wirausaha;
                5. Lain-lain
                '
            );
            $table->unsignedInteger('status_perkawinan')->comment(
                '
                1:Belum Kawin;
                2:Kawin;
                3:Cerai Hidup;
                4:Cerai Mati
                '
            );
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
            $table->enum('layanan', ['Poli Umum', 'KIA', 'UGD', 'Rawat Inap', 'Circum', 'Vaksin Internasional']);
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
    }
};

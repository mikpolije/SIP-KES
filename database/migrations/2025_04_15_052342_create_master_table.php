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
            $table->string('nama_dokter');
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

        Schema::create('pasien', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm', 50);
            $table->string('nik', 100)->unique();
            $table->string('nama_lengkap');
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('kewarganeraan', 100);
            $table->string('nama_ibu_kandung');
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O']);
            $table->string('pendidikan', 50);
            $table->string('agama', 50);
            $table->string('status_perkawinan', 50);
            $table->string('pekerjaan', 100);
            $table->string('no_telepon', 100);
            $table->string('rt', 3);
            $table->string('rw', 3);
            $table->foreignId('province_id')
                ->references('id')
                ->on('provinces')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('city_id')
                ->references('id')
                ->on('cities')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('district_id')
                ->references('id')
                ->on('districts')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('village_id')
                ->references('id')
                ->on('villages')
                ->constrained()
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::create('wali_pasien', function (Blueprint $table) {
            $table->id();
            $table->string('no_rm', 50);
            $table->string('no_telepon', 100);
            $table->string('hubungan', 100)
                ->comment('1. Diri Sendiri;   2. Orang Tua;  3. Anak;  4. Suami/Istri;  5. Kerabat/Saudara;  6. Lain-lain (free text)');
            $table->enum('jenis_kelamin', ['L', 'P']);
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
    }
};

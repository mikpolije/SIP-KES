<?php

use App\Models\DataPasien;
use App\Models\Dokter;
use App\Models\ICD;
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

        Schema::create('surat_sakit', function (Blueprint $table) {
            $table->id();

            $table->string('nomor');
            $table->date('tanggalDari');
            $table->date('tanggalSampai');

            $table->foreignIdFor(DataPasien::class, 'no_rm')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->text('diagnosa')->nullable();
            $table->date('rencana_kontrol')->nullable();
            $table->string('penandatangan')->nullable();
            $table->timestamps();
        });

        Schema::create('surat_kontrol', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');
            $table->date('tanggal');

            $table->foreignIdFor(Dokter::class, 'id_dokter')->nullable()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(DataPasien::class, 'no_rm')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignIdFor(ICD::class, 'id_icd')->nullable()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->text('kepada')->nullable();
            $table->text('diagnosa')->nullable();
            $table->date('rencana_kontrol')->nullable();
            $table->string('penandatangan')->nullable();
            $table->timestamps();
        });

        Schema::create('surat_pulang_paksa', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');

            $table->foreignIdFor(DataPasien::class, 'no_rm')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('nama_lengkap', 255);
            $table->string('no_telepon', 100);
            $table->string('hubungan', 100)
                ->comment('1. Diri Sendiri;   2. Orang Tua;  3. Anak;  4. Suami/Istri;  5. Kerabat/Saudara;  6. Lain-lain (free text)');
            $table->text('alamat_lengkap');

            $table->date('tanggal');
            $table->string('penandatangan')->nullable();
            $table->timestamps();
        });

        Schema::create('surat_kematian', function (Blueprint $table) {
            $table->id();
            $table->string('nomor');

            $table->foreignIdFor(DataPasien::class, 'no_rm')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->date('tanggal_masuk_rs')->nullable();
            $table->time('waktu_masuk_rs')->nullable();

            $table->date('tanggal_kematian')->nullable();
            $table->time('waktu_kematian')->nullable();
            $table->string('tempat_kematian')->nullable();

            $table->foreignIdFor(ICD::class, 'id_icd')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('penandatangan')->nullable();
            $table->timestamps();
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

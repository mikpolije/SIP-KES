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
        Schema::create('general_consent', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->string('nama_wali');
            $table->date('tanggal_lahir_wali');
            $table->string('hubungan_dengan_pasien');
            $table->text('alamat');
            $table->string('no_telpon');

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
        Schema::dropIfExists('general_consent');
    }
};

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
        Schema::dropIfExists('transaksi_program_kb'); // hapus jika sudah ada

        Schema::create('transaksi_program_kb', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftaran');

            $table->string('nama')->nullable();
            $table->integer('umur')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('agama')->nullable();
            $table->string('pendidikan')->nullable();

            $table->text('alamat')->nullable();
            $table->integer('jumlah_anak')->nullable();
            $table->string('kb')->nullable();
            $table->string('nama_suami')->nullable();
            $table->integer('umur_suami')->nullable();

            $table->string('pekerjaan_suami')->nullable();
            $table->string('agama_suami')->nullable();
            $table->string('pendidikan_suami')->nullable();
            $table->string('no_telp')->nullable();
            $table->integer('umur_anak')->nullable();

            $table->string('hpht')->nullable();
            $table->integer('gpa')->nullable();
            $table->string('menyusui')->nullable();
            $table->string('manarche')->nullable();
            $table->string('keadaan_umum')->nullable();

            $table->string('kesadaran')->nullable();
            $table->integer('sistole')->nullable();
            $table->integer('berat_badan')->nullable();
            $table->integer('suhu')->nullable();
            $table->integer('respirasi')->nullable();

            $table->integer('diastole')->nullable();
            $table->integer('tinggi_badan')->nullable();
            $table->integer('spo2')->nullable();
            $table->integer('nadi')->nullable();
            $table->string('kontrasepsi')->nullable();

            $table->date('dilayani')->nullable();
            $table->date('dicabut')->nullable();
            $table->date('dipasang')->nullable();
            $table->string('tipe_pasien')->nullable();
            $table->date('tindakan')->nullable();

            $table->string('kode_tindakan')->nullable();

            $table->timestamps();
            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_program_kb');
    }
};

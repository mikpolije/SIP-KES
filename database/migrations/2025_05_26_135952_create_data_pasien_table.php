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
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pasien');
    }
};

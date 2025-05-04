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
        Schema::create('layanan_kia', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftaran');
            $table->string('no_antrian');
            $table->date('tanggal');
            $table->enum('jenis_pemeriksaan', ['Kehamilan','Persalinan','KB','Anak']);
            $table->text('keluhan');
            $table->integer('sistole');
            $table->integer('diastole');
            $table->integer('bb');
            $table->integer('tb');
            $table->integer('suhu');
            $table->integer('spo2');
            $table->integer('respirasi');

            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('layanan_kia', function (Blueprint $table) {
            $table->dropForeign(['id_pendaftaran']);

            $table->dropColumn([
                'id',
                'id_pendaftaran',
                'no_antrian',
                'tanggal',
                'jenis_pemeriksaan',
                'keluhan',
                'sistole',
                'diastole',
                'bb',
                'tb',
                'suhu',
                'spo2',
                'respirasi',
            ]);

            $table->string('p_anak')->nullable();
            $table->string('p_kehamilan')->nullable();
            $table->string('p_persalinan')->nullable();
            $table->string('progam_kb')->nullable();
        });
    }
};

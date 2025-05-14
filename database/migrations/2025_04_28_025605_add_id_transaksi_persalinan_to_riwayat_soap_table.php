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
        // Hapus tabel lama
        Schema::dropIfExists('riwayat_soap');

        // Buat tabel baru
        Schema::create('riwayat_soap', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksi_persalinan')->constrained('transaksi_persalinan')->onDelete('cascade');
            $table->integer('jam_ke')->nullable();
            $table->integer('tekanan_darah')->nullable();
            $table->integer('tinggi_fundus')->nullable();
            $table->string('kandung_kemih')->nullable();
            $table->time('waktu')->nullable();
            $table->integer('nadi_kala_iv')->nullable();
            $table->string('kontraksi_uterus')->nullable();
            $table->string('pendarahan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_soap');
    }
};

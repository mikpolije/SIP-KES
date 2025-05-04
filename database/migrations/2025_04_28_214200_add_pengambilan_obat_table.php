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
        // Tabel pengambilan_obat
        Schema::create('pengambilan_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pendaftaran');
            $table->string('no_antrian');
            $table->date('tanggal_penyerahan');
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('id_pendaftaran')->references('id_pendaftaran')->on('pendaftaran')->onDelete('cascade');
        });

        // Tabel detail_pengambilan_obat
        Schema::create('detail_pengambilan_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengambilan_obat');
            $table->unsignedBigInteger('id_detail_pembelian_obat');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_pengambilan_obat')->references('id')->on('pengambilan_obat')->onDelete('cascade');
            $table->foreign('id_detail_pembelian_obat')->references('id')->on('detail_pembelian_obat')->onDelete('cascade');
        });

        // Tabel racikan
        Schema::create('racikan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pengambilan_obat');
            $table->unsignedBigInteger('id_detail_pembelian_obat');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->integer('harga');
            $table->timestamps();

            $table->foreign('id_pengambilan_obat')->references('id')->on('pengambilan_obat')->onDelete('cascade');
            $table->foreign('id_detail_pembelian_obat')->references('id')->on('detail_pembelian_obat')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racikan');
        Schema::dropIfExists('detail_pengambilan_obat');
        Schema::dropIfExists('pengambilan_obat');
    }
};

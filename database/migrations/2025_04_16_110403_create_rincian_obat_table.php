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
        Schema::create('obat', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('keterangan');
            $table->integer('stok')->default(0);
            $table->string('bentuk_obat')->comment('gr, ml, dll');
            $table->decimal('harga', 16,2);
            $table->timestamps();
        });

        Schema::create('pembelian_obat', function (Blueprint $table) {
            $table->id();
            $table->string('no_faktur');
            $table->date('tanggal_faktur');

            $table->timestamps();
        });

        Schema::create('detail_pembelian_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pembelian_obat');
            $table->unsignedBigInteger('id_obat');
            $table->date('tanggal_kadaluarsa');
            $table->integer('stok_opname');
            $table->integer('stok_gudang');

            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });

        Schema::create('riwayat_stok_obat', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_obat');
            $table->unsignedBigInteger('id_detail_pembelian_obat');
            $table->date('tanggal');
            $table->enum('jenis_transaksi', ['mutasi', 'koreksi', 'retur', 'konversi'])->default('koreksi');
            $table->integer('jumlah')->comment('positif = masuk, negatif = keluar');
            $table->string('dari_lokasi')->nullable();
            $table->string('ke_lokasi')->nullable();
            $table->text('keterangan')->nullable();

            $table->foreign('id_obat')->references('id')->on('obat')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_stok_obat');
        Schema::dropIfExists('detail_pembelian_obat');
        Schema::dropIfExists('pembelian_obat');
        Schema::dropIfExists('obat');
    }
};

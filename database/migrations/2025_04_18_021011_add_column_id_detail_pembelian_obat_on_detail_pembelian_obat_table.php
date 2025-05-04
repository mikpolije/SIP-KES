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
        Schema::table('riwayat_stok_obat', function (Blueprint $table) {
            $table->foreign('id_detail_pembelian_obat')
                ->references('id')
                ->on('detail_pembelian_obat')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('riwayat_stok_obat', function (Blueprint $table) {
            $table->dropForeign(['id_detail_pembelian_obat']);
            $table->dropColumn('id_detail_pembelian_obat');
        });
    }
};

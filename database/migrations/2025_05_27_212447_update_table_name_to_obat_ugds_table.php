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
        Schema::rename('obat_ugds', 'transaksi_obat_ugd');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('obat_ugds', function (Blueprint $table) {
            //
        });
    }
};

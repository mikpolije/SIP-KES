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
        Schema::rename('icd_ugds', 'transaksi_icd_ugd');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('icd_ugds', function (Blueprint $table) {
            //
        });
    }
};

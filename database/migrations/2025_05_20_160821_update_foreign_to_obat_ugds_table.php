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
        Schema::table('obat_ugds', function (Blueprint $table) {
            $table->dropConstrainedForeignId('obat_id');
            $table->unsignedBigInteger('obat_id');
            $table->foreign('obat_id')
                ->references('id_obat')
                ->on('obat')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
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

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
        Schema::table('kondisi_pasiens', function (Blueprint $table) {
            $table->dropConstrainedForeignId('pasien_id');
            $table->unsignedBigInteger('pendaftaran_id');
            $table->foreign('pendaftaran_id')
                ->references('id_pendaftaran')
                ->on('pendaftaran')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kondisi_pasiens', function (Blueprint $table) {
            //
        });
    }
};

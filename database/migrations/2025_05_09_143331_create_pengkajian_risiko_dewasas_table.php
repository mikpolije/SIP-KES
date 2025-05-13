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
        Schema::create('pengkajian_risiko_dewasas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->integer('riwayat_jatuh')->nullable();
            $table->integer('diagnostik_sekunder')->nullable();
            $table->integer('alat_bantu')->nullable();
            $table->integer('terpasang_infuse')->nullable();
            $table->integer('gaya_berjalan')->nullable();
            $table->integer('status_mental')->nullable();
            $table->timestamps();
            
            $table->foreign('pasien_id')
                ->references('id')
                ->on('pasiens')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengkajian_risiko_dewasas');
    }
};

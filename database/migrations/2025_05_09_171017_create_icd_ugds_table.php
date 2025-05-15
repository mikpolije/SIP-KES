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
        Schema::create('icd_ugds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('icd_id');
            $table->timestamps();

            $table->foreign('pasien_id')
                ->references('id')
                ->on('pasiens')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('icd_id')
                ->references('id')
                ->on('icd_10s')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('icd_ugds');
    }
};

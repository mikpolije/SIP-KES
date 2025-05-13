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
        Schema::create('adl_ugds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->integer('makan')->nullable();
            $table->integer('berpindah')->nullable();
            $table->integer('kebersihan_diri')->nullable();
            $table->integer('aktiivitas_di_toilet')->nullable();
            $table->integer('mandi')->nullable();
            $table->integer('berjalan_di_datar')->nullable();
            $table->integer('naik_turun_tangga')->nullable();
            $table->integer('berpakaian')->nullable();
            $table->integer('mengontrol_bab')->nullable();
            $table->integer('mengontrol_bak')->nullable();
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
        Schema::dropIfExists('adl_ugds');
    }
};

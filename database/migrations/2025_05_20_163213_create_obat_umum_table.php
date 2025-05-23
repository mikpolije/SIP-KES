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
        Schema::create('obat_umum', function (Blueprint $table) {
            $table->id('id_obat_umum');
            $table->unsignedBigInteger('id_pemeriksaan');
            $table->unsignedBigInteger('id_obat_1')->nullable();
            $table->unsignedBigInteger('id_obat_2')->nullable();
            $table->unsignedBigInteger('id_obat_3')->nullable();
            $table->unsignedBigInteger('id_obat_4')->nullable();
            $table->unsignedBigInteger('id_obat_5')->nullable();
            $table->unsignedBigInteger('id_obat_6')->nullable();
            $table->unsignedBigInteger('id_obat_7')->nullable();
            
            $table->timestamps();

            // Foreign key example (optional - tergantung relasi kamu)
            // $table->foreign('id_pemeriksaan')->references('id')->on('pemeriksaan');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_umum');
    }
};

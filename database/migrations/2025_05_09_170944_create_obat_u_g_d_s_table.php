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
        Schema::create('obat_ugds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pasien_id');
            $table->unsignedBigInteger('obat_id');
            $table->integer('qty');
            $table->timestamps();

            $table->foreign('pasien_id')
                ->references('id')
                ->on('pasiens')
                ->onUpdate('cascade')
                ->onDelete('cascade');

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
        Schema::dropIfExists('obat_ugds');
    }
};

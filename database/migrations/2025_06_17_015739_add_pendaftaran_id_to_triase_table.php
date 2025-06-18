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
        Schema::table('triase', function (Blueprint $table) {
            $table->unsignedBigInteger('pendaftaran_id');
            $table->foreign('pendaftaran_id')
                ->references('id_pendaftaran')
                ->on('pendaftaran')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('triase', function (Blueprint $table) {
            //
        });
    }
};

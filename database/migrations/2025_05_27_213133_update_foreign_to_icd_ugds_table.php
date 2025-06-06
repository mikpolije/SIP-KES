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
        Schema::table('icd_ugds', function (Blueprint $table) {
            $table->dropConstrainedForeignId('pasien_id');
            $table->unsignedBigInteger('triase_id');
            $table->foreign('triase_id')
                ->references('id')
                ->on('triase')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
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

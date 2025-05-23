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
            $table->dropConstrainedForeignId('icd_id');
            $table->unsignedBigInteger('icd_id');
            $table->foreign('icd_id')
                ->references('id')
                ->on('icd10')
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

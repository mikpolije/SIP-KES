<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('triase', function (Blueprint $table) {
            DB::statement("ALTER TABLE triase DROP INDEX kondisi_pasiens_pasien_id_foreign");
            $table->dropColumn('pasien_id');
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

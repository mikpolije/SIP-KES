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
        Schema::table('kondisi_pasiens', function (Blueprint $table) {
            DB::statement("ALTER TABLE kondisi_pasiens MODIFY COLUMN kie enum ('ya', 'tidak') null");
            DB::statement("ALTER TABLE kondisi_pasiens MODIFY COLUMN pemeriksaan_penunjang enum ('ya', 'tidak') null");
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

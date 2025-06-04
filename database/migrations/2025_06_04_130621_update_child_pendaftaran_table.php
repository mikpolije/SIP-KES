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
        Schema::table('obat_pendaftaran', function (Blueprint $table) {
            $table->after('id_obat', function (Blueprint $table) {
                $table->unsignedInteger('qty');
            });
        });

        Schema::table('layanan_pendaftaran', function (Blueprint $table) {
            $table->after('id_layanan', function (Blueprint $table) {
                $table->unsignedInteger('qty');
            });
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('obat_pendaftaran', function (Blueprint $table) {
            $table->dropColumn('qty');
        });

        Schema::table('layanan_pendaftaran', function (Blueprint $table) {
            $table->dropColumn('qty');
        });
    }
};

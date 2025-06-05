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
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `kondisi_pasien_tiba` varchar(255) DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `riwayat_alergi` varchar(255) DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `berat_badan` int(11) DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `tinggi_badan` int(11) DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `lingkar_perut` int(11) DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `imt` varchar(255) DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `nafas` varchar(255) DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `sistol` varchar(255) DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `diastol` varchar(255) DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `suhu` double DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `nadi` varchar(255) DEFAULT NULL");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `kepala` enum('normal','tidak normal') DEFAULT 'normal'");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `mata` enum('normal','tidak normal') DEFAULT 'normal'");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `tht` enum('normal','tidak normal') DEFAULT 'normal'");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `leher` enum('normal','tidak normal') DEFAULT 'normal'");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `thorax` enum('normal','tidak normal') DEFAULT 'normal'");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `abdomen` enum('normal','tidak normal') DEFAULT 'normal'");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `extemitas` enum('normal','tidak normal') DEFAULT 'normal'");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `genetalia` enum('normal','tidak normal') DEFAULT 'normal'");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `ecg` enum('normal','tidak normal') DEFAULT 'normal'");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `ronsen` enum('ya','tidak') DEFAULT null");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `terapi` enum('normal','tidak normal') DEFAULT 'normal'");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `ronsen` enum('ya','tidak') DEFAULT null");
            DB::statement("ALTER TABLE `triase` MODIFY COLUMN `pemeriksaan_penunjang` enum('ya','tidak') DEFAULT 'tidak'");
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

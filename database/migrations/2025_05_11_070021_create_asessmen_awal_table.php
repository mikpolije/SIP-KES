<?php

use App\Models\Pendaftaran;
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
        Schema::create('asessmen_awal', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->string('denyut_jantung', 20)->nullable();
            $table->string('pernafasan', 20)->nullable();
            $table->string('suhu_tubuh', 20)->nullable();
            $table->string('tekanan_darah_sistole', 10)->nullable();
            $table->string('tekanan_darah_diastole', 10)->nullable();
            $table->string('skala_nyeri', 20)->nullable();
            $table->text('keluhan_utama')->nullable();
            $table->text('riwayat_penyakit')->nullable();
            $table->text('riwayat_pengobatan')->nullable();
            $table->string('status_psikologi', 255)->nullable();
            
            $table->json('metadata')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asessmen_awal');
    }
};

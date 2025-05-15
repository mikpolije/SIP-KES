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

            $table->enum('alergi', ['tidak', 'ya'])->default('tidak');
            $table->string('jenis_alergi', 255)->nullable();

            $table->enum('status_psikologi', ['tenang', 'cemas', 'takut', 'marah', ''])->nullable();
            $table->boolean('bunuh_diri')->default(false);
            $table->string('bunuh_diri_laporan', 255)->nullable();
            $table->boolean('lain_lain')->default(false);
            $table->text('lain_lain_text')->nullable();

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

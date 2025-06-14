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
        Schema::create('resume_medis', function (Blueprint $table) {
            $table->string('no')->default('IM/' . date('Y') . '/000')
                ->primary();

            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->text('ringkasan_penyakit')->nullable();
            $table->text('laboratorium')->nullable();
            $table->text('radiologi')->nullable();
            $table->text('lain_lain')->nullable();
            $table->text('instruksi_edukasi')->nullable();
            $table->text('kondisi_saat_pulang')->nullable();

            $table->string('diagnosis_utama')->nullable();
            $table->string('penyebab_luar')->nullable();
            $table->string('diagnosis_sekunder')->nullable();

            $table->string('tindakan')->nullable();

            $table->date('tanggal_kontrol')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resume_medis');
    }
};

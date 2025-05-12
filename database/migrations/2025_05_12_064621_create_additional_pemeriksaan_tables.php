<?php

use App\Models\Layanan;
use App\Models\Obat;
use App\Models\Pemeriksaan;
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
        Schema::create('layanan_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pemeriksaan::class, 'id_pemeriksaan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignIdFor(Layanan::class, 'id_layanan')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::create('obat_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pemeriksaan::class, 'id_pemeriksaan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignIdFor(Obat::class, 'id_obat')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::create('laboratorium_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pemeriksaan::class, 'id_pemeriksaan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });

        Schema::create('radiologi_pemeriksaan', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pemeriksaan::class, 'id_pemeriksaan')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanan_pemeriksaan');
        Schema::dropIfExists('obat_pemeriksaan');
        Schema::dropIfExists('laboratorium_pemeriksaan');
        Schema::dropIfExists('radiologi_pemeriksaan');
    }
};

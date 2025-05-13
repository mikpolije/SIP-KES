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
        Schema::create('poli_umum', function (Blueprint $table) {
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->primary()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
        Schema::create('poli_kia', function (Blueprint $table) {
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->primary()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
        Schema::create('poli_rawat_inap', function (Blueprint $table) {
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->primary()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->foreignId('id_asessmen_awal')
                ->constrained('asessmen_awal')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_cppt')
                ->constrained('cppt')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_informed_consent')
                ->constrained('informed_consent')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->foreignId('id_asuhan_keperawatan')
                ->constrained('asuhan_keperawatan')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
            $table->string('ruangan')->nullable();
            $table->string('kelas')->nullable();
            $table->string('pembayaran')->nullable();
        });

        Schema::create('ugd', function (Blueprint $table) {
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->primary()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poli_umum');
        Schema::dropIfExists('poli_kia');
        Schema::dropIfExists('poli_rawat_inap');
        Schema::dropIfExists('ugd');
    }
};

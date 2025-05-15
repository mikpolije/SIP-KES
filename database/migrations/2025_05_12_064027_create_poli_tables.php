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
            $table->timestamps();
        });
        Schema::create('poli_kia', function (Blueprint $table) {
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->primary()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
        Schema::create('poli_rawat_inap', function (Blueprint $table) {
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->primary()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreignId('id_asessmen_awal')
                ->nullable()
                ->default(null)
                ->constrained('asessmen_awal')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('id_cppt')
                ->nullable()
                ->default(null)
                ->constrained('cppt')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('id_informed_consent')
                ->nullable()
                ->default(null)
                ->constrained('informed_consent')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('id_asuhan_keperawatan')
                ->nullable()
                ->default(null)
                ->constrained('asuhan_keperawatan')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->enum('ruangan', ['a', 'b', 'c'])->nullable();
            $table->enum('kelas', ['1', '2', '3'])->nullable();
            $table->enum('pembayaran', ['umum', 'bpjs', 'asuransi'])->nullable();
            $table->timestamps();
        });

        Schema::create('ugd', function (Blueprint $table) {
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->primary()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
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

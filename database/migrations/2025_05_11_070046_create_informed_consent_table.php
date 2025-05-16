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
        Schema::create('informed_consent', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            // foreign key ke dokter table
            $table->unsignedBigInteger('id_dokter');
            $table->foreign('id_dokter')
                ->references('id')
                ->on('dokter')
                ->onDelete('restrict');

            $table->string('pemberi_informasi', 100)->nullable();
            $table->string('penerima_informasi', 100)->nullable();

            $table->text('diagnosis')->nullable();
            $table->text('tindakan_kedokteran')->nullable();
            $table->text('indikasi_tindakan')->nullable();
            $table->text('tata_cara')->nullable();
            $table->text('risiko')->nullable();
            $table->text('komplikasi')->nullable();
            $table->text('prognosis')->nullable();
            $table->text('alternatif_risiko')->nullable();
            $table->text('anestesi')->nullable();

            $table->text('pengambilan_sampel_darah')->nullable();
            $table->text('lain_lain')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informed_consent');
    }
};

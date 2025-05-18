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
        Schema::create('cppt', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Pendaftaran::class, 'id_pendaftaran')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->text('s')->nullable(); // Subjective
            $table->text('o')->nullable(); // Objective
            $table->text('a')->nullable(); // Assessment
            $table->text('p')->nullable(); // Plan

            // diagnosis
            $table->unsignedBigInteger('id_icd10')->nullable();
            $table->foreign('id_icd10')
                ->references('id')
                ->on('icd10')
                ->onDelete('set null');

            // tindakan
            $table->unsignedBigInteger('id_icd9')->nullable();
            $table->foreign('id_icd9')
                ->references('id')
                ->on('icd9')
                ->onDelete('set null');

            // foreign key ke obat table
            $table->unsignedBigInteger('id_obat')->nullable();
            $table->foreign('id_obat')
                ->references('id')
                ->on('obat')
                ->onDelete('set null');

            // pemeriksaan (seharusnya milih laboratorium, radiologi, etc idk)
            $table->text('pemeriksaan')->nullable();
            $table->string('kelas_perawatan')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cppt');
    }
};

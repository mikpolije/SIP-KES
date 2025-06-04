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

            $table->json('id_icd10')->nullable();
            $table->json('id_icd9')->nullable();
            $table->json('id_obat')->nullable();

            // pemeriksaan (seharusnya milih laboratorium, radiologi, etc idk)
            $table->text('pemeriksaan')->nullable();
            $table->enum('kelas', ['1', '2', '3'])->nullable();

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

<?php

namespace Database\Factories;

use App\Models\DataPasien;
use App\Models\Dokter;
use App\Models\WaliPasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pendaftaran>
 */
class PendaftaranFactory extends Factory
{
    public function definition()
    {
        $dataPasien = DataPasien::inRandomOrder()->first();
        $dokter = Dokter::inRandomOrder()->first();
        $waliPasien = WaliPasien::inRandomOrder()->first();

        return [
            'no_rm' => $dataPasien->no_rm,
            'id_dokter' => $dokter->id,
            'id_wali_pasien' => $waliPasien->id,
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function ($pendaftaran) {
            if (!DataPasien::where('no_rm', $pendaftaran->no_rm)->exists()) {
                throw new \Exception("Invalid no_rm: {$pendaftaran->no_rm}");
            }
        });
    }
}

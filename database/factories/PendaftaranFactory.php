<?php

namespace Database\Factories;

use App\Models\DataPasien;
use App\Models\Dokter;
use App\Models\WaliPasien;
use Illuminate\Database\Eloquent\Factories\Factory;

class PendaftaranFactory extends Factory
{
    public function definition()
    {
        $dataPasien = DataPasien::inRandomOrder()->first() ?? DataPasien::factory()->create();
        $dokter = Dokter::inRandomOrder()->first() ?? Dokter::factory()->create();
        $waliPasien = WaliPasien::where('no_rm', $dataPasien->no_rm)
            ->first() ?? WaliPasien::factory()->create(['no_rm' => $dataPasien->no_rm]);

        return [
            'no_rm' => $dataPasien->no_rm,
            'id_dokter' => $dokter->id,
            'id_wali_pasien' => $waliPasien->id,
            'layanan' => $this->faker->randomElement([
                'Poli Umum',
                'KIA',
                'UGD',
                'Rawat Inap',
            ]),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function ($pendaftaran) {
            // Verify all relationships exist before saving
            if (!DataPasien::where('no_rm', $pendaftaran->no_rm)->exists()) {
                throw new \Exception("Invalid no_rm: {$pendaftaran->no_rm}");
            }

            if (!Dokter::where('id', $pendaftaran->id_dokter)->exists()) {
                throw new \Exception("Invalid id_dokter: {$pendaftaran->id_dokter}");
            }

            if (!WaliPasien::where('id', $pendaftaran->id_wali_pasien)
                ->where('no_rm', $pendaftaran->no_rm)
                ->exists()) {
                throw new \Exception("WaliPasien doesn't match DataPasien's no_rm");
            }
        });
    }
}

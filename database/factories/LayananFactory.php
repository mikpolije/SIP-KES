<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Layanan>
 */
class LayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jenisLayanan = [
            'Konsultasi Dokter Umum' => [50000, 150000],
            'Konsultasi Dokter Spesialis' => [150000, 500000],
            'Pemeriksaan Darah Lengkap' => [75000, 200000],
            'USG' => [150000, 500000],
            'Rontgen' => [100000, 350000],
            'Fisioterapi' => [80000, 250000],
            'Vaksinasi' => [200000, 800000],
            'Perawatan Luka' => [50000, 150000],
            'ECG' => [120000, 300000],
            'Tes COVID-19' => [250000, 600000]
        ];

        $layanan = $this->faker->randomElement(array_keys($jenisLayanan));
        $tarifRange = $jenisLayanan[$layanan];

        return [
            'nama_layanan' => $layanan,
            'tarif_layanan' => $this->faker->numberBetween($tarifRange[0], $tarifRange[1]),
        ];
    }
}

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
        $baseServices = [
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

        $servicePrefixes = [
            'Premium',
            'Express',
            'Deluxe',
            'Gold',
            'Silver',
            'Platinum',
            'Fast',
            'Quick',
            '24 Jam',
            'Prioritas',
            'Eksekutif',
            'VIP',
            'Standar',
            'Basic',
            'Lengkap'
        ];

        $serviceSuffixes = [
            'Plus',
            'Pro',
            'Max',
            'Extra',
            'Advanced',
            'Complete',
            'Total',
            'Ultimate',
            'Special',
            'Edition',
            'Package',
            'Bundle',
            'Series',
            'Solution',
            'Care'
        ];

        $baseService = $this->faker->randomElement(array_keys($baseServices));
        $tarifRange = $baseServices[$baseService];

        if ($this->faker->boolean(70)) {
            $prefix = $this->faker->optional(0.5)->randomElement($servicePrefixes);
            $suffix = $this->faker->optional(0.5)->randomElement($serviceSuffixes);

            $serviceName = trim(implode(' ', [
                $prefix,
                str_replace('Dokter', $this->faker->optional(0.3)->randomElement(['Medis', 'Kesehatan', 'Klinis']), $baseService),
                $suffix
            ]));

            if ($this->faker->boolean(20)) {
                $clinicName = $this->faker->randomElement([
                    'Medika',
                    'Sehat',
                    'Husada',
                    'Medis',
                    'Care',
                    'Klinik',
                    'Pratama',
                    'Utama',
                    'Prima',
                    'Family'
                ]);
                $serviceName .= " by $clinicName";
            }
        } else {
            $serviceName = $baseService;
        }

        return [
            'nama_layanan' => $serviceName,
            'tarif_layanan' => $this->faker->numberBetween($tarifRange[0], $tarifRange[1]),
        ];
    }
}

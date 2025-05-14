<?php

namespace Database\Factories;

use App\Models\DataPasien;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WaliPasien>
 */
class WaliPasienFactory extends Factory
{
    public function definition()
    {
        // Ensure we have a DataPasien to reference
        $dataPasien = DataPasien::inRandomOrder()->first();

        $hubunganOptions = [
            '1. Diri Sendiri',
            '2. Orang Tua',
            '3. Anak',
            '4. Suami/Istri',
            '5. Kerabat/Saudara',
            '6. Lain-lain'
        ];

        return [
            'no_rm' => $dataPasien->no_rm,
            'no_telepon' => $this->faker->phoneNumber,
            'hubungan' => $this->faker->randomElement($hubunganOptions),
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
        ];
    }
}

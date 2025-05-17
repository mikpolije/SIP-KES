<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Obat>
 */
class ObatFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bentukObat = ['gr', 'ml', 'tablet', 'kapsul', 'botol', 'tube'];

        return [
            'nama' => $this->faker->unique()->word(),
            'keterangan' => $this->faker->sentence(),
            'stok' => $this->faker->numberBetween(0, 1000),
            'bentuk_obat' => $this->faker->randomElement($bentukObat),
            'harga' => $this->faker->randomFloat(2, 1000, 1000000),
        ];
    }
}

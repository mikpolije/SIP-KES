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
    public function definition()
    {
        $bentukObat = ['gr', 'ml', 'tablet', 'kapsul', 'botol', 'tube'];
        $kategoriObat = [
            'Pusing' => [3000, 15000],
            'Demam' => [5000, 25000],
            'Batuk' => [8000, 30000],
            'Flu' => [10000, 40000],
            'Asam Lambung' => [15000, 50000],
            'Vitamin' => [5000, 100000],
            'Antibiotik' => [20000, 150000],
        ];

        $kategori = $this->faker->randomElement(array_keys($kategoriObat));
        $hargaRange = $kategoriObat[$kategori];

        return [
            'nama' => $kategori . ' ' . $this->faker->unique()->word(),
            'stok' => $this->faker->numberBetween(10, 500),
            'tanggal_kadaluarsa' => $this->faker->dateTimeBetween('now', '+3 years')->format('Y-m-d'),
            'bentuk_obat' => $this->faker->randomElement($bentukObat),
            'harga' => $this->faker->numberBetween($hargaRange[0], $hargaRange[1]),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataPasien>
 */
class DataPasienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get random IDs for location relations
        $provinceId = Province::inRandomOrder()->first()->id ?? 1;
        $cityId = City::inRandomOrder()->first()->id ?? 1;
        $districtId = District::inRandomOrder()->first()->id ?? 1;
        $villageId = Village::inRandomOrder()->first()->id ?? 1;

        return [
            'no_rm' => $this->faker->unique()->numerify('######'),
            'nik' => $this->faker->unique()->numerify('################'),
            'no_identitas_lain' => null,
            'nama_lengkap' => $this->faker->name(),
            'nama_ibu_kandung' => $this->faker->name('female'),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'jenis_kelamin' => $this->faker->numberBetween(1, 2), // 1: Laki-laki, 2: Perempuan
            'agama' => $this->faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha', 'Konghuchu', 'Penghayat', 'Lain-lain']),
            'gol_darah' => $this->faker->randomElement(['A', 'B', 'AB', 'O']),
            'suku' => $this->faker->randomElement(['Jawa', 'Sunda', 'Batak', 'Minang', 'Betawi', 'Bugis']),

            'alamat_lengkap' => $this->faker->address(),
            'rt' => $this->faker->numerify('##'),
            'rw' => $this->faker->numerify('##'),
            'id_provinsi' => $provinceId,
            'id_kota' => $cityId,
            'id_kecamatan' => $districtId,
            'id_desa' => $villageId,
            'kode_negara' => $this->faker->randomElement(['ID', 'MY', 'SG']),
            'kode_pos' => $this->faker->numerify('#####'),
            'nomor_telepon' => $this->faker->phoneNumber(),

            'pendidikan' => $this->faker->numberBetween(0, 8),
            'pekerjaan' => $this->faker->numberBetween(0, 5),
            'status_perkawinan' => $this->faker->numberBetween(1, 4),
        ];
    }
}

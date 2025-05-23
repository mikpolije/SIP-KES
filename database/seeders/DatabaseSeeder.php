<?php

namespace Database\Seeders;

use App\Models\DataPasien;
use App\Models\Dokter;
use App\Models\Layanan;
use App\Models\Obat;
use App\Models\Pendaftaran;
use App\Models\User;
use App\Models\WaliPasien;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Dokter::factory(100)->create();
        try {
            // ICD SEEDER DI SINI
            DB::unprepared(file_get_contents(database_path('icd10.sql')));
            DB::unprepared(file_get_contents(database_path('icd9.sql')));
        } catch (\Throwable $th) {
            throw $th;
        }

        $this->call([
            ProvincesSeeder::class,
            CitiesSeeder::class,
            DistrictsSeeder::class,
            VillagesSeeder::class,
        ]);

        DataPasien::factory(50)->create();
        WaliPasien::factory(50)->create();
        Pendaftaran::factory(30)->create();
        Obat::factory()->count(50)->create();
        Layanan::factory()->count(50)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}

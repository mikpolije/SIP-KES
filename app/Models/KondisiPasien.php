<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KondisiPasien extends Model
{
    protected $table = 'kondisi_pasiens';

    protected $fillable = [
        'pasien_id',
        'tanggal_masuk',
        'sarana_transportasi_kedatangan',
        'jam_masuk',
        'kondisi_pasien_tiba',
        'triase',
        'riwayat_alergi',
        'keluhan',
        'berat_badan',
        'tinggi_badan',
        'lingkar_perut',
        'imt',
        'nafas',
        'sistol',
        'diastol',
        'suhu',
        'nadi',
        'kepala',
        'mata',
        'tht',
        'leher',
        'thorax',
        'abdomen',
        'extemitas',
        'genetalia',
        'ecg',
        'ronsen',
        'terapi',
        'kie',
        'pemeriksaan_penunjang',
        'jalur_nafas',
        'pola_nafas',
        'gerakan_dada',
        'kulit',
        'turgor',
        'akral',
        'spo',
        'kesadaran',
        'mata_neurologi',
        'motorik',
        'verbal',
        'kondisi_umum',
        'laborat',
        'laboratorium_farmasi',
        'aktivitas_fisik',
        'konsumsi_alkohol',
        'makan_buah_sayur',
        'merokok',
        'riwayat_keluarga',
        'riwayat_penyakit_terdahulu',
        'created_at',
        'updated_at',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Triase extends Model
{
    protected $table = 'triase';

    protected $fillable = [
        'pendaftaran_id',
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

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id', 'id_pendaftaran');
    }
    
    public function rencanaKontrol ()
    {
        return $this->hasMany(RencanaKontrolUGD::class, 'triase_id', 'id');
    }

    public function adl ()
    {
        return $this->hasOne(TransaksiAdlUgd::class, 'triase_id', 'id');
    }

    public function icd () 
    {
        return $this->hasMany(TransaksiIcdUgd::class, 'triase_id', 'id');
    }

    public function icd9 ()
    {
        return $this->hasMany(TransaksiIcd9Ugd::class, 'triase_id', 'id');
    }

    public function layanan ()
    {
        return $this->hasMany(TransaksiLayananUgd::class, 'triase_id', 'id');
    }

    public function obat () 
    {
        return $this->hasMany(TransaksiObatUgd::class, 'triase_id', 'id');
    }

    public function pemeriksaan ()
    {
        return $this->hasOne(PemeriksaanUgd::class, 'triase_id', 'id');
    }

    public function pengkajianRisiko ()
    {
        return $this->hasOne(TransaksiPengkajianRisikoDewasa::class, 'triase_id', 'id');
    }
}

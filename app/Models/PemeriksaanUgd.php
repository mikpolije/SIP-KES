<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemeriksaanUgd extends Model
{
    protected $table = 'pemeriksaan_ugd';

    protected $fillable = [
        'triase_id',
        'keluhan',
        'sistole',
        'diastole',
        'berat_badan',
        'tinggi_badan',
        'suhu',
        'spo02',
        'respiration_rate',
        'nadi',
        'plan',
        'assesment',
        'alat_bantu',
        'protesa',
        'cacat_tubuh',
        'mandiri',
        'dibantu',
        'adl',
        'ku_dan_kesadaran',
        'kepala_dan_leher',
        'dada',
        'perut',
        'ekstrimitas',
        'status_lokalis',
        'penatalaksanaan',
        'umur_65',
        'keterbatasan_mobilitas',
        'perawatan_lanjutan',
        'bantuan',
        'masuk_kriteria',
        'hasil_pemeriksaan_fisik',
        'hasil_pemeriksaan',
        'penunjang',
        'hasil_asuhan',
        'lain_lain',
        'diagnosis',
        'rencana_asuhan',
        'hasil_pengobatan',
        'keterangan_edukasi',
        'rawat_jalan',
        'rawat_inap',
        'rujuk',
        'tanggal_pulang_paksa',
        'meninggal',
        'kondisi_saat_keluar',
        'created_at',
        'updated_at',
    ];

    public function triase ()
    {
        return $this->belongsTo(Triase::class, 'triase_id', 'triase');
    }
}

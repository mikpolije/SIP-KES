<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemeriksaanAwal extends Model
{
    protected $table = 'pemeriksaan';
    protected $primaryKey = 'id_pemeriksaan';
    public $timestamps = false;
    protected $fillable = [
        'id_perawat',
        'kode_tindakan',
        'kode_diagnosa',
        'id_pendaftaran',
        'tanggal_periksa_pasien',
        'sistole',
        'diastole',
        'suhu',
        'tb_pasien',
        'bb_pasien',
        'rr_pasien',
        'spo2',
        'diagnosa',
        'subjektif',
        'pemeriksaan_fisik',
        'kunjungan_sakit',
        'rencana_kontrol',
        'catatan_obat',
        'assesment',
        'bagian_diperiksa',
        'keterangan',
        'foto_fisik',
        'alasan_kontrol',
        'plan'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }

    public function icd9Umum()
    {
        return $this->hasMany(ICD9_Umum::class, 'id_pemeriksaan', 'id_pemeriksaan');
    }

    public function SuratSehat()
    {
        return $this->hasOne(SuratSehat::class, 'id_pemeriksaan', 'id_pemeriksaan');
    }

    public function SuratSakit()
    {
        return $this->hasOne(SuratSakit::class, 'id_pemeriksaan', 'id_pemeriksaan');
    }
}

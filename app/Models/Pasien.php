<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasiens';
    protected $fillable = [
        'nama',
        'usia',
        'no_jamkes',
        'nama_penanggung_jawab',
        'created_at',
        'updated_at'
    ];

    public function kondisi() {
        return $this->hasOne(KondisiPasien::class, 'pasien_id', 'id');
    }

    public function detail () {
        return $this->hasOne(DetailKondisi::class, 'pasien_id', 'id');
    }

    public function layanan () {
        return $this->hasMany(LayananUGD::class, 'pasien_id', 'id');
    }

    public function pengkajianRisiko () {
        return $this->hasOne(PengkajianRisikoDewasa::class, 'pasien_id', 'id');
    }

    public function adl () {
        return $this->hasOne(AdlUgd::class, 'pasien_id', 'id');
    }

    public function icd () {
        return $this->hasMany(IcdUgd::class, 'pasien_id', 'id');
    }

    public function obat () {
        return $this->hasMany(ObatUGD::class, 'pasien_id', 'id');
    }

    public function rencanaKontrol () {
        return $this->hasMany(RencanaKontrolUGD::class, 'pasien_id', 'id');
    }
}

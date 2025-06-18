<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    use HasFactory;

    protected $table = 'data_pasien';

    protected $primaryKey = 'no_rm';

    protected $guarded = ['no_rm'];

    protected $casts = [
        'no_rm' => 'string',
    ];

    public function wali_pasien()
    {
        return $this->hasOne(WaliPasien::class, 'no_rm', 'no_rm');
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'no_rm', 'no_rm');
    }

    public function provinsi()
    {
        return $this->belongsTo(\Laravolt\Indonesia\Models\Province::class, 'id_provinsi');
    }

    public function kota()
    {
        return $this->belongsTo(\Laravolt\Indonesia\Models\City::class, 'id_kota');
    }

    public function kecamatan()
    {
        return $this->belongsTo(\Laravolt\Indonesia\Models\District::class, 'id_kecamatan');
    }

    public function desa()
    {
        return $this->belongsTo(\Laravolt\Indonesia\Models\Village::class, 'id_desa');
    }
}

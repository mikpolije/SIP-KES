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

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = [];

    protected $fillable = [
        'no_rm',
        'nik_pasien',
        'nama_pasien',
        'tempat_lahir_pasien',
        'tanggal_lahir_pasien',
        'jenis_kelamin',
        'agama',
        'pendidikan_pasien',
        'pekerjaan_pasien',
        'alamat_pasien',
        'rt',
        'rw',
        'no_telepon_pasien',
        'status_perkawinan',
        'kewarganegaraan',
        'gol_darah',
        'nama_ibu_kandung',
        'id_provinsi',
        'id_kota',
        'id_kecamatan',
        'id_desa',
        'kode_pos',
    ];

    protected $casts = [
        'no_rm' => 'string',
    ];

    public function wali()
    {
        return $this->hasOne(WaliPasien::class, 'no_rm', 'no_rm')->latestOfMany();
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

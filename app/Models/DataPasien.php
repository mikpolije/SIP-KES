<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    use HasFactory;

    protected $table = 'data_pasien';
    protected $primaryKey = 'no_rm';

    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = ['no_rm'];

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


    public function wali()
    {
        return $this->hasOne(WaliPasien::class, 'no_rm', 'no_rm')->latest();
    }

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'no_rm', 'no_rm');
    }

    public function provinsi()
    {
        return $this->belongsTo(Provinsi::class, 'id_provinsi', 'id');
    }

    public function kota()
    {
        return $this->belongsTo(Kabupaten::class, 'id_kota', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan', 'id');
    }

    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa', 'id');
    }

    public function getTahunLahirAttribute()
    {
        return \Carbon\Carbon::parse($this->tanggal_lahir)->year;
    }

    public function getBulanLahirAttribute()
    {
        return \Carbon\Carbon::parse($this->tanggal_lahir)->month;
    }

    public function getHariLahirAttribute()
    {
        return \Carbon\Carbon::parse($this->tanggal_lahir)->day;
    }
}

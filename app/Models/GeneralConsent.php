<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralConsent extends Model
{
    use HasFactory;

    protected $table = 'general_consent';

    protected $fillable = [
        'no_rm',
        'nik',
        'jenisKelamin',
        'namaPasien',
        'tanggalLahir',
        'namaWali',
        'tanggalLahirWali',
        'hubungan',
        'alamat',
        'notelp',
        'beri',
        'ijin',
        'penanggungJawab1',
        'penanggungJawab2',
        'penanggungJawab3',
        'penanggungJawab4',
        'namaPenanggungJawab',
        'namaPemberiInformasi',
        'ttdPenanggungJawab',
        'ttdPemberiInformasi',
    ];


    protected $casts = [
        'tanggalLahir' => 'date',
        'tanggalLahirWali' => 'date',
        'nik' => 'string',
        'notelp' => 'string',
    ];
}
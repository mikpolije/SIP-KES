<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class generalConsent extends Model
{
    use HasFactory;

    protected $table = 'general_consent';

    protected $fillable = [
        'noRm',
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
    ];

    protected $casts = [
        'tanggalLahir' => 'date',
        'tanggalLahirWali' => 'date',
        'nik' => 'string',
        'notelp' => 'string',
    ];
}

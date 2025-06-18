<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralConsentRanap extends Model
{
    use HasFactory;

    protected $table = 'general_consent_rawat_inap';

    protected $guarded = ['id'];

    protected $casts = [
        'isTahuHak' => 'boolean',
        'isSetujuAturan' => 'boolean',
        'isSetujuPerawatan' => 'boolean',
        'isPahamPrivasi' => 'boolean',
        'isBukaInfoAsuransi' => 'boolean',
        'isIzinkanKeluarga' => 'boolean',
        'isPahamPenolakan' => 'boolean',
        'isPahamSiswa' => 'boolean',
        'isBeriWewenang' => 'boolean',
        'isBeriAkses' => 'boolean',
        'tanggal_lahir_pasien' => 'date',
        'tanggal_lahir_wali' => 'date'
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}

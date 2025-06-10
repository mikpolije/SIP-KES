<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKematian extends Model
{
    use HasFactory;

    protected $table = 'surat_kematian';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function data_pasien()
    {
        return $this->belongsTo(DataPasien::class, 'no_rm', 'no_rm');
    }

    public function icd10()
    {
        return $this->belongsTo(ICD::class, 'id_icd');
    }
}

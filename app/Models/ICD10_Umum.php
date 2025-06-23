<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ICD10_Umum extends Model
{
    protected $table = 'icd10_umum';
    // public $timestamps = false;
    protected $primaryKey = 'id_icd10_umum';
    protected $fillable = ['id_icd10', 'id_pemeriksaan'];

    public function pemeriksaan()
    {
        return $this->belongsTo(PemeriksaanAwal::class, 'id_pemeriksaan', 'id_pemeriksaan');
    }
}

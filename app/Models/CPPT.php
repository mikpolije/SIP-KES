<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPPT extends Model
{
    use HasFactory;

    protected $table = 'cppt';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function icd10()
    {
        return $this->belongsTo(Diagnosa::class, 'id_icd10');
    }

    public function icd9()
    {
        return $this->belongsTo(Tindakan::class, 'id_icd9');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}

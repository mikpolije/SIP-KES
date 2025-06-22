<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ICD9_Umum extends Model
{
    protected $table = 'icd9_umum';
    public $timestamps = false;
    protected $primaryKey = 'id_icd9_umum';
    protected $fillable = ['id_icd9', 'id_pemeriksaan'];

     public function icd9()
    {
        return $this->belongsTo(Icd9::class, 'id_icd9', 'id');
    }
}

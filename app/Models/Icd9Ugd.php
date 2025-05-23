<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icd9Ugd extends Model
{
    protected $table = 'icd9_ugds';
    protected $fillable = [
        'pasien_id',
        'icd9_id',
        'created_at',
        'updated_at',
    ];

    public function icd9 () 
    {
        return $this->belongsTo(ICD::class, 'icd9_id', 'id');
    }
}

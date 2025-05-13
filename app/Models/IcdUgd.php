<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IcdUgd extends Model
{
    protected $table = 'icd_ugds';

    protected $fillable = [
        'pasien_id',
        'icd_id',
        'created_at',
        'updated_at',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    public function icd()
    {
        return $this->belongsTo(ICD::class, 'icd_id', 'id');
    }
}

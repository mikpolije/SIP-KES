<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdlUgd extends Model
{
    protected $table = 'adl_ugds';
    protected $fillable = [
        'pasien_id',
        'makan',
        'berpindah',
        'kebersihan_diri',
        'aktiivitas_di_toilet',
        'mandi',
        'berjalan_di_datar',
        'naik_turun_tangga',
        'berpakaian',
        'mengontrol_bab',
        'mengontrol_bak',
        'created_at',
        'updated_at'
    ];

    public function pasien ()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiAdlUgd extends Model
{
    protected $table = 'transaksi_adl_ugd';

    protected $fillable = [
        'triase_id',
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
        'updated_at',
    ];

    public function triase()
    {
        return $this->belongsTo(Triase::class, 'triase_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiIcdUgd extends Model
{
    protected $table = 'transaksi_icd_ugd';

    protected $fillable = [
        'triase_id',
        'icd_id',
        'created_at',
        'updated_at',
    ];

    public function triase()
    {
        return $this->belongsTo(Triase::class, 'triase_id', 'id');
    }

    public function icd()
    {
        return $this->belongsTo(ICD::class, 'icd_id', 'id');
    }
}

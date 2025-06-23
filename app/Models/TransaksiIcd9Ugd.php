<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiIcd9Ugd extends Model
{
    protected $table = 'transaksi_icd9_ugd';
    protected $fillable = [
        'triase_id',
        'icd9_id',
        'created_at',
        'updated_at',
    ];

    public function triase ()
    {
        return $this->belongsTo(Triase::class, 'triase_id', 'id');
    }

    public function icd9 () 
    {
        return $this->belongsTo(Icd9::class, 'icd9_id', 'id');
    }
}

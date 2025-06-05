<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiLayananUgd extends Model
{
    protected $table = 'transaksi_layanan_ugd';

    protected $fillable = [
        'triase_id',
        'layanan_id',
        'created_at',
        'updated_at',
    ];

    public function triase()
    {
        return $this->belongsTo(Triase::class, 'triase_id', 'id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id');
    }
}

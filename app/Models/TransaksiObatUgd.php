<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiObatUgd extends Model
{
    protected $table = 'transaksi_obat_ugd';

    protected $fillable = [
        'triase_id',
        'obat_id',
        'created_at',
        'updated_at',
    ];

    public function triase ()
    {
        return $this->belongsTo(Triase::class, 'triase_id', 'id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'obat_id', 'id');
    }
}

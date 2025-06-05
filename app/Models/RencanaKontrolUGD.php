<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RencanaKontrolUGD extends Model
{
    protected $table = 'rencana_kontrol_ugds';

    protected $fillable = [
        'triase_id',
        'tanggal',
        'alasan',
        'created_at',
        'updated_at',
    ];

    public function triase()
    {
        return $this->belongsTo(Triase::class, 'triase_id', 'id');
    }
}

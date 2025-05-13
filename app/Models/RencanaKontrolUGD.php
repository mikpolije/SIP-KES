<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RencanaKontrolUGD extends Model
{
    protected $table = 'rencana_kontrol_ugds';
    protected $fillable = [
        'pasien_id',
        'tanggal',
        'alasan',
        'created_at',
        'updated_at'
    ];

    public function pasien () 
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }
}

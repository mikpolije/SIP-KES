<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LayananUGD extends Model
{
    protected $table = 'layanan_ugds';

    protected $fillable = [
        'pasien_id',
        'layanan_id',
        'created_at',
        'updated_at',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    public function layanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id', 'id');
    }
}

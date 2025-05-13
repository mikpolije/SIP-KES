<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObatUGD extends Model
{
    protected $table = 'obat_ugds';

    protected $fillable = [
        'pasien_id',
        'obat_id',
        'created_at',
        'updated_at',
    ];

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'pasien_id', 'id');
    }

    public function obat()
    {
        return $this->belongsTo(Obats::class, 'obat_id', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $table = 'layanans';
    protected $fillable = [
        'nama_layanan',
        'tarif_layanan',
        'created_at',
        'updated_at'
    ];
}

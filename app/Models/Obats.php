<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    protected $table = 'obats';
    protected $fillable = [
        'nama',
        'harga',
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    protected $table = 'villages';
    protected $guarded = ['id'];

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}

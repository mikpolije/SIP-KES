<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'districts';

    protected $guarded = ['id'];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Icd9 extends Model
{
    protected $table = 'icd9';
    public $timestamps = false;
    protected $primaryKey = 'id';

    public function icd9Umum()
    {
        return $this->hasMany(Icd9_Umum::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPasien extends Model
{
    use HasFactory;

    protected $table = 'data_pasien';

    protected $primaryKey = 'no_rm';

    protected $guarded = ['no_rm'];

    public function waliPasien()
    {
        return $this->hasMany(WaliPasien::class, 'no_rm', 'no_rm');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratSehat extends Model
{
    protected $table = 'surat_keterangan_sehat';
    protected $guarded = ['id'];
    public $timestamps = false;
}

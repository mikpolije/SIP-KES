<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKontrol extends Model
{
    use HasFactory;

    protected $table = 'surat_kontrol';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}

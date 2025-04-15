<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananKia extends Model
{
    use HasFactory;

    protected $table = 'layanan_kia';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

}

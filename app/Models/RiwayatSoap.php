<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSoap extends Model
{
    use HasFactory;

    protected $table = 'riwayat_soap';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}

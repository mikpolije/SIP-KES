<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WaliPasien extends Model
{
    use HasFactory;

    protected $table = 'wali_pasien';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}

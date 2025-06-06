<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diagnosa extends Model
{
    protected $table = 'icd10';

    protected $primaryKey = 'id';

    protected $guarded = ['code', 'display', 'version'];
}

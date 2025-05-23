<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tindakan extends Model
{
    protected $table = 'icd9';

    protected $primaryKey = 'id';

    protected $guarded = ['code', 'display', 'version'];
}

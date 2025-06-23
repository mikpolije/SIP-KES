<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirPersalinan extends Model
{
    use HasFactory;

    protected $table = 'formulir_persalinan';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}

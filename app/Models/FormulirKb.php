<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirKb extends Model
{
    use HasFactory;

    protected $table = 'formulir_kb';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirAnak extends Model
{
    use HasFactory;

    protected $table = 'formulir_anak';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}

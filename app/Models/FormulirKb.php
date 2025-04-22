<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirKb extends Model
{
    use HasFactory;

    protected $table = 'transaksi_program_kb';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}

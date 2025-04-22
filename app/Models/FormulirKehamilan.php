<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormulirKehamilan extends Model
{
    use HasFactory;

    protected $table = 'transaksi_p_kehamilan';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];
}

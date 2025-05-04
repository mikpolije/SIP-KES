<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dokter extends Model
{
    use SoftDeletes, HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];
    protected $table = 'dokter';
}

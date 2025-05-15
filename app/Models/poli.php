<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poli extends Model
{
    use HasFactory;

    // Jika menggunakan 'id_layanan' sebagai primary key
    protected $primaryKey = 'id_layanan';

    // Tipe primary key (default: int)
    protected $keyType = 'int';

    // Kolom yang boleh diisi (mass assignment)
    protected $fillable = [
        'nama_layanan',
    ];
}

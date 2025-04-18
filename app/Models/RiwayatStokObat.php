<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatStokObat extends Model
{
    use HasFactory;

    protected $table = 'riwayat_stok_obat';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }
}

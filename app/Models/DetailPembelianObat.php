<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPembelianObat extends Model
{
    use HasFactory;

    protected $table = 'detail_pembelian_obat';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function pembelian_obat()
    {
        return $this->belongsTo(PembelianObat::class, 'id_pembelian_obat', 'id');
    }

    public function obat()
    {
        return $this->belongsTo(Obat::class, 'id_obat', 'id');
    }
}

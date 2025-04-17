<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianObat extends Model
{
    use HasFactory;

    protected $table = 'pembelian_obat';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function detail_pembelian_obat()
    {
        return $this->hasMany(DetailPembelianObat::class, 'id_pembelian_obat', 'id');
    }
}

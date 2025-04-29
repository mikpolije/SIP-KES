<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Racikan extends Model
{
    use HasFactory;

    protected $table = 'racikan';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function pengambilan_obat()
    {
        return $this->belongsTo(PengambilanObat::class, 'id_pengambilan_obat', 'id');
    }

    public function detail_pembelian_obat()
    {
        return $this->belongsTo(DetailPembelianObat::class, 'id_detail_pembelian_obat', 'id');
    }
}

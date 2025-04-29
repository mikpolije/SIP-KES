<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengambilanObat extends Model
{
    use HasFactory;

    protected $table = 'detail_pengambilan_obat';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function detail_pembelian_obat()
    {
        return $this->belongsTo(DetailPembelianObat::class, 'id_detail_pembelian_obat');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obat extends Model
{
    use HasFactory;

    protected $table = 'obat';

    protected $primaryKey = 'id_obat';

    protected $guarded = ['id_obat'];

    public function detail_pembelian_obat()
    {
        return $this->hasMany(DetailPembelianObat::class, 'id_obat', 'id_obat');
    }
}

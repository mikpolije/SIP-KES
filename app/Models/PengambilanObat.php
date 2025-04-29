<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengambilanObat extends Model
{
    use HasFactory;

    protected $table = 'pengambilan_obat';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function detail_pengambilan_obat()
    {
        return $this->hasMany(DetailPengambilanObat::class, 'id_pengambilan_obat', 'id');
    }

    public function racikan()
    {
        return $this->hasMany(Racikan::class, 'id_pengambilan_obat', 'id');
    }
}

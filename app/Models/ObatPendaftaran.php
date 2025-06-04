<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObatPendaftaran extends Model
{
    protected $table = 'obat_pendaftaran';

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function (ObatPendaftaran $model) {
            $model->harga = $model->obat->tarif_layanan;
        });
    }

    public function obat() {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}

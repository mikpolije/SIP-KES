<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ObatPendaftaran extends Model
{
    protected $table = 'obat_pendaftaran';

    protected $guarded = ['id'];


    public function obat() {
        return $this->belongsTo(Obat::class, 'id_obat');
    }
}

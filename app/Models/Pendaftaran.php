<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $table = 'pendaftaran';

    protected $primaryKey = 'id_pendaftaran';

    protected $guarded = ['id_pendaftaran'];

    public function data_pasien()
    {
        return $this->belongsTo(DataPasien::class, 'no_rm', 'no_rm');
    }

    public function layanan_kia()
    {
        return $this->hasOne(LayananKia::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}

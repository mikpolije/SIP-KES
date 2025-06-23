<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratSakit extends Model
{
    use HasFactory;

    protected $table = 'surat_sakit';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function pemeriksaan()
    {
        return $this->belongsTo(PemeriksaanAwal::class, 'id_pemeriksaan', 'id_pemeriksaan');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}

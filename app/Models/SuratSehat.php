<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratSehat extends Model
{
    protected $table = 'surat_keterangan_sehat';
    protected $guarded = ['id'];
    public $timestamps = false;
    protected $fillable = ['id_pemeriksaan', 'nomor_surat', 'hasil', 'dipergunakan_untuk'];

    public function pemeriksaan()
    {
        return $this->belongsTo(PemeriksaanAwal::class, 'id_pemeriksaan', 'id_pemeriksaan');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}

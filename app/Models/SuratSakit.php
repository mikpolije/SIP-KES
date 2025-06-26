<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratSakit extends Model
{
    use HasFactory;

    protected $table = 'surat_keterangan_sakit';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $guarded = ['id'];
    protected $fillable = ['id_pemeriksaan', 'nomor_surat', 'hari', 'tanggal_awal', 'tanggal_akhir'];

    public function pemeriksaan()
    {
        return $this->belongsTo(PemeriksaanAwal::class, 'id_pemeriksaan', 'id_pemeriksaan');
    }

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}

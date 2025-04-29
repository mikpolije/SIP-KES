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

    protected $appends = ['layanan_terisi'];

    public function data_pasien()
    {
        return $this->belongsTo(DataPasien::class, 'no_rm', 'no_rm');
    }

    public function layanan_kia()
    {
        return $this->hasOne(LayananKia::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function formulirKb()
    {
        return $this->hasOne(FormulirKb::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function formulirPersalinan()
    {
        return $this->hasOne(FormulirPersalinan::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function formulirAnak()
    {
        return $this->hasOne(FormulirAnak::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function formulirKehamilan()
    {
        return $this->hasOne(FormulirKehamilan::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function pengambilan_obat()
    {
        return $this->hasOne(PengambilanObat::class, 'id_pendaftaran', 'id_pendaftaran');
    }

    public function getLayananTerisiAttribute()
    {
        if (!$this->relationLoaded('layanan_kia')) {
            $this->load('layanan_kia');
        }

        $jenis_layanan = $this->layanan_kia->jenis_pemeriksaan ?? null;

        return match ($jenis_layanan) {
            'KB' => $this->formulirKb !== null,
            'Kehamilan' => $this->formulirKehamilan !== null,
            'Persalinan' => $this->formulirPersalinan !== null,
            'Anak' => $this->formulirAnak !== null,
            default => false,
        };
    }

}

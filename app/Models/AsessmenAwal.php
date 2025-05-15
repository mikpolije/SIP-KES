<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AsessmenAwal extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'asessmen_awal';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pendaftaran_id',
        'denyut_jantung',
        'pernafasan',
        'suhu_tubuh',
        'tekanan_darah_sistole',
        'tekanan_darah_diastole',
        'skala_nyeri',
        'keluhan_utama',
        'riwayat_penyakit',
        'riwayat_pengobatan',
        'status_psikologi',
        'metadata',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'metadata' => 'json',
    ];

    /**
     * Get the pendaftaran record associated with the asessmen awal.
     */
    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'pendaftaran_id');
    }

    /**
     * Get the alergi status from metadata.
     */
    public function getAlergiAttribute()
    {
        $metadata = json_decode($this->metadata, true) ?? [];
        return $metadata['alergi'] ?? 'tidak';
    }

    /**
     * Get the jenis alergi from metadata.
     */
    public function getJenisAlergiAttribute()
    {
        $metadata = json_decode($this->metadata, true) ?? [];
        return $metadata['jenis_alergi'] ?? '';
    }

    /**
     * Get formatted status psikologi as an array.
     */
    public function getStatusPsikologiArrayAttribute()
    {
        if (empty($this->status_psikologi)) {
            return [];
        }

        return explode(',', $this->status_psikologi);
    }
}

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
        'id_pendaftaran',
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
    ];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}

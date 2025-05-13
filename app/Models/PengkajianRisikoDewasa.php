<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengkajianRisikoDewasa extends Model
{
    protected $table = 'pengkajian_risiko_dewasas';
    protected $fillable = [
        'pasien_id',
        'riwayat_jatuh',
        'diagnostik_sekunder',
        'alat_bantu',
        'terpasang_infuse',
        'gaya_berjalan',
        'status_mental',
        'created_at',
        'updated_at'
    ];
}

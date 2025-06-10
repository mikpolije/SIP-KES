<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransaksiPengkajianRisikoDewasa extends Model
{
    protected $table = 'transaksi_pengkajian_risiko_dewasa_ugd';

    protected $fillable = [
        'triase_id',
        'riwayat_jatuh',
        'diagnostik_sekunder',
        'alat_bantu',
        'terpasang_infuse',
        'gaya_berjalan',
        'status_mental',
        'created_at',
        'updated_at',
    ];
}

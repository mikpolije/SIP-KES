<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LayananPendaftaran extends Model
{
    protected $table = 'layanan_pendaftaran';

    protected $guarded = ['id'];

    protected static function booted()
    {
        static::creating(function (LayananPendaftaran $model) {
            $model->harga = $model->layanan->tarif_layanan;
        });
    }

    public function layanan(): BelongsTo
    {
        return $this->belongsTo(Layanan::class, 'id_layanan', 'id');
    }

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}

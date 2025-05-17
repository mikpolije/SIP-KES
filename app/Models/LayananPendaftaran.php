<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class LayananPendaftaran extends Model
{
    protected $table = 'layanan_pendaftaran';

    protected $guarded = ['id'];

    public function layanan(): HasMany
    {
        return $this->hasMany(Layanan::class, 'id_layanan');
    }

    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class, 'id_layanan');
    }
}

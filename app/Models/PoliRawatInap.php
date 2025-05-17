<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliRawatInap extends Model
{
    use HasFactory;

    protected $table = 'poli_rawat_inap';

    protected $primaryKey = 'id_pendaftaran';

    protected $guarded = ['created_at'];

    public function informed_consent()
    {
        return $this->belongsTo(InformedConsent::class, 'id_informed_consent', 'id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayananKia extends Model
{
    use HasFactory;

    protected $table = 'poli_kia';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    protected $fillable = ['id_pendaftaran', 'jenis_pemeriksaan', 'no_rm'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeMedis extends Model
{
    use HasFactory;

    protected $table = 'resume_medis';
    protected $primaryKey = 'no';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_kontrol' => 'date',
    ];
    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}

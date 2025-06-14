<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResumeMedis extends Model
{
    use HasFactory;

    protected $table = 'resume_medis';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}

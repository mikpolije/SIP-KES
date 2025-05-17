<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CPPT extends Model
{
    use HasFactory;

    protected $table = 'cppt';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}

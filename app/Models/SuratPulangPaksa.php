<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratPulangPaksa extends Model
{
    use HasFactory;

    protected $table = 'surat_pulang_paksa';

    protected $primaryKey = 'id';

    protected $guarded = ['id'];

    public function data_pasien()
    {
        return $this->belongsTo(DataPasien::class, 'no_rm', 'no_rm');
    }
}

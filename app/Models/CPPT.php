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

    public function icd10()
    {
        $diagnosaIds = json_decode($this->id_icd10, true) ?? [];
        $diagnosaIds = collect($diagnosaIds)->flatten()->filter()->toArray();

        return Diagnosa::whereIn('id', $diagnosaIds);
    }

    public function icd9()
    {
        $tindakanIds = json_decode($this->id_icd9, true) ?? [];
        $tindakanIds = collect($tindakanIds)->flatten()->filter()->toArray();

        return Tindakan::whereIn('id', $tindakanIds);
    }

    public function obat()
    {
        $obatIds = json_decode($this->id_obat, true) ?? [];
        $obatIds = collect($obatIds)->flatten()->filter()->toArray();

        return Obat::whereIn('id_obat', $obatIds);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
    use HasFactory;

    protected $table = 'pemeriksaan';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
    protected $dates = ['tanggal_periksa_pasien'];

    public function pendaftaran()
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }
    public function index()
{
    $dataRiwayat = DB::table('pemeriksaan')
        ->select('no_rm', 'nama', 'nik', 'tanggal_periksa')
        ->get();

    return view('PoliUmum.riwayatPoliUmum', compact('dataRiwayat'));
}

}

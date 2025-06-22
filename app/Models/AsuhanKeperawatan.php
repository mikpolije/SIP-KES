<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsuhanKeperawatan extends Model
{
    protected $table = 'asuhan_keperawatan';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_pendaftaran',
        'alasan_masuk',
        'diagnosa_medis',
        'riwayat_penyakit',
        'sistole',
        'distole',
        'suhu',
        'nadi',
        'pernapasan',
        'pernapasan_lain',
        'berat_badan',
        'tinggi_badan',
        'lila',
        'bentuk_makanan',
        'minum',
        'kebutuhan_cairan_lain',
        'frekuensi_bak',
        'frekuensi_bak_jumlah',
        'frekuensi_bak_lain',
        'frekuensi_bab',
        'frekuensi_bab_warna',
        'frekuensi_bab_bau',
        'frekuensi_bab_konsistensi',
        'frekuensi_bab_terakhir',
        'gaya_berjalan_lain',
        'jumlah_tidur',
        'is_obat_tidur_note',
        'is_obat_tidur_dosis',
        'kebutuhan_aktifitas_lain',
        'kebutuhan_emosional_lain',
        'kebutuhan_penyuluhan_lain',
        'is_berbicara_note',
        'is_pembicaraan',
        'is_disorientasi_note',
        'kebutuhan_komunikasi_lain',
        'kegiatan_sehari_hari',
        'kegiatan_rumah_sakit',
        'pekerjaan',
        'resiko_jatuh_note',
        'tingkat_ketergantungan_note',
        'rontgen',
        'lab',
        'lain_lain',
        'berat_badan_naik',
        'is_sianosis',
        'is_nyeri_dada',
        'is_haus',
        'is_mukosa_mulut',
        'is_edema',
        'is_biasa_olahraga',
        'is_biasa_rom',
        'is_obat_tidur',
        'is_nyeri',
        'is_karaganda_turun',
        'is_pakai_alat_bantu',
        'is_wajah_tegang',
        'is_kontak_mata',
        'is_bingung',
        'is_perasaan_tidak_mampu',
        'is_perasaan_tidak_berharga',
        'is_kritik_diri',
        'is_pengetahuan_penyakit',
        'is_pengetahuan_makanan',
        'is_pengetahuan_obat',
        'is_penglihatan',
        'is_pendengaran',
        'is_penciuman',
        'is_pengecapan',
        'is_perabaan',
        'is_berbicara',
        'is_disorientasi',
        'is_menarik_diri',
        'is_apatis',
        'is_punya_asuransi_kesehatan',
        'can_mandi',
        'can_mandi_dibantu',
        'can_berpakaian',
        'can_berpakaian_dibantu',
        'can_makan',
        'can_makan_dibantu',
        'can_bab_bak',
        'can_bab_bak_dibantu',
        'can_transfering',
        'can_transfering_dibantu',
        'nafsu_makan',
        'turgor',
        'gaya_berjalan',
    ];

    /**
     * Get the pendaftaran that owns this asuhan keperawatan.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pendaftaran(): BelongsTo
    {
        return $this->belongsTo(Pendaftaran::class, 'id_pendaftaran', 'id_pendaftaran');
    }
}

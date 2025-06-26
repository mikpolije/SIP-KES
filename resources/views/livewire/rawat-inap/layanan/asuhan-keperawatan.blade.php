<?php

use App\Models\AsuhanKeperawatan;
use App\Models\Pendaftaran;
use Carbon\Carbon;
use Livewire\Volt\Component;

new class extends Component {
    public $pendaftaranId;
    public $pendaftaran;
    public $existingAskep;

    public $nama;
    public $noRM;
    public $lahirTahun;
    public $lahirBulan;
    public $lahirHari;
    public $tglDaftar;

    public $tanggal_lahir;

    public $alasanMasuk;
    public $diagnosaMedis;
    public $riwayatPenyakit;
    public $sistole;
    public $distole;
    public $suhu;
    public $nadi = '';
    public $pernapasan = '';
    public $pernapasan_lain = '';
    public $berat_badan = '';
    public $tinggi_badan = '';
    public $lila = '';
    public $bentuk_makanan = '';
    public $minum = '';
    public $kebutuhan_cairan_lain = '';
    public $frekuensi_bak = '';
    public $frekuensi_bak_jumlah = '';
    public $frekuensi_bak_lain = '';
    public $frekuensi_bab = '';
    public $frekuensi_bab_warna = '';
    public $frekuensi_bab_bau = '';
    public $frekuensi_bab_konsistensi = '';
    public $frekuensi_bab_terakhir = '';
    public $gaya_berjalan_lain = '';
    public $jumlah_tidur = '';
    public $is_obat_tidur_note = '';
    public $is_obat_tidur_dosis = '';
    public $kebutuhan_aktifitas_lain = '';
    public $kebutuhan_emosional_lain = '';
    public $kebutuhan_penyuluhan_lain = '';
    public $is_berbicara_note = '';
    public $is_pembicaraan = '';
    public $is_disorientasi_note = '';
    public $kebutuhan_komunikasi_lain = '';
    public $kegiatan_sehari_hari = '';
    public $kegiatan_rumah_sakit = '';
    public $pekerjaan = '';
    public $resiko_jatuh_note = '';
    public $tingkat_ketergantungan_note = '';
    public $rontgen = '';
    public $lab = '';
    public $lain_lain = '';
    public $berat_badan_naik = '';

    public $is_sianosis = false;
    public $is_nyeri_dada = false;
    public $is_haus = false;
    public $is_mukosa_mulut = false;
    public $is_edema = false;
    public $is_biasa_olahraga = false;
    public $is_biasa_rom = false;
    public $is_obat_tidur = false;
    public $is_nyeri = false;
    public $is_karaganda_turun = false;
    public $is_pakai_alat_bantu = false;
    public $is_wajah_tegang = false;
    public $is_kontak_mata = false;
    public $is_bingung = false;
    public $is_perasaan_tidak_mampu = false;
    public $is_perasaan_tidak_berharga = false;
    public $is_kritik_diri = false;
    public $is_pengetahuan_penyakit = false;
    public $is_pengetahuan_makanan = false;
    public $is_pengetahuan_obat = false;
    public $is_penglihatan = false;
    public $is_pendengaran = false;
    public $is_penciuman = false;
    public $is_pengecapan = false;
    public $is_perabaan = false;
    public $is_berbicara = false;
    public $is_disorientasi = false;
    public $is_menarik_diri = false;
    public $is_apatis = false;
    public $is_punya_asuransi_kesehatan = false;

    public $can_mandi = false;
    public $can_mandi_dibantu = '';
    public $can_berpakaian = false;
    public $can_berpakaian_dibantu = '';
    public $can_makan = false;
    public $can_makan_dibantu = '';
    public $can_bab_bak = false;
    public $can_bab_bak_dibantu = '';
    public $can_transfering = false;
    public $can_transfering_dibantu = '';

    public $nafsu_makan = '';
    public $turgor = '';
    public $gaya_berjalan = '';

    public $agama = '';

    public function getCurrentDateTime()
    {
        $now = \Carbon\Carbon::now('Asia/Jakarta');
        return [
            'tanggal' => $now->format('d/m/Y'),
            'jam' => $now->format('H:i')
        ];
    }

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
        $this->pendaftaran = Pendaftaran::where('id_pendaftaran', $pendaftaranId)->first();
        $this->existingAskep = AsuhanKeperawatan::where('id_pendaftaran', $pendaftaranId)->first();

        if ($this->pendaftaran) {
            $this->nama = $this->pendaftaran->data_pasien->nama_pasien;
            $this->noRM = $this->pendaftaran->data_pasien->no_rm;
            $this->tglDaftar = $this->pendaftaran->created_at->format('Y-m-d');
            $this->tanggal_lahir = $this->pendaftaran->data_pasien->tanggal_lahir_pasien;
            $this->agama = $this->pendaftaran->data_pasien->agama;

            $this->calculateAge();
        }

        if($this->existingAskep) {
            $this->alasanMasuk = $this->existingAskep->alasan_masuk;
            $this->diagnosaMedis = $this->existingAskep->diagnosa_medis;
            $this->riwayatPenyakit = $this->existingAskep->riwayat_penyakit;
            $this->sistole = $this->existingAskep->sistole;
            $this->distole = $this->existingAskep->distole;
            $this->suhu = $this->existingAskep->suhu;
            $this->nadi = $this->existingAskep->nadi;
            $this->pernapasan = $this->existingAskep->pernapasan;
            $this->pernapasan_lain = $this->existingAskep->pernapasan_lain;
            $this->berat_badan = $this->existingAskep->berat_badan;
            $this->tinggi_badan = $this->existingAskep->tinggi_badan;
            $this->lila = $this->existingAskep->lila;
            $this->bentuk_makanan = $this->existingAskep->bentuk_makanan;
            $this->berat_badan_naik = $this->existingAskep->berat_badan_naik;
            $this->minum = $this->existingAskep->minum;
            $this->kebutuhan_cairan_lain = $this->existingAskep->kebutuhan_cairan_lain;

            $this->frekuensi_bab = $this->existingAskep->frekuensi_bab;
            $this->frekuensi_bab_bau = $this->existingAskep->frekuensi_bab_bau;
            $this->frekuensi_bab_konsistensi = $this->existingAskep->frekuensi_bab_konsistensi;
            $this->frekuensi_bab_terakhir = $this->existingAskep->frekuensi_bab_terakhir;
            $this->frekuensi_bab_warna = $this->existingAskep->frekuensi_bab_warna;

            $this->frekuensi_bak = $this->existingAskep->frekuensi_bak;
            $this->frekuensi_bak_jumlah = $this->existingAskep->frekuensi_bak_jumlah;
            $this->frekuensi_bak_lain = $this->existingAskep->frekuensi_bak_lain;

            $this->gaya_berjalan_lain = $this->existingAskep->gaya_berjalan_lain;
            $this->jumlah_tidur = $this->existingAskep->jumlah_tidur;
            $this->is_obat_tidur_note = $this->existingAskep->is_obat_tidur_note;
            $this->is_obat_tidur_dosis = $this->existingAskep->is_obat_tidur_dosis;
            $this->kebutuhan_aktifitas_lain = $this->existingAskep->kebutuhan_aktifitas_lain;
            $this->kebutuhan_emosional_lain = $this->existingAskep->kebutuhan_emosional_lain;
            $this->kebutuhan_penyuluhan_lain = $this->existingAskep->kebutuhan_penyuluhan_lain;
            $this->is_berbicara_note = $this->existingAskep->is_berbicara_note;
            $this->is_pembicaraan = $this->existingAskep->is_pembicaraan;
            $this->is_disorientasi_note = $this->existingAskep->is_disorientasi_note;
            $this->kebutuhan_komunikasi_lain = $this->existingAskep->kebutuhan_komunikasi_lain;
            $this->kegiatan_sehari_hari = $this->existingAskep->kegiatan_sehari_hari;
            $this->kegiatan_rumah_sakit = $this->existingAskep->kegiatan_rumah_sakit;
            $this->pekerjaan = $this->existingAskep->pekerjaan;
            $this->resiko_jatuh_note = $this->existingAskep->resiko_jatuh_note;
            $this->tingkat_ketergantungan_note = $this->existingAskep->tingkat_ketergantungan_note;
            $this->rontgen = $this->existingAskep->rontgen;
            $this->lab = $this->existingAskep->lab;
            $this->lain_lain = $this->existingAskep->lain_lain;

            $this->is_sianosis = $this->existingAskep->is_sianosis;
            $this->is_nyeri_dada = $this->existingAskep->is_nyeri_dada;
            $this->is_haus = $this->existingAskep->is_haus;
            $this->is_mukosa_mulut = $this->existingAskep->is_mukosa_mulut;
            $this->is_edema = $this->existingAskep->is_edema;
            $this->is_biasa_olahraga = $this->existingAskep->is_biasa_olahraga;
            $this->is_biasa_rom = $this->existingAskep->is_biasa_rom;
            $this->is_obat_tidur = $this->existingAskep->is_obat_tidur;
            $this->is_nyeri = $this->existingAskep->is_nyeri;
            $this->is_karaganda_turun = $this->existingAskep->is_karaganda_turun;
            $this->is_pakai_alat_bantu = $this->existingAskep->is_pakai_alat_bantu;
            $this->is_wajah_tegang = $this->existingAskep->is_wajah_tegang;
            $this->is_kontak_mata = $this->existingAskep->is_kontak_mata;
            $this->is_bingung = $this->existingAskep->is_bingung;
            $this->is_perasaan_tidak_mampu = $this->existingAskep->is_perasaan_tidak_mampu;
            $this->is_perasaan_tidak_berharga = $this->existingAskep->is_perasaan_tidak_berharga;
            $this->is_kritik_diri = $this->existingAskep->is_kritik_diri;
            $this->is_pengetahuan_penyakit = $this->existingAskep->is_pengetahuan_penyakit;
            $this->is_pengetahuan_makanan = $this->existingAskep->is_pengetahuan_makanan;
            $this->is_pengetahuan_obat = $this->existingAskep->is_pengetahuan_obat;
            $this->is_penglihatan = $this->existingAskep->is_penglihatan;
            $this->is_pendengaran = $this->existingAskep->is_pendengaran;
            $this->is_penciuman = $this->existingAskep->is_penciuman;
            $this->is_pengecapan = $this->existingAskep->is_pengecapan;
            $this->is_perabaan = $this->existingAskep->is_perabaan;
            $this->is_berbicara = $this->existingAskep->is_berbicara;
            $this->is_disorientasi = $this->existingAskep->is_disorientasi;
            $this->is_menarik_diri = $this->existingAskep->is_menarik_diri;
            $this->is_apatis = $this->existingAskep->is_apatis;
            $this->is_punya_asuransi_kesehatan = $this->existingAskep->is_punya_asuransi_kesehatan;

            $this->can_mandi = $this->existingAskep->can_mandi;
            $this->can_mandi_dibantu = $this->existingAskep->can_mandi_dibantu;
            $this->can_berpakaian = $this->existingAskep->can_berpakaian;
            $this->can_berpakaian_dibantu = $this->existingAskep->can_berpakaian_dibantu;
            $this->can_makan = $this->existingAskep->can_makan;
            $this->can_makan_dibantu = $this->existingAskep->can_makan_dibantu;
            $this->can_bab_bak = $this->existingAskep->can_bab_bak;
            $this->can_bab_bak_dibantu = $this->existingAskep->can_bab_bak_dibantu;
            $this->can_transfering = $this->existingAskep->can_transfering;
            $this->can_transfering_dibantu = $this->existingAskep->can_transfering_dibantu;

            $this->nafsu_makan = $this->existingAskep->nafsu_makan;
            $this->turgor = $this->existingAskep->turgor;
            $this->gaya_berjalan = $this->existingAskep->gaya_berjalan;
        }
    }

    public function calculateAge()
    {
        if ($this->tanggal_lahir) {
            $birthday = Carbon::parse($this->tanggal_lahir);
            $now = Carbon::now();
            $diff = $now->diff($birthday);

            $this->lahirTahun = $diff->y;
            $this->lahirBulan = $diff->m;
            $this->lahirHari = $diff->d;
        }
    }

    public function submit()
    {
        $requiredFields = [
            'alasanMasuk' => 'Alasan Masuk',
            'diagnosaMedis' => 'Diagnosa Medis',
            'riwayatPenyakit' => 'Riwayat Penyakit',
            'sistole' => 'Sistole',
            'distole' => 'Distole',
            'suhu' => 'Suhu',
            'nadi' => 'Nadi',
            'pernapasan' => 'Pernapasan',
            'berat_badan' => 'Berat Badan',
            'tinggi_badan' => 'Tinggi Badan',
            'lila' => 'LILA',
            'bentuk_makanan' => 'Bentuk Makanan',
            'minum' => 'Minum',
            'frekuensi_bak' => 'Frekuensi BAK',
            'frekuensi_bab' => 'Frekuensi BAB',
            'frekuensi_bab_warna' => 'Warna BAB',
            'frekuensi_bab_bau' => 'Bau BAB',
            'frekuensi_bab_konsistensi' => 'Konsistensi BAB',
            'frekuensi_bab_terakhir' => 'BAB Terakhir',
            'jumlah_tidur' => 'Jumlah Tidur',
            'kegiatan_sehari_hari' => 'Kegiatan Sehari-hari',
            'kegiatan_rumah_sakit' => 'Kegiatan Rumah Sakit',
            'pekerjaan' => 'Pekerjaan',
            'nafsu_makan' => 'Nafsu Makan',
            'turgor' => 'Turgor',
            'gaya_berjalan' => 'Gaya Berjalan',
        ];

        $emptyFields = [];
        foreach ($requiredFields as $field => $label) {
            if (empty($this->$field) || $this->$field === '' || $this->$field === null) {
                $emptyFields[] = $label;
            }
        }

        if ($this->is_obat_tidur && (empty($this->is_obat_tidur_note) || empty($this->is_obat_tidur_dosis))) {
            if (empty($this->is_obat_tidur_note)) $emptyFields[] = 'Catatan Obat Tidur';
            if (empty($this->is_obat_tidur_dosis)) $emptyFields[] = 'Dosis Obat Tidur';
        }

        if ($this->is_berbicara && empty($this->is_berbicara_note)) {
            $emptyFields[] = 'Catatan Berbicara';
        }

        if ($this->is_disorientasi && empty($this->is_disorientasi_note)) {
            $emptyFields[] = 'Catatan Disorientasi';
        }

        $adlFields = [
            'can_mandi_dibantu' => 'Bantuan Mandi',
            'can_berpakaian_dibantu' => 'Bantuan Berpakaian',
            'can_makan_dibantu' => 'Bantuan Makan',
            'can_bab_bak_dibantu' => 'Bantuan BAB/BAK',
            'can_transfering_dibantu' => 'Bantuan Transfer',
        ];

        foreach ($adlFields as $field => $label) {
            if (empty($this->$field) || $this->$field === '') {
                $emptyFields[] = $label;
            }
        }

        if (!empty($emptyFields)) {
            flash()->error('Anda harus mengisi semua field yang diperlukan: ' . implode(', ', $emptyFields));
            return;
        }

        $numericFields = [
            'sistole' => 'Sistole',
            'distole' => 'Distole',
            'suhu' => 'Suhu',
            'nadi' => 'Nadi',
            'pernapasan' => 'Pernapasan',
            'berat_badan' => 'Berat Badan',
            'tinggi_badan' => 'Tinggi Badan',
            'lila' => 'LILA',
            'jumlah_tidur' => 'Jumlah Tidur',
        ];

        $invalidNumeric = [];
        foreach ($numericFields as $field => $label) {
            if (!is_numeric($this->$field)) {
                $invalidNumeric[] = $label;
            }
        }

        if (!empty($invalidNumeric)) {
            flash()->error('Field berikut harus berupa angka: ' . implode(', ', $invalidNumeric));
            return;
        }

        $data = [
            'alasan_masuk' => $this->alasanMasuk,
            'diagnosa_medis' => $this->diagnosaMedis,
            'riwayat_penyakit' => $this->riwayatPenyakit,
            'sistole' => $this->sistole,
            'distole' => $this->distole,
            'suhu' => $this->suhu,
            'nadi' => $this->nadi,
            'pernapasan' => $this->pernapasan,
            'pernapasan_lain' => $this->pernapasan_lain ?? '',
            'berat_badan' => $this->berat_badan,
            'tinggi_badan' => $this->tinggi_badan,
            'lila' => $this->lila,
            'bentuk_makanan' => $this->bentuk_makanan,
            'minum' => $this->minum,
            'kebutuhan_cairan_lain' => $this->kebutuhan_cairan_lain ?? '',
            'frekuensi_bak' => $this->frekuensi_bak,
            'frekuensi_bak_jumlah' => $this->frekuensi_bak_jumlah ?? '',
            'frekuensi_bak_lain' => $this->frekuensi_bak_lain ?? '',
            'frekuensi_bab' => $this->frekuensi_bab,
            'frekuensi_bab_warna' => $this->frekuensi_bab_warna,
            'frekuensi_bab_bau' => $this->frekuensi_bab_bau,
            'frekuensi_bab_konsistensi' => $this->frekuensi_bab_konsistensi,
            'frekuensi_bab_terakhir' => $this->frekuensi_bab_terakhir,
            'gaya_berjalan_lain' => $this->gaya_berjalan_lain ?? '',
            'jumlah_tidur' => $this->jumlah_tidur,
            'is_obat_tidur_note' => $this->is_obat_tidur_note ?? '',
            'is_obat_tidur_dosis' => $this->is_obat_tidur_dosis ?? '',
            'kebutuhan_aktifitas_lain' => $this->kebutuhan_aktifitas_lain ?? '',
            'kebutuhan_emosional_lain' => $this->kebutuhan_emosional_lain ?? '',
            'kebutuhan_penyuluhan_lain' => $this->kebutuhan_penyuluhan_lain ?? '',
            'is_berbicara_note' => $this->is_berbicara_note ?? '',
            'is_pembicaraan' => $this->is_pembicaraan ?? '',
            'is_disorientasi_note' => $this->is_disorientasi_note ?? '',
            'kebutuhan_komunikasi_lain' => $this->kebutuhan_komunikasi_lain ?? '',
            'kegiatan_sehari_hari' => $this->kegiatan_sehari_hari,
            'kegiatan_rumah_sakit' => $this->kegiatan_rumah_sakit,
            'pekerjaan' => $this->pekerjaan,
            'resiko_jatuh_note' => $this->resiko_jatuh_note ?? '',
            'tingkat_ketergantungan_note' => $this->tingkat_ketergantungan_note ?? '',
            'rontgen' => $this->rontgen ?? '',
            'lab' => $this->lab ?? '',
            'lain_lain' => $this->lain_lain ?? '',
            'berat_badan_naik' => $this->berat_badan_naik ?? '',
            'agama' => $this->agama ?? '',

            'is_sianosis' => $this->is_sianosis,
            'is_nyeri_dada' => $this->is_nyeri_dada,
            'is_haus' => $this->is_haus,
            'is_mukosa_mulut' => $this->is_mukosa_mulut,
            'is_edema' => $this->is_edema,
            'is_biasa_olahraga' => $this->is_biasa_olahraga,
            'is_biasa_rom' => $this->is_biasa_rom,
            'is_obat_tidur' => $this->is_obat_tidur,
            'is_nyeri' => $this->is_nyeri,
            'is_karaganda_turun' => $this->is_karaganda_turun,
            'is_pakai_alat_bantu' => $this->is_pakai_alat_bantu,
            'is_wajah_tegang' => $this->is_wajah_tegang,
            'is_kontak_mata' => $this->is_kontak_mata,
            'is_bingung' => $this->is_bingung,
            'is_perasaan_tidak_mampu' => $this->is_perasaan_tidak_mampu,
            'is_perasaan_tidak_berharga' => $this->is_perasaan_tidak_berharga,
            'is_kritik_diri' => $this->is_kritik_diri,
            'is_pengetahuan_penyakit' => $this->is_pengetahuan_penyakit,
            'is_pengetahuan_makanan' => $this->is_pengetahuan_makanan,
            'is_pengetahuan_obat' => $this->is_pengetahuan_obat,
            'is_penglihatan' => $this->is_penglihatan,
            'is_pendengaran' => $this->is_pendengaran,
            'is_penciuman' => $this->is_penciuman,
            'is_pengecapan' => $this->is_pengecapan,
            'is_perabaan' => $this->is_perabaan,
            'is_berbicara' => $this->is_berbicara,
            'is_disorientasi' => $this->is_disorientasi,
            'is_menarik_diri' => $this->is_menarik_diri,
            'is_apatis' => $this->is_apatis,
            'is_punya_asuransi_kesehatan' => $this->is_punya_asuransi_kesehatan,

            'can_mandi' => $this->can_mandi,
            'can_mandi_dibantu' => $this->can_mandi_dibantu,
            'can_berpakaian' => $this->can_berpakaian,
            'can_berpakaian_dibantu' => $this->can_berpakaian_dibantu,
            'can_makan' => $this->can_makan,
            'can_makan_dibantu' => $this->can_makan_dibantu,
            'can_bab_bak' => $this->can_bab_bak,
            'can_bab_bak_dibantu' => $this->can_bab_bak_dibantu,
            'can_transfering' => $this->can_transfering,
            'can_transfering_dibantu' => $this->can_transfering_dibantu,

            'nafsu_makan' => $this->nafsu_makan,
            'turgor' => $this->turgor,
            'gaya_berjalan' => $this->gaya_berjalan,
        ];

        if ($this->existingAskep) {
            $this->existingAskep->update($data);
            flash()->success('Asuhan Keperawatan berhasil diperbarui');
        } else {
            $data['id_pendaftaran'] = $this->pendaftaranId;
            AsuhanKeperawatan::create($data);
            flash()->success('Asuhan Keperawatan berhasil disimpan!');
        }
    }

}; ?>

<div class="container-fluid py-3">
    <form wire:submit.prevent="submit">
        <div>
            <div>
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-2 col-form-label">Nama</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" wire:model.lazy="nama" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-2 col-form-label">No. RM</label>
                                    <div class="col-10">
                                        <input type="text" class="form-control" wire:model.lazy="noRM" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Second Row: Age and Date -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-2 col-form-label">Umur</label>
                                    <div class="col-10">
                                        <div class="row">
                                            <div class="col-3">
                                                <input type="text" class="form-control" wire:model.lazy="lahirTahun" disabled>
                                            </div>
                                            <div class="col-3">
                                                <span class="form-text">Tahun</span>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" wire:model.lazy="lahirBulan" disabled>
                                            </div>
                                            <div class="col-3">
                                                <span class="form-text">Bulan</span>
                                            </div>
                                            <div class="col-3">
                                                <input type="text" class="form-control" wire:model.lazy="lahirHari" disabled>
                                            </div>
                                            <div class="col-3">
                                                <span class="form-text">Hari</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <label class="col-2 col-form-label">Tanggal</label>
                                    <div class="col-10">
                                        <input type="date" class="form-control" wire:model.lazy="tglDaftar" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Main Content in Two Columns -->
                        <div class="row">
                            <!-- Left Column -->
                            <div class="col-md-6">
                                <!-- Section I: Basic Patient Needs -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">I. KEBUTUHAN DASAR PASIEN</h6>
                                    <div class="row mb-2">
                                        <label class="col-3 col-form-label">Alasan Masuk</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" wire:model.lazy="alasanMasuk">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="col-3 col-form-label">Diagnosa Medis</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" wire:model.lazy="diagnosaMedis">
                                        </div>
                                    </div>
                                    <div class="row mb-2">
                                        <label class="col-3 col-form-label">Riwayat Penyakit</label>
                                        <div class="col-9">
                                            <input type="text" class="form-control" wire:model.lazy="riwayatPenyakit">
                                        </div>
                                    </div>
                                </div>

                                <!-- Section II: Basic Patient Needs -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">II. KEBUTUHAN DASAR PASIEN</h6>

                                    <!-- A. Circulation -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">A. SIRKULASI</h6>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">1. Tekanan Darah</div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <span class="form-text">Sistole</span>
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm" wire:model.lazy="sistole">
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="form-text">mmHg</span>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-1">
                                                            <div class="col-3">
                                                                <span class="form-text">Distole</span>
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm" wire:model.lazy="distole">
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="form-text">mmHg</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">2. Suhu</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="suhu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">3. Nadi</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="nadi">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">4. Pernapasan</div>
                                                    <div class="col-4">
                                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="pernapasan">
                                                    </div>
                                                    <div class="col-4">
                                                        <span class="form-text">x/mnt</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Sianosis</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sianosis"
                                                                id="sianosis-ada" value="1" wire:model="is_sianosis">
                                                            <label class="form-check-label" for="sianosis-ada">Ada</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="sianosis"
                                                                id="sianosis-tidak-ada" value="0" wire:model="is_sianosis">
                                                            <label class="form-check-label" for="sianosis-tidak-ada">Tidak Ada</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Lain-lain</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="pernapasan_lain">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">5. Nyeri Dada</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nyeri-dada"
                                                                id="nyeri-dada-ada" value="1" wire:model.live="is_nyeri_dada">
                                                            <label class="form-check-label" for="nyeri-dada-ada">Ada</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nyeri-dada"
                                                                id="nyeri-dada-tidak" value="0" wire:model.live="is_nyeri_dada">
                                                            <label class="form-check-label" for="nyeri-dada-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- B. KEBUTUHAN NUTRISI -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">B. KEBUTUHAN NUTRISI</h6>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">1. BB</div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm" wire:model.lazy="berat_badan">
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="form-text">Kg</span>
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="form-text">TB</span>
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm" wire:model.lazy="tinggi_badan">
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="form-text">Cm</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">

                                                    <div class="col-4 ps-4">LILA</div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm" wire:model.lazy="lila">
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="form-text">Cm</span>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">2. Bentuk Makanan</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="bentuk_makanan">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">3. Nafsu Makan</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nafsu-makan"
                                                                id="nafsu-makan-baik" value="baik" wire:model="nafsu_makan">
                                                            <label class="form-check-label" for="nafsu-makan-baik">Baik</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nafsu-makan"
                                                                id="nafsu-makan-kurang" value="kurang" wire:model="nafsu_makan">
                                                            <label class="form-check-label" for="nafsu-makan-kurang">Kurang</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nafsu-makan"
                                                                id="nafsu-makan-tidak-ada" value="tidak_ada" wire:model="nafsu_makan">
                                                            <label class="form-check-label" for="nafsu-makan-tidak-ada">Tidak Ada</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-6 ps-4">4. Apakah turun / tambah dalam 3 bulan terakhir</div>
                                                    <div class="col-6">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="berat-badan"
                                                                id="berat-badan-ya" wire:model.live="berat_badan_naik">
                                                            <label class="form-check-label" for="berat-badan-ya" value="1">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input type="text" class="form-control form-control-sm" style="width: 60px;" wire:model.lazy="berat_badan">
                                                            <span class="form-text ms-1">Kg</span>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="berat-badan"
                                                                id="berat-badan-tidak" wire:model.live="berat_badan_naik" value="0">
                                                            <label class="form-check-label" for="berat-badan-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- C. KEBUTUHAN CAIRAN DAN ELEKTROLIT -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">C. KEBUTUHAN CAIRAN DAN ELEKTROLIT</h6>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">1. Minum</div>
                                                    <div class="col-4">
                                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="minum">
                                                    </div>
                                                    <div class="col-4">
                                                        <span class="form-text">cc/ hari</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">2. Perasaan Haus</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="perasaan-haus"
                                                                id="perasaan-haus-iya" wire:model.live="is_haus" value="1">
                                                            <label class="form-check-label" for="perasaan-haus-iya">Iya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="perasaan-haus"
                                                                id="perasaan-haus-tidak" wire:model.live="is_haus" value="1">
                                                            <label class="form-check-label" for="perasaan-haus-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">3. Mukosa Mulut</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="mukosa-mulut"
                                                                id="mukosa-mulut-kering" wire:model.live="is_mukosa_mulut" value="1">
                                                            <label class="form-check-label" for="mukosa-mulut-kering">Kering</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="mukosa-mulut"
                                                                id="mukosa-mulut-kurang" wire:model.live="is_mukosa_mulut" value="0">
                                                            <label class="form-check-label" for="mukosa-mulut-kurang">Kurang</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">4. Turgor</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="turgor"
                                                                id="turgor-baik" wire:model.live="turgor" value="baik">
                                                            <label class="form-check-label" for="turgor-baik">Baik</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="turgor"
                                                                id="turgor-sedang" wire:model.live="turgor" value="sedang">
                                                            <label class="form-check-label" for="turgor-sedang">Sedang</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="turgor"
                                                                id="turgor-kurang" wire:model.live="turgor" value="kurang">
                                                            <label class="form-check-label" for="turgor-kurang">Kurang</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">5. Edema</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edema"
                                                                id="edema-iya" wire:model.live="is_edema" value="1">
                                                            <label class="form-check-label" for="edema-iya">Iya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="edema"
                                                                id="edema-tidak" wire:model.live="is_edema" value="0">
                                                            <label class="form-check-label" for="edema-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">6. Lain-lain</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="kebutuhan_cairan_lain">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- D. KEBUTUHAN ELIMINASI -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">D. KEBUTUHAN ELIMINASI</h6>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">1. Frekuensi BAK</div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm" wire:model.lazy="frekuensi_bak">
                                                            </div>
                                                            <div class="col-4">
                                                                <span class="form-text">x / hari : jumlah</span>
                                                            </div>
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm" wire:model.lazy="frekuensi_bak_jumlah">
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="form-text">cc</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Lain-lain</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="frekuensi_bak_lain">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">2. Frekuensi BAB</div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-3">
                                                                <input type="text" class="form-control form-control-sm" wire:model.lazy="frekuensi_bab">
                                                            </div>
                                                            <div class="col-3">
                                                                <span class="form-text">x / hari : Warna</span>
                                                            </div>
                                                            <div class="col-6">
                                                                <input type="text" class="form-control form-control-sm" wire:model.lazy="frekuensi_bab_warna">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Bau</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="frekuensi_bab_bau">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Konsistensi</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="frekuensi_bab_konsistensi">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Tgl. Terakhir BAB</div>
                                                    <div class="col-8">
                                                        <input type="date" class="form-control form-control-sm" wire:model.lazy="frekuensi_bab_terakhir">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- E. KEBUTUHAN AKTIFITAS DAN ISTIRAHAT -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">E. KEBUTUHAN AKTIFITAS DAN ISTIRAHAT</h6>

                                        <div class="row mb-2">
                                            <div class="col-4 ps-4">1. Kebiasaan olahraga</div>
                                            <div class="col-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="kebiasaan-olahraga"
                                                        id="kebiasaan-olahraga-ya" wire:model.live="is_biasa_olahraga" value="1">
                                                    <label class="form-check-label" for="kebiasaan-olahraga-ya">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="kebiasaan-olahraga"
                                                        id="kebiasaan-olahraga-tidak" wire:model.live="is_biasa_olahraga" value="0">
                                                    <label class="form-check-label" for="kebiasaan-olahraga-tidak">Tidak</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-4 ps-4">2. Kebiasaan ROM</div>
                                            <div class="col-8">
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="kebiasaan-rom"
                                                        id="kebiasaan-rom-ya" wire:model.live="is_biasa_rom" value="1">
                                                    <label class="form-check-label" for="kebiasaan-rom-ya">Ya</label>
                                                </div>
                                                <div class="form-check form-check-inline">
                                                    <input class="form-check-input" type="radio" name="kebiasaan-rom"
                                                        id="kebiasaan-rom-tidak" wire:model.live="is_biasa_rom" value="0">
                                                    <label class="form-check-label" for="kebiasaan-rom-tidak">Tidak</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">3. Perubahan gaya berjalan :</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gaya-berjalan"
                                                                id="gaya-berjalan-pelan" wire:model.live="gaya_berjalan" value="pelan">
                                                            <label class="form-check-label" for="gaya-berjalan-pelan">Pelan</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gaya-berjalan"
                                                                id="gaya-berjalan-diseret" wire:model.live="gaya_berjalan" value="diseret">
                                                            <label class="form-check-label" for="gaya-berjalan-diseret">Diseret</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gaya-berjalan"
                                                                id="gaya-berjalan-goyah" wire:model.live="gaya_berjalan" value="goyah">
                                                            <label class="form-check-label" for="gaya-berjalan-goyah">Goyah</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="gaya-berjalan"
                                                                id="gaya-berjalan-tremor" wire:model.live="gaya_berjalan" value="tremor">
                                                            <label class="form-check-label" for="gaya-berjalan-tremor">Tremor</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Lain - lain :</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.live="gaya_berjalan_lain">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">4. Jumlah Tidur</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.live="jumlah_tidur">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">5. Obat Tidur</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="obat-tidur"
                                                                id="obat-tidur-pakai" wire:model.live="is_obat_tidur" value="1">
                                                            <label class="form-check-label" for="obat-tidur-pakai">Pakai</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="obat-tidur"
                                                                id="obat-tidur-tidak" wire:model.live="is_obat_tidur" value="0">
                                                            <label class="form-check-label" for="obat-tidur-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-5">Jika pakai :</div>
                                                    <div class="col-8">
                                                        <div class="row">
                                                            <div class="col-6">
                                                                <input type="text" class="form-control form-control-sm" wire:model.live="is_obat_tidur_note">
                                                            </div>
                                                            <div class="col-2">
                                                                <span class="form-text">Dosis :</span>
                                                            </div>
                                                            <div class="col-4">
                                                                <input type="text" class="form-control form-control-sm" wire:model.live="is_obat_tidur_dosis">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- ADL Section -->
                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">6. Mandi</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="ps-5 form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="mandi"
                                                                id="mandi-mampu" wire:model.live="can_mandi" value="1">
                                                            <label class="form-check-label" for="mandi-mampu">Mampu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="mandi"
                                                                id="mandi-dibantu" wire:model.live="can_mandi" value="0">
                                                            <label class="form-check-label" for="mandi-dibantu">Dibantu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control form-control-sm ms-2" style="width: 120px;" wire:model.live="can_mandi_dibantu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">7. Berpakaian</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="ps-5 form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="berpakaian"
                                                                id="berpakaian-mampu" wire:model.live="can_berpakaian" value="1">
                                                            <label class="form-check-label" for="berpakaian-mampu">Mampu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="berpakaian"
                                                                id="berpakaian-dibantu" wire:model.live="can_berpakaian" value="0">
                                                            <label class="form-check-label" for="berpakaian-dibantu">Dibantu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control form-control-sm ms-2" style="width: 120px;" wire:model.live="can_berpakaian_dibantu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">8. Makan</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="ps-5 form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="makan"
                                                                id="makan-mampu" wire:model.live="can_makan" value="1">
                                                            <label class="form-check-label" for="makan-mampu">Mampu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="makan"
                                                                id="makan-dibantu" wire:model.live="can_makan" value="0">
                                                            <label class="form-check-label" for="makan-dibantu">Dibantu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control form-control-sm ms-2" style="width: 120px;" wire:model.live="can_makan_dibantu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">9. BAB/BAK</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="ps-5 form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="babbak"
                                                                id="babbak-mampu" wire:model.live="can_bab_bak" value="1">
                                                            <label class="form-check-label" for="babbak-mampu">Mampu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="babbak"
                                                                id="babbak-dibantu" wire:model.live="can_bab_bak" value="0">
                                                            <label class="form-check-label" for="babbak-dibantu">Dibantu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control form-control-sm ms-2" style="width: 120px;" wire:model.live="can_bab_bak_dibantu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">10. Transfering</div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="ps-5 form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="transfering"
                                                                id="transfering-mampu" wire:model.live="can_transfering" value="1">
                                                            <label class="form-check-label" for="transfering-mampu">Mampu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-3">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="transfering"
                                                                id="transfering-dibantu" wire:model.live="can_transfering" value="0">
                                                            <label class="form-check-label" for="transfering-dibantu">Dibantu</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <input type="text" class="form-control form-control-sm ms-2" style="width: 120px;" wire:model.live="can_transfering_dibantu">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">11. Lain - lain :</div>
                                                    <div class="col-8">
                                                        <input type="text" class="form-control form-control-sm" wire:model.live="kebutuhan_aktifitas_lain">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- F. KEBUTUHAN RASA AMAN DAN NYAMAN -->
                                    <div class="mb-3">
                                        <h6 class="ms-3">F. KEBUTUHAN RASA AMAN DAN NYAMAN</h6>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">1. Nyeri</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nyeri"
                                                                id="nyeri-ya" wire:model.live="is_nyeri" value="1">
                                                            <label class="form-check-label" for="nyeri-ya">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="nyeri"
                                                                id="nyeri-tidak" wire:model.live="is_nyeri" value="0">
                                                            <label class="form-check-label" for="nyeri-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">2. Penurunan Karaganda</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="penurunan-karaganda"
                                                                id="penurunan-karaganda-ya" wire:model.live="is_karaganda_turun" value="1">
                                                            <label class="form-check-label" for="penurunan-karaganda-ya">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="penurunan-karaganda"
                                                                id="penurunan-karaganda-tidak" wire:model.live="is_karaganda_turun" value="0">
                                                            <label class="form-check-label" for="penurunan-karaganda-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-2">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-4 ps-4">3. Penggunaan alat bantu</div>
                                                    <div class="col-8">
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="penggunaan-alat-bantu"
                                                                id="penggunaan-alat-bantu-ya" wire:model.live="is_pakai_alat_bantu" value="1">
                                                            <label class="form-check-label" for="penggunaan-alat-bantu-ya">Ya</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="penggunaan-alat-bantu"
                                                                id="penggunaan-alat-bantu-tidak" wire:model.live="is_pakai_alat_bantu" value="0">
                                                            <label class="form-check-label" for="penggunaan-alat-bantu-tidak">Tidak</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Right Column -->
                            <div class="col-md-6">
                                <!-- Emotional Needs Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">G. KEBUTUHAN EMOSIONAL</h6>

                                    <div class="row mb-2">
                                        <div class="col-7">1. Wajah Tegang</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="wajah-tegang"
                                                    id="wajah-tegang-ya" wire:model.live="is_wajah_tegang" value="1">
                                                <label class="form-check-label" for="wajah-tegang-ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="wajah-tegang"
                                                    id="wajah-tegang-tidak" wire:model.live="is_wajah_tegang" value="0">
                                                <label class="form-check-label" for="wajah-tegang-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">2. Kontak Mata</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kontak-mata"
                                                    id="kontak-mata-bisa" wire:model.live="is_kontak_mata" value="1">
                                                <label class="form-check-label" for="kontak-mata-bisa">Bisa</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="kontak-mata"
                                                    id="kontak-mata-tidak" wire:model.live="is_kontak_mata" value="0">
                                                <label class="form-check-label" for="kontak-mata-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">3. Bingung</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="bingung"
                                                    id="bingung-ya" wire:model.live="is_bingung" value="1">
                                                <label class="form-check-label" for="bingung-ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="bingung"
                                                    id="bingung-tidak" wire:model.live="is_bingung" value="0">
                                                <label class="form-check-label" for="bingung-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">4. Perasaan Tidak Mampu</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perasaan-tidak-mampu"
                                                    id="perasaan-tidak-mampu-ya" wire:model.live="is_perasaan_tidak_mampu" value="1">
                                                <label class="form-check-label" for="perasaan-tidak-mampu-ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perasaan-tidak-mampu"
                                                    id="perasaan-tidak-mampu-tidak" wire:model.live="is_perasaan_tidak_mampu" value="0">
                                                <label class="form-check-label" for="perasaan-tidak-mampu-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">5. Perasaan Tidak Berharga</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perasaan-tidak-berharga"
                                                    id="perasaan-tidak-berharga-ya" wire:model.live="is_perasaan_tidak_berharga" value="1">
                                                <label class="form-check-label" for="perasaan-tidak-berharga-ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perasaan-tidak-berharga"
                                                    id="perasaan-tidak-berharga-tidak" wire:model.live="is_perasaan_tidak_berharga" value="0">
                                                <label class="form-check-label" for="perasaan-tidak-berharga-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">6. Mengkritik Diri Sendiri</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mengkritik-diri"
                                                    id="mengkritik-diri-ya" wire:model.live="is_kritik_diri" value="1">
                                                <label class="form-check-label" for="mengkritik-diri-ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="mengkritik-diri"
                                                    id="mengkritik-diri-tidak" wire:model.live="is_kritik_diri" value="0">
                                                <label class="form-check-label" for="mengkritik-diri-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-3">7. Lain - lain :</div>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-sm" wire:model.live="kebutuhan_emosional_lain">
                                        </div>
                                    </div>
                                </div>

                                <!-- Educational Needs Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">H. KEBUTUHAN PENYULUHAN</h6>

                                    <div class="row mb-2">
                                        <div class="col-7">1. Pengetahuan tentang penyakit</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pengetahuan-penyakit"
                                                    id="pengetahuan-penyakit-tahu" wire:model.live="is_pengetahuan_penyakit" value="1">
                                                <label class="form-check-label" for="pengetahuan-penyakit-tahu">Tahu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pengetahuan-penyakit"
                                                    id="pengetahuan-penyakit-tidak" wire:model.live="is_pengetahuan_penyakit" value="0">
                                                <label class="form-check-label" for="pengetahuan-penyakit-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">2. Pengetahuan tentang makanan</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pengetahuan-makanan"
                                                    id="pengetahuan-makanan-tahu" wire:model.live="is_pengetahuan_makanan" value="1">
                                                <label class="form-check-label" for="pengetahuan-makanan-tahu">Tahu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pengetahuan-makanan"
                                                    id="pengetahuan-makanan-tidak" wire:model.live="is_pengetahuan_makanan" value="0">
                                                <label class="form-check-label" for="pengetahuan-makanan-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">3. Pengetahuan tentang obat</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pengetahuan-obat"
                                                    id="pengetahuan-obat-tahu" wire:model.live="is_pengetahuan_obat" value="1">
                                                <label class="form-check-label" for="pengetahuan-obat-tahu">Tahu</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pengetahuan-obat"
                                                    id="pengetahuan-obat-tidak" wire:model.live="is_pengetahuan_obat" value="0">
                                                <label class="form-check-label" for="pengetahuan-obat-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-3">4. Lain - lain :</div>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-sm" wire:model.live="kebutuhan_penyuluhan_lain">
                                        </div>
                                    </div>
                                </div>

                                <!-- Sensory Perception Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">I. KEBUTUHAN PERSEPSI SENSORI</h6>

                                    <div class="row mb-2">
                                        <div class="col-7">1. Penglihatan</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan"
                                                    id="penglihatan-baik" wire:model.live="is_penglihatan" value="1">
                                                <label class="form-check-label" for="penglihatan-baik">Baik</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penglihatan"
                                                    id="penglihatan-tidak" wire:model.live="is_penglihatan" value="0">
                                                <label class="form-check-label" for="penglihatan-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">2. Pendengaran</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pendengaran"
                                                    id="pendengaran-baik" wire:model.live="is_pendengaran" value="1">
                                                <label class="form-check-label" for="pendengaran-baik">Baik</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pendengaran"
                                                    id="pendengaran-tidak" wire:model.live="is_pendengaran" value="0">
                                                <label class="form-check-label" for="pendengaran-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">3. Penciuman</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penciuman"
                                                    id="penciuman-baik" wire:model.live="is_penciuman" value="1">
                                                <label class="form-check-label" for="penciuman-baik">Baik</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="penciuman"
                                                    id="penciuman-tidak" wire:model.live="is_penciuman" value="0">
                                                <label class="form-check-label" for="penciuman-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">4. Pengecapan</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pengecapan"
                                                    id="pengecapan-baik" wire:model.live="is_pengecapan" value="1">
                                                <label class="form-check-label" for="pengecapan-baik">Baik</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pengecapan"
                                                    id="pengecapan-tidak" wire:model.live="is_pengecapan" value="0">
                                                <label class="form-check-label" for="pengecapan-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">5. Perabaan</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perabaan"
                                                    id="perabaan-baik" wire:model.live="is_perabaan" value="1">
                                                <label class="form-check-label" for="perabaan-baik">Baik</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="perabaan"
                                                    id="perabaan-tidak" wire:model.live="is_perabaan" value="0">
                                                <label class="form-check-label" for="perabaan-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Communication Needs Section -->
                                <div class="mb-4">
                                    <h6 class="fw-bold">J. KEBUTUHAN KOMUNIKASI</h6>
                                    <div class="row mb-2">
                                        <div class="col-7">1. Berbicara</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="berbicara"
                                                    id="berbicara-lancar" wire:model.live="is_berbicara" value="1">
                                                <label class="form-check-label" for="berbicara-lancar">Lancar</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="berbicara"
                                                    id="berbicara-tidak" wire:model.live="is_berbicara" value="0">
                                                <label class="form-check-label" for="berbicara-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-3">Jika tidak, penyebabnya :</div>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-sm" wire:model.live="is_berbicara_note">
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">2. Pembicaraan</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pembicaraan"
                                                    id="pembicaraan-koheren" wire:model.live="is_pembicaraan" value="koheren">
                                                <label class="form-check-label" for="pembicaraan-koheren">Koheren</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="pembicaraan"
                                                    id="pembicaraan-inkoheren" wire:model.live="is_pembicaraan" value="inkoheren">
                                                <label class="form-check-label" for="pembicaraan-inkoheren">Inkoheren</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-7">3. Disorientasi</div>
                                        <div class="col-5">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="disorientasi"
                                                    id="disorientasi-ya" wire:model.live="is_disorientasi" value="1">
                                                <label class="form-check-label" for="disorientasi-ya">Ya</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="disorientasi"
                                                    id="disorientasi-tidak" wire:model.live="is_disorientasi" value="0">
                                                <label class="form-check-label" for="disorientasi-tidak">Tidak</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row mb-2">
                                        <div class="col-3">Jika ya :</div>
                                        <div class="col-9">
                                            <input type="text" class="form-control form-control-sm" wire:model.live="is_disorientasi_note">
                                        </div>
                                    </div>

                            <div class="row mb-2">
                                <div class="col-7">4. Menarik diri</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="menarik-diri"
                                            id="menarik-diri-ya" value="1" wire:model.lazy="is_menarik_diri">
                                        <label class="form-check-label" for="menarik-diri-ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="menarik-diri"
                                            id="menarik-diri-tidak" value="0" wire:model.lazy="is_menarik_diri">
                                        <label class="form-check-label" for="menarik-diri-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-7">5. Apatis</div>
                                <div class="col-5">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="apatis"
                                            id="apatis-ya" value="1" wire:model.lazy="is_apatis">
                                        <label class="form-check-label" for="apatis-ya">Ya</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="apatis"
                                            id="apatis-tidak" value="0" wire:model.lazy="is_apatis">
                                        <label class="form-check-label" for="apatis-tidak">Tidak</label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-3">6. Lain - lain :</div>
                                <div class="col-9">
                                    <input type="text" class="form-control form-control-sm" wire:model.lazy="kebutuhan_emosional_lain">
                                </div>
                            </div>
                            </div>

                            <!-- Spiritual Needs Section -->
                            <div class="mb-4">
                                <h6 class="fw-bold">K. KEBUTUHAN SPIRITUAL</h6>

                                <div class="row mb-2">
                                    <div class="col-3">1. Agama</div>
                                    <div class="col-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="agama-islam" value="Islam" wire:model.lazy="agama">
                                            <label class="form-check-label" for="agama-islam">Islam</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="agama-kristen" value="Kristen" wire:model.lazy="agama">
                                            <label class="form-check-label" for="agama-kristen">Kristen</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="agama-katolik" value="Katolik" wire:model.lazy="agama">
                                            <label class="form-check-label" for="agama-katolik">Katolik</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-3"></div>
                                    <div class="col-9">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="agama-hindu" value="Hindu" wire:model.lazy="agama">
                                            <label class="form-check-label" for="agama-hindu">Hindu</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="agama-buddha" value="Buddha" wire:model.lazy="agama">
                                            <label class="form-check-label" for="agama-buddha">Buddha</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="agama-konghucu" value="Konghucu" wire:model.lazy="agama">
                                            <label class="form-check-label" for="agama-konghucu">Konghucu</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="agama-penghayat" value="Penghayat" wire:model.lazy="agama">
                                            <label class="form-check-label" for="agama-penghayat">Penghayat</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="agama"
                                                id="agama-lain" value="Lain-lain" wire:model.lazy="agama">
                                            <label class="form-check-label" for="agama-lain">Lain-lain</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-5">2. Kegiatan ibadah sehari-hari</div>
                                    <div class="col-7">
                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="kegiatan_sehari_hari">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-5">3. Kegiatan ibadah di Rumah Sakit</div>
                                    <div class="col-7">
                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="kegiatan_rumah_sakit">
                                    </div>
                                </div>
                            </div>

                            <!-- Social Economic Section -->
                            <div class="mb-4">
                                <h6 class="fw-bold">L. SOSIAL EKONOMI</h6>

                                <div class="row mb-2">
                                    <div class="col-3">1. Pekerjaan :</div>
                                    <div class="col-9">
                                        <input type="text" class="form-control form-control-sm" wire:model.lazy="pekerjaan">
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-7">2. Asuransi Kesehatan</div>
                                    <div class="col-5">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="asuransi-kesehatan"
                                                id="asuransi-kesehatan-punya" value="1" wire:model.lazy="is_punya_asuransi_kesehatan">
                                            <label class="form-check-label" for="asuransi-kesehatan-punya">Punya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="asuransi-kesehatan"
                                                id="asuransi-kesehatan-tidak" value="0" wire:model.lazy="is_punya_asuransi_kesehatan">
                                            <label class="form-check-label" for="asuransi-kesehatan-tidak">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Fall Risk Section -->
                            <div class="mb-4">
                                <h6 class="fw-bold">M. RESIKO JATUH</h6>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <textarea class="form-control form-control-sm" rows="3" wire:model.lazy="resiko_jatuh_note"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Patient Dependency Level Section -->
                            <div class="mb-4">
                                <h6 class="fw-bold">N. TINGKAT KETERGANTUNGAN PASIEN</h6>
                                <div class="row mb-2">
                                    <div class="col-12">
                                        <textarea class="form-control form-control-sm" rows="4" wire:model.lazy="tingkat_ketergantungan_note"></textarea>
                                    </div>
                                </div>
                            </div>

                            <!-- Supporting Data Section -->
                            <div class="mb-4">
                                <h6 class="fw-bold">O. DATA PENUNJANG</h6>

                                <div class="row mb-2">
                                    <div class="col-3">1. Rontgen :</div>
                                    <div class="col-9">
                                        <textarea class="form-control form-control-sm" rows="3" wire:model.lazy="rontgen"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-3">2. Lab :</div>
                                    <div class="col-9">
                                        <textarea class="form-control form-control-sm" rows="3" wire:model.lazy="lab"></textarea>
                                    </div>
                                </div>

                                <div class="row mb-2">
                                    <div class="col-3">3. Lain - lain :</div>
                                    <div class="col-9">
                                        <textarea class="form-control form-control-sm" rows="3" wire:model.lazy="lain_lain"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <div class="row mt-4 mb-5" style="width: fit-content;">
                                <div class="col text-center">
                                    <p>Jember, {{ $this->getCurrentDateTime()['tanggal'] }}, Jam {{ $this->getCurrentDateTime()['jam'] }} WIB</p>
                                    <p>Petugas yang mengisi,</p>
                                    <div class="border rounded mx-auto my-3" style="width: 150px; height: 100px;"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </form>

        <div class="d-flex justify-content-end mb-5">
            <div class="d-grid gap-2" style="width: 150px;">
                <div class="btn btn-primary" wire:click="submit">Submit</div>
            </div>
        </div>

</div>

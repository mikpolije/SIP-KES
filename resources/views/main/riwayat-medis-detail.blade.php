@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')

<div class="container my-4">
    <!-- Detail Rekam Medik -->
    <div class="card">
        <div class="card-header bg-danger text-white">
            Rekam Medik Detail
        </div>
        <div class="card-body">
            <div class="row">
                <!-- Kolom kiri -->
                <div class="col-md-6">
                    <p><strong>No Rekam Medik:</strong> {{ $data->data_pasien->no_rm ?? '-' }}</p>
                    <p><strong>Nama Pasien:</strong> {{ $data->data_pasien->nama_pasien ?? '-' }}</p>
                    <p><strong>NIK:</strong> {{ $data->data_pasien->nik_pasien ?? '-' }}</p>
                    <p><strong>Tempat Lahir:</strong> {{ $data->data_pasien->tempat_lahir_pasien ?? '-' }}</p>
                    <p><strong>Tanggal Lahir:</strong> {{ $data->data_pasien->tanggal_lahir_pasien ?? '-' }}</p>
                    <p><strong>Agama:</strong> {{ $data->data_pasien->agama ?? '-' }}</p>
                    <p><strong>Alamat:</strong> {{ $data->data_pasien->alamat_pasien ?? '-' }}</p>
                </div>
                <!-- Kolom kanan -->
                <div class="col-md-6">
                    <p><strong>No Telp:</strong> {{ $data->data_pasien->no_telepon_pasien ?? '-' }}</p>
                    <p><strong>Golongan Darah:</strong> {{ $data->data_pasien->gol_darah ?? '-' }}</p>
                    <p><strong>BPJS:</strong> {{ $data->data_pasien->bpjs ?? '-' }}</p>
                    <p><strong>Jenis Kelamin:</strong> {{ $data->data_pasien->jenis_kelamin ?? '-' }}</p>
                    <p><strong>Pekerjaan:</strong> {{ $data->data_pasien->pekerjaan_pasien ?? '-' }}</p>
                    <p><strong>Keterangan:</strong> {{ $data->data_pasien->keterangan ?? '-' }}</p>
                </div>
            </div>
        </div>
        {{-- <div class="card-footer">
            <a href="#" class="btn btn-success">Kirim Link</a>
            <a href="#" class="btn btn-primary">Cetak</a>
            <a href="#" class="btn btn-danger">Hapus</a>
        </div> --}}
    </div>

    <!-- Daftar Rekam Medik -->
    <div class="card mt-4">
        <div class="card-header bg-secondary text-white">
            Daftar Rekam Medik
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-light">
                        <tr>
                            <th>Tanggal Periksa</th>
                            <th>No Registrasi</th>
                            <th>Dokter</th>
                            <th>Diagnosa</th>
                            <th>ICD 9</th>
                            <th>ICD 10</th>
                            <th>Layanan</th>
                            <th>Keterangan Pemeriksaan</th>
                            <th>Obat</th>
                            <th>Keterangan Obat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($data->detail_rekam_medis && count($data->detail_rekam_medis) > 0)
                            @foreach($data->detail_rekam_medis as $detail)
                                <tr>
                                    <td>{{ $detail->tgl_periksa ?? '-' }}</td>
                                    <td>{{ $detail->no_registrasi ?? '-' }}</td>
                                    <td>{{ $detail->dokter ?? '-' }}</td>
                                    <td>{{ $detail->diagnosa ?? '-' }}</td>
                                    <td>{{ $detail->icd9 ?? '-' }}</td>
                                    <td>{{ $detail->icd10 ?? '-' }}</td>
                                    <td>{{ $detail->layanan ?? '-' }}</td>
                                    <td>{{ $detail->keterangan_pemeriksaan ?? '-' }}</td>
                                    <td>{{ $detail->obat ?? '-' }}</td>
                                    <td>{{ $detail->keterangan_obat ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="10" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Daftar Asessmen Awal -->
    <div class="card mt-4">
    <div class="card-header bg-secondary text-white">
        Daftar Asesmen Awal
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>Tanggal Periksa</th>
                        <th>Denyut Jantung</th>
                        <th>Pernafasan</th>
                        <th>Suhu Tubuh</th>
                        <th>Tekanan Darah (S/D)</th>
                        <th>Skala Nyeri</th>
                        <th>Keluhan Utama</th>
                        <th>Riwayat Penyakit</th>
                        <th>Riwayat Pengobatan</th>
                        <th>Status Psikologi</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->asessmen_awal)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($data->asessmen_awal->created_at)->format('d-m-Y') ?? '-' }}</td>
                            <td>{{ $data->asessmen_awal->denyut_jantung ?? '-' }}</td>
                            <td>{{ $data->asessmen_awal->pernafasan ?? '-' }}</td>
                            <td>{{ $data->asessmen_awal->suhu_tubuh ?? '-' }}</td>
                            <td>
                                {{ $data->asessmen_awal->tekanan_darah_sistole ?? '-' }}/{{ $data->asessmen_awal->tekanan_darah_diastole ?? '-' }}
                            </td>
                            <td>{{ $data->asessmen_awal->skala_nyeri ?? '-' }}</td>
                            <td>{{ $data->asessmen_awal->keluhan_utama ?? '-' }}</td>
                            <td>{{ $data->asessmen_awal->riwayat_penyakit ?? '-' }}</td>
                            <td>{{ $data->asessmen_awal->riwayat_pengobatan ?? '-' }}</td>
                            <td>{{ $data->asessmen_awal->status_psikologi ?? '-' }}</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="10" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                    @endif
            </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Daftar Asuhan Keperawatan -->
    <div class="card mt-4">
    <div class="card-header bg-secondary text-white">
        Daftar Asuhan Keperawatan
    </div>
    <div class="card-body">
        <div class="table-responsive" style="overflow-x:auto">
            <table class="table table-bordered table-striped">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Tanggal Catat</th>
                        <th>ID Pendaftaran</th>
                        <th>Alasan Masuk</th>
                        <th>Diagnosa Medis</th>
                        <th>Riwayat Penyakit</th>
                        <th>Sistol</th>
                        <th>Distol</th>
                        <th>Suhu</th>
                        <th>Nadi</th>
                        <th>Pernapasan</th>
                        <th>Pernapasan Lain</th>
                        <th>Berat Badan</th>
                        <th>Tinggi Badan</th>
                        <th>LILA</th>
                        <th>Bentuk Makanan</th>
                        <th>Minum</th>
                        <th>Kebutuhan Cairan Lain</th>
                        <th>Frekuensi BAK</th>
                        <th>Jumlah BAK</th>
                        <th>BAK Lain</th>
                        <th>Frekuensi BAB</th>
                        <th>Warna BAB</th>
                        <th>Bau BAB</th>
                        <th>Konsistensi BAB</th>
                        <th>Tgl. BAB Terakhir</th>
                        <th>Gaya Berjalan Lain</th>
                        <th>Jumlah Tidur</th>
                        <th>Obat Tidur Note</th>
                        <th>Dosis Obat Tidur</th>
                        <th>Kebutuhan Aktivitas Lain</th>
                        <th>Kebutuhan Emosional Lain</th>
                        <th>Kebutuhan Penyuluhan Lain</th>
                        <th>Berbicara Note</th>
                        <th>Pembicaraan</th>
                        <th>Disorientasi Note</th>
                        <th>Kebutuhan Komunikasi Lain</th>
                        <th>Kegiatan Sehari-hari</th>
                        <th>Kegiatan Rumah Sakit</th>
                        <th>Pekerjaan</th>
                        <th>Risiko Jatuh Note</th>
                        <th>Tingkat Ketergantungan Note</th>
                        <th>Rontgen</th>
                        <th>Lab</th>
                        <th>Lain-lain</th>
                        <th>Berat Badan Naik</th>
                        <th>Sianosis</th>
                        <th>Nyeri Dada</th>
                        <th>Haus</th>
                        <th>Mukosa Mulut</th>
                        <th>Edema</th>
                        <th>Biasa Olahraga</th>
                        <th>Biasa ROM</th>
                        <th>Obat Tidur</th>
                        <th>Nyeri</th>
                        <th>Karaganda Turun</th>
                        <th>Pakai Alat Bantu</th>
                        <th>Wajah Tegang</th>
                        <th>Kontak Mata</th>
                        <th>Bingung</th>
                        <th>Perasaan Tidak Mampu</th>
                        <th>Perasaan Tidak Berharga</th>
                        <th>Kritik Diri</th>
                        <th>Pengetahuan Penyakit</th>
                        <th>Pengetahuan Makanan</th>
                        <th>Pengetahuan Obat</th>
                        <th>Penglihatan</th>
                        <th>Pendengaran</th>
                        <th>Penciuman</th>
                        <th>Pengecapan</th>
                        <th>Perabaan</th>
                        <th>Berbicara</th>
                        <th>Disorientasi</th>
                        <th>Menarik Diri</th>
                        <th>Apatis</th>
                        <th>Asuransi Kesehatan</th>
                        <th>Can Mandi</th>
                        <th>Can Mandi Dibantu</th>
                        <th>Can Berpakaian</th>
                        <th>Can Berpakaian Dibantu</th>
                        <th>Can Makan</th>
                        <th>Can Makan Dibantu</th>
                        <th>Can BAK/BAK</th>
                        <th>Can BAK/BAK Dibantu</th>
                        <th>Can Transfering</th>
                        <th>Can Transfering Dibantu</th>
                        <th>Nafsu Makan</th>
                        <th>Turgor</th>
                        <th>Gaya Berjalan</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @if($data->asuhan_keperawatan)
                        @php($a = $data->asuhan_keperawatan)
                        <tr>
                            <td>1</td>
                            <td>{{ \Carbon\Carbon::parse($a->created_at)->format('d-m-Y H:i') }}</td>
                            <td>{{ $a->id_pendaftaran }}</td>
                            <td>{{ $a->alasan_masuk }}</td>
                            <td>{{ $a->diagnosa_medis }}</td>
                            <td>{{ $a->riwayat_penyakit }}</td>
                            <td>{{ $a->sistole }}</td>
                            <td>{{ $a->distole }}</td>
                            <td>{{ $a->suhu }}</td>
                            <td>{{ $a->nadi }}</td>
                            <td>{{ $a->pernapasan }}</td>
                            <td>{{ $a->pernapasan_lain }}</td>
                            <td>{{ $a->berat_badan }}</td>
                            <td>{{ $a->tinggi_badan }}</td>
                            <td>{{ $a->lila }}</td>
                            <td>{{ $a->bentuk_makanan }}</td>
                            <td>{{ $a->minum }}</td>
                            <td>{{ $a->kebutuhan_cairan_lain }}</td>
                            <td>{{ $a->frekuensi_bak }}</td>
                            <td>{{ $a->frekuensi_bak_jumlah }}</td>
                            <td>{{ $a->frekuensi_bak_lain }}</td>
                            <td>{{ $a->frekuensi_bab }}</td>
                            <td>{{ $a->frekuensi_bab_warna }}</td>
                            <td>{{ $a->frekuensi_bab_bau }}</td>
                            <td>{{ $a->frekuensi_bab_konsistensi }}</td>
                            <td>{{ $a->frekuensi_bab_terakhir }}</td>
                            <td>{{ $a->gaya_berjalan_lain }}</td>
                            <td>{{ $a->jumlah_tidur }}</td>
                            <td>{{ $a->is_obat_tidur_note }}</td>
                            <td>{{ $a->is_obat_tidur_dosis }}</td>
                            <td>{{ $a->kebutuhan_aktifitas_lain }}</td>
                            <td>{{ $a->kebutuhan_emosional_lain }}</td>
                            <td>{{ $a->kebutuhan_penyuluhan_lain }}</td>
                            <td>{{ $a->is_berbicara_note }}</td>
                            <td>{{ $a->is_pembicaraan }}</td>
                            <td>{{ $a->is_disorientasi_note }}</td>
                            <td>{{ $a->kebutuhan_komunikasi_lain }}</td>
                            <td>{{ $a->kegiatan_sehari_hari }}</td>
                            <td>{{ $a->kegiatan_rumah_sakit }}</td>
                            <td>{{ $a->pekerjaan }}</td>
                            <td>{{ $a->resiko_jatuh_note }}</td>
                            <td>{{ $a->tingkat_ketergantungan_note }}</td>
                            <td>{{ $a->rontgen }}</td>
                            <td>{{ $a->lab }}</td>
                            <td>{{ $a->lain_lain }}</td>
                            <td>{{ $a->berat_badan_naik }}</td>
                            <td>{{ $a->is_sianosis }}</td>
                            <td>{{ $a->is_nyeri_dada }}</td>
                            <td>{{ $a->is_haus }}</td>
                            <td>{{ $a->is_mukosa_mulut }}</td>
                            <td>{{ $a->is_edema }}</td>
                            <td>{{ $a->is_biasa_olahraga }}</td>
                            <td>{{ $a->is_biasa_rom }}</td>
                            <td>{{ $a->is_obat_tidur }}</td>
                            <td>{{ $a->is_nyeri }}</td>
                            <td>{{ $a->is_karaganda_turun }}</td>
                            <td>{{ $a->is_pakai_alat_bantu }}</td>
                            <td>{{ $a->is_wajah_tegang }}</td>
                            <td>{{ $a->is_kontak_mata }}</td>
                            <td>{{ $a->is_bingung }}</td>
                            <td>{{ $a->is_perasaan_tidak_mampu }}</td>
                            <td>{{ $a->is_perasaan_tidak_berharga }}</td>
                            <td>{{ $a->is_kritik_diri }}</td>
                            <td>{{ $a->is_pengetahuan_penyakit }}</td>
                            <td>{{ $a->is_pengetahuan_makanan }}</td>
                            <td>{{ $a->is_pengetahuan_obat }}</td>
                            <td>{{ $a->is_penglihatan }}</td>
                            <td>{{ $a->is_pendengaran }}</td>
                            <td>{{ $a->is_penciuman }}</td>
                            <td>{{ $a->is_pengecapan }}</td>
                            <td>{{ $a->is_perabaan }}</td>
                            <td>{{ $a->is_berbicara }}</td>
                            <td>{{ $a->is_disorientasi }}</td>
                            <td>{{ $a->is_menarik_diri }}</td>
                            <td>{{ $a->is_apatis }}</td>
                            <td>{{ $a->is_punya_asuransi_kesehatan }}</td>
                            <td>{{ $a->can_mandi }}</td>
                            <td>{{ $a->can_mandi_dibantu }}</td>
                            <td>{{ $a->can_berpakaian }}</td>
                            <td>{{ $a->can_berpakaian_dibantu }}</td>
                            <td>{{ $a->can_makan }}</td>
                            <td>{{ $a->can_makan_dibantu }}</td>
                            <td>{{ $a->can_bab_bak }}</td>
                            <td>{{ $a->can_bab_bak_dibantu }}</td>
                            <td>{{ $a->can_transfering }}</td>
                            <td>{{ $a->can_transfering_dibantu }}</td>
                            <td>{{ $a->nafsu_makan }}</td>
                            <td>{{ $a->turgor }}</td>
                            <td>{{ $a->gaya_berjalan }}</td>
                            <td>{{ \Carbon\Carbon::parse($a->updated_at)->format('d-m-Y H:i') }}</td>
                        </tr>
                    @else
                        <tr>
                            <td colspan="120" class="text-center">Data tidak ditemukan.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

@endsection
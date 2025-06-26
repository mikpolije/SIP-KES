<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Cetak Riwayat Medis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        /* Normal style */
        .no-print {
            margin-top: 20px;
        }

        /* Print-only rules */
        @media print {
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                color: #000;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 20px;
            }

            th,
            td {
                border: 1px solid #000;
                padding: 5px;
                text-align: center;
            }

            /* Sembunyikan semua elemen dengan .no-print saat cetak */
            .no-print {
                display: none !important;
            }

            /* Hilangkan scrollbar saat cetak (khusus Chrome/Webkit) */
            ::-webkit-scrollbar {
                display: none;
            }

            /* Optional: Hindari pemutusan tabel saat cetak halaman panjang */
            table,
            tr,
            td,
            th {
                page-break-inside: avoid;
            }
        }
    </style>
</head>

<body>
    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center">
        <div class="col-6">
            <img src="{{ URL::asset('/assets/klinik-insan.png') }}" width="100" alt="Logo">
        </div>
        <div class="col-6 text-end">
            <p class="fw-bold mb-0">KLINIK PRATAMA RAWAT JALAN INSAN MEDIKA</p>
            <span>Jl. R. Sosro Prawiro No. 1A Wirowongso, Ajung – Jember</span>
        </div>
    </div>

    {{-- JUDUL DOKUMEN --}}
    <div class="border border-2 border-dark text-center py-2 mb-3">
        <h5 class="fw-bold mb-0">LAPORAN RIWAYAT MEDIS</h5>
    </div>
    <div class="">
        <!-- Detail Rekam Medik -->
        <div class="card">
            <div class="card-header bg-danger text-white">
                Rekam Medik Detail
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>No Rekam Medik:</strong> {{ $data_pasien->no_rm ?? '-' }}</p>
                        <p><strong>Nama Pasien:</strong> {{ $data_pasien->nama_pasien ?? '-' }}</p>
                        <p><strong>NIK:</strong> {{ $data_pasien->nik_pasien ?? '-' }}</p>
                        <p><strong>Tempat Lahir:</strong> {{ $data_pasien->tempat_lahir_pasien ?? '-' }}</p>
                        <p><strong>Tanggal Lahir:</strong> {{ $data_pasien->tanggal_lahir_pasien ?? '-' }}</p>

                        @php
                        $agamaList = [
                        1 => 'Islam',
                        2 => 'Kristen (Protestan)',
                        3 => 'Katolik',
                        4 => 'Hindu',
                        5 => 'Budha',
                        6 => 'Konghucu',
                        7 => 'Penghayat',
                        8 => 'Lain-lain'
                        ];
                        @endphp

                        <p><strong>Agama:</strong> {{ $agamaList[$data_pasien->agama] ?? '-' }}</p>
                        <p><strong>Alamat:</strong> {{ $data_pasien->alamat_pasien ?? '-' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>No Telp:</strong> {{ $data_pasien->no_telepon_pasien ?? '-' }}</p>

                        @php
                        $jenis_golongandarah = [
                        1 => 'A',
                        2 => 'B',
                        3 => 'AB',
                        4 => 'O'
                        ];
                        @endphp

                        <p><strong>Golongan Darah:</strong> {{ $jenis_golongandarah[$data_pasien->gol_darah] ?? '-' }}</p>
                        <p><strong>BPJS:</strong> {{ $data_pasien->bpjs ?? '-' }}</p>

                        @php
                        $jenis_kelamin = [
                        1 => 'Laki-Laki',
                        2 => 'Perempuan',
                        3 => 'Tidak dapat ditentukan',
                        4 => 'Tidak mengisi'
                        ];
                        @endphp

                        <p><strong>Jenis Kelamin:</strong> {{ $jenis_kelamin[$data_pasien->jenis_kelamin] ?? '-' }}</p>

                        @php
                        $pekerjaan = [
                        1 => 'PNS',
                        2 => 'TNI/POLRI',
                        3 => 'BUMN',
                        4 => 'Pegawai Swasta/Wirausaha',
                        5 => 'Lain-lain'
                        ];
                        @endphp

                        <p><strong>Pekerjaan:</strong> {{ $pekerjaan[$data_pasien->pekerjaan_pasien] ?? '-' }}</p>
                        <p><strong>Keterangan:</strong> {{ $data_pasien->keterangan ?? '-' }}</p>
                    </div>
                </div>
            </div>
            <div class="no-print card-footer">
                <a href="{{ route('detail-riwayat-medis.cetak', $data_pasien->no_rm) }}" target="_blank" class="btn btn-primary">Cetak</a>
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
                            @if($asessmen_awal->count() > 0)
                            @foreach($asessmen_awal as $detail)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($detail->created_at)->format('d-m-Y') ?? '-' }}</td>
                                <td>{{ $detail->denyut_jantung ?? '-' }}</td>
                                <td>{{ $detail->pernafasan ?? '-' }}</td>
                                <td>{{ $detail->suhu_tubuh ?? '-' }}</td>
                                <td>{{ $detail->tekanan_darah_sistole ?? '-' }}/{{ $detail->tekanan_darah_diastole ?? '-' }}</td>
                                <td>{{ $detail->skala_nyeri ?? '-' }}</td>
                                <td>{{ $detail->keluhan_utama ?? '-' }}</td>
                                <td>{{ $detail->riwayat_penyakit ?? '-' }}</td>
                                <td>{{ $detail->riwayat_pengobatan ?? '-' }}</td>
                                <td>{{ $detail->status_psikologi ?? '-' }}</td>
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
                            @if($asuhan_keperawatan->count())
                            @foreach($asuhan_keperawatan as $index => $a)
                            <tr>
                                <td>{{ $index + 1 }}</td>
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
                            @endforeach
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

        <!-- Daftar CPPT -->
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Daftar CPPT
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>S</th>
                                <th>O</th>
                                <th>A</th>
                                <th>P</th>
                                <th>ID ICD10</th>
                                <th>ID ICD9</th>
                                <th>ID Obat</th>
                                <th>Pemeriksaan</th>
                                <th>File Penunjang</th>
                                <th>Kelas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cppt && count($cppt) > 0)
                            @foreach($cppt as $detail)
                            <tr>
                                <td>{{ $detail->s ?? '-' }}</td>
                                <td>{{ $detail->o ?? '-' }}</td>
                                <td>{{ $detail->a ?? '-' }}</td>
                                <td>{{ $detail->p ?? '-' }}</td>
                                <td>{{ $detail->id_icd10 ?? '-' }}</td>
                                <td>{{ $detail->id_icd9 ?? '-' }}</td>
                                <td>{{ $detail->id_obat ?? '-' }}</td>
                                <td>{{ $detail->pemeriksaan ?? '-' }}</td>
                                <td>{{ $detail->file_penunjang ?? '-' }}</td>
                                <td>{{ $detail->kelas ?? '-' }}</td>
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

        <!-- Daftar Pemeriksaan Poli Umum -->
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Daftar Pemeriksaan Poli Umum
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>ID Layanan</th>
                                <th>ID Perawat</th>
                                <th>Tanggal Periksa Pasien</th>
                                <th>Sistole</th>
                                <th>Diastole</th>
                                <th>Suhu</th>
                                <th>TB Pasien</th>
                                <th>BB Pasien</th>
                                <th>RR Pasien</th>
                                <th>Spo2</th>
                                <th>Diagnosa</th>
                                <th>Subyektif</th>
                                <th>Pemeriksaan Fisik</th>
                                <th>Kunjungan Sakit</th>
                                <th>Rencana Kontrol</th>
                                <th>Catatan Obat</th>
                                <th>Assesment</th>
                                <th>Bagian Periksa</th>
                                <th>Keterangan</th>
                                <th>Foto Fisik</th>
                                <th>Alasan Kontrol</th>
                                <th>Plan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($pemeriksaan && count($pemeriksaan) > 0)
                            @foreach($pemeriksaan as $detail)
                            <tr>
                                <td>{{ $detail->id_layanan ?? '-' }}</td>
                                <td>{{ $detail->id_perawat ?? '-' }}</td>
                                <td>{{ $detail->tanggal_periksa_pasien ?? '-' }}</td>
                                <td>{{ $detail->sistole ?? '-' }}</td>
                                <td>{{ $detail->diastole ?? '-' }}</td>
                                <td>{{ $detail->suhu ?? '-' }}</td>
                                <td>{{ $detail->tb_pasien ?? '-' }}</td>
                                <td>{{ $detail->bb_pasien ?? '-' }}</td>
                                <td>{{ $detail->rr_pasien ?? '-' }}</td>
                                <td>{{ $detail->spo2 ?? '-' }}</td>
                                <td>{{ $detail->diagnosa ?? '-' }}</td>
                                <td>{{ $detail->subjektif ?? '-' }}</td>
                                <td>{{ $detail->pemeriksaan_fisik ?? '-' }}</td>
                                <td>{{ $detail->kunjungan_sakit ?? '-' }}</td>
                                <td>{{ $detail->rencana_kontrol ?? '-' }}</td>
                                <td>{{ $detail->catatan_obat ?? '-' }}</td>
                                <td>{{ $detail->assesment ?? '-' }}</td>
                                <td>{{ $detail->bagian_periksa ?? '-' }}</td>
                                <td>{{ $detail->keterangan ?? '-' }}</td>
                                <td>{{ $detail->foto_fisik ?? '-' }}</td>
                                <td>{{ $detail->alasan_kontrol ?? '-' }}</td>
                                <td>{{ $detail->plan ?? '-' }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="22" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Daftar Pemeriksaan Poli Umum -->
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Daftar Pemeriksaan UGD
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>ID</th>
                                <th>Keluhan</th>
                                <th>Sistole</th>
                                <th>Diastole</th>
                                <th>Berat Badan</th>
                                <th>Tinggi Badan</th>
                                <th>Suhu</th>
                                <th>Spo2</th>
                                <th>Respiration Rate</th>
                                <th>Nadi</th>
                                <th>Plan</th>
                                <th>Assesment</th>
                                <th>Alat Bantu</th>
                                <th>Protesa</th>
                                <th>Cacat Tubuh</th>
                                <th>Mandiri</th>
                                <th>Dibantu</th>
                                <th>ADL</th>
                                <th>KU & Kesadaran</th>
                                <th>Kepala & Leher</th>
                                <th>Dada</th>
                                <th>Perut</th>
                                <th>Ekstrimitas</th>
                                <th>Status Lokalis</th>
                                <th>Penatalaksanaan</th>
                                <th>Umur ≥ 65</th>
                                <th>Keterbatasan Mobilitas</th>
                                <th>Perawatan Lanjutan</th>
                                <th>Bantuan</th>
                                <th>Masuk Kriteria</th>
                                <th>Hasil Pemeriksaan Fisik</th>
                                <th>Hasil Pemeriksaan</th>
                                <th>Penunjang</th>
                                <th>Hasil Asuhan</th>
                                <th>Lain-lain</th>
                                <th>Diagnosis</th>
                                <th>Rencana Asuhan</th>
                                <th>Hasil Pengobatan</th>
                                <th>Keterangan Edukasi</th>
                                <th>Rawat Jalan</th>
                                <th>Rawat Inap</th>
                                <th>Rujuk</th>
                                <th>Tanggal Pulang Paksa</th>
                                <th>Meninggal</th>
                                <th>Kondisi Saat Keluar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($pemeriksaan_ugd && count($pemeriksaan_ugd) > 0)
                            @foreach($pemeriksaan_ugd as $detail)
                            <tr>
                                @php
                                $opsi_ya_tidak = [
                                0 => 'tidak',
                                1 => 'ya'
                                ];
                                @endphp
                                <td>{{ $detail->id ?? '-' }}</td>
                                <td>{{ $detail->keluhan ?? '-' }}</td>
                                <td>{{ $detail->sistole ?? '-' }}</td>
                                <td>{{ $detail->diastole ?? '-' }}</td>
                                <td>{{ $detail->berat_badan ?? '-' }}</td>
                                <td>{{ $detail->tinggi_badan ?? '-' }}</td>
                                <td>{{ $detail->suhu ?? '-' }}</td>
                                <td>{{ $detail->spo02 ?? '-' }}</td>
                                <td>{{ $detail->respiration_rate ?? '-' }}</td>
                                <td>{{ $detail->nadi ?? '-' }}</td>
                                <td>{{ $detail->plan ?? '-' }}</td>
                                <td>{{ $detail->assesment ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->alat_bantu] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->protesa] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->cacat_tubuh] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->mandiri] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->dibantu] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->adl] ?? '-' }}</td>
                                <td>{{ $detail->ku_dan_kesadaran ?? '-' }}</td>
                                <td>{{ $detail->kepala_dan_leher ?? '-' }}</td>
                                <td>{{ $detail->dada ?? '-' }}</td>
                                <td>{{ $detail->perut ?? '-' }}</td>
                                <td>{{ $detail->ekstrimitas ?? '-' }}</td>
                                <td>{{ $detail->status_lokalis ?? '-' }}</td>
                                <td>{{ $detail->penatalaksanaan ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->umur_65] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->keterbatasan_mobilitas] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->perawatan_lanjutan] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->bantuan] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->masuk_kriteria] ?? '-' }}</td>
                                <td>{{ $detail->hasil_pemeriksaan_fisik ?? '-' }}</td>
                                <td>{{ $detail->hasil_pemeriksaan ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->penunjang] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->hasil_asuhan] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->lain_lain] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->diagnosis] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->rencana_asuhan] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->hasil_pengobatan] ?? '-' }}</td>
                                <td>{{ $detail->keterangan_edukasi ?? '-' }}</td>
                                <td>{{ $detail->rawat_jalan ?? '-' }}</td>
                                <td>{{ $detail->rawat_inap ?? '-' }}</td>
                                <td>{{ $detail->rujuk ?? '-' }}</td>
                                <td>{{ $detail->tanggal_pulang_paksa ?? '-' }}</td>
                                <td>{{ $detail->meninggal ?? '-' }}</td>
                                <td>{{ $detail->kondisi_saat_keluar ?? '-' }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="45" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


        <!-- Daftar Triase -->
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Daftar Triase
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Tanggal Masuk</th>
                                <th>Sarana Transportasi Kedatangan</th>
                                <th>Jam Masuk</th>
                                <th>Kondisi Pasien Tiba</th>
                                <th>Triase</th>
                                <th>Riwayat Alergi</th>
                                <th>Keluhan</th>
                                <th>Berat Badan</th>
                                <th>Tinggi Badan</th>
                                <th>Lingkar Perut</th>
                                <th>IMT</th>
                                <th>Nafas</th>
                                <th>Sistol</th>
                                <th>Diastol</th>
                                <th>Suhu</th>
                                <th>Nadi</th>
                                <th>Kepala</th>
                                <th>Mata</th>
                                <th>THT</th>
                                <th>Leher</th>
                                <th>Thorax</th>
                                <th>Abdomen</th>
                                <th>Extemitas</th>
                                <th>Genetalia</th>
                                <th>ECG</th>
                                <th>Ronsen</th>
                                <th>Terapi</th>
                                <th>KIE</th>
                                <th>Pemeriksaan Penunjang</th>
                                <th>Jalur Nafas</th>
                                <th>Pola Nafas</th>
                                <th>Gerakan Dada</th>
                                <th>Kulit</th>
                                <th>Turgor</th>
                                <th>Akral</th>
                                <th>SPO</th>
                                <th>Kesadaran</th>
                                <th>Mata Neurologi</th>
                                <th>Motorik</th>
                                <th>Verbal</th>
                                <th>Kondisi Umum</th>
                                <th>Laborat</th>
                                <th>Laboratorium Farmasi</th>
                                <th>Aktivitas Fisik</th>
                                <th>Konsumsi Alkohol</th>
                                <th>Makan Buah Sayur</th>
                                <th>Merokok</th>
                                <th>Riwayat Keluarga</th>
                                <th>Riwayat Penyakit Terdahulu</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($triase && count($triase) > 0)
                            @foreach($triase as $detail)
                            <tr>
                                <td>{{ $detail->tanggal_masuk ?? '-' }}</td>
                                <td>{{ $detail->sarana_transportasi_kedatangan ?? '-' }}</td>
                                <td>{{ $detail->jam_masuk ?? '-' }}</td>
                                <td>{{ $detail->kondisi_pasien_tiba ?? '-' }}</td>
                                <td>{{ $detail->triase ?? '-' }}</td>
                                <td>{{ $detail->riwayat_alergi ?? '-' }}</td>
                                <td>{{ $detail->keluhan ?? '-' }}</td>
                                <td>{{ $detail->berat_badan ?? '-' }}</td>
                                <td>{{ $detail->tinggi_badan ?? '-' }}</td>
                                <td>{{ $detail->lingkar_perut ?? '-' }}</td>
                                <td>{{ $detail->imt ?? '-' }}</td>
                                <td>{{ $detail->nafas ?? '-' }}</td>
                                <td>{{ $detail->sistol ?? '-' }}</td>
                                <td>{{ $detail->diastol ?? '-' }}</td>
                                <td>{{ $detail->suhu ?? '-' }}</td>
                                <td>{{ $detail->nadi ?? '-' }}</td>
                                <td>{{ $detail->kepala ?? '-' }}</td>
                                <td>{{ $detail->mata ?? '-' }}</td>
                                <td>{{ $detail->tht ?? '-' }}</td>
                                <td>{{ $detail->leher ?? '-' }}</td>
                                <td>{{ $detail->thorax ?? '-' }}</td>
                                <td>{{ $detail->abdomen ?? '-' }}</td>
                                <td>{{ $detail->extemitas ?? '-' }}</td>
                                <td>{{ $detail->genetalia ?? '-' }}</td>
                                <td>{{ $detail->ecg ?? '-' }}</td>
                                <td>{{ $detail->ronsen ?? '-' }}</td>
                                <td>{{ $detail->terapi ?? '-' }}</td>
                                <td>{{ $detail->kie ?? '-' }}</td>
                                <td>{{ $detail->pemeriksaan_penunjang ?? '-' }}</td>
                                <td>{{ $detail->jalur_nafas ?? '-' }}</td>
                                <td>{{ $detail->pola_nafas ?? '-' }}</td>
                                <td>{{ $detail->gerakan_dada ?? '-' }}</td>
                                <td>{{ $detail->kulit ?? '-' }}</td>
                                <td>{{ $detail->turgor ?? '-' }}</td>
                                <td>{{ $detail->akral ?? '-' }}</td>
                                <td>{{ $detail->spo ?? '-' }}</td>
                                <td>{{ $detail->kesadaran ?? '-' }}</td>
                                <td>{{ $detail->mata_neurologi ?? '-' }}</td>
                                <td>{{ $detail->motorik ?? '-' }}</td>
                                <td>{{ $detail->verbal ?? '-' }}</td>
                                <td>{{ $detail->kondisi_umum ?? '-' }}</td>
                                <td>{{ $detail->laborat ?? '-' }}</td>
                                <td>{{ $detail->laboratorium_farmasi ?? '-' }}</td>

                                @php
                                $opsi_ya_tidak = [
                                0 => 'tidak',
                                1 => 'ya'
                                ];
                                @endphp

                                <td>{{ $opsi_ya_tidak[$detail->aktivitas_fisik] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->konsumsi_alkohol] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->makan_buah_sayur] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->merokok] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->riwayat_keluarga] ?? '-' }}</td>
                                <td>{{ $opsi_ya_tidak[$detail->riwayat_penyakit_terdahulu] ?? '-' }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="49" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Daftar Layanan KIA -->
        <div class="card mt-4">
            <div class="card-header bg-secondary text-white">
                Daftar Layanan KIA
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead class="thead-light">
                            <tr>
                                <th>Tanggal</th>
                                <th>Jenis Pemeriksaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($layanan_kia && count($layanan_kia) > 0)
                            @foreach($layanan_kia as $item)
                            <tr>
                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') }}</td>
                                <td>{{ $item->jenis_pemeriksaan ?? '-' }}</td>
                            </tr>
                            @endforeach
                            @else
                            <tr>
                                <td colspan="2" class="text-center">Data tidak ditemukan.</td>
                            </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- TOMBOL CETAK --}}
    <div class="no-print mt-4 d-flex justify-content-end gap-2">
        <a href="{{ route('riwayat-medis.index') }}" class="btn btn-secondary">Kembali</a>
        <button onclick="window.print()" class="btn btn-primary">Cetak</button>
    </div>

    <script>
        window.print(); // Auto print saat dibuka
    </script>
</body>

</html>
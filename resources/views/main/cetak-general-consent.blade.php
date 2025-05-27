<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>General Consent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        body {
            font-size: 14px;
            line-height: 1.6;
            padding: 30px;
        }

        ol.sub-list {
            list-style-type: lower-alpha;
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        .list-angka {
            list-style: none;
            counter-reset: angka;
            padding-left: 1rem;
        }

        .list-angka li {
            counter-increment: angka;
            position: relative;
            padding-left: 1.5rem;
        }

        .list-angka li::before {
            content: counter(angka) ") ";
            position: absolute;
            left: 0;
        }

        td {
            padding: 0 !important;
        }
    </style>
</head>

<body>

    {{-- HEADER --}}
    <div class="row mb-4">
        <div class="col-6">
            <img src="{{ URL::asset('/build/images/logos/logopengembang.png') }}" height="40" alt="Logo">
        </div>
        <div class="col-6">
            <div class="text-center w-100">
                <p class="fw-bold mb-0"> KLINIK PRATAMA RAWAT JALAN INSAN MEDIKA</p>
                <span>Jl. R. Sosro Prawiro No. 1A Wirowongso, Ajung – Jember</span>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-6 border border-2 border-black d-flex align-items-center justify-content-center p-3">
            <h5 class="fw-bold">GENERAL CONSENT</h5>
        </div>
        <div class="col-6 border-start-0 border border-2 border-black p-3">
            <table class="table table-borderless mb-0">
                <tbody>
                    <tr>
                        <td>No. RM</td>
                        <td>: {{ $data->noRm }}</td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>: {{ $data->namaPasien }}</td>
                    </tr>
                    <tr>
                        <td>Tgl Lahir</td>
                        @php
                        use Carbon\Carbon;

                        $tanggal = Carbon::parse($data->tanggalLahir)->translatedFormat('d F Y');
                        $jkSingkat = $data->jenisKelamin === 1 ? 'L' : 'P';
                        @endphp
                        <td>:
                            {{ $tanggal }} ({{ $jkSingkat }})
                        </td>
                    </tr>
                    <tr>
                        <td>NIK</td>
                        <td>: {{ $data->nik }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="row border border-2 border-black border-top-0 p-3">
        {{-- DATA PENANGGUNG JAWAB --}}
        <p>Yang bertanda tangan di bawah ini:</p>
        <table class="table table-borderless">
            <tr>
                <td>Nama</td>
                <td>: {{ $data->namaWali }}</td>
            </tr>
            <tr>
                <td>Tanggal Lahir</td>
                <td>: {{ \Carbon\Carbon::parse($data->tanggalLahirWali)->timezone('Asia/Jakarta')->translatedFormat('d F Y')
                }}</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: {{ $data->alamat }}</td>
            </tr>
            <tr>
                <td>No. Telp</td>
                <td>: {{ $data->notelp }}</td>
            </tr>
            <tr>
                <td>Hubungan dengan Pasien</td>

                <td>: {{ $data->hubungan }}</td>
            </tr>
        </table>

        {{-- PERNYATAAN --}}
        <p>Selaku wali/pasien Klinik Pratama “Insan Medika”, dengan ini menyatakan:</p>

            <ol>
                <li>Informasi tentang Hak dan Kewajiban Pasien
                    <ol class="sub-list">
                        <li>
                            Dengan menandatangani dokumen ini saya mengakui bahwa pada proses pendaftaran untuk mendapatkan
                            pelayanan di Klinik Pratama "Insan Medika", saya telah mendapat informasi tentang hak dan
                            kewajiban saya sebagai pasien.
                        </li>
                        <li>
                            Saya telah menerima informasi tentang peraturan yang diberlakukan oleh Klinik Pratama "Insan
                            Medika", dan saya serta keluarga bersedia untuk mematuhinya.
                        </li>
                    </ol>
                </li>

            <li>Persetujuan Perawatan dan Pengobatan<br>
                    Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan medis, saya mengizinkan dokter
                    dan tenaga kesehatan lainnya untuk melakukan prosedur diagnostik, memberikan pengobatan medis sesuai
                    kebutuhan meliputi: pemeriksaan fisik, pemasangan alat kesehatan, asuhan keperawatan, pemeriksaan
                    laboratorium, dan pemeriksaan radiologi.
            </li>

            <li>Persetujuan Pelepasan Informasi
                <ol class="sub-list">
                    <li>
                        Saya memahami bahwa informasi tentang saya seperti diagnosis, hasil laboratorium, dan hasil tes
                        diagnostik akan digunakan untuk perawatan medis dan dijaga kerahasiaannya oleh Klinik Pratama
                        “Insan Medika”.
                    </li>
                    <li>
                        Saya <u>{{ $data->namaPasien }}</u>
                        {{ $data->beri === 'memberikan' ? 'memberi' : 'tidak memberi' }} wewenang kepada Klinik Pratama
                        “Insan Medika” untuk memberikan informasi tentang diagnosis hasil pelayanan dan pengobatan
                        apabila diperlukan untuk memproses klaim asuransi/BPJS dan perusahaan kerja sama.
                        @if ($data->penanggungJawab1 || $data->penanggungJawab2)
                            <ol class="list-angka">
                                @if ($data->penanggungJawab1)
                                    <li>{{ $data->penanggungJawab1 }}</li>
                                @endif
                                @if ($data->penanggungJawab2)
                                    <li>{{ $data->penanggungJawab2 }}</li>
                                @endif
                            </ol>
                        @endif
                    </li>
                </ol>
            </li>

          <li>Kebutuhan Privasi<br>
                Saya <u>{{ $data->namaPasien }}</u> Klinik Pratama "Insan Merdeka" akses bagi keluarga dan saudara
                serta orang-orang yang akan mendampingi saya saat pemeriksaan (sebutkan nama bila ada permintaan khusus
                yang tidak diijinkan):
                @if ($data->penanggungJawab3 || $data->penanggungJawab4)
                    <ol class="sub-list">
                        @if ($data->penanggungJawab3)
                            <li>{{ $data->penanggungJawab3 }}</li>
                        @endif
                        @if ($data->penanggungJawab4)
                            <li>{{ $data->penanggungJawab4 }}</li>
                        @endif
                    </ol>
                @endif
            </li>

            <li>Pemahaman Hak<br>
                Saya mengerti dan memahami tentang bahwa saya memiliki hak untuk persetujuan atau menolak persetujuan untuk setiap prosedur/terapi.
            </li>

            <li>Peserta Didik<br>
                Klinik Pratama “Insan Medika” telah memberikan informasi kepada saya terkait kemungkinan keterlibatan peserta didik/mahasiswa yang turut berpartisipasi dalam proses perawatan.
            </li>

            <li>Pengajuan Keluhan<br>
                Saya menyatakan bahwa saya telah menerima informasi tentang adanya tata cara mengajukan dan menanggapi keluhan terkait pelayanan medis ataupun administrasi yang diberikan terhadap diri saya. Saya setuju mengikuti tata cara mengajukan keluhan sesuai prosedur yang ada.
            </li>
        </ol>

        {{-- Pernyataan Penutup --}}
        <p>
            Dengan tanda tangan di bawah ini, saya menyatakan bahwa saya telah membaca dan sepenuhnya setuju dengan setiap pernyataan yang terdapat pada formulir ini dan menandatanganinya tanpa paksaan dan dengan kesadaran penuh seluruh kriteria yang terdapat pada persetujuan umum (General Consent).
        </p>

        {{-- Tanda Tangan --}}
        <div class="row text-center mt-5">
            <div class="col-6">
                <p>Pasien/keluarga/penanggung jawab</p>
            </div>
            <div class="col-6">
                <p>Jember, {{ \Carbon\Carbon::now('Asia/Jakarta')->format('d/m/Y') }}, Jam {{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') }} WIB</p>
                <p>Pemberi Informasi</p>
            </div>
        </div>

        <div class="row text-center mt-5">
            <div class="col-6">
                <p>( _______________________ )</p>
                <p>Tanda tangan dan nama terang</p>
            </div>
            <div class="col-6">
                <p>( _______________________ )</p>
                <p>Tanda tangan dan nama terang</p>
            </div>
        </div>

        </ol>

        {{-- TOMBOL CETAK (opsional saat preview) --}}
        <div class="no-print text-end mt-5 d-flex justify-content-end gap-2">
            <button onclick="window.history.back()" class="btn btn-primary">Kembali</button>
            <button onclick="window.print()" class="btn btn-primary">Cetak Dokumen</button>
        </div>
    </div>

    {{-- Cetak otomatis jika diakses --}}
    <script>
        window.print();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</body>

</html>
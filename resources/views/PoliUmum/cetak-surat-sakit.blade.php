<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Sakit</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 50px;
            color: #000;
        }

        .row {
            display: flex;
            align-items: center;
        }

        .logo img {
            display: block;
        }

        .header {
            text-align: center;
            border-bottom: 3px solid #000;
            padding-bottom: 10px;
            margin-bottom: 0px;
        }

        .header h2,
        .header h3,
        .header p {
            margin: 0;
        }

        .header h2 {
            font-size: 20px;
        }

        .header h3 {
            font-size: 18px;
        }

        .header p {
            font-size: 14px;
        }

        hr {
            border: 2px solid #000;
            margin: 10px 0;
        }

        .title {
            text-align: center;
            margin: 30px 0 20px 0;
        }

        .title h3 {
            text-decoration: underline;
            font-size: 18px;
            font-weight: bold;
        }

        .content {
            font-size: 16px;
            line-height: 1.8;
        }

        .info {
            margin-left: 40px;
        }

        .info .row {
            display: flex;
        }

        .info .row .label {
            width: 150px;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
        }

        .ttd {
            margin-top: 60px;
            text-align: right;
        }

        .ttd p {
            margin: 2px 0;
        }
    </style>
</head>

<body>

    <div class="header">
        <div class="row">
            <!-- Logo di sebelah kiri -->
            <div class="logo" style="flex: 1;">
                <img src="{{ URL::asset('/assets/klinik-insan.png') }}" width="150" alt="Logo">
            </div>

            <!-- Teks di sebelah kanan -->
            <div class="text" style="flex: 3; text-align: center;">
                <h2>KLINIK PRATAMA</h2>
                <h3>RAWAT JALAN INSAN MEDIKA</h3>
                <p>Jl. R. Sosro Prawiro No. 1A Wirowongso, Ajung – Jember</p>
            </div>
        </div>
    </div>

    <div class="title">
        <h3>SURAT KETERANGAN SAKIT</h3>
        <p>Nomor: {{ $rw->nomor_surat }}</p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini Dr. {{ $rw->pemeriksaan->pendaftaran->data_dokter->nama }}, Dokter KLINIK
            PRATAMA INSAN MEDIKA, menerangkan
            bahwa:</p>

        <div class="info">
            <div class="row">
                <div class="label">Nama</div>: {{ $rw->pemeriksaan->pendaftaran->data_pasien->nama_pasien }}
            </div>
            <div class="row">
                <div class="label">Tanggal Lahir</div>:
                {{ $rw->pemeriksaan->pendaftaran->data_pasien->tanggal_lahir_pasien }}
            </div>
            <div class="row">
                <div class="label">Jenis Kelamin</div>:
                {{ $rw->pemeriksaan->pendaftaran->data_pasien->jenis_kelamin == '1' ? 'Laki-laki' : 'Perempuan' }}
            </div>
            <div class="row">
                <div class="label">Pekerjaan</div>:
                {{ $rw->pemeriksaan->pendaftaran->data_pasien->pekerjaan_pasien == '0'
                    ? 'Tidak bekerja'
                    : ($rw->pemeriksaan->pendaftaran->data_pasien->pekerjaan_pasien == '1'
                        ? 'PNS'
                        : ($rw->pemeriksaan->pendaftaran->data_pasien->pekerjaan_pasien == '2'
                            ? 'TNI/POLRI'
                            : ($rw->pemeriksaan->pendaftaran->data_pasien->pekerjaan_pasien == '3'
                                ? 'BUMN'
                                : ($rw->pemeriksaan->pendaftaran->data_pasien->pekerjaan_pasien == '4'
                                    ? 'Pegawai Swasta/Wirausaha'
                                    : ($rw->pemeriksaan->pendaftaran->data_pasien->pekerjaan_pasien == '5'
                                        ? 'Lain-lain'
                                        : 'Tidak diketahui'))))) }}
            </div>
            <div class="row">
                <div class="label">Alamat</div>: {{ $rw->pemeriksaan->pendaftaran->data_pasien->alamat_pasien }}
                jawa timur 98765
            </div>
        </div>

        <p>Pada pemeriksaan saat ini ternyata dalam keadaan sakit, sehingga perlu istirahat selama {{ $rw->hari }}
            hari mulai tanggal
            {{ \Carbon\Carbon::parse($rw->tanggal_awal)->format('d-m-Y') }} s/d
            {{ \Carbon\Carbon::parse($rw->tanggal_awal)->format('d-m-Y') }}.</p>

        <p>Demikian agar digunakan sebagaimana mestinya.</p>
    </div>

    <div class="footer">
        <p>Jember, {{ \Carbon\Carbon::now()->isoFormat('d MMMM Y') }}</p>
        <p>Dokter yang memeriksa:</p>
    </div>

    <div class="ttd">
        <p><strong>Dr. {{ $rw->pemeriksaan->pendaftaran->data_dokter->nama }}</strong></p>
        <p>{{ $rw->pemeriksaan->pendaftaran->data_dokter->no_sip }}</p>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>

</body>

</html>

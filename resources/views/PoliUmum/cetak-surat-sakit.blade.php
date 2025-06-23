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

        .header {
            text-align: center;
            margin-bottom: 20px;
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
        <img src="{{ URL::asset('/assets/klinik-insan.png') }}" width="100" alt="Logo" style="float: left;">
        <h2>KLINIK PRATAMA</h2>
        <h3>RAWAT JALAN INSAN MEDIKA</h3>
        <p>Jl. R. Sosro Prawiro No. 1A Wirowongso, Ajung – Jember</p>
    </div>
    <hr>

    <div class="title">
        <h3>SURAT KETERANGAN SAKIT</h3>
        <p>Nomor: {{ $rw->nomor_surat }}</p>
    </div>

    <div class="content">
        <p>Yang bertanda tangan di bawah ini dr. Ida Lailatul Hasanah, Dokter KLINIK PRATAMA INSAN MEDIKA, menerangkan
            bahwa:</p>

        <div class="info">
            <div class="row">
                <div class="label">Nama</div>: {{ $rw->pemeriksaan->pendaftaran->data_pasien->nama_pasien }}
            </div>
            <div class="row">
                <div class="label">Tanggal Lahir</div>: {{ $rw->pemeriksaan->pendaftaran->data_pasien->tanggal_lahir_pasien }}
            </div>
            <div class="row">
                <div class="label">Jenis Kelamin</div>: {{ $rw->pemeriksaan->pendaftaran->data_pasien->jenis_kelamin == '1' ? 'Laki-laki' : 'Perempuan' }}
            </div>
            <div class="row">
                <div class="label">Pekerjaan</div>: {{ $rw->pemeriksaan->pendaftaran->data_pasien->pekerjaan }}
            </div>
            <div class="row">
                <div class="label">Alamat</div>: {{ $rw->pemeriksaan->pendaftaran->data_pasien->alamat_pasien }}
                jawa timur 98765
            </div>
        </div>

        <p>Pada pemeriksaan saat ini ternyata dalam keadaan sakit, sehingga perlu istirahat selama {{ $rw->hari }} hari mulai tanggal
            {{ \Carbon\Carbon::parse($rw->tanggal_awal)->format('d-m-Y') }} s/d {{ \Carbon\Carbon::parse($rw->tanggal_awal)->format('d-m-Y') }}.</p>

        <p>Demikian agar digunakan sebagaimana mestinya.</p>
    </div>

    <div class="footer">
        <p>({{ \Carbon\Carbon::now()->isoFormat('d MMMM Y') }})</p>
        <p>Dokter yang memeriksa:</p>
    </div>

    <div class="ttd">
        <p><strong>{{ $rw->pemeriksaan->pendaftaran->data_dokter->nama }}</strong></p>
        <p>SIP.{{ $rw->pemeriksaan->pendaftaran->data_dokter->no_sip }}</p>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>

</body>

</html>

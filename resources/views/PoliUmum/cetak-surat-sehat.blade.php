<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Sehat</title>
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

        .header h2 {
            margin: 0;
            font-size: 20px;
        }

        .header h3 {
            margin: 0;
            font-size: 18px;
        }

        .header p {
            margin: 0;
            font-size: 14px;
        }

        .title {
            text-align: center;
            margin: 30px 0 10px 0;
        }

        .title h3 {
            text-decoration: underline;
            font-size: 18px;
            font-weight: bold;
        }

        .title p {
            margin-top: 5px;
        }

        .content {
            font-size: 16px;
            line-height: 1.8;
        }

        .content .row {
            display: flex;
        }

        .content .row .label {
            width: 180px;
        }

        .content .indent {
            text-indent: 40px;
        }

        .keterangan {
            margin-top: 20px;
        }

        .keterangan .row {
            display: flex;
        }

        .footer {
            margin-top: 50px;
            text-align: right;
        }

        .ttd {
            margin-top: 60px;
            text-align: right;
        }

        .ttd p {
            margin: 2px 0;
        }

        .dotline {
            border-bottom: 1px dotted black;
            margin: 10px 0;
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
        <hr style="border: 2px solid black; margin-top: 0px;">
    </div>

    <div class="title">
        <h3>SURAT KETERANGAN SEHAT</h3>
        <p>Nomor: {{ $rw->nomor_surat }}</p>
    </div>

    <div class="content">
        <p class="indent">Yang bertanda tangan di bawah ini dr. Ida Lailatul Hasanah, Dokter KLINIK PRATAMA INSAN
            MEDIKA,
            menerangkan bahwa:</p>

        <div class="row">
            <div class="label">Nama</div>: {{ $rw->pemeriksaan->pendaftaran->data_pasien->nama_pasien }}
        </div>
        <div class="row">
            <div class="label">Kelamin</div>:
            {{ $rw->pemeriksaan->pendaftaran->data_pasien->jenis_kelamin == '1' ? 'Laki-laki' : 'Perempuan' }}
        </div>
        <div class="row">
            <div class="label">Tanggal Lahir</div>:
            {{ $rw->pemeriksaan->pendaftaran->data_pasien->tanggal_lahir_pasien }}
        </div>
        <div class="row">
            <div class="label">Jenis Pekerjaan</div>: {{ $rw->pemeriksaan->pendaftaran->data_pasien->pekerjaan }}
        </div>
        <div class="row">
            <div class="label">Alamat</div>: J{{ $rw->pemeriksaan->pendaftaran->data_pasien->alamat_pasien }}
        </div>

        <p>Telah menjalani pemeriksaan kesehatan jasmani pada tanggal
            {{ \Carbon\Carbon::parse($rw->pemeriksaan->tanggal_periksa_pasien)->format('d-m-Y') }} dengan hasil:</p>
        <div class="dotline">{{ $rw->hasil }}</div>

        <p>Surat keterangan ini dipergunakan untuk :</p>
        <div class="dotline">{{ $rw->dipergunakan_untuk }}</div>
        <div class="dotline">Demikian agar digunakan sebagaimana mestinya.</div>

        <div class="keterangan">
            <p><strong>Keterangan:</strong></p>
            <div class="row">
                <div class="label">Berat Badan</div>: {{ $rw->pemeriksaan->bb_pasien }} KG
            </div>
            <div class="row">
                <div class="label">Tinggi Badan</div>: {{ $rw->pemeriksaan->tb_pasien }} CM
            </div>
            <div class="row">
                <div class="label">Golongan Darah</div>:
                {{ $rw->pemeriksaan->pendaftaran->data_pasien->gol_darah == 1
                    ? 'A'
                    : ($rw->pemeriksaan->pendaftaran->data_pasien->gol_darah == 2
                        ? 'B'
                        : ($rw->pemeriksaan->pendaftaran->data_pasien->gol_darah == 3
                            ? 'AB'
                            : ($rw->pemeriksaan->pendaftaran->data_pasien->gol_darah == 4
                                ? 'O'
                                : 'Tidak Diketahui'))) }}
            </div>
            <div class="row">
                <div class="label">Tekanan Darah</div>: {{ $rw->pemeriksaan->sistole }}/{{ $rw->pemeriksaan->diastole }} mmHG
            </div>
        </div>
    </div>

    <div class="footer">
        <p>Jember, {{ \Carbon\Carbon::now()->isoFormat('d MMMM Y') }}</p>
        <p>Dokter yang memeriksa:</p>
    </div>

    <div class="ttd">
        <div style="width: 200px; height: 80px; border: 1px dashed #666;"></div>
        <p><strong>Dr. {{ $rw->pemeriksaan->pendaftaran->data_dokter->nama }}</strong></p>
        <p><strong>{{ $rw->pemeriksaan->pendaftaran->data_dokter->no_sip }}</strong></p>
    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>

</body>

</html>

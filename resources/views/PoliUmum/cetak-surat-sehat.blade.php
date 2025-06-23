<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Keterangan Sehat</title>
    <style>
        body {
            font-family: "Times New Roman", serif;
            margin: 40px;
            font-size: 14px;
        }

        .container {
            border: 2px solid #00B0F0;
            padding: 30px;
            max-width: 800px;
            margin: auto;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .header h2 {
            margin: 0;
            text-decoration: underline;
        }

        .logo {
            float: left;
            width: 100px;
        }

        .clinic-name {
            text-align: center;
            font-weight: bold;
        }

        .clearfix {
            clear: both;
        }

        .content {
            margin-top: 20px;
        }

        .content p {
            margin: 6px 0;
        }

        .label {
            display: inline-block;
            width: 150px;
        }

        .signature {
            float: right;
            text-align: center;
            margin-top: 40px;
        }

        .footer {
            margin-top: 80px;
            text-align: left;
            font-weight: bold;
        }

        hr {
            margin-top: 20px;
            border: none;
            border-top: 1px solid #000;
        }
    </style>
</head>

<body>

    <div class="container">
        <div class="logo">
            <img src="{{ asset('build/images/logos/logo.png') }}"
                width="80">
        </div>
        <div class="clinic-name">
            <p>KLINIK PRATAMA<br>RAWAT JALAN INSAN MEDIKA<br>
                Jl. R. Sosro Prawiro No. 1A Wirowongso, Ajung – Jember</p>
        </div>
        <div class="clearfix"></div>
        <div class="header">
            <h2>SURAT KETERANGAN SEHAT</h2>
            <p>Nomor: 001SS/KM/I/2025</p>
        </div>

        <div class="content">
            <p>Yang bertanda tangan di bawah ini dr. Ida Lailatul Hasanah, Dokter KLINIK PRATAMA INSAN MEDIKA,
                menerangkan bahwa:</p>
            <p><span class="label">Nama</span>: Muhammad Jaemin</p>
            <p><span class="label">Kelamin</span>: Laki - laki</p>
            <p><span class="label">Tanggal Lahir</span>: 13 Agustus 2000</p>
            <p><span class="label">Jenis Pekerjaan</span>: Wiraswasta</p>
            <p><span class="label">Alamat</span>: Jl. Trunojoyo, Kec. Kaliwates, Kab. Jember</p>

            <p>Telah menjalani pemeriksaan kesehatan jasmani pada tanggal 13 Maret dengan hasil:</p>
            <p><strong>Alhamdulillah sehat</strong></p>

            <p>Surat keterangan ini dipergunakan untuk :</p>
            <p>Agar terindikasi sehat</p>

            <p>Demikian agar digunakan sebagaimana mestinya.</p>

            <p><strong>Keterangan:</strong></p>
            <p><span class="label">Berat Badan</span>: 60 Kg</p>
            <p><span class="label">Tinggi Badan</span>: 180 CM</p>
            <p><span class="label">Golongan Darah</span>: O</p>
            <p><span class="label">Tekanan Darah</span>: 000.00/000.00 mmHG</p>
        </div>

        <div class="signature">
            <p>Jember, ..................................</p>
            <p>Dokter yang memeriksa:</p>
            <br><br><br>
            <p><strong>Dr. IDA LAILATUL HASANAH</strong><br>
                SIP: 503/A.1/0278DU/35.09.325/2023</p>
        </div>

        <div class="clearfix"></div>
    </div>

</body>

</html>

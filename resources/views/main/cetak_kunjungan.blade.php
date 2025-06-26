<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Kunjungan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <style>
        body {
            font-size: 14px;
            padding: 30px;
        }

        th, td {
            vertical-align: middle !important;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>
<body>

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center">
        <div class="col-6">
            <img src="{{ URL::asset('/assets/klinik-insan.png') }}" width="100"  alt="Logo">
        </div>
        <div class="col-6 text-end">
            <p class="fw-bold mb-0">KLINIK PRATAMA RAWAT JALAN INSAN MEDIKA</p>
            <span>Jl. R. Sosro Prawiro No. 1A Wirowongso, Ajung – Jember</span>
        </div>
    </div>

    {{-- JUDUL DOKUMEN --}}
    <div class="border border-2 border-dark text-center py-2 mb-3">
        <h5 class="fw-bold mb-0">LAPORAN KUNJUNGAN PASIEN</h5>
        <small>Periode: {{ $tanggal_awal }} s/d {{ $tanggal_akhir }}</small>
    </div>

    {{-- TABEL --}}
    <table class="table table-bordered table-striped">
        <thead class="table-secondary text-center">
            <tr>
                <th>No</th>
                <th>No RM</th>
                <th>Nama Pasien</th>
                <th>Tanggal Pendaftaran</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td>{{ $item->no_rm }}</td>
                    <td>{{ $item->data_pasien->nama_pasien ?? '-' }}</td>
                    <td>{{ $item->created_at ? \Carbon\Carbon::parse($item->created_at)->format('d-m-Y') : '-' }}</td>
                    <td>{{ $item->kondisi_saat_keluar ?? '-' }}</td>

                </tr>
            @endforeach 
        </tbody>
    </table>

    {{-- TOMBOL CETAK --}}
    <div class="no-print mt-4 d-flex justify-content-end gap-2">
        <a href="{{ route('laporan.kunjungan.index') }}" class="btn btn-secondary">Kembali</a>
        <button onclick="window.print()" class="btn btn-primary">Cetak</button>
    </div>

    <script>
        window.print(); // Auto print saat dibuka
    </script>
</body>
</html>

@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
<style>
    .container { max-width: 1200px; margin: 0 auto; padding: 20px; }
    .title { font-size: 32px; font-weight: bold; text-align: center; color: #1e3a8a; margin-bottom: 30px; }
    .card { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    .row { display: flex; flex-wrap: wrap; gap: 20px; }
    .col-half { flex: 1; min-width: 300px; }
    .btn { padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer; }
    .btn-blue { background: #2563eb; color: white; }
    .btn-gray { background: #ccc; color: #333; }
    .btn-yellow { background: #f59e0b; color: white; }
    table { width: 100%; border-collapse: collapse; margin-top: 10px; }
    table, th, td { border: 1px solid #ddd; }
    th, td { padding: 10px; text-align: center; }
    th { background-color: #f3f4f6; }
    select, label { display: block; margin-bottom: 10px; }
    select { width: 100%; padding: 8px; border-radius: 4px; border: 1px solid #ccc; }
</style>

<div class="container">
    <h1 class="title">Laporan 10 Besar Penyakit</h1>

    <div class="row">
        <!-- Filter Panel -->
        <div class="col-half">
            <div class="card">
                <div style="margin-bottom: 15px;">
                    <button class="btn btn-blue">10 Besar Penyakit</button>
                    <button class="btn btn-gray">Laporan Kunjungan</button>
                </div>

                <form method="GET" action="{{ route('poliumum.laporan') }}">
                    <label for="bulan">Bulan</label>
                    <select name="bulan" id="bulan">
                        <option value="Mei" {{ $bulan == 'Mei' ? 'selected' : '' }}>Mei</option>
                        <option value="Juni" {{ $bulan == 'Juni' ? 'selected' : '' }}>Juni</option>
                        <option value="Juli" {{ $bulan == 'Juli' ? 'selected' : '' }}>Juli</option>
                        <!-- Tambahkan opsi bulan lainnya jika perlu -->
                    </select>

                    <label for="cara_bayar">Cara Bayar</label>
                    <select name="cara_bayar" id="cara_bayar">
                        <option value="Umum" {{ $caraBayar == 'Umum' ? 'selected' : '' }}>Umum</option>
                        <option value="BPJS" {{ $caraBayar == 'BPJS' ? 'selected' : '' }}>BPJS</option>
                        <option value="Asuransi" {{ $caraBayar == 'Asuransi' ? 'selected' : '' }}>Asuransi</option>
                    </select>

                    <div style="margin-top: 15px;">
                        <button type="submit" class="btn btn-blue">Tampilkan</button>
                        <button type="button" class="btn btn-yellow">Download</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Table Panel -->
        <div class="col-half">
            <div class="card">
                <h2 style="text-align:center; margin-bottom:5px;">10 BESAR PENYAKIT</h2>
                <p style="text-align:center; font-size:14px;">01 {{ $bulan }} 2024 s/d 30 {{ $bulan }} 2025</p>

                <table>
                    <thead>
                        <tr>
                            <th>NO</th>
                            <th>KODE ICD-X</th>
                            <th>NAMA PENYAKIT</th>
                            <th>JUMLAH</th>
                            <th>%</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data as $index => $row)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $row[0] }}</td>
                                <td>{{ $row[1] }}</td>
                                <td>{{ $row[2] }}</td>
                                <td>{{ $row[3] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

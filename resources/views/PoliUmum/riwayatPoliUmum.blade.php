@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
{{-- Select2 CSS --}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<style>
@import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

.judul-riwayat {
    font-family: 'Montserrat', sans-serif;
    font-size: 3rem;
    font-weight: 800;
    text-align: left;
    color: #111754;
    text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
}

.tabel-wrapper {
    width: 100%;
    max-width: 100%;
    overflow-x: auto;
    background-color: #ffffff;
    border-radius: 12px;
    padding: 24px;
    margin-bottom: 80px;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
}

table {
    border-collapse: collapse;
    width: 100%;
    table-layout: auto;
}

th,
td {
    padding: 8px 12px;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    border: 0.3px solid #B9B9B9;
    white-space: nowrap;
    text-align: left;
    vertical-align: middle;
}

th {
    background-color: #F9FAFC;
    font-weight: 600;
}

td {
    background-color: white;
    font-weight: 400;
}

.btn-detail {
    font-size: 13px;
    padding: 4px 10px;
    background-color: #4DBFFF;
    border: none;
    border-radius: 4px;
    color: white;
}
</style>

<div class="container-fluid py-4">
    <h1 class="judul-riwayat mb-4">Riwayat Pemeriksaan</h1>

    {{-- Search Bar dengan Select2 --}}
    <div class="mb-3 d-flex justify-content-end">
        <select class="form-control w-25 me-2" id="searchPasien" style="width: 100%;">
            <option value="">Cari Data Pasien...</option>
        </select>
        <a href="#" id="btnCariPasien" class="btn btn-primary"><i class="ti ti-search"></i></a>
    </div>

    {{-- Table --}}
    <div class="tabel-wrapper">
        <table class="table table-bordered mb-0">
            <thead>
                <tr>
                    <th>NO. RM</th>
                    <th>NAMA</th>
                    <th>NIK</th>
                    <th>TANGGAL PERIKSA</th>
                    <th>AKSI</th>
                </tr>
            </thead>
            <tbody>
                @foreach ([
                ['RM000754', 'Na Jaemin', '3509XXXXXXXXXXX'],
                ['RM000841', 'Oktavia', '3509XXXXXXXXXXX'],
                ['RM000645', 'Jennie', '3509XXXXXXXXXXX'],
                ['RM000312', 'Laili', '3509XXXXXXXXXXX'],
                ['RM000410', 'Shofi', '3509XXXXXXXXXXX'],
                ['RM000453', 'Jaehyun', '3509XXXXXXXXXXX'],
                ['RM000256', 'Asahi', '3509XXXXXXXXXXX'],
                ['RM000213', 'Erwiyan', '3509XXXXXXXXXXX'],
                ] as $row)
                <tr>
                    <td>{{ $row[0] }}</td>
                    <td>{{ $row[1] }}</td>
                    <td>{{ $row[2] }}</td>
                    <td>19-05-2025</td>
                    <td>
                        <a href="{{ route('poli-umum.detail', ['rm' => $row[0]]) }}" class="btn-detail">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{-- Script --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function () {
        $('#searchPasien').select2({
            placeholder: 'Cari Data Pasien...',
            allowClear: true,
            ajax: {
                url: '{{ route("poli-umum.search-pasien") }}',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.results
                    };
                },
                cache: true
            }
        });

        $('#btnCariPasien').on('click', function (e) {
            e.preventDefault();
            const noRM = $('#searchPasien').val();
            if (noRM) {
                window.location.href = `/poli-umum/detail/${noRM}`;
            } else {
                alert('Silakan pilih data pasien terlebih dahulu.');
            }
        });
    });
</script>
@endsection

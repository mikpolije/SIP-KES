@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@800&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap');

        .judul-antrean {
            font-family: 'Montserrat', sans-serif;
            font-size: 3rem;
            font-weight: 800;
            text-align: left;
            color: #111754;
            text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
        }

        .tabel-wrapper {
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
            padding: 1px 6px;
            font-family: 'Poppins', sans-serif;
            font-size: 13px;
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

        td button {
            padding: 4px 10px;
            font-size: 12px;
        }
    </style>

    <div class="container py-4">
        <h1 class="judul-antrean mb-4">Antrean Poli KIA</h1>

        {{-- Search Bar --}}
        <div class="mb-3 d-flex justify-content-end">
            <input type="text" class="form-control w-25 me-2" placeholder="Data Pasien">
            <button class="btn btn-primary"><i class="ti ti-search"></i></button>
        </div>

        {{-- Table --}}
        <div class="tabel-wrapper">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>NO ANTREAN</th>
                        <th>NOMOR RM</th>
                        <th>NAMA</th>
                        <th>TANGGAL PENDAFTARAN</th>
                        <th>UNIT LAYANAN</th>
                        <th>DOKTER</th>
                        <th>TIPE PASIEN</th>
                        <th>STATUS</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    
                    
                    @foreach ([
                        ['1','id001001', 'Arga Pratama', 'Umum', 'dr. Oktavia', 'Umum', 'Diperiksa'], 
                        ['2','id001002', 'Keisha Anindya', 'Umum', 'dr. Erwiyan', 'Umum', 'Diperiksa'],
                        ['3','id001003', 'Dimas Fadlan', 'Umum', 'dr. Laili Fitriana', 'Umum', 'Diperiksa'],
                        ['4','id001004', 'Nayla Putri', 'Umum', 'dr. Erwiyan', 'Umum', 'Diperiksa'],
                        ['5','id001005', 'Rizqy Maulana', 'Umum', 'dr. Oktavia Putri', 'Umum', 'Diperiksa'],
                        ['6','id001006', 'Alika Salsabila', 'Umum', 'dr. Sisil Karina', 'Umum', 'Antre'],
                        ['7','id001007', 'Revan Aditya', 'Umum', 'dr. Shofi', 'Umum', 'Antre'],
                        ['8','id001008', 'Tania Ramadhani', 'Umum', 'dr. Arvin Maulana', 'Umum', 'Antre'],
                        ['9','id001009', 'Ilham Setiawan', 'Umum', 'dr. Arvin Maulana', 'Umum', 'Antre'],
                        ['10','id001010', 'Vania Lestari', 'Umum', 'dr. Sisil Karina', 'Umum', 'Antre'],
                        ] as $i)

                        <tr>
                            <td>{{ $i[0] }}</td>
                            <td>{{ $i[1] }}</td>
                            <td>{{ $i[2] }}</td>
                            </td>
                            <td>17-04-2025</td>
                            <td>{{ $i[3] }}</td>
                            <td>{{ $i[4]}}
                            </td>
                            <td>{{ $i[5]}}</td>
                            <td>
                                {{ $i[6] }}
                            </td>
                            <td>
                                <button class="btn btn-sm btn-primary">Pilih</button>
                                <a href="{{ route('polikia.detailkia', parameters: ['id' => $i[1]]) }}" class="btn btn-sm btn-primary">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Fungsi pencarian pasien
            $('#btnCariPasien').on('click', function (e) {
                e.preventDefault();
                const noRM = $('#searchPasien').val();
                if (noRM) {
                    window.location.href = `/poli-kia/detail/${noRM}`;
                } else {
                    alert('Silakan pilih data pasien terlebih dahulu.');
                }
            });
        });

        // Fungsi pencarian pasien
        $('#btnCariPasien').on('click', function (e) {
            e.preventDefault();
            const noRM = $('#searchPasien').val();
            if (noRM) {
                window.location.href = `/poli-kia/detail/${noRM}`;
            } else {
                alert('Silakan pilih data pasien terlebih dahulu.');
            }
        });
    </script>
@endsection
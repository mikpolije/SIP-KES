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
        td {
            background-color: white;
            font-weight: 400;
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
                        <th class="text-center">NO ANTREAN</th>
                        <th class="text-center">NOMOR RM</th>
                        <th class="text-center">NAMA</th>
                        <th class="text-center">UNIT LAYANAN</th>
                        <th class="text-center">DOKTER</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($data_pasien as $i)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $i->data_pasien->no_rm }}</td>
                            <td>{{ $i->data_pasien->nama_pasien }}</td>
                            @if ($i->poli->nama_poli == 'Poli KIA')
                                <td>{{ $i->poli->nama_poli }}</td>
                            @else
                                <td> </td>
                            @endif
                            <td>{{ $i->dokter->nama }}</td>
                            <td>{{ $i->status }}</td>
                            <td>
                                <a href="{{ route('poliumum.pemeriksaanAwal', $i->id_pendaftaran) }}"
                                    class="btn btn-sm btn-primary">Pilih</a>
                            </td>
                        </tr>
                    @endforeach
                    @foreach ([
                            ['1', 'RM000010', 'Arga Pratama', 'KIA', 'dr. Oktavia', 'Umum', 'Diperiksa'],
                            ['2', 'RM000011', 'Keisha Anindya', 'KIA', 'dr. Erwiyan', 'Umum', 'Diperiksa'],
                            ['3', 'RM000012', 'Dimas Fadlan', 'KIA', 'dr. Laili Fitriana', 'Umum', 'Diperiksa'],
                            ['4', 'RM000013', 'Nayla Putri', 'KIA', 'dr. Arvin Maulana', 'Umum', 'Diperiksa'],
                        ] as $i)
                        <tr>
                          <td class="text-center">{{ $i[0] }}</td>
                                    <td class="text-center">{{ $i[1] }}</td>
                                    <td class="text-center">{{ $i[2] }}</td>
                                    <td class="text-center">17-04-2025</td>
                                    <td class="text-center">{{ $i[3] }}</td>
                                    <td class="text-center">{{ $i[4] }}</td>
                                    <td class="text-center">{{ $i[5] }}</td>
                            <td class="text-center">{{ $i[6] }}</td>
                            <td>
                                <div class="btn-group">
                                    <select class="form-select btn btn-primary" style="width: 100px; padding: 4px 6px;">
                                    <option selected>Pilih</option>
                                    <option value="1">Kehamilan</option>
                                    <option value="2">Persalinan</option>
                                    <option value="3">KB</option>
                                    <option value="4">Anak</option>
                                    </select>
                                </div>
                                    <a href="{{ route('main.polikia.detailkia', parameters: ['id' => $i[1]]) }}" class="btn btn-sm btn-primary">Detail</a>
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
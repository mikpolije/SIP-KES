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
                        <th class="text-center">TANGGAL</th>
                        <th class="text-center">UNIT LAYANAN</th>
                        <th class="text-center">DOKTER</th>
                        <th class="text-center">STATUS</th>
                        <th class="text-center">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_pasien as $i)
                        <tr>
                            @if ($i->poli->nama_poli == 'Poli KIA')
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="text-center">{{ $i->data_pasien->no_rm }}</td>
                                <td>{{ $i->data_pasien->nama_pasien }}</td>
                                <td>{{ $i->created_at->format('d-m-Y') }}</td>
                                <td class="text-center">{{ $i->poli->nama_poli }}</td>
                                <td>{{ $i->dokter->nama }}</td>
                                <td class="text-center">{{ $i->status }}</td>
                                <td class="text-center">
                                    <div class="btn-group">
                                        <select class="form-select btn btn-primary pilih-jenis-pemeriksaan"
                                            data-no_rm="{{ $i->no_rm }}">
                                            <option selected disabled>Pilih</option>
                                            <option value="Kehamilan">Kehamilan</option>
                                            <option value="Persalinan">Persalinan</option>
                                            <option value="KB">KB</option>
                                            <option value="Anak">Anak</option>
                                        </select>
                                    </div>
                                    <a href="{{ route('main.polikia.detailkia', ['no_rm' => $i->no_rm]) }}"
                                        class="btn btn-sm btn-primary">Detail</a>
                                </td>
                            @else
                                @continue
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function () {
            // Fungsi pencarian pasien
            $('#btnCariPasien').on('click', function (e) {
                e.preventDefault();
                const noRM = $('#searchPasien').val();
                if (noRM) {
                    window.location.href = `/main/polikia/detail/${noRM}`;
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
                window.location.href = `/main/polikia/detail/${noRM}`;
            } else {
                alert('Silakan pilih data pasien terlebih dahulu.');
            }
        });
    </script>
    <script>
$(document).on('change', '.pilih-jenis-pemeriksaan', function () {
    console.log('Dropdown changed!');
    const jenis = $(this).val();
    const no_rm = $(this).data('no_rm');
    console.log('jenis:', jenis, 'no_rm:', no_rm);

    if (!jenis || !no_rm) return;

    $.ajax({
        url: "{{ route('api.poli-kia.storeAntrean') }}",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            no_rm: no_rm,
            jenis_pemeriksaan: jenis,
            status: 'antri'
        },
        success: function (res) {
            console.log('AJAX success:', res);
            if (res.redirect) {
                window.location.href = res.redirect;
            } else {
                toastr.success('Jenis pemeriksaan berhasil dipilih dan status diubah ke antri.');
            }
        },
        error: function (xhr) {
            console.log('AJAX error:', xhr);
            toastr.error('Gagal mengubah jenis pemeriksaan.');
        }
    });
});
</script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
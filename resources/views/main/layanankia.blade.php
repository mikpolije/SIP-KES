@extends('layouts.master')

@section('title', 'SIP-Kes | Layanan')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<style>
    .title{
        font-family: 'Montserrat', sans-serif;
        font-size: 3rem;
        font-weight: bold;
        text-align: left;
        color: #111754;
        text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
    }

    .subtitle {
        font-family: 'Poppins', sans-serif;
        font-size: 1.5rem;
        font-weight: medium;
        text-align: left;
        color: #1A1A1A;
        padding: 9px 0;
    }

    .section-title {
        font-size: 16px;
        margin-bottom: 1.2rem;
    }

    .required-label::after {
        content: " *";
        color: red;
        font-weight: bold;
    }


    #cari-data-container {
        position: relative;

        i {
            position: absolute;
            top: 50%;
            left: 20px;
            transform: translateY(-50%);
            color: #111754;
        }

        input {
            padding-left: 30px;
        }
    }

    .icd-container {
        overflow: hidden;

        .icd-title {
            background-color: #676981;
            padding: 5px 0;
            color: white;
        }

        .icd-content {
            background-color: #e3e4e9;
            padding: 5px 0;
            color: black;
        }

        p {
            text-align: center;
            margin: 0;
            padding: 0;
        }
    }
</style>
@endsection

@section('pageContent')
<div class="container-fluid">
    <h1 class="title">Layanan</h1>

    <div class="row justify-content-between align-items-center mt-5">
        <div class="col-md-6">
            <h5 class="subtitle">Data Layanan</h5>
        </div>
        <div class="col-md-4" id="cari-data-container">
            <input type="search" name="" id="cari_data_pasien" class="form-control" placeholder="Data Pasien">
            <i class="fa-solid fa-magnifying-glass"></i>
        </div>
    </div>

    <div class="card w-100 mt-3">
        <div class="card-body">
            <div class="row">
                <div class="col-md-9">
                    <label for="id_pendaftaran" class="form-label">ID Pendaftaran</label>
                    <input type="text" class="form-control" name="id_pendaftaran" id="id_pendaftaran" required>
                </div>
                <div class="col-md-3">
                    <label for="cari_data_pendaftaran" class="form-label">&nbsp;</label>
                    <input type="button" class="btn btn-primary form-control" name="cari_data_pendaftaran" id="cari_data_pendaftaran" value="Cari">
                </div>
            </div>
        </div>
    </div>

    <div class="card w-100 mt-3">
        <div class="card-body row">
            <div class="col-md-2">
                <label for="no_antrian" class="form-label">No Antrian</label>
                <input type="text" class="form-control" name="no_antrian" id="no_antrian" required>
            </div>
            <div class="col-md-2">
                <label for="no_rm" class="form-label">No RM</label>
                <input type="text" class="form-control" name="no_rm" id="no_rm" disabled>
            </div>
            <div class="col-md-4">
                <label for="nama_pemeriksaan" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama_pemeriksaan" id="nama_pemeriksaan" disabled>
            </div>
            <div class="col-md-2">
                <label for="tanggal" class="form-label">Tanggal</label>
                <input type="date" class="form-control" name="tanggal" id="tanggal" required>
            </div>
            <div class="col-md-2">
                <label for="jenis_pemeriksaan" class="form-label">Jenis Pemeriksaan</label>
                <select name="jenis_pemeriksaan" id="jenis_pemeriksaan" class="form-control">
                    <option value="Kehamilan">Kehamilan</option>
                    <option value="Persalinan">Persalinan</option>
                    <option value="KB">KB</option>
                    <option value="Anak">Anak</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <label for="subjective" class="form-label">Subjective / Keluhan</label>
            <div class="card">
                <div class="card-body">
                    <textarea name="subjective" id="subjective" class="form-control" rows="15" placeholder="Ketik subjective / keluhan di sini"></textarea>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label class="form-label">Objective</label>
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-6 mb-3">
                        <label for="sistole" class="form-label">Sistole</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="sistole" required>
                            <span class="input-group-text">mmHg</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="diastole" class="form-label">Diastole</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="diastole" required>
                            <span class="input-group-text">mmHg</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="bb" class="form-label">Berat Badan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="bb" required>
                            <span class="input-group-text">kg</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="tb" class="form-label">Tinggi Badan</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="tb" required>
                            <span class="input-group-text">cm</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="suhu" class="form-label">Suhu</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="suhu" required>
                            <span class="input-group-text">°C</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="spo2" class="form-label">SPO2</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="spo2" required>
                            <span class="input-group-text">%</span>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="respirasi" class="form-label">Respiration Rate</label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="respirasi" required>
                            <span class="input-group-text">/mnt</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mb-4">
        <button type="button" class="btn btn-primary" id="submit_layanan"><i class="ti ti-device-floppy"></i> Submit</button>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
<script>
    $(document).ready(function () {
        $('input[required], select[required], textarea[required]').each(function () {
            const id = $(this).attr('id');
            if (id) {
                if ($('label[for="' + id + '"].form-check-label').length) return;
                $('label[for="' + id + '"]').addClass('required-label');
            }
        });

        $('input, select, textarea').on('input change', function () {
            let id = $(this).attr('id');
            $(`#error-${id}`).html('');
        });

        $(document).on('click', '#cari_data_pendaftaran', function (e) {
            let eThis = $(this)
            let id_pendaftaran = $('#id_pendaftaran').val()

            if (!id_pendaftaran) {
                alert('ID Pendaftaran tidak boleh kosong')
                return
            }

            eThis.prop('disabled', true)
            eThis.val('Loading...')

            $.ajax({
                url: "{{ route('api.poli-kia.show', ':idPendaftaran') }}".replace(':idPendaftaran', id_pendaftaran),
                type: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            }).done(function (res) {
                let data = res.data
                $('#nama_pemeriksaan').val(data.data_pasien.nama_pasien)
                $('#no_rm').val(data.data_pasien.no_rm)
            }).fail(function (xhr, status, error) {
                alert(xhr.responseJSON.message)
            }).always(function () {
                eThis.prop('disabled', false)
                eThis.val('Cari')
            })
        });

        $(document).on('click', '#submit_layanan', function (e) {
            let eThis = $(this)
            eThis.prop('disabled', true)
            eThis.html('Loading...')

            $.ajax({
                url: "{{ route('api.poli-kia.store') }}",
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    id_pendaftaran: $('#id_pendaftaran').val(),
                    no_antrian: $('#no_antrian').val(),
                    tanggal: $('#tanggal').val(),
                    jenis_pemeriksaan: $('#jenis_pemeriksaan').val(),
                    sistole: $('#sistole').val(),
                    diastole: $('#diastole').val(),
                    bb: $('#bb').val(),
                    tb: $('#tb').val(),
                    suhu: $('#suhu').val(),
                    spo2: $('#spo2').val(),
                    respirasi: $('#respirasi').val(),
                }
            }).done(function (res) {
                alert(res.message)
                window.location.reload()
            }).fail(function (xhr, status, error) {
                let errors = xhr.responseJSON.errors
                if (errors != undefined) {
                    for (const [key, value] of Object.entries(errors)) {
                        const input = $(`#${key}`);

                        const target = input.closest('.input-group').length > 0
                            ? input.closest('.input-group')
                            : input;

                        target.next('.text-danger').remove();
                        target.after(`<div class="text-danger text-sm" id="error-${key}">${value[0]}</div>`);
                    }
                } else {
                    alert(xhr.responseJSON.message)
                }
            }).always(function () {
                eThis.prop('disabled', false)
                eThis.html('<i class="ti ti-device-floppy"></i> Submit')
            })
        });
    });
</script>
@endsection

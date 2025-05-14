@extends('layouts.master')

@section('title', 'SIP-Kes | Poli KIA')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
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

@php
    $employments = [
        'Tidak Bekerja' => 'Tidak Bekerja',
        'PNS' => 'PNS',
        'TNI/POLRI' => 'TNI/POLRI',
        'BUMN' => 'BUMN',
        'Pegawai swasta/Wirausaha' => 'Pegawai swasta/Wirausaha',
        'Lain-lain' => 'Lain-lain',
    ];

    $religions = [
        'Islam' => 'Islam',
        'Kristen (Protestan)' => 'Kristen (Protestan)',
        'Katolik' => 'Katolik',
        'Hindu' => 'Hindu',
        'Buddha' => 'Buddha',
        'Konghucu' => 'Konghucu',
        'Penghayat' => 'Penghayat',
        'Lain-lain' => 'Lain-lain',
    ];

    $educations = [
        'Tidak Sekolah' => 'Tidak Sekolah',
        'SD' => 'SD',
        'SLTP Sederajat' => 'SLTP Sederajat',
        'SLTA Sederajat' => 'SLTA Sederajat',
        'D1 - D3 Sederajat' => 'D1 - D3 Sederajat',
        'D4' => 'D4',
        'S1' => 'S1',
        'S2' => 'S2',
        'S3' => 'S3',
    ];

    $inspectionTypes = [
        'Kehamilan' => 'Kehamilan',
        'Persalinan' => 'Persalinan',
        'KB' => 'KB',
        'Anak' => 'Anak',
    ];

    $certificates = [
        // 'General Consent',
        // 'Informed Consent',
        // 'Surat Sehat',
        // 'Surat Sakit',
        'Surat Kontrol' => url("main/to/polikia/persuratan/kontrol"),
        'Surat Kematian' => url("main/to/polikia/persuratan/kematian"),
    ];
@endphp

@section('pageContent')
<div class="card w-100">
    <div class="card-body wizard-content">
        <h1 class="title" id="page-title">Layanan KIA</h1>
        <div class="mt-5 d-none" id="persuratan-container">
            <label for="persuratan" class="form-label">Buat Surat</label>
            <select id="persuratan" name="persuratan" class="form-select">
                <option value="" selected disabled>Pilih Jenis Persuratan</option>
                @foreach ($certificates as $key => $certificate)
                    <option value="{{ $certificate }}">{{ $key }}</option>
                @endforeach
            </select>
        </div>
        <form action="#" class="validation-wizard wizard-circle mt-2">
            <div id="header-section" class="d-none">
                <div class="row justify-content-between align-items-center mt-5">
                    <div class="col-md-6">
                        <h5 class="subtitle" id="page-subtitle">Data Layanan</h5>
                    </div>
                    <div class="col-md-4" id="cari-data-container">
                        <input type="search" name="" id="cari_data_pasien" class="form-control" placeholder="Data Pasien">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </div>
                </div>

                <div class="card w-100 mt-3">
                    <div class="card-body row">
                        <div class="col-md-2">
                            <label for="no_antrian" class="form-label">No Antrian</label>
                            <input type="text" class="form-control" name="no_antrian" id="no_antrian">
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
                            <input type="date" class="form-control" name="tanggal" id="tanggal">
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
            </div>

            <h6>
                <span class="step"><i class="ti ti-clipboard-text"></i></span>Pendaftaran
            </h6>
            <section>
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
            </section>

            <h6>
                <span class="step"><i class="ti ti-nurse"></i></span>Layanan
            </h6>
            <section>
                @include('main.polikia.layanan')
            </section>

            <h6>
                <span class="step"><i class="ti ti-stethoscope"></i></span>Pemeriksaan
            </h6>
            <section>
                <div class="alert alert-success w-100 mb-3 d-none" role="alert" id="alert-pemeriksaan">
                    Pemeriksaan telah dilakukan.
                </div>

                <div id="pemeriksaan-kb" class="d-none">
                    @include('main.polikia.pemeriksaan.kb')
                </div>

                <div id="pemeriksaan-anak" class="d-none">
                    @include('main.polikia.pemeriksaan.anak')
                </div>

                <div id="pemeriksaan-persalinan" class="d-none">
                    @include('main.polikia.pemeriksaan.persalinan')
                </div>

                <div id="pemeriksaan-kehamilan" class="d-none">
                    @include('main.polikia.pemeriksaan.kehamilan')
                </div>
            </section>

            <h6><span class="step"><i class="ti ti-pill"></i></span>Farmasi</h6>
            <section></section>

            <h6><span class="step"><i class="ti ti-receipt-2"></i></span>Pembayaran</h6>
            <section></section>
        </form>
    </div>
</div>
@endsection

@section('scripts')

<script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
<script src="{{ URL::asset('build/js/forms/mask.init.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script>
const pageTitle = {
    kehamilan: 'Formulir Kehamilan',
    persalinan: 'Formulir Persalinan',
    kb: 'Formulir Keluarga Berencana',
    anak: 'Formulir Anak',
};
const layananFieldLists = [
    'no_antrian', 'tanggal', 'jenis_pemeriksaan', 'keluhan',
    'sistole', 'diastole', 'bb', 'tb', 'suhu', 'spo2', 'respirasi'
];

const pemeriksaanFieldLists = {
    kehamilan: [
        'pendampingan', 'keluhan_utama', 'pertama_haid', 'jumlah_anak', 'usia_kehamilan',
        'menarche', 'lama_haid', 'banyak_haid', 'warna_haid', 'diagnosa_kebidanan',
        'kode_tindakan_kehamilan', 'tinggi_badan', 'berat_badan', 'penambahan_bb', 'berat_janin',
        'tinggi_fundus', 'lingkar_perut', 'lila', 'hb_level', 'siklus_haid',
        'dismenore', 'flour_albus', 'hipertensi', 'hipertiroid', 'diabetes',
        'penyakit_jantung', 'tuberculosis', 'asap_rokok', 'penyuluhan_kie', 'penambah_darah',
        'suplemen_makanan', 'rujukan_pelayanan', 'hpht', 'hpl', 'his',
        'jam', 'lendir', 'darah', 'ketuban', 'keluhan',
        'riwayat_persalinan', 'riwayat_alergi', 'tekanan_darah', 'suhu', 'nadi',
        'oedema', 'palpasi', 'teraba', 'djj', 'kontrakssi',
        'pemeriksaan_dalam', 'hasil_vt', 'penilaian', 'observasi'
    ],
    persalinan: [
        'id_bidan', 'tempat_persalinan', 'alamat_persalinan', 'catatan_rujukan', 'alasan_merujuk',
        'tempat_merujuk', 'pendamping', 'partogram', 'masalah_lain_kala_i', 'penatalaksana',
        'hasil', 'eposotormy', 'tindakan_eposotormy', 'gawat_janin', 'tindakan_gawat_janin',
        'destosia', 'tindakan_destosia', 'waktu_kala_iii', 'waktu_oksitosin', 'tindakan_waktu_oksitosin',
        'waktu_ulang_oksitosin', 'tindakan_waktu_ulang_oksitosin', 'penegangan_tali', 'tindakan_penegangan_tali', 'uteri',
        'tindakan_uteri', 'atoni_uteri', 'tindakan_atoni_uteri', 'plasenta_lahir', 'tindakan_plasenta_lahir',
        'plasenta_tidak_lahir', 'tindakan_plasenta_tidak_lahir', 'laserasi', 'tindakan_laserasi', 'laserasi_perineum',
        'penjahitan', 'alasan_penjahitan', 'jumlah_pendarahan', 'masalah_lain_kala_iii', 'penatalaksanaan_masalah',
        'hasil_kala_iii', 'ku', 'td', 'nadi', 'napas', 'masalah_kala_iv', // Ini 6
        'normal', 'cacat_bawaan', 'masalah_lain_bayi', 'tindakan_masalah_lain_bayi', 'cek_asfiksia',
        'asfiksia', 'cek_pemberian_asi', 'pemberian_asi', 'jam_pemberian_asi', 'cek_penatalaksanaan',
        'penatalaksanaan', 'hpht', 'his', 'lendir', 'darah',
        'ketuban', 'keluhan', 'riwayat_persalinan_lalu', 'riwayat_alergi', 'tekanan_darah_o',
        'suhu', 'nadi_o', 'odema', 'palpasi', 'teraba',
        'djj', 'kontraksi', 'pemeriksaan_dalam', 'oleh', 'hasil_v1',
        'a', 'observasi_kala_i'
    ],
    persalinan_detail: [
        'jam_ke', 'tekanan_darah', 'tinggi_fundus', 'kandung_kemih', 'waktu',
        'nadi_kala_iv', 'kontraksi_uterus', 'pendarahan',
    ],
    kb: [
        'nama', 'umur', 'pekerjaan', 'agama', 'pendidikan',
        'alamat', 'jumlah_anak', 'kb', 'nama_suami', 'umur_suami',
        'pekerjaan_suami', 'agama_suami', 'pendidikan_suami', 'no_telp', 'umur_anak',
        'hpht', 'gpa', 'menyusui', 'manarche', 'keadaan_umum',
        'kesadaran', 'sistole', 'berat_badan', 'suhu', 'respirasi',
        'diastole', 'tinggi_badan', 'spo2', 'nadi', 'kontrasepsi',
        'dilayani', 'dicabut', 'dipasang', 'tipe_pasien', 'tindakan',
        'kode_tindakan'
    ],
    anak: [
        'nama', 'tanggal_lahir', 'jenis_kelamin', 'umur', 'nama_ibu',
        'umur_ibu', 'pekerjaan_ibu', 'agama_ibu', 'pendidikan_ibu', 'alamat_ibu',
        'notelp_ibu', 'nama_ayah', 'umur_ayah', 'pekerjaan_ayah', 'agama_ayah',
        'pendidikan_ayah', 'alamat_ayah', 'notelp_ayah', 'keadaan_umum', 'kesadaran',
        'keluhan', 'tensi', 'tinggi_badan', 'lingkar_dada', 'respirasi',
        'nadi', 'berat_badan', 'lingkar_kepala', 'goldarah', 'suhu',
        'lingkar_perut', 'lila', 'tipe_pasien', 'unit_layanan', 'kunjungan',
        'obat', 'bidan', 'diagnosa', 'kode_tindakan',
    ],
};

$('input[required], select[required], textarea[required]').each(function () {
    const id = $(this).attr('id');
    if (id) {
        if ($('label[for="' + id + '"].form-check-label').length) return;
        $('label[for="' + id + '"]').addClass('required-label');
    }
});

$(document).on('input change', 'input, select, textarea', function () {
    let name = $(this).attr('name');

    if ($(this).is(':radio') || $(this).is(':checkbox')) {
        $(`#error-${name.replace('[]', '')}`).remove();
    } else {
        let id = $(this).attr('id');
        $(`#error-${id}`).remove();
        $(`#error-${name}`).remove();
    }
});

$(".validation-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    labels: {
        finish: "Submit",
        next: "Selanjutnya",
        previous: "Sebelumnya",
    },
    onStepChanging: function (event, currentIndex, newIndex) {
        const jenisPemeriksaan = $("#jenis_pemeriksaan").val().toLowerCase();
        $(`#pemeriksaan-${jenisPemeriksaan}`).removeClass("d-none").siblings("div").addClass("d-none");

        if(newIndex > 0 && newIndex < 3) {
            $('#header-section').removeClass('d-none');
        } else {
            $('#header-section').addClass('d-none');
        }

        if(newIndex < 2) {
            $('#page-title').text('Layanan');
            $('#page-subtitle').text('Data Layanan');
        } else {
            $('#page-title').text(pageTitle[jenisPemeriksaan]);
            $('#page-subtitle').text('Data Pemeriksaan');
        }

        if (newIndex > 0) {
            $('#persuratan-container').removeClass('d-none');
        } else {
            $('#persuratan-container').addClass('d-none');
        }

        return true;
    },
    onFinishing: function (event, currentIndex) {
        return form.valid();
    },
    onFinished: function (event, currentIndex) {
        swal(
            "Form Submitted!",
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed."
        );
    },
});

var form = $(".validation-wizard").show();

$(".actions ul li a").hide();

$(document).on('click', '.previous-step', function (e) {
    $(".validation-wizard").steps("previous");
})

$(document).on('click', '#cari_data_pendaftaran', function (e) {
    let eThis = $(this)
    let id_pendaftaran = $('#id_pendaftaran').val()

    if (!id_pendaftaran) {
        errorMessage('ID Pendaftaran tidak boleh kosong')
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

        // Set Data
        if (res.data.layanan_kia) {
            $('#no_antrian').val(data.layanan_kia.no_antrian)
            $('#tanggal').val(data.layanan_kia.tanggal)
            $('#jenis_pemeriksaan').val(data.layanan_kia.jenis_pemeriksaan)

            layananFieldLists.forEach(field => {
                setFieldValue(`#layanan [name=${field}]`, res.data.layanan_kia[field]);
            });
            $(".validation-wizard").steps("next");
            $(".validation-wizard").steps("next");
        } else {
            $('#no_antrian').val('')
            $('#tanggal').val('')
            $('#jenis_pemeriksaan').val('Kehamilan')

            layananFieldLists.forEach(field => {
                if (field === 'jenis_pemeriksaan') {
                    setFieldValue(`#layanan [name=${field}]`, 'Kehamilan');
                } else {
                    setFieldValue(`#layanan [name=${field}]`, '');
                }
            });

            $(".validation-wizard").steps("next");
        }

        if (res.data.layanan_terisi) {
            $('#alert-pemeriksaan').removeClass('d-none')
        }
    }).fail(function (xhr, status, error) {
        errorMessage(xhr.responseJSON.message)
    }).always(function () {
        eThis.prop('disabled', false)
        eThis.val('Cari')
    })
});

$(document).on('change', '#persuratan', function (e) {
    let val = $(this).val()

    let id = ''
    if ($('#id_pendaftaran').val()) {
        id = '?id_pendaftaran=' + $('#id_pendaftaran').val()
    }
    window.open(val+id, '_blank');
})

$(document).on('click', '#submit_layanan', function (e) {
    let eThis = $(this)
    eThis.prop('disabled', true)
    eThis.html('Loading...')

    let formData = {};
    formData['id_pendaftaran'] = $('#id_pendaftaran').val();
    layananFieldLists.forEach(field => {
        formData[field] = $(`#layanan [name=${field}]`).val();
    });
    formData['no_antrian'] = $('#no_antrian').val()
    formData['tanggal'] = $('#tanggal').val()
    formData['jenis_pemeriksaan'] = $('#jenis_pemeriksaan').val()

    $.ajax({
        url: "{{ route('api.poli-kia.store') }}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData
    }).done(function (res) {
        successMessage(res.message)
        $(".validation-wizard").steps("next");
    }).fail(function (xhr, status, error) {
        let errors = xhr.responseJSON.errors
        errorMessage(xhr.responseJSON.message)
        if (errors != undefined) {
            showErrorsOnFields(errors, 'layanan')
        }
    }).always(function () {
        eThis.prop('disabled', false)
        eThis.html('<i class="fas fa-save me-2"></i>Simpan')
    })
});

$(document).on('click', '#submit_pemeriksaan_kehamilan', function (e) {
    let eThis = $(this)
    eThis.prop('disabled', true)
    eThis.html('Loading...')

    let formData = {};
    formData['id_pendaftaran'] = $('#id_pendaftaran').val();
    pemeriksaanFieldLists['kehamilan'].forEach(field => {
        const $input = $(`#pemeriksaan-kehamilan [name=${field}]`);

        if ($input.is(':radio')) {
            formData[field] = $(`#pemeriksaan-kehamilan [name=${field}]:checked`).val() || '';
        } else {
            formData[field] = $input.val() || '';
        }
    });

    $.ajax({
        url: "{{ route('api.poli-kia.pemeriksaan-kehamilan') }}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData
    }).done(function (res) {
        successMessage(res.message)
        $(".validation-wizard").steps("next");
    }).fail(function (xhr, status, error) {
        let errors = xhr.responseJSON.errors
        errorMessage(xhr.responseJSON.message)
        if (errors != undefined) {
            showErrorsOnFields(errors, 'pemeriksaan-kehamilan')
        }
    }).always(function () {
        eThis.prop('disabled', false)
        eThis.html('<i class="fas fa-save me-2"></i>Simpan')
    })
})

$(document).on('click', '#submit_pemeriksaan_kb', function (e) {
    let eThis = $(this)
    eThis.prop('disabled', true)
    eThis.html('Loading...')

    let formData = {};
    formData['id_pendaftaran'] = $('#id_pendaftaran').val();
    pemeriksaanFieldLists['kb'].forEach(field => {
        const $input = $(`#pemeriksaan-kb [name="${field}"], #pemeriksaan-kb [name="${field}[]"]`);

        if ($input.is(':radio')) {
            formData[field] = $(`#pemeriksaan-kb [name="${field}"]:checked`).val() || '';
        } else if ($input.is(':checkbox')) {
            const values = $(`#pemeriksaan-kb [name="${field}[]"]:checked`)
                .map(function () {
                    return this.value;
                }).get().join(',');
            formData[field] = values;
        } else {
            formData[field] = $input.val() || '';
        }
    });

    $.ajax({
        url: "{{ route('api.poli-kia.pemeriksaan-kb') }}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData
    }).done(function (res) {
        successMessage(res.message)
        $(".validation-wizard").steps("next");
    }).fail(function (xhr, status, error) {
        let errors = xhr.responseJSON.errors
        errorMessage(xhr.responseJSON.message)
        if (errors != undefined) {
            showErrorsOnFields(errors, 'pemeriksaan-kb')
        }
    }).always(function () {
        eThis.prop('disabled', false)
        eThis.html('<i class="fas fa-save me-2"></i>Simpan')
    })
})

$(document).on('click', '#submit_pemeriksaan_anak', function (e) {
    let eThis = $(this)
    eThis.prop('disabled', true)
    eThis.html('Loading...')

    let formData = {};
    formData['id_pendaftaran'] = $('#id_pendaftaran').val();
    pemeriksaanFieldLists['anak'].forEach(field => {
        const $input = $(`#pemeriksaan-anak [name=${field}]`);

        if ($input.is(':radio')) {
            formData[field] = $(`#pemeriksaan-anak [name=${field}]:checked`).val() || '';
        } else {
            formData[field] = $input.val() || '';
        }
    });

    $.ajax({
        url: "{{ route('api.poli-kia.pemeriksaan-anak') }}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData
    }).done(function (res) {
        successMessage(res.message)
        $(".validation-wizard").steps("next");
    }).fail(function (xhr, status, error) {
        let errors = xhr.responseJSON.errors
        errorMessage(xhr.responseJSON.message)
        if (errors != undefined) {
            showErrorsOnFields(errors, 'pemeriksaan-anak')
        }
    }).always(function () {
        eThis.prop('disabled', false)
        eThis.html('<i class="fas fa-save me-2"></i>Simpan')
    })
})

$(document).on('click', '#tambah_detail_persalinan', function (e) {
    let formData = {};
    let errors = {};
    pemeriksaanFieldLists['persalinan_detail'].forEach(field => {
        const $input = $(`#pemeriksaan-persalinan [name=${field}]`);
        let value = '';

        if ($input.is(':radio')) {
            value = $(`#pemeriksaan-persalinan [name=${field}]:checked`).val() || '';
        } else {
            value = $input.val() || '';
        }

        formData[field] = value;

        if (!value) {
            errors[field] = [`${field.replaceAll('_', ' ')} wajib diisi.`];
        }

        if ($input.attr('type') === 'number' && value) {
            if (isNaN(value)) {
                errors[field] = [`${field.replaceAll('_', ' ')} harus berupa angka.`];
            }
        }
    });

    if (Object.keys(errors).length > 0) {
        showErrorsOnFields(errors, 'pemeriksaan-persalinan', false);
        return;
    }

    let $detail = $('#pemeriksaan-persalinan #pemeriksaan-persalinan-detail .detail-item')
    if ($detail.length <= 0) {
        $('#pemeriksaan-persalinan-detail').html('')
    }

    $('#pemeriksaan-persalinan-detail').append(`
        <tr class="detail-item">
            <td name="detail[][jam_ke]">${formData['jam_ke']}</td>
            <td name="detail[][waktu]">${formData['waktu']}</td>
            <td name="detail[][tekanan_darah]">${formData['tekanan_darah']}</td>
            <td name="detail[][nadi_kala_iv]">${formData['nadi_kala_iv']}</td>
            <td name="detail[][tinggi_fundus]">${formData['tinggi_fundus']}</td>
            <td name="detail[][kontraksi_uterus]">${formData['kontraksi_uterus']}</td>
            <td name="detail[][kandung_kemih]">${formData['kandung_kemih']}</td>
            <td name="detail[][pendarahan]">${formData['pendarahan']}</td>
            <td>
                <button type="button" class="btn btn-danger hapus-detail-persalinan"><i class="fas fa-trash"></i></button>
            </td>
        </tr>
    `)
})

$(document).on('click', '.hapus-detail-persalinan', function (e) {
    $(this).closest('.detail-item').remove()
    let $detail = $('#pemeriksaan-persalinan #pemeriksaan-persalinan-detail .detail-item')
    if ($detail.length <= 0) {
        $('#pemeriksaan-persalinan-detail').append(`
            <tr>
                <td colspan="9" class="text-center">Belum ada data.</td>
            </tr>
        `)
    }
})

$(document).on('click', '#submit_pemeriksaan_persalinan', function (e) {
    let eThis = $(this)
    eThis.prop('disabled', true)
    eThis.html('Loading...')

    let formData = {
        detail: []
    };
    formData['id_pendaftaran'] = $('#id_pendaftaran').val();
    pemeriksaanFieldLists['persalinan'].forEach(field => {
        const $input = $(`#pemeriksaan-persalinan [name="${field}"], #pemeriksaan-persalinan [name="${field}[]"]`);

        if ($input.is(':radio')) {
            formData[field] = $(`#pemeriksaan-persalinan [name="${field}"]:checked`).val() || '';
        } else if ($input.is(':checkbox')) {
            const values = $(`#pemeriksaan-persalinan [name="${field}[]"]:checked`)
                .map(function () {
                    return this.value;
                }).get().join(',');
            formData[field] = values;
        } else {
            formData[field] = $input.val() || '';
        }
    });

    let $detail = $('#pemeriksaan-persalinan #pemeriksaan-persalinan-detail .detail-item')
    if ($detail.length <= 0) {
        errorMessage("Pemantauan Persalianan Kala IV Belum Diisi!")
        eThis.prop('disabled', false)
        eThis.html('<i class="fas fa-save me-2"></i>Simpan')
    }

    $detail.each((index, detail) => {
        let detailItem = {};

        pemeriksaanFieldLists['persalinan_detail'].forEach(field => {
            detailItem[field] = $(detail).find(`td[name="detail[][${field}]"]`).html() || '';
        });

        formData.detail.push(detailItem);
    });

    $.ajax({
        url: "{{ route('api.poli-kia.pemeriksaan-persalinan') }}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData
    }).done(function (res) {
        successMessage(res.message)
        $(".validation-wizard").steps("next");
    }).fail(function (xhr, status, error) {
        let errors = xhr.responseJSON.errors
        errorMessage(xhr.responseJSON.message)
        if (errors != undefined) {
            showErrorsOnFields(errors, 'pemeriksaan-persalinan')
        }
    }).always(function () {
        eThis.prop('disabled', false)
        eThis.html('<i class="fas fa-save me-2"></i>Simpan')
    })
})

// Function Helper
function setFieldValue(id, value) {
    $(`${id}`).val(value ?? '').trigger('change');
}
function showErrorsOnFields(errors, id, scrollTop = true) {
    for (const [key, value] of Object.entries(errors)) {
        const input = $(`#${id} [name=${key}], #${id} [name="${key}[]"]`);

        if (input.is(':radio') || input.is(':checkbox')) {
            const lastRadio = input.last();
            lastRadio.closest('.form-check-inline, .form-check').next('.text-danger').remove();
            lastRadio.closest('.form-check-inline, .form-check').after(`<div class="text-danger text-sm" id="error-${key}">${value[0]}</div>`);
        } else {
            const target = input.closest('.input-group').length > 0
                ? input.closest('.input-group')
                : input;

            target.next('.text-danger').remove();
            target.after(`<div class="text-danger text-sm" id="error-${key}">${value[0]}</div>`);
        }
    }

    if (scrollTop) {
        $("html, body").animate({ scrollTop: 0 }, "slow");
    }
}
function errorMessage(msg) {
    toastr.error('Gagal', msg, {
        positionClass: 'toast-top-right',
        timeOut: 3000,
        progressBar: true,
        closeButton: true,
    });
}
function successMessage(msg) {
    toastr.success('Berhasil', msg, {
        positionClass: 'toast-top-right',
        timeOut: 3000,
        progressBar: true,
        closeButton: true,
    });
}
</script>
@endsection

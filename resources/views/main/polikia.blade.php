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
        'General Consent',
        'Informed Consent',
        'Surat Sehat',
        'Surat Sakit',
    ];
@endphp

@section('pageContent')
<div class="card w-100">
    <div class="card-body wizard-content">
        <h1 class="title" id="page-title">Layanan</h1>
        <form action="#" class="validation-wizard wizard-circle mt-5">
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
                            <input type="text" class="form-control" name="no_rm" id="no_rm">
                        </div>
                        <div class="col-md-4">
                            <label for="nama_pemeriksaan" class="form-label">Nama</label>
                            <input type="text" class="form-control" name="nama_pemeriksaan" id="nama_pemeriksaan">
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

            </section>

            <h6>
                <span class="step"><i class="ti ti-nurse"></i></span>Layanan
            </h6>
            <section class="d-none">
                @include('main.polikia.layanan')
            </section>

            <h6>
                <span class="step"><i class="ti ti-stethoscope"></i></span>Pemeriksaan
            </h6>
            <section>
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




$(".validation-wizard").steps({
    headerTag: "h6",
    bodyTag: "section",
    transitionEffect: "fade",
    labels: {
        finish: "Submit",
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

        const isValid = (
            currentIndex > newIndex ||
            (!(3 === newIndex && Number($("#age-2").val()) < 18) &&
            (currentIndex < newIndex &&
            (form.find(".body:eq(" + newIndex + ") label.error").remove(),
            form.find(".body:eq(" + newIndex + ") .error").removeClass("error")),
            (form.validate().settings.ignore = ":disabled,:hidden"),
            form.valid()))
        );

        if (!isValid) return false;
        toastr.success('Berhasil', 'Data berhasil disimpan', {
            positionClass: 'toast-top-right',
            timeOut: 3000,
            progressBar: true,
            closeButton: true,
        });
        return true;

    },
    onFinishing: function (event, currentIndex) {
        return (form.validate().settings.ignore = ":disabled"), form.valid();
    },
    onFinished: function (event, currentIndex) {
        swal(
            "Form Submitted!",
            "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lorem erat eleifend ex semper, lobortis purus sed."
        );
    },
});

var form = $(".validation-wizard").show();

$(".validation-wizard").validate({
    ignore: "input[type=hidden]",
    errorClass: "text-danger",
    successClass: "text-success",
    highlight: function (element, errorClass) {
        $(element).removeClass(errorClass);
    },
    unhighlight: function (element, errorClass) {
        $(element).removeClass(errorClass);
    },
    errorPlacement: function (error, element) {
        const parent = element.parent();
        if (parent.hasClass("input-group")) {
            parent.after(error);
        } else {
            error.insertAfter(element);
        }
    },
    rules: {
        email: {
            email: !0,
        },
    },
});

$(".validation-wizard").steps("next");

$('input[required], select[required], textarea[required]').each(function () {
    const id = $(this).attr('id');
    if (id) {
        if ($('label[for="' + id + '"].form-check-label').length) return;
        $('label[for="' + id + '"]').addClass('required-label');
    }
});
</script>
@endsection

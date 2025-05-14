@extends('layouts.master')

@section('title', 'SIP-Kes | Surat Kontrol')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
<style>
    body {
        background-color: #e3f2fd;
    }
    .card-custom {
        max-width: 650px;
        margin: 50px auto;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13,110,253,.25);
    }
    h4 {
        text-align: center;
        font-weight: bold;
        text-decoration: underline;
    }
</style>
<script>
    var id_pendaftaran = new URLSearchParams(window.location.search).get('id_pendaftaran');

    if (!id_pendaftaran) {
        window.location.href = '{{ url('main/polikia') }}';
    }
</script>
@endsection

@section('pageContent')

<div class="card bg-white card-custom p-4" id="surat">
    <h4 class="text-center fw-bold mb-4">SURAT RENCANA KONTROL</h4>

    <div class="row mb-3">
        <label for="nomor" class="col-md-2 col-form-label">No.</label>
        <div class="col-md-10">
            <input type="text" id="nomor" name="nomor" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="tanggal" class="col-md-2 col-form-label">Tgl.</label>
        <div class="col-md-10">
            <input type="date" id="tanggal" name="tanggal" class="form-control">
        </div>
    </div>

    <div class="row mb-3">
        <label for="kepada" class="col-md-2 col-form-label">Kepada Yth.</label>
        <div class="col-md-10">
            <select id="kepada" name="kepada" class="form-select">
                <option value="">Nama Dokter</option>
                <option value="dr_b_sp_pd">dr. B, Sp.PD</option>
                <option value="dr_c_sp_an">dr. C, Sp.An</option>
                <option value="bidan_dyah_ayu_wulandari">Bidan Dyah Ayu Wulandari</option>
            </select>
        </div>
    </div>

    <p class="mt-4">Mohon Pemeriksaan dan Penanganan Lebih Lanjut:</p>

    <div class="row mb-3">
        <label for="no_rm" class="col-md-2 col-form-label">Nomor RM</label>
        <div class="col-md-10">
            <input type="text" id="no_rm" class="form-control" placeholder="Nomor RM" disabled>
        </div>
    </div>

    <div class="row mb-3">
        <label for="nama_pasien" class="col-md-2 col-form-label">Nama Pasien</label>
        <div class="col-md-10">
            <input type="text" id="nama_pasien" class="form-control" placeholder="Nama Pasien" disabled>
        </div>
    </div>

    <div class="row mb-3">
        <label for="tanggal_lahir" class="col-md-2 col-form-label">Tgl. Lahir</label>
        <div class="col-md-10">
            <input type="date" id="tanggal_lahir" class="form-control" disabled>
        </div>
    </div>

    <div class="row mb-3">
        <label for="diagnosa" class="col-md-2 col-form-label">Diagnosa Akhir</label>
        <div class="col-md-10">
            <input type="text" id="diagnosa" name="diagnosa" class="form-control" placeholder="Diagnosa Akhir">
        </div>
    </div>

    <div class="row mb-3">
        <label for="rencana_kontrol" class="col-md-2 col-form-label">Rencana Kontrol</label>
        <div class="col-md-10">
            <input type="date" id="rencana_kontrol" name="rencana_kontrol" class="form-control">
        </div>
    </div>

    <p>Demikian atas bantuannya diucapkan banyak terima kasih.</p>

    <div class="text-end">
        <label for="tanggal_tanda_tangan" class="form-label">Jember,</label>
        <input type="date" id="tanggal_tanda_tangan" name="tanggal_tanda_tangan" class="form-control mb-2 ms-auto" style="max-width: 200px;">
        <p>Mengetahui</p>
        <br>
        <input type="text" id="nama_penandatangan" name="penandatangan" class="form-control ms-auto text-center" placeholder="Nama Penandatangan"
        style="max-width: 250px; border: none; border-bottom: 1px solid #000; background: transparent; outline: none; box-shadow: none;">
    </div>

    <div class="row mt-4">
        <div class="col-md-6">
            <button class="btn btn-primary w-100" id="btn-simpan">Simpan</button>
        </div>
        <div class="col-md-6">
            <button class="btn btn-secondary w-100" id="btn-cetak">Cetak</button>
        </div>
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
(function(){
    if (id_pendaftaran) {
        $.ajax({
            url: "{{ route('api.poli-kia.show', ':idPendaftaran') }}".replace(':idPendaftaran', id_pendaftaran),
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }).done(function (res) {
            let data = res.data
            $('#nama_pasien').val(data.data_pasien.nama_pasien)
            $('#no_rm').val(data.data_pasien.no_rm)
            $('#tanggal_lahir').val(data.data_pasien.tanggal_lahir_pasien)

            if (data.surat_kontrol) {
                $('#nomor').val(data.surat_kontrol.nomor)
                $('#tanggal').val(data.surat_kontrol.tanggal)
                $('#kepada').val(data.surat_kontrol.kepada)
                $('#diagnosa').val(data.surat_kontrol.diagnosa)
                $('#rencana_kontrol').val(data.surat_kontrol.rencana_kontrol)
                $('#tanggal_tanda_tangan').val(data.surat_kontrol.tanggal_tanda_tangan)
                $('#nama_penandatangan').val(data.surat_kontrol.penandatangan)
            }
        }).fail(function (xhr, status, error) {
            window.location.href = '{{ url('main/polikia') }}';
        }).always(function () {
        })
    }
})()
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
$('#btn-simpan').on('click', function(e) {
    let eThis = $(this)
    eThis.prop('disabled', true)
    eThis.html('Loading...')

    let formData = {};
    formData['id_pendaftaran'] = id_pendaftaran;
    formData['nomor'] = $('input[name="nomor"]').val()
    formData['tanggal'] = $('input[name="tanggal"]').val()
    formData['kepada'] = $('select[name="kepada"]').val()
    formData['diagnosa'] = $('input[name="diagnosa"]').val()
    formData['rencana_kontrol'] = $('input[name="rencana_kontrol"]').val()
    formData['tanggal_tanda_tangan'] = $('input[name="tanggal_tanda_tangan"]').val()
    formData['penandatangan'] = $('input[name="penandatangan"]').val()

    $.ajax({
        url: "{{ route('api.poli-kia.surat-kontrol.store') }}",
        type: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: formData
    }).done(function (res) {
        successMessage(res.message)
    }).fail(function (xhr, status, error) {
        let errors = xhr.responseJSON.errors
        errorMessage(xhr.responseJSON.message)
        if (errors != undefined) {
            showErrorsOnFields(errors, 'surat')
        }
    }).always(function () {
        eThis.prop('disabled', false)
        eThis.html('Simpan')
    })
})

$('#btn-cetak').on('click', function(e) {
    e.preventDefault();

    const nomor = $('#nomor').val();
    const tanggal = $('#tanggal').val();
    const kepada = $('#kepada option:selected').text();
    const noRm = $('#no_rm').val();
    const namaPasien = $('#nama_pasien').val();
    const tanggalLahir = $('#tanggal_lahir').val();
    const diagnosa = $('#diagnosa').val();
    const rencanaKontrol = $('#rencana_kontrol').val();
    const tanggalTtd = $('#tanggal_tanda_tangan').val();
    const penandatangan = $('#nama_penandatangan').val();

    const printContent = `
        <html>
        <head>
            <title>Surat Rencana Kontrol</title>
            <style>
                body {
                    font-family: 'Times New Roman', Times, serif;
                    margin: 50px 60px;
                    font-size: 14pt;
                    color: #000;
                }
                h4 {
                    text-align: center;
                    font-weight: bold;
                    text-decoration: underline;
                    margin-bottom: 40px;
                }
                p {
                    margin: 8px 0;
                    text-align: justify;
                }
                .field-label {
                    display: inline-block;
                    width: 180px;
                }
                .signature-block {
                    margin-top: 60px;
                    display: flex;
                    flex-direction: column;
                    align-items: flex-end; /* Posisi ke kiri */
                    font-family: "Times New Roman", Times, serif;
                    margin-left: 50px; /* Jarak dari kiri halaman */
                }

                .signature-date,
                .signature-label,
                .signature-name {
                    text-align: left;
                    margin: 0;
                    font-size: 16px;
                }

                .signature-space {
                    height: 80px;
                }

                .underline {
                    display: inline-block;
                    border-bottom: 1px solid #000;
                    min-width: 180px;
                    padding: 0 5px;
                }
            </style>
        </head>
        <body>
            <h4>SURAT RENCANA KONTROL</h4>

            <p><span class="field-label">Nomor</span>: <span class="underline">${nomor}</span></p>
            <p><span class="field-label">Tanggal</span>: <span class="underline">${tanggal}</span></p>
            <p><span class="field-label">Kepada Yth.</span>: <span class="underline">${kepada}</span></p>

            <p style="margin-top: 30px;">Mohon dilakukan pemeriksaan dan penanganan lebih lanjut terhadap pasien berikut:</p>

            <p><span class="field-label">Nomor RM</span>: <span class="underline">${noRm}</span></p>
            <p><span class="field-label">Nama Pasien</span>: <span class="underline">${namaPasien}</span></p>
            <p><span class="field-label">Tanggal Lahir</span>: <span class="underline">${tanggalLahir}</span></p>
            <p><span class="field-label">Diagnosa Akhir</span>: <span class="underline">${diagnosa}</span></p>
            <p><span class="field-label">Rencana Kontrol</span>: <span class="underline">${rencanaKontrol}</span></p>

            <p style="margin-top: 30px;">Demikian surat ini dibuat untuk digunakan sebagaimana mestinya. Atas perhatian dan kerjasamanya, diucapkan terima kasih.</p>

            <div class="signature-block">
                <div class="signature-inner">
                    <p class="signature-date">Jember, <span class="underline">${tanggalTtd}</span></p>
                    <p class="signature-label">Mengetahui,</p>
                    <div class="signature-space"></div>
                    <p class="signature-name underline">${penandatangan}</p>
                </div>
            </div>
        </body>
        </html>
    `;

    // Tampilkan jendela cetak
    const printWindow = window.open('', '', 'width=800,height=600');
    printWindow.document.write(printContent);
    printWindow.document.close();
    printWindow.focus();
    printWindow.print();
    printWindow.close();
});


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
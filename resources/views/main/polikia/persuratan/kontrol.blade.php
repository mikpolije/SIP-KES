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
        margin: 10px auto;
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
                @foreach ($listDokter as $dokter)
                    <option value="{{ $dokter->nama }}">{{ $dokter->nama }}</option>
                @endforeach
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
    </div>

    <div class="row">
        <div class="col-md-8">
            <!-- Kosong / Spacer -->
        </div>
        <div class="col-md-4 text-center">
            <p>Dokter Yang Merawat</p>

            <div class="signature-box mb-2" id="signature-box" style="border: 1px solid #ccc; width: 200px; max-width: 200px; height: 150px;">
                <canvas id="signature-canvas" width="200" height="150" style="border:1px solid #000;"></canvas>
            </div>

            <div class="mb-2">
                <button type="button" class="btn btn-sm btn-danger me-1" onclick="clearSignature()">Hapus TTD</button>
                <button type="button" class="btn btn-sm btn-success" onclick="saveSignature()">Simpan TTD</button>
            </div>

            <input type="hidden" name="signature_data" id="signature_data">

            <div class="mt-2">
                <select id="penandatangan" name="penandatangan" class="form-select">
                    <option value="">Nama Dokter</option>
                    @foreach ($listDokter as $dokter)
                        <option value="{{ $dokter->nama }}">{{ $dokter->nama }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-center gap-2 mt-4">
        <button type="submit" class="btn btn-primary px-4" id="btn-simpan">
            <span>Simpan</span>
        </button>
        <button class="btn btn-secondary w-100" id="btn-cetak">Cetak</button>
        <a href="/main/persuratan/kematian" class="btn btn-secondary px-4">
            <i class="bi bi-arrow-left"></i> Kembali
        </a>
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
    formData['penandatangan'] = $('select[name="penandatangan"]').val()

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
    const tanggal = formatTanggalIndonesia($('#tanggal').val());
    const kepada = $('#kepada option:selected').text();
    const noRm = $('#no_rm').val();
    const namaPasien = $('#nama_pasien').val();
    const tanggalLahir = formatTanggalIndonesia($('#tanggal_lahir').val());
    const diagnosa = $('#diagnosa').val();
    const rencanaKontrol = $('#rencana_kontrol').val();
    const tanggalTtd = formatTanggalIndonesia($('#tanggal_tanda_tangan').val());
    const penandatangan = $('#nama_penandatangan').val();
    const signatureData = document.getElementById('signature-canvas').toDataURL("image/png");

    const printContent = `
    <html>
    <head>
        <title>Surat Rencana Kontrol</title>
        <style>
            body {
                font-family: "Times New Roman", Times, serif;
                font-size: 12pt;
                margin: 10mm 15mm;
            }
            h4 {
                text-align: center;
                font-weight: bold;
                text-decoration: underline;
                margin: 10px 0 30px 0;
            }
            .underline {
                display: inline-block;
                padding: 0 5px;
            }
            .field { margin-bottom: 6px; }
            .label { display: inline-block; width: 180px; }
            .header-table img {
                height: 70px;
            }
            .signature-block {
                margin-top: 40px;
                text-align: right;
            }
            .signature-img {
                margin-top: 10px;
                height: 60px;
                width: auto;
            }
        </style>
    </head>
    <body>
        <table class="header-table" style="width: 100%;">
            <tr>
                <td style="width: 80px;">
                    <img src="/assets/klinik-insan.png" alt="Logo Klinik">
                </td>
                <td style="text-align: center; line-height: 1.3;">
                    <div style="font-weight: bold; font-size: 18pt;">KLINIK PRATAMA</div>
                    <div style="font-weight: bold; font-size: 18pt;">RAWAT JALAN INSAN MEDIKA</div>
                    <div style="font-size: 12pt;">Jl. R. Sosro Prawiro No. 1A Wirowongso, Ajung – Jember</div>
                </td>
            </tr>
        </table>
        <hr style="border: 1.5px solid black; margin: 6px 0 20px;">

        <h4>SURAT RENCANA KONTROL</h4>
        <p style="margin-bottom: 20px;">Nomor: <span class="underline">${nomor}</span></p>
        <p style="margin-top: -10px; margin-bottom: 20px;">Tanggal: <span class="underline">${tanggal}</span></p>

        <p style="margin-bottom: 20px;">Kepada Yth.<br>${kepada}<br>Di Tempat</p>

        <p style="margin-bottom: 20px;">Mohon dilakukan pemeriksaan dan penanganan lebih lanjut terhadap pasien berikut:</p>

        <div class="field"><span class="label">Nomor RM</span>: <span class="underline">${noRm}</span></div>
        <div class="field"><span class="label">Nama Pasien</span>: <span class="underline">${namaPasien}</span></div>
        <div class="field"><span class="label">Tanggal Lahir</span>: <span class="underline">${tanggalLahir}</span></div>
        <div class="field"><span class="label">Diagnosa Akhir</span>: <span class="underline">${diagnosa}</span></div>
        <div class="field"><span class="label">Rencana Kontrol</span>: <span class="underline">${rencanaKontrol}</span></div>

        <p style="margin-top: 25px;">Demikian surat ini dibuat untuk digunakan sebagaimana mestinya. Atas perhatian dan kerjasamanya, diucapkan terima kasih.</p>

        <div class="signature-block">
            <p>Jember, <span class="underline">${tanggalTtd}</span></p>
            <p>Mengetahui,</p>
            <img src="${signatureData}" alt="Tanda Tangan" class="signature-img">
            <p style="font-weight:bold;text-decoration:underline">${penandatangan}</p>
        </div>
    </body>
    </html>
    `;

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
function formatTanggalIndonesia(tanggalStr) {
    const bulanIndo = [
        'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
        'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
    ];

    const dateObj = new Date(tanggalStr);
    const tanggal = dateObj.getDate();
    const bulan = bulanIndo[dateObj.getMonth()];
    const tahun = dateObj.getFullYear();

    return `${tanggal} ${bulan} ${tahun}`;
}
</script>
<script>
    const canvas = document.getElementById('signature-canvas');
    const ctx = canvas.getContext('2d');
    let drawing = false;

    canvas.addEventListener('mousedown', (e) => {
        drawing = true;
        ctx.beginPath();
        ctx.moveTo(e.offsetX, e.offsetY);
    });

    canvas.addEventListener('mousemove', (e) => {
        if (drawing) {
            ctx.lineTo(e.offsetX, e.offsetY);
            ctx.stroke();
        }
    });

    canvas.addEventListener('mouseup', () => {
        drawing = false;
    });

    canvas.addEventListener('mouseleave', () => {
        drawing = false;
    });

    function clearSignature() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        document.getElementById('signature_data').value = '';
    }

    function saveSignature() {
        const dataURL = canvas.toDataURL();
        document.getElementById('signature_data').value = dataURL;
        alert('Tanda tangan berhasil disimpan!');
        // Optional: Kirim dataURL ke server melalui form / Ajax
    }
</script>

@endsection

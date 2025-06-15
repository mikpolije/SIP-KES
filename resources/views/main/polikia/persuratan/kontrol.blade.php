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

    <div class="row mt-4">
    <div class="row mt-5">
    <div class="col-md-8">
        <!-- Spacer -->
        </div>
        <div class="col-md-4 text-center">
            <p>Dokter Yang Merawat</p>
            <div class="signature-box" id="signature-box" style="border: 1px solid #ccc; width: 300px; height: 200px;">
            <canvas id="signature-canvas" width="300" height="200" style="border:1px solid #000;"></canvas>
        </div>

        <button type="button" onclick="clearSignature()">Hapus TTD</button>
        <button type="button" onclick="saveSignature()">Simpan TTD</button>

        <input type="hidden" name="signature_data" id="signature_data">

        <div class="col-md-4 text-center">
            <select id="kepada" name="kepada" class="form-select">
            <option value="">Nama Dokter</option>
                @foreach ($listDokter as $dokter)
            <option value="{{ $dokter->nama }}">{{ $dokter->nama }}</option>
                @endforeach
            </select>
        </div>
        </div>
        </div>

        <div class="d-flex justify-content-center gap-2 mt-4">
            <button type="submit" class="btn btn-primary px-4">
                <span wire:loading.remove>Simpan</span>
                <span wire:loading>
                <span class="spinner-border spinner-border-sm me-2"></span>
                    Menyimpan...
                </span>
            </button>
            <button class="btn btn-secondary w-100" id="btn-cetak">Cetak</button>
            <a href="/main/persuratan/kontrol" class="btn btn-secondary px-4">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
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
            $('#nama_pasien').val(data.data_pasien.nama_lengkap)
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
        <!-- KOP SURAT -->
            <table style="width: 100%;">
                <tr>
                    <td style="width: 80px; vertical-align: middle;">
                        <img src="{{ asset('assets/klinik-insan.png') }}" alt="Logo Klinik" style="height: 80px;">
                    </td>
                    <td style="text-align: center; line-height: 1.5;">
                        <h2 style="font-weight: bold; font-size: 25px; margin: 0;">KLINIK PRATAMA</h2>
                        <h2 style="font-weight: bold; font-size: 25px; margin: 0;">RAWAT JALAN INSAN MEDIKA</h2>
                        <p style="font-size: 18px; margin: 0; text-align: center;">Jl. R. Sosro Prawiro No. 1A Wirowongso, Ajung – Jember</p>
                    </td>
                </tr>
            </table>
            <hr style="border: 2px solid black; margin-top: 4px; margin-bottom: 4px;">

        <!-- JUDUL -->
            <h4 style="font-weight: bold; text-transform: uppercase; font-size: 20px; text-decoration: underline; text-underline-offset: 4px; margin-bottom: 2px;">
                Surat Rencana Kontrol
            </h4>
            <table style="width: 100%; margin-bottom: 10px; font-size: 18px;">
                <tr>
                    <td style="width: 10%;">No.Surat</td>
                    <td>: {{ $this->surat_kontrol->nomor }}</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: {{ \Carbon\Carbon::parse($this->surat_kontrol->tanggal)->translatedFormat('d F Y') }}</td>
                </tr>
            </table>
            <p style="text-align: justify;"> Kepada Yth.<br>${kepada}<br>
                    Di Tempat
            </p>

            <p style="margin-top: 30px;">Mohon dilakukan pemeriksaan dan penanganan lebih lanjut terhadap pasien berikut:</p>

            <p><span class="field-label">Nomor RM</span>: <span class="underline">${noRm}</span></p>
            <p><span class="field-label">Nama Pasien</span>: <span class="underline">${namaPasien}</span></p>
            <p><span class="field-label">Tanggal Lahir</span>: <span class="underline">${tanggalLahir}</span></p>
            <p><span class="field-label">Diagnosa Akhir</span>: <span class="underline">${diagnosa}</span></p>
            <p><span class="field-label">Rencana Kontrol</span>: <span class="underline">${rencanaKontrol}</span></p>

            <p style="margin-top: 30px;">Demikian surat ini dibuat untuk digunakan sebagaimana mestinya. Atas perhatian dan kerjasamanya, diucapkan terima kasih.</p>

            <div class="signature-block" style="font-size: 18;">
                <div class="signature-inner">
                    <p class="signature-date">Jember, <span class="underline">${tanggalTtd}</span></p>
                    <p class="signature-label">Mengetahui,</p>
                    <div class="signature-space"></div>
                    <p class="signature-name underline" style="font-weight: bold;">${penandatangan}</p>
                    <p class="signature-sip" style="font-weight: bold;">${sip}</p>
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

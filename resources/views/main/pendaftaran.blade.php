@ -1,3992 +1,4012 @@
@extends('layouts.master')

@section('title', 'SIP-Kes | Pendaftaran')
<style>
    body {
        background-color: #B4AEAE;
    }
</style>

<style>
    /* CSS untuk kelas danger */
    .danger {
        color: red;
    }
</style>

<style>
    .notification {
        position: fixed;
        top: 20px;
        right: 20px;
        background-color: #17a2b8;
        color: white;
        padding: 15px 20px;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 9999;
        display: none;
        animation: slideIn 0.5s ease-out;
    }

    /* Animasi slide-in */
    @keyframes slideIn {
        from {
            transform: translateX(100%);
        }

        to {
            transform: translateX(0);
        }
    }
</style>

@section('styles')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 id="wizard-title" class="wizard-title">Pendaftaran</h1>
                <style>
                    .wizard-title {
                        font-family: 'Montserrat', sans-serif;
                        font-size: 3rem;
                        font-weight: bold;
                        text-align: left;
                        color: #111754;
                        margin-bottom: 20px;
                    }
                </style>
                <form action="{{ route('pendaftaran.store') }}" method="POST" class="validation-wizard wizard-circle mt-5">
                    @csrf
                    <!-- Step 1 -->
                    <h6>Pendaftaran</h6>
                    <section>
                        <h5 class="section-title">Data Identitas Pasien</h5>
                        <style>
                            .section-title {
                                font-family: 'Poppins', sans-serif;
                                font-size: 2rem;
                                font-weight: bold;
                                text-align: left;
                                color: #1A1A1A;
                                padding: 9px 0;
                            }
                        </style>
                        <div class="card w-100">
                            @if (session('success'))
                                <div class="alert alert-success d-flex align-items-center" role="alert">
                                    <i class="ti ti-circle-check fs-5"></i>
                                    <div class="ms-3">
                                        {{ session('success') }}
                                    </div>
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger d-flex align-items-start" role="alert">
                                    <i class="ti ti-alert-circle fs-5 me-2"></i>
                                    <div>
                                        <strong>Terjadi kesalahan!</strong>
                                        <ul class="mb-0 mt-1">
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                {{-- <div class="row mb-3"> --}}
                                <div class="col-md-10">
                                    <label for="searchNoRM" class="form-label">Cari Data Pasien</label>
                                    <input class="form-control" list="noRMList" id="searchNoRM"
                                        placeholder="Ketik atau pilih No. RM">
                                    <datalist id="noRMList">
                                        @foreach ($data_pasien as $pasien)
                                            <option value="{{ $pasien->no_rm }} - {{ $pasien->nama_pasien }}"></option>
                                        @endforeach
                                    </datalist>
                                    <script>
                                        $(document).ready(function() {
                                            $('#searchNoRM').on('change', function() {
                                                let input = $(this).val();
                                                let no_rm = input.split(' - ')[0].trim();

                                                if (no_rm) {
                                                    $.ajax({
                                                        url: '/get-data-pasien/' + no_rm,
                                                        method: 'GET',
                                                        success: function(data) {
                                                            console.log(data);
                                                            $('#no_rm').val(data.no_rm);
                                                            $('#nama_pasien').val(data.nama_pasien);
                                                            $('#alamat_pasien').val(data.alamat_pasien);
                                                            $('#jenis_kelamin').val(data.jenis_kelamin);
                                                            $('#provinsi').val(data.provinsi.id);
                                                            // Ambil kabupaten berdasarkan provinsi pasien
                                                            $.get('/get-kabupaten/' + data.provinsi.id, function(kabupatens) {
                                                                $('#kabupaten').html(
                                                                    '<option value="">-- Pilih Kabupaten --</option>'
                                                                );
                                                                $.each(kabupatens, function(i, kab) {
                                                                    $('#kabupaten').append('<option value="' +
                                                                        kab.id + '">' + kab.name +
                                                                        '</option>');
                                                                });

                                                                // Setelah kabupaten tersedia, set yang sesuai
                                                                $('#kabupaten').val(data.kota.id);

                                                                // Ambil kecamatan berdasarkan kabupaten pasien
                                                                $.get('/get-kecamatan/' + data.kota.id, function(
                                                                    kecamatans) {
                                                                    $('#kecamatan').html(
                                                                        '<option value="">-- Pilih Kecamatan --</option>'
                                                                    );
                                                                    $.each(kecamatans, function(i, kec) {
                                                                        $('#kecamatan').append(
                                                                            '<option value="' + kec
                                                                            .id + '">' + kec.name +
                                                                            '</option>');
                                                                    });

                                                                    // Set kecamatan
                                                                    $('#kecamatan').val(data.kecamatan.id);

                                                                    // Ambil desa berdasarkan kecamatan pasien
                                                                    $.get('/get-desa/' + data.kecamatan.id,
                                                                        function(desas) {
                                                                            $('#desa').html(
                                                                                '<option value="">-- Pilih Desa --</option>'
                                                                            );
                                                                            $.each(desas, function(i,
                                                                                desa) {
                                                                                $('#desa').append(
                                                                                    '<option value="' +
                                                                                    desa.id +
                                                                                    '">' + desa
                                                                                    .name +
                                                                                    '</option>');
                                                                            });

                                                                            // Set desa
                                                                            $('#desa').val(data.desa.id);
                                                                        });
                                                                });
                                                            });
                                                            $('#desa').val(data.desa.id);
                                                            $('#nik_pasien').val(data.nik_pasien);
                                                            $('#tempat_lahir_pasien').val(data.tempat_lahir_pasien);
                                                            $('#kode_pos').val(data.kode_pos);
                                                            $('#rt').val(data.rt);
                                                            $('#rw').val(data.rw);
                                                            $('#tanggal_lahir_pasien').val(data.tanggal_lahir_pasien);
                                                            $('#agama').val(data.agama);
                                                            $('#status_perkawinan').val(data.status_perkawinan);
                                                            $('#pendidikan_pasien').val(data.pendidikan_pasien);
                                                            $('#pekerjaan_pasien').val(data.pekerjaan_pasien);
                                                            $('#kewarganegaraan').val(data.kewarganegaraan);
                                                            $('#no_telepon_pasien').val(data.no_telepon_pasien);
                                                            $('#nama_ibu_kandung').val(data.nama_ibu_kandung);
                                                            $('#gol_darah').val(data.gol_darah);
                                                            if (data.wali) {
                                                                $('#hubungan').val(data.wali.hubungan_dengan_pasien);
                                                                $('#nama_wali').val(data.wali.nama_wali);
                                                                $('#tlwali').val(data.wali.tanggal_lahir_wali);
                                                                $('#notelpwali').val(data.wali.no_telepon_wali);
                                                                $('#alamatwali').val(data.wali.alamat_wali);
                                                            } else {
                                                                console.warn('Data wali pasien tidak ditemukan');
                                                                $('#hubungan').val('');
                                                                $('#nama_wali').val('');
                                                                $('#tlwali').val('');
                                                                $('#notelpwali').val('');
                                                                $('#alamatwali').val('');
                                                            }
                                                        },
                                                        error: function() {
                                                            alert('Data pasien tidak ditemukan');
                                                        }
                                                    });
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                                <div class="col-md-2 align-self-end">
                                    <!-- Tombol untuk memicu modal -->
                                    <button class="btn btn-primary"> Cari </button>
                                </div>
                            </div>

                            {{-- </div> --}}
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="norm" class="form-label">No RM: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="no_rm" name="no_rm"
                                        placeholder="Masukkan No. RM" readonly>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="alamatlengkap" class="form-label">Alamat Lengkap: <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="alamat_pasien" name="alamat_pasien"
                                        placeholder="Nama Jalan/Blok/Nomor Rumah">
                                </div>
                            </div>
                            <div class="row align-items-end">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nama">Nama Lengkap: <span
                                                class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="nama_pasien"
                                            name="nama_pasien" placeholder="Masukkan nama" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="id_provinsi">Provinsi:<span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="provinsi" name="id_provinsi">
                                            <option value=""><-- Pilih Provinsi ---></option>
                                            @foreach ($data_provinsi as $provinsi)
                                                <option value="{{ $provinsi->id }}">{{ $provinsi->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="kota">Kota/Kabupaten:<span
                                                class="danger">*</span></label>
                                        {{-- <input type="text" class="form-control required" id="id_kota"
                                            name="id_kota" /> --}}
                                        <select class="form-select required" id="kabupaten" name="id_kota">
                                            <option value=""><-- Pilih Kota ---></option>
                                            {{-- @foreach ($data_kabupaten as $kabupaten)
                                                <option value="{{ $kabupaten->id }}">
                                                    {{ $kabupaten->name }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="nik_pasien">NIK: <span
                                                class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="nik_pasien"
                                            name="nik_pasien" placeholder="16 digit" oninput="validateNumeric(this, 16)"
                                            maxlength="16" required>
                                        <small class="error-message" id="nik_pasien-error" style="display: none;">
                                            NIK harus berupa 16 digit angka
                                        </small>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="kecamatan">Kecamatan:<span
                                                class="danger">*</span></label>
                                        {{-- <input type="text" class="form-control required" id="id_kecamatan"
                                            name="id_kecamatan" /> --}}
                                        <select id="kecamatan" name="id_kecamatan" class="form-control">
                                            <option value=""><-- Pilih Kecamatan ---></option>
                                            {{-- @foreach ($data_kecamatan as $kecamatan)
                                                <option value="{{ $kecamatan->id }}">
                                                    {{ $kecamatan->name }}
                                                </option>
                                            @endforeach --}}
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="kelurahan">Kelurahan/Desa: <span
                                                class="danger">*</span></label>
                                        {{-- <input type="text" class="form-control required" id="id_desa"
                                            name="id_desa" /> --}}
                                        <select class="form-select required" id="desa" name="id_desa">
                                            <option value=""><-- Pilih Desa ---></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="tempatlahir">Tempat Lahir: <span
                                                class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="tempat_lahir_pasien"
                                            name="tempat_lahir_pasien" />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="mb-3">
                                        <label class="form-label" for="kodepos">Kode Pos:<span
                                                class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="kode_pos"
                                            name="kode_pos" oninput="validateNumeric(this, 5)" maxlength="5" required>
                                        <small class="error-message" id="kodepos-error">Kode Pos harus berupa 5 digit
                                            angka</small>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="rt">RT:<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="rt"
                                            name="rt" oninput="validateNumeric(this, 3)" maxlength="3" required>
                                    </div>
                                </div>
                                <div class="col-md-1">
                                    <div class="mb-3">
                                        <label class="form-label" for="rt">RW:<span class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="rw"
                                            name="rw" oninput="validateNumeric(this, 3)" maxlength="3" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="tanggallahir">Tanggal Lahir: <span
                                                class="danger">*</span></label>
                                        <input type="date" class="form-control required" id="tanggal_lahir_pasien"
                                            name="tanggal_lahir_pasien" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="jeniskelamin">Jenis Kelamin: <span
                                                class="danger">*</span>
                                        </label>
                                        <select class="form-select required" id="jenis_kelamin" name="jenis_kelamin">
                                            <option value="0">Tidak Diketahui</option>
                                            <option value="1">Laki-laki</option>
                                            <option value="2">Perempuan</option>
                                            <option value="3">Tidak dapat ditentukan</option>
                                            <option value="4">Tidak mengisi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="agama">Agama:<span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="agama" name="agama">
                                            <option value="1">Islam</option>
                                            <option value="2">Kristen (Protestan)</option>
                                            <option value="3">Katolik</option>
                                            <option value="4">Hindu</option>
                                            <option value="5">Buddha</option>
                                            <option value="6">Konghucu</option>
                                            <option value="7">Penghayat</option>
                                            <option value="8">Lain-Lain</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="perkawinan">Status Perkawinan:<span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="status_perkawinan"
                                            name="status_perkawinan">
                                            <option value="1">Belum Kawin</option>
                                            <option value="2">Kawin</option>
                                            <option value="3">Cerai Hidup</option>
                                            <option value="4">Cerai Mati</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="pendidikan">Pendidikan:<span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="pendidikan_pasien"
                                            name="pendidikan_pasien">
                                            <option value="0">Tidak Sekolah</option>
                                            <option value="1">SD</option>
                                            <option value="2">SLTP Sederajat</option>
                                            <option value="3">SLTA Sederajat</option>
                                            <option value="4">D1-D3 Sederajat</option>
                                            <option value="5">D4</option>
                                            <option value="6">S1</option>
                                            <option value="7">S2</option>
                                            <option value="8">S3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="pekerjaan">Pekerjaan:<span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="pekerjaan_pasien"
                                            name="pekerjaan_pasien">
                                            <option value="0">Tidak bekerja</option>
                                            <option value="1">PNS</option>
                                            <option value="2">TNI/Polri</option>
                                            <option value="3">BUMN</option>
                                            <option value="4">Pegawai Swasta/Wirausaha</option>
                                            <option value="5">Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="kewarganegaraan">Kewarganegaraan:<span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="kewarganegaraan" name="kewarganegaraan">
                                            <option value="1">WNI</option>
                                            <option value="2">WNA</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="telepon">Nomor Telepon:<span
                                                class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="no_telepon_pasien"
                                            name="no_telepon_pasien" placeholder="08xxxxxxxxxx" required
                                            oninput="validateNumeric(this, 13)" maxlength="13" required>
                                        <small class="error-message" id="telepon-error">Nomor telepon harus berupa 10-13
                                            digit
                                            angka</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="ibukandung">Nama Ibu Kandung:<span
                                                class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="nama_ibu_kandung"
                                            name="nama_ibu_kandung" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="goldar">Golongan Darah:<span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="gol_darah" name="gol_darah">
                                            <option value="0">Tidak Diketahui</option>
                                            <option value="1">A</option>
                                            <option value="2">B</option>
                                            <option value="3">AB</option>
                                            <option value="4">O</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h4 class="section-title">Identitas Wali</h4>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="hubungan">Hubungan dengan pasien:<span
                                                class="danger">*</span></label>
                                        <select class="form-select required" id="hubungan"
                                            name="hubungan_dengan_pasien">
                                            <option value="1">Diri Sendiri</option>
                                            <option value="2">Orang Tua</option>
                                            <option value="3">Anak</option>
                                            <option value="4">Suami/Istri</option>
                                            <option value="5">Kerabat/Saudara</option>
                                            <option value="6">Lain-lain</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="namawali">Nama Wali:<span
                                                class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="nama_wali"
                                            name="nama_wali" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label class="form-label" for="tlwali">Tanggal Lahir Wali :<span
                                                class="danger">*</span></label>
                                        <input type="date" class="form-control required" id="tlwali"
                                            name="tanggal_lahir_wali" />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="notelpwali">Nomor Telepon Wali:<span
                                                class="danger">*</span></label>
                                        <input type="texr" class="form-control required" id="notelpwali"
                                            name="no_telepon_wali" placeholder="08xxxxxxxxxx" pattern="[0-9]{10,13}"
                                            required oninput="validateNumeric(this, 13)" maxlength="13" required>
                                        <small class="error-message" id="telepon-error">Nomor telepon harus berupa 10-13
                                            digit
                                            angka</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="alamatwali">Alamat Wali<span
                                                class="danger">*</span></label>
                                        <input type="text" class="form-control required" id="alamatwali"
                                            name="alamat_wali" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="layanan">Layanan<span
                                                    class="danger">*</span></label>
                                            <select class="form-select required" id="id_poli" name="id_poli">
                                                <option value="">
                                                    <-- Pilih Poli --->
                                                </option>
                                                @foreach ($data_poli as $poli)
                                                    <option value="{{ $poli->id_poli }}">{{ $poli->nama_poli }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="layanan">Dokter<span
                                                    class="danger">*</span></label>
                                            <select class="form-select required" id="id_dokter" name="id_data_dokter">
                                                <option value="">
                                                    <-- Pilih Dokter --->
                                                </option>
                                                @foreach ($data_dokter as $dokter)
                                                    <option value="{{ $dokter->id }}">
                                                        {{ $dokter->nama }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label" for="bayar">Cara Pembayaran<span
                                                    class="danger">*</span></label>
                                            <select class="form-select required" id="bayar" name="jenis_pembayaran">
                                                <option value="1">Umum</option>
                                                <option value="2">BPJS</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-primary" type="submit"> Simpan </button>
                        </div>
                    </section>

                    <!-- Step 2 -->
                    <h6>Pemeriksaan Awal</h6>
                    <section>
                        <h4 class="section-title">Data Pendaftaran</h4>
                    </section>


                    <!-- Step 3 -->
                    <h6 class="fw-bold mt-4">Pemeriksaan</h6>
                    <section>
                        <h4 class="section-title mb-3">Data Pemeriksaan</h4>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-warning me-2">Rujuk Rawat Inap</button>
                                <div class="dropdown">
                                    <button class="btn btn-info dropdown-toggle" type="button"
                                        id="suratKeteranganDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                        Surat Keterangan
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="suratKeteranganDropdown">
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#modalSehat">Surat Keterangan Sehat</a></li>
                                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal"
                                                data-bs-target="#modalSakit">Surat Keterangan Sakit</a></li>
                                        <li><a class="dropdown-item" href="#">General Consent</a></li>
                                        <li><a class="dropdown-item" href="#">Informed Consent</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="d-flex">
                                <input type="text" class="form-control me-2" id="searchNoRM"
                                    placeholder="Cari No. RM">
                                <button class="btn btn-primary" onclick="searchRM()">Cari</button>
                            </div>
                        </div>

                        <!-- Antrian - Identitas Pasien -->
                        <div class="card p-3 mb-3 shadow-sm">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="form-label" for="noantian">No Antrian</label>
                                    <input type="text" class="form-control" id="noantian" name="noantian">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" for="nama">Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label" for="no.rm">No. RM</label>
                                    <input type="text" class="form-control" id="no.rm" name="no.rm">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label" for="tanggal">Tanggal</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label" for="jenispemeriksaan">Jenis Pemeriksaan</label>
                                    <select class="form-select" id="jenispemeriksaan" name="jenispemeriksaan">
                                        <option value="poliumum">Poli Umum</option>
                                        <option value="poligigi">Poli Gigi</option>
                                        <option value="kia">KIA</option>
                                        <option value="circum">Circum</option>
                                        <option value="vaksininternasional">Vaksin Internasional</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Diagnosis dan ICD 10 -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <h5 class="fw-bold">Diagnosis</h5>
                                    <textarea id="diagnosis" name="diagnosis" rows="5" class="form-control" placeholder="Ketik diagnosis"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <h5 class="fw-bold">ICD 10</h5>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control"
                                            placeholder="Ketik Kode atau Diagnosa">
                                        <button class="btn btn-outline-secondary" type="button"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <div id="selected-icds-icd10" class="border p-2 rounded bg-light mt-2">
                                        <p class="text-muted text-center mb-0" id="no-icd-selected-icd10">Belum ada
                                            diagnosa yang dipilih</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Subjective dan Objective -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <h5 class="fw-bold">Subjective</h5>
                                    <label class="form-label" for="subjective">Keluhan</label>
                                    <textarea id="subjective" name="subjective" rows="5" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <h5 class="fw-bold">Objective</h5>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Sistol (mmHg)</label>
                                            <input type="text" class="form-control" id="sistol-mask">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Diastol (mmHg)</label>
                                            <input type="text" class="form-control" id="diastol-mask">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Berat Badan (kg)</label>
                                            <input type="text" class="form-control" id="berat-mask">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Tinggi Badan (cm)</label>
                                            <input type="text" class="form-control" id="tinggi-mask">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Suhu (°C)</label>
                                            <input type="text" class="form-control" id="suhu-mask">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">SpO2 (%)</label>
                                            <input type="text" class="form-control" id="spo2-mask">
                                        </div>
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Respiration Rate (/mnt)</label>
                                            <input type="text" class="form-control" id="resprate-mask">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Assessment dan Plan -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <label class="form-label" for="assesment">Assessment</label>
                                    <textarea id="assesment" name="assesment" rows="5" class="form-control" placeholder="Ketik Assessment"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <label class="form-label" for="plan">Plan</label>
                                    <textarea id="plan" name="plan" rows="5" class="form-control" placeholder="Ketik Plan"></textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Pemeriksaan Fisik dan ICD 9 -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 h-100">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="fw-bold mb-0">Pemeriksaan Fisik</h6>
                                        <button class="btn btn-sm btn-secondary">Tambah +</button>
                                    </div>
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: #676981; color: white;">
                                            <tr>
                                                <th>Nama</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Tidak Ada Data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 shadow-sm">
                                    <h5 class="fw-bold">ICD 9</h5>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control"
                                            placeholder="Ketik Kode atau Tindakan">
                                        <button class="btn btn-outline-secondary" type="button"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <div id="selected-icds-icd9" class="border p-2 rounded bg-light mt-2">
                                        <p class="text-muted text-center mb-0" id="no-icd-selected-icd9">Belum ada
                                            Tindakan yang dipilih</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Layanan dan Rincian Obat -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Layanan</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Ketik Layanan">
                                        <button class="btn btn-outline-secondary" type="button"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: #676981; color: white;">
                                            <tr>
                                                <th>Jumlah</th>
                                                <th>Nama Layanan</th>
                                                <th>Harga Layanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3">Tidak Ada Data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Rincian Obat</label>
                                    <div class="input-group mb-2">
                                        <input type="text" class="form-control" placeholder="Ketik Obat">
                                        <button class="btn btn-outline-secondary" type="button"><i
                                                class="bi bi-search"></i></button>
                                    </div>
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: #676981; color: white;">
                                            <tr>
                                                <th>Jumlah</th>
                                                <th>Nama Obat</th>
                                                <th>Harga Obat</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3">Tidak Ada Data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Rencana Kontrol dan Catatan -->
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Rencana Kontrol</label>
                                    <div class="row g-2 mb-2">
                                        <div class="col-md-5">
                                            <input type="date" class="form-control">
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" class="form-control" placeholder="Alasan Kontrol">
                                        </div>
                                        <div class="col-md-2">
                                            <button class="btn btn-secondary w-100">Tambah +</button>
                                        </div>
                                    </div>
                                    <table class="table table-bordered text-center">
                                        <thead style="background-color: #676981; color: white;">
                                            <tr>
                                                <th>Tanggal Kontrol</th>
                                                <th>Alasan Kontrol</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="2">Tidak Ada Data</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="card p-3 h-100">
                                    <label class="form-label fw-bold">Catatan</label>
                                    <textarea class="form-control" rows="5" placeholder="Tambah catatan di sini"></textarea>
                                </div>
                            </div>
                        </div>

                    </section>

                    <!-- Step 4 -->
                    <h6>Farmasi</h6>
                    <section>
                    </section>

                    <!-- Step 5 -->
                    <h6>Pembayaran</h6>
                    <section>
                    </section>
                </form>
            </div>
        </div>
    </div>
@endsection



@section('scripts')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
    <script src="{{ URL::asset('build/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/mask.init.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>


    {{-- Wilayah indonesia --}}
    <script>
        $('#provinsi').on('change', function() {
            let provinsi_id = $(this).val(); // ini ID sekarang
            $('#kabupaten').html('<option value="">-- Pilih Kabupaten --</option>');
            $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
            $('#desa').html('<option value="">-- Pilih Desa --</option>');

            if (provinsi_id) {
                $.get('/get-kabupaten/' + provinsi_id, function(data) {
                    console.log(data);
                    $.each(data, function(i, kab) {
                        $('#kabupaten').append('<option value="' + kab.id + '">' + kab.name +
                            '</option>');
                    });
                });
            }
        });

        // Kabupaten -> Kecamatan
        $('#kabupaten').on('change', function() {
            let kabupaten_id = $(this).val(); // ini ID, bukan code
            $('#kecamatan').html('<option value="">-- Pilih Kecamatan --</option>');
            $('#desa').html('<option value="">-- Pilih Desa --</option>');

            if (kabupaten_id) {
                $.get('/get-kecamatan/' + kabupaten_id, function(data) {
                    $.each(data, function(i, kec) {
                        // Gunakan id untuk value
                        $('#kecamatan').append('<option value="' + kec.id + '">' + kec.name +
                            '</option>');
                    });
                });
            }
        });

        // Kecamatan -> Desa
        $('#kecamatan').on('change', function() {
            let kecamatan_id = $(this).val();
            $('#desa').html('<option value="">-- Pilih Desa --</option>');

            if (kecamatan_id) {
                $.get('/get-desa/' + kecamatan_id, function(data) {
                    $.each(data, function(i, desa) {
                        $('#desa').append('<option value="' + desa.id + '">' + desa.name +
                            '</option>');
                    });
                });
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi canvas ketika modal ditampilkan
            $('#modalSehat').on('shown.bs.modal', function() {
                initSignaturePad('signature-pad', 'clear-signature');
            });
            // Untuk modal surat sakit
            $('#modalSakit').on('shown.bs.modal', function() {
                initSignaturePad('signature-pad-sakit', 'clear-signature-sakit');
            });

            function initSignaturePad(canvasId, clearButtonId) {
                const canvas = document.getElementById(canvasId);
                const ctx = canvas.getContext('2d');

                // Atur ukuran canvas yang tepat
                function resizeCanvas() {
                    const container = canvas.parentElement;
                    canvas.width = container.offsetWidth;
                    canvas.height = container.offsetHeight;
                    ctx.lineWidth = 2;
                    ctx.lineCap = 'round';
                    ctx.strokeStyle = '#000000';
                }

                resizeCanvas();

                // Variabel untuk tracking
                let isDrawing = false;
                let lastX = 0;
                let lastY = 0;

                // Fungsi untuk mendapatkan posisi mouse/touch
                function getPosition(e) {
                    let posX, posY;
                    if (e.type.includes('touch')) {
                        const touch = e.touches[0] || e.changedTouches[0];
                        const rect = canvas.getBoundingClientRect();
                        posX = touch.clientX - rect.left;
                        posY = touch.clientY - rect.top;
                    } else {
                        const rect = canvas.getBoundingClientRect();
                        posX = e.clientX - rect.left;
                        posY = e.clientY - rect.top;
                    }
                    return {
                        x: posX,
                        y: posY
                    };
                }

                // Event listeners untuk mouse
                canvas.addEventListener('mousedown', (e) => {
                    const pos = getPosition(e);
                    isDrawing = true;
                    [lastX, lastY] = [pos.x, pos.y];
                    e.preventDefault();
                });

                canvas.addEventListener('mousemove', (e) => {
                    if (!isDrawing) return;
                    const pos = getPosition(e);
                    draw(pos.x, pos.y);
                    e.preventDefault();
                });

                canvas.addEventListener('mouseup', () => {
                    isDrawing = false;
                });

                canvas.addEventListener('mouseout', () => {
                    isDrawing = false;
                });

                // Event listeners untuk touch
                canvas.addEventListener('touchstart', (e) => {
                    const pos = getPosition(e);
                    isDrawing = true;
                    [lastX, lastY] = [pos.x, pos.y];
                    e.preventDefault();
                });

                canvas.addEventListener('touchmove', (e) => {
                    if (!isDrawing) return;
                    const pos = getPosition(e);
                    draw(pos.x, pos.y);
                    e.preventDefault();
                });

                canvas.addEventListener('touchend', () => {
                    isDrawing = false;
                });

                // Fungsi menggambar
                function draw(x, y) {
                    ctx.beginPath();
                    ctx.moveTo(lastX, lastY);
                    ctx.lineTo(x, y);
                    ctx.stroke();
                    [lastX, lastY] = [x, y];
                }

                // Tombol hapus
                document.getElementById('clear-signature').addEventListener('click', () => {
                    ctx.clearRect(0, 0, canvas.width, canvas.height);
                });

                // Handle resize window
                window.addEventListener('resize', () => {
                    resizeCanvas();
                });
            }
        });
    </script>

    <script>
        // Add delete functionality
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                this.closest('tr').remove();
            });
        });

        // Add search functionality (example)
        document.querySelector('.btn-outline-secondary').addEventListener('click', function() {
            const searchTerm = document.getElementById('icd10Search').value;
            // Here you would typically call an API to search ICD-10 codes
            console.log('Searching for:', searchTerm);
        });
    </script>

    <script>
        // Add click event for view details button
        document.querySelector('.view-details').addEventListener('click', function() {
            // Set modal content based on the row data
            const modalContent = `
                <p><strong>Nama:</strong> Kepala</p>
                <p><strong>Keterangan:</strong> Kelainan pada pembuluh darah</p>
                <p><strong>Detail Tambahan:</strong></p>
                <ul>
                    <li>Jenis Kelainan: Varises pembuluh darah</li>
                    <li>Tingkat Keparahan: Sedang</li>
                    <li>Tanggal Pemeriksaan: 15-06-2023</li>
                </ul>
            `;

            document.getElementById('modalBodyContent').innerHTML = modalContent;

            // Show modal
            const modal = new bootstrap.Modal(document.getElementById('detailsModal'));
            modal.show();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Daftar judul per step
            const titles = [
                'Pendaftaran', // Step 1
                'Pemeriksaan Awal', // Step 2
                'Pemeriksaan Poli Umum', // Step 3
                'Farmasi', // Step 4
                'Pembayaran' // Step 5
            ];

            const titleElement = document.getElementById('wizard-title');
            const wizard = document.querySelector('.validation-wizard');

            if (wizard) {
                $(wizard).on('stepChanged', function(event, currentIndex) {
                    titleElement.innerText = titles[currentIndex] || 'Pendaftaran Rawat Jalan';
                });
            }
        });
    </script>

    <script>
        // Function to validate NIK (16 digits)
        function validateNIK(input) {
            // Remove non-numeric characters
            let value = input.value.replace(/\D/g, '');

            // Set max length
            if (value.length > 16) {
                value = value.slice(0, 16);
            }

            // Update input value
            input.value = value;

            // Show/hide error message
            const errorElement = document.getElementById('nik-error');
            if (value.length > 0 && value.length !== 16) {
                errorElement.style.display = 'block';
            } else {
                errorElement.style.display = 'none';
            }
        }

        // Function to validate numeric inputs with specific length
        function validateNumeric(input, maxLength) {
            // Remove non-numeric characters
            let value = input.value.replace(/\D/g, '');

            // Set max length if specified
            if (maxLength && value.length > maxLength) {
                value = value.slice(0, maxLength);
            }

            // Update input value
            input.value = value;

            // Show/hide error message
            const fieldId = input.id;
            const errorElement = document.getElementById(`${fieldId}-error`);
            if (errorElement) {
                if (value.length > 0 && maxLength && value.length !== maxLength) {
                    errorElement.style.display = 'block';
                } else {
                    errorElement.style.display = 'none';
                }
            }
        }

        // Function to validate phone numbers (10-13 digits)
        function validateTelepon(input) {
            // Remove non-numeric characters
            let value = input.value.replace(/\D/g, '');

            // Set max length
            if (value.length > 13) {
                value = value.slice(0, 13);
            }

            // Update input value
            input.value = value;

            // Show/hide error message
            const fieldId = input.id;
            const errorElement = document.getElementById(`${fieldId}-error`);
            if (errorElement) {
                if (value.length > 0 && (value.length < 10 || value.length > 13)) {
                    errorElement.style.display = 'block';
                } else {
                    errorElement.style.display = 'none';
                }
            }
        }

        // Fix for input type="number" with maxlength attribute (since maxlength doesn't work on number inputs)
        document.addEventListener('DOMContentLoaded', function() {
            // Apply to all numeric inputs
            const numericInputs = document.querySelectorAll('input[type="number"]');
            numericInputs.forEach(function(input) {
                input.addEventListener('input', function() {
                    const maxLength = this.getAttribute('maxlength');
                    if (maxLength && this.value.length > maxLength) {
                        this.value = this.value.slice(0, maxLength);
                    }
                });
            });
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Function to process decimal input (accepts both . and , as decimal separators)
            function processDecimalInput(input, value) {
                // Replace comma with dot for consistency
                let newValue = value.replace(/,/g, '.');

                // Remove any characters that aren't numbers or dots
                newValue = newValue.replace(/[^0-9.]/g, '');

                // Ensure only one decimal point
                const parts = newValue.split('.');
                if (parts.length > 2) {
                    newValue = parts[0] + '.' + parts.slice(1).join('');
                }

                // If starts with dot, add 0 before
                if (newValue.startsWith('.')) {
                    newValue = '0' + newValue;
                }

                return newValue;
            }

            // Number inputs (whole numbers only)
            const numberInputs = document.querySelectorAll('.number-input');
            numberInputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });

                input.addEventListener('paste', function(e) {
                    e.preventDefault();
                    const pasteData = e.clipboardData.getData('text/plain');
                    const numbers = pasteData.replace(/[^0-9]/g, '');
                    document.execCommand('insertText', false, numbers);
                });
            });

            // Decimal inputs (accepts numbers and decimal points)
            const decimalInputs = document.querySelectorAll('.decimal-input');
            decimalInputs.forEach(input => {
                input.addEventListener('input', function() {
                    this.value = processDecimalInput(this, this.value);
                });

                input.addEventListener('paste', function(e) {
                    e.preventDefault();
                    const pasteData = e.clipboardData.getData('text/plain');
                    const processedValue = processDecimalInput(this, pasteData);
                    document.execCommand('insertText', false, processedValue);
                });

                // Remove trailing decimal point when losing focus
                input.addEventListener('blur', function() {
                    if (this.value.endsWith('.')) {
                        this.value = this.value.slice(0, -1);
                    }
                });
            });
        });
    </script>

    <script>
        function validateNumeric(input, maxLength) {
            // Hapus karakter non-angka
            let value = input.value.replace(/\D/g, '');

            // Batasi panjang maksimal jika ditentukan
            if (maxLength && value.length > maxLength) {
                value = value.slice(0, maxLength);
            }

            // Update nilai input
            input.value = value;

            // Tampilkan atau sembunyikan pesan error
            const fieldId = input.id;
            const errorElement = document.getElementById(`${fieldId}-error`);
            if (errorElement) {
                if (value.length > 0 && maxLength && value.length !== maxLength) {
                    errorElement.style.display = 'block';
                } else {
                    errorElement.style.display = 'none';
                }
            }
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap @5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons @1.10.5/font/bootstrap-icons.min.js"></script>


    <script>
        // Fungsi untuk menampilkan notifikasi
        function showNotification() {
            const notification = document.getElementById('notification');
            notification.style.display = 'block';

            // Sembunyikan notifikasi setelah 3 detik
            setTimeout(() => {
                notification.style.display = 'none';
            }, 3000);
        }

        // Event listener untuk tombol "Simpan"
        document.getElementById('saveButton').addEventListener('click', () => {
            console.log('Data pasien berhasil disimpan.');
            showNotification();
        });
    </script>

    <script>
        $(function() {
            $("#searchNoRM").autocomplete({
                source: function(request, response) {
                    $.getJSON("/cari-pasien", {
                        term: request.term
                    }, function(data) {
                        response($.map(data, function(item) {
                            return {
                                label: item.no_rm + " - " + item.nama_pasien,
                                value: item.no_rm
                            };
                        }));
                    });
                },
                minLength: 2,
                select: function(event, ui) {
                    let no_rm = ui.item.value;
                    $.get('/get-data-pasien/' + no_rm, function(data) {
                        $('#no_rm').val(data.no_rm);
                        $('#nama_pasien').val(data.nama_pasien);
                        // dst...
                    });
                }
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
        const previousBtn = document.querySelector('a[href="#previous"]');
        if (previousBtn) {
            previousBtn.remove(); // tombol benar-benar dihapus dari halaman
        }
        });
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const nextBtn = document.querySelector('a[href="#next"]');
            if (nextBtn) {
                nextBtn.style.display = "none";
            }
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Inisialisasi dropdown menggunakan Bootstrap
            const dropdownElement = document.getElementById('suratKeteranganDropdown');
            if (dropdownElement) {
                const dropdown = new bootstrap.Dropdown(dropdownElement);
            }

            // Event listener untuk item dropdown
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', function(event) {
                    event.preventDefault();
                    const targetModal = this.getAttribute('data-bs-target');
                    if (targetModal) {
                        const modal = new bootstrap.Modal(document.querySelector(targetModal));
                        modal.show();
                    }
                });
            });
        });
    </script>

    <script>
        const tableIcd = new DataTable('#icdTable', {
            responsive: true,
            paging: true,
            searching: true,
            info: true,
            pageLength: 10, // Default: tampilkan 10 entri
            lengthMenu: [5, 10, 25, 50, 100]
        });
        const tableLayanan = new DataTable('#layananTable', {
            responsive: true,
            paging: true,
            searching: true,
            info: true,
            pageLength: 10, // Default: tampilkan 10 entri
            lengthMenu: [5, 10, 25, 50, 100]
        });
    </script>

@endsection

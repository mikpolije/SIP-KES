@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
<div class="container-fluid">
    <div class="card w-100">
        <div class="card-body">
            <h1 class="card-title"></h1>
            <h1 class="title">General Consent</h1>
            <style>
                .title {
                    font-family: 'Montserrat', sans-serif;
                    font-size: 3rem;
                    font-weight: bold;
                    text-align: left;
                    color: #111754;
                    text-shadow: 3px 3px 5px rgba(0, 0, 0, 0.2);
                }
            </style>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form id="formGeneralConsent" method="POST" action="{{ route('general-consent.store') }}">
                @csrf
                <!-- Step 1 -->
                <div class="flex justify-content-between">
                    <h5 class="section-title">Data Pasien</h5>
                    <div class="mb-3 mb-3">
                        <div class="form-group">
                            <button type="button" id="btnCariPasien" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="ti ti-search"></i>
                                Cari Pasien
                            </button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="action" id="formAction" value="simpan">
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
                <div class="w-100">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label" for="no_rm"> No RM : <span class="danger">*</span></label>
                                <input type="text" class="form-control required" id="no_rm" name="no_rm" readonly placeholder="Masukkan No. RM" />
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label" for="nik"> NIK : <span class="danger">*</span></label>
                                <input type="text" class="form-control required" id="nik" name="nik" readonly placeholder="16 digit" />
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label" for="jenisKelaminText">Jenis Kelamin: <span class="danger">*</span></label>
                                <input type="text" class="form-control required" id="jenisKelaminText" readonly name="jenisKelaminText" />
                                <input type="hidden" name="jenisKelamin" id="jenisKelamin"> <!-- dikirim ke server -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="namaPasien">Nama: <span class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="namaPasien" name="namaPasien" readonly placeholder="Masukkan nama" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="tanggalLahir">Tanggal Lahir: <span class="danger">*</span></label>
                                    <input type="date" class="form-control required" id="tanggalLahir" name="tanggalLahir" readonly />
                                </div>
                            </div>
                        </div>

                        <p>Pasien atau wali di minta membaca, memahami dan mengisi informasi berikut:</p>
                        <p>Yang bertanda tangan dibawah ini:</p>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="namaWali">Nama: <span class="danger">*</span></label>
                                    <input type="text" class="form-control required" id="namaWali" name="namaWali"
                                        placeholder="Masukkan nama" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="tanggalLahirWali">Tanggal Lahir: <span
                                            class="danger">*</span></label>
                                    <input type="date" class="form-control required" id="tanggalLahirWali"
                                        name="tanggalLahirWali" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label" for="hubungan">Hubungan dengan pasien: <span
                                            class="danger">*</span>
                                    </label>
                                    <select class="form-select required" id="hubungan" name="hubungan">
                                        <option value="Saya sendiri">Saya sendiri</option>
                                        <option value="Istri">Istri</option>
                                        <option value="Suami">Suami</option>
                                        <option value="Anak">Anak</option>
                                        <option value="Ayah">Ayah</option>
                                        <option value="Ibu">Ibu</option>
                                        <option value="7">Lain - Lain</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="alamat"> Alamat : <span class="danger">*</span>
                                    </label>
                                    <input type="text" class="form-control required" id="alamat" name="alamat"
                                        placeholder="Masukkan Alamat" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label class="form-label" for="notelp"> No. Telepon : <span class="danger">*</span>
                                    </label>
                                    <input type="text" class="form-control required" id="notelp" name="notelp"
                                        placeholder="Masukan No. Telpon" />
                                </div>
                            </div>
                            <div class="col-md-2" id="lain-wrapper" style="display: none;">
                                <div class="mb-3">
                                    <label class="form-label" for="hubunganpasien">Hubungan dengan pasien: <span
                                            class="danger">*</span>
                                    </label>
                                    <input type="text" class="form-control" name="lain" id="lain">
                                </div>
                            </div>
                        </div>
                        <p>Selaku wali/pasien Klinik Pratama "Insan Medika", dengan ini menyatakan:</p>
                        <p>informasi tentang Hak dan Kewajiban pasien</p>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="menandatangani" name="menandatangani"
                                autocomplete="off">
                            <label for="menandatangani">Dengan menandatangani dokumen ini saya mengakui bahwa pada proses
                                pendaftaran untuk mendapatkan PELAYANAN di Klinik Pratama "Insan Medika", saya telah
                                mendapatkan informasi tentang hak-hak dan kewajiban saya sebagai pasien.</label>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="menerimainformasi" name="menerimainformasi"
                                autocomplete="off">
                            <label for="menerimainformasi">Saya telah menerima informasi tentang peraturan yang
                                diberlakukan oleh Klinik Pratama "Insan Medika", dan saya beserta keluarga bersedia untuk
                                mematuhinya.</label>
                        </div>
                        <p class="mb-2">Persetujuan perawatan dan pengobatan</p>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="kondisi" name="kondisi" autocomplete="off">
                            <label for="kondisi">Saya mengetahui bahwa saya memiliki kondisi yang membutuhkan perawatan
                                medis, saya mengizinkan dokter dan profesional kesehatan lainnya untuk melakukan prosedur
                                diagnostik, memberikan pengobatan medis seperti yang diperlukan dalam penilaian profesional
                                mereka meliputi; Pemerikasaan fisik yang dilakukan oleh perawat dan dokter, Pemasangan alat
                                kesehatan (kecuali yang membutuhkan persetujuan khusus), Asuhan keperawatan, Pemeriksaan
                                laboratorium, Pemeriksaan Radiologi.</label>
                        </div>
                        <p class="mb-2">Persetujuan pelepasan informasi</p>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="diagnosis" name="diagnosis" autocomplete="off">
                            <label for="diagnosis">Saya memahami informasi yang ada dalam diri saya termasuk diagnosis,
                                hasil laboratorium dan hasil tes diagnostik yang akan digunakan untuk perawatan medis di
                                Klinik Pratama "Insan Medika" akan dijamin kerahasiaannya.</label>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="wewenang" name="wewenang" autocomplete="off">
                            <label for="wewenang">Saya memberikan wewenang kepada Klinik Pratama "Insan Medika" untuk
                                memberikan informasi tentang dignosis hasil pelayanan dan pengobatan bila diperlukan untuk
                                memproses klaim ansuransi/BPJS dan perusahaan kerjasama.</label>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="memberikanwewenang" name="memberikanwewenang"
                                autocomplete="off">
                            <label for="memberikanwewenang">Saya </label>
                            <div class="col-md-2">
                                <select class="form-select form-select-sm required" id="memberikan" name="beri">
                                    <option value="memberikan">Memberikan</option>
                                    <option value="tidakmemberikan">Tidak Memberikan</option>
                                </select>
                            </div>
                            <label for="memberikanwewenang"> wewenang kepada Klinik Pratama "Insan Medika" untuk memberikan
                                informasi tentang diagnosis hasil pemeriksaan dan pengobatan saya kepada:</label>
                        </div>
                        <div class="row ms-3">
                            <div class="col-md-3 mb-3">
                                <input type="text" class="form-control" id="penanggungJawab1"
                                    name="penanggungJawab1" />
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" class="form-control" id="penanggungJawab2"
                                    name="penanggungJawab2" />
                            </div>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="mengijinkanwewenang" name="mengizinkanwewenang"
                                autocomplete="off">
                            <label for="mengizinkanwewenang">Saya </label>
                            <div class="col-md-2">
                                <select class="form-select form-select-sm required" id="mengijinkan" name="ijin">
                                    <option value="mengijinkan">Mengijinkan</option>
                                    <option value="tidakmengijinkan">Tidak Mengijinkan</option>
                                </select>
                            </div>
                            <label for="mengijinkanwewenang"> Klinik Pratama "Insan Medika" memberi akses bagi keluarga dan
                                saudara serta orang-orang yang menerima pengobatan dan pemeriksaan (sebutkan nama bila ada
                                permintaan khusus yang tidak diijinkan)</label>
                        </div>
                        <div class="row ms-3">
                            <div class="col-md-3 mb-3">
                                <input type="text" class="form-control" id="penanggungJawab3"
                                    name="penanggungJawab3" />
                            </div>
                            <div class="col-md-3 mb-3">
                                <input type="text" class="form-control" id="penanggungJawab4"
                                    name="penanggungJawab4" />
                            </div>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="persetujuan" name="persetujuan"
                                autocomplete="off">
                            <label for="persetujuan">Saya mengerti dan memahami tentang bahwa saya memiliki hak untuk
                                persetujuan atau menolak persetujuan untuk setiap prosedur/terapi</label>
                        </div>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="prosesperawatan" name="prosesperawatan"
                                autocomplete="off">
                            <label for="prosesperawatan">Klinik Pratama "Insan Medika" telah memberikan informasi kepada
                                saya terkait kemungkinana keterlibatan peserta didik dan/mahasiswa yang turut berpartisipasi
                                dalam proses perawatan.</label>
                        </div>
                        <p class="mb-2">Pengajuan Keluhan</p>
                        <div class="d-flex mb-3 gap-2 align-items-start">
                            <input type="checkbox" class="mt-1" id="pengajuankeluhan" name="pengajuankeluhan"
                                autocomplete="off">
                            <label for="pengajuankeluhan">Saya menyatakan bahwa saya telah menerima informasi tentang
                                adanya tata cara mengajukan dan mengatasi keluhan terkait melayanan medik ataupun
                                administrasi yang diberikan terhadap diri saya. Saya setuju mengikuti tata cara mengajukan
                                kelihan sesuai prosedur yang ada.</label>
                        </div>
                        <p>Dengan tanda tangan saya dibawah ini, saya menyatakan bahwa saya telah membaca dan sepenuhnya
                            setuju dengan setiap pernyataan yang terdapat pada formulir ini dan menandatangani tanpa paksaan
                            dan dengan kesadaran penuh seluruh kriteria yang terdapat pada persetujuan umum (General
                            Consent).</p>
                        <p class="mt-5 text-end me-5">Jember, {{ \Carbon\Carbon::now('Asia/Jakarta')->format('d/m/Y') }},
                            Jam {{ \Carbon\Carbon::now('Asia/Jakarta')->format('H:i') }} WIB</p>
                        <div class="row mt-5">
                            <div class="col-md-6 mb-3">
                                <p class="text-center">Pasien/Keluarga/Penanggung jawab</p>
                                <div class="col-md-6 mx-auto text-center">
                                    <input type="text" onclick="showQRModal()" class="form-control mb-2 text-center"
                                        id="namaPenanggungJawab" name="namaPenanggungJawab"
                                        placeholder="Klik untuk menandatangani" readonly
                                        style="cursor: pointer; background-color: #f9f9f9;" />

                                    <input type="hidden" id="ttdPenanggungJawab" name="ttdPenanggungJawab">

                                    <img id="ttdPreview" src="" alt="Tanda Tangan" height="50"
                                        style="width: 100%; height: 120px; object-fit: contain; border: 1px solid #ccc; border-radius: 6px; display: none; margin-top: 8px;" />
                                    <input type="text" class="form-control mb-2 text-center mt-4" id="namaPenanggungJawabDisplay" disabled
                                        style="background-color: #f0f0f0;" />
                                </div>


                            </div>
                            <div class="col-md-6 mb-3">
                                <p class="text-center">Pemberi informasi</p>
                                <div class="col-md-6 mx-auto text-center">
                                    <!-- Canvas untuk tanda tangan -->
                                    <canvas id="ttdPemberiCanvas" width="300" height="120" style="border:1px solid #ccc; border-radius:6px;"></canvas>

                                    <!-- Tombol bersihkan -->
                                    <div class="text-start mb-2 mt-1">
                                        <button type="button" class="btn btn-sm btn-secondary" onclick="clearTtdPemberi()">Bersihkan</button>
                                    </div>

                                    <!-- Input hidden untuk menyimpan base64 tanda tangan -->
                                    <input type="hidden" name="ttdPemberiInformasi" id="ttdPemberiInformasi">

                                    <!-- Nama pemberi informasi -->
                                    <div class="mt-3">
                                        <input type="text" class="form-control text-center"
                                            name="namaPemberiInformasi" value="Petugas Klinik"
                                            placeholder="Nama Pemberi Informasi" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end align-items-center gap-3 mt-5 mb-5 me-5">
                            <button class="btn btn-primary" id="btnSimpan" type="submit">Simpan</button>
                            <button id="btnCetak" type="submit" class="btn btn-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    fill="currentColor" class="bi bi-printer-fill" viewBox="0 0 16 16">
                                    <path
                                        d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1" />
                                    <path
                                        d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
                                </svg>
                                Cetak
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>
<!-- Tambahkan Modal QR & Signature -->
<div class="modal fade" id="modalQRSignature" tabindex="-1" aria-labelledby="qrModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="qrModalLabel">Scan untuk Tanda Tangan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Scan QR berikut menggunakan HP untuk menandatangani.</p>

                <!-- QR Code ditengah -->
                <div class="d-flex justify-content-center">
                    <div id="qrContainer"></div>
                </div>

                <div id="signStatus" class="mt-3"></div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Cari Pasien -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="modalPasienLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cari Pasien</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body" style="max-height: 500px; overflow-y: auto;">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" id="cariNamaPasien" class="form-control" placeholder="Cari nama pasien...">
                    </div>
                </div>
                <table class="table table-bordered table-striped" id="tablePasien">
                    <thead>
                        <tr>
                            <th>Nama Pasien</th>
                            <th>No. RM</th>
                            <th>NIK</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Lahir</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $jenisKelaminMap = [
                        0 => 'Tidak diketahui',
                        1 => 'Laki-laki',
                        2 => 'Perempuan',
                        3 => 'Tidak dapat ditentukan',
                        4 => 'Tidak mengisi',
                        ];
                        @endphp
                        @foreach($pasiens as $index => $pasien)
                        <tr>
                            <td>{{ $pasien->nama_pasien }}</td>
                            <td>{{ $pasien->no_rm }}</td>
                            <td>{{ $pasien->nik_pasien }}</td>
                            <td>{{ $jenisKelaminMap[$pasien->jenis_kelamin] ?? 'Tidak diketahui' }}</td>
                            <td>{{ $pasien->tanggal_lahir_pasien }}</td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm pilihPasien"
                                    data-nama="{{ $pasien->nama_pasien }}"
                                    data-no_rm="{{ $pasien->no_rm }}"
                                    data-nik="{{ $pasien->nik_pasien }}"
                                    data-jenis_kelamin="{{ $pasien->jenis_kelamin }}"
                                    data-tgl_lahir="{{ $pasien->tanggal_lahir_pasien }}">
                                    Pilih
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
<script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
<script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
<script src="{{ URL::asset('build/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
<script src="{{ URL::asset('build/js/forms/mask.init.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/qrcodejs/qrcode.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/signature_pad@4.1.5/dist/signature_pad.umd.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById("cariNamaPasien");
        input.addEventListener("keyup", function() {
            const filter = input.value.toLowerCase();
            const rows = document.querySelectorAll("#tablePasien tbody tr");

            rows.forEach(function(row) {
                const nama = row.querySelector("td:nth-child(1)")?.textContent.toLowerCase();
                if (nama.includes(filter)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });
    });
</script>
<script>
    // Inisialisasi SignaturePad untuk pemberi informasi
    const canvasPemberi = document.getElementById('ttdPemberiCanvas');
    const signaturePemberi = new SignaturePad(canvasPemberi);

    function clearTtdPemberi() {
        signaturePemberi.clear();
    }

    // Sebelum form disubmit, simpan gambar tanda tangan
    document.getElementById('formGeneralConsent').addEventListener('submit', function(e) {
        const namaWaliInput = document.getElementById('namaWali');
        const namaPenanggungJawabInput = document.getElementById('namaPenanggungJawab');

        // ✅ Tambahkan baris ini
        if (namaWaliInput && namaPenanggungJawabInput) {
            namaPenanggungJawabInput.value = namaWaliInput.value;
        }

        if (!signaturePemberi.isEmpty()) {
            document.getElementById('ttdPemberiInformasi').value = signaturePemberi.toDataURL('image/png');
        } else {
            alert('Silakan tanda tangani kolom Pemberi Informasi terlebih dahulu.');
            e.preventDefault();
        }
    });
</script>
<script>
    let pollingInterval;

    document.getElementById('namaPenanggungJawab').addEventListener('click', showQRModal);

    function showQRModal() {
        const token = Math.random().toString(36).substring(2, 12);
        const url = `http://sipkes.mikpolije.com/${token}`;

        // Tampilkan QR
        document.getElementById('qrContainer').innerHTML = "";
        new QRCode(document.getElementById("qrContainer"), url);
        document.getElementById("signStatus").innerText = "Menunggu tanda tangan...";

        $('#modalQRSignature').modal('show');

        pollingInterval = setInterval(() => {
            fetch(/api/signature-status/${token})
                .then(res => res.json())
                .then(data => {
                    if (data.signed) {
                        clearInterval(pollingInterval);
                        document.getElementById('ttdPenanggungJawab').value = data.ttd_base64;
                        document.getElementById('ttdPreview').src = data.ttd_base64;
                        document.getElementById('ttdPreview').style.display = "block";
                        document.getElementById("signStatus").innerText =
                            // Ditandatangani oleh: ${data.nama};
                            setTimeout(() => {
                                $('#modalQRSignature').modal('hide');
                            }, 1000);
                    }
                });
        }, 3000);
    }
</script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const namaWaliInput = document.getElementById('namaWali');
        const displayPenanggungJawab = document.getElementById('namaPenanggungJawabDisplay');

        if (namaWaliInput && displayPenanggungJawab) {
            namaWaliInput.addEventListener('input', function() {
                displayPenanggungJawab.value = namaWaliInput.value;
            });

            // Set nilai awal saat page load
            displayPenanggungJawab.value = namaWaliInput.value;
        }
    });
</script>
<script>
    $(document).ready(function() {
        $('#hubungan').on('change', function() {
            if ($(this).val() === '7') {
                $('#lain-wrapper').show();
                $('#lain').attr('required', true);
            } else {
                $('#lain-wrapper').hide();
                $('#lain').val('');
                $('#lain').removeAttr('required');
            }
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('input[type="checkbox"]');
        const btnSimpan = document.getElementById('btnSimpan');
        const btnCetak = document.getElementById('btnCetak');

        function updateButtonState() {
            const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
            btnSimpan.disabled = !allChecked;
            btnCetak.disabled = !allChecked;
        }

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', updateButtonState);
        });

        updateButtonState();
    });

    document.getElementById('btnSimpan').addEventListener('click', function() {
        document.getElementById('formAction').value = 'simpan';
    });

    document.getElementById('btnCetak').addEventListener('click', function() {
        document.getElementById('formAction').value = 'cetak';
    });
</script>

<script>
    $(document).on('click', '.pilihPasien', function() {
        // Reset semua field yang bukan readonly
        $('#formGeneralConsent')[0].reset();

        // Set ulang hanya data pasien
        $('#no_rm').val($(this).data('no_rm'));
        $('#nik').val($(this).data('nik'));
        $('#namaPasien').val($(this).data('nama'));
        $('#tanggalLahir').val($(this).data('tgl_lahir'));

        const genderValue = $(this).data('jenis_kelamin');
        let genderText = '';

        switch (parseInt(genderValue)) {
            case 1:
                genderText = 'Laki-laki';
                break;
            case 2:
                genderText = 'Perempuan';
                break;
            case 0:
                genderText = 'Tidak diketahui';
                break;
            case 3:
                genderText = 'Tidak dapat ditentukan';
                break;
            case 4:
                genderText = 'Tidak mengisi';
                break;
            default:
                genderText = 'Tidak diketahui';
        }

        $('#jenisKelaminText').val(genderText);
        $('#jenisKelamin').val(genderValue);

        $('#exampleModal').modal('hide');

        setTimeout(() => {
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
            $('html, body').css({
                'overflow': 'auto',
                'position': 'relative'
            });
        }, 400);
    });
</script>
@endsection
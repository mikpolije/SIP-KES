<?php
$tempat_persalinan = [
    'rumah_ibu' => 'Rumah Ibu',
    'klinik' => 'Klinik',
    'rumah_sakit' => 'Rumah Sakit',
    'polindes' => 'Polindes',
    'puskesmas' => 'Puskesmas',
    'lainnya' => 'Lainnya',
];
$catatan_rujukan = [
    'kala_I' => 'Kala I',
    'kala_II' => 'Kala II',
    'kala_III' => 'Kala III',
    'kala_IV' => 'Kala IV',
];
$pendamping = [
    'suami' => 'Suami',
    'ibu' => 'Ibu',
    'keluarga' => 'Keluarga',
    'teman' => 'Teman',
    'bidang' => 'Bidan',
    'tidak_ada' => 'Tidak Ada',
];

$laserasi_perineum = [
    'derajat_1' => '1',
    'derajat_2' => '2',
    'derajat_3' => '3',
    'derajat_4' => '4',
];
$bbl_normal = [
    '1' => 'menghangatkan',
    '2' => 'mengeringkan',
    '3' => 'rangsangan taktil',
    '4' => 'IMD atau naluri menyusu segara',
    '5' => 'tetes mata profiaksis, vit K, imunisasi hepatitis B',
];
$bbl_asfiksia = [
    '1' => 'menghangatkan',
    '2' => 'bebaskan jalan napas (posisi dan isap lendir)',
    '3' => 'mengeringkan',
    '4' => 'rangsangan taktil',
    '5' => 'ventilasi positif (jika perlu)',
    '6' => 'asuhan pascaresusitasi',
    '7' => 'lain-lain, sebutkan',
];
?>

<div class="p-3">
    <div class="row g-5 mb-5">
        <div class="col-md-6">
            <div class="mb-3">
                <label for="nama_bidan" class="form-label">Nama Bidan</label>
                <select name="nama_bidan" class="form-control" id="nama_bidan" required>
                    <option value="">Pilih Bidan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="tempat_persalinan" class="form-label mb-3">Tempat Persalinan</label>
                <div class="row">
                    @foreach (collect($catatan_rujukan)->chunk(4) as $chunk)
                        <div class="row">
                            @foreach ($tempat_persalinan as $key => $value)
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tempat_persalinan"
                                            id="radioDefault1" required>
                                        <label class="form-check-label" for="radioDefault-{{ $key }}">
                                            {{ $value }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="mb-3">
                <label for="alamat_persalinan" class="form-label">Alamat Tempat Persalinan</label>
                <textarea class="form-control" name="alamat_persalinan" id="alamat_persalinan" required></textarea>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label for="catatan_rujukan" class="form-label">Catatan Rujukan</label>
                @foreach (collect($catatan_rujukan)->chunk(4) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $key => $value)
                            <div class="col-5">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="catatan_rujukan"
                                        id="radioDefault-{{ $key }}" required>
                                    <label class="form-check-label" for="radioDefault-{{ $key }}">
                                        {{ $value }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
            <div class="mb-3">
                <label for="alasan_merujuk" class="form-label">Alasan Merujuk</label>
                <input type="text" class="form-control" id="alasan_merujuk" name="alasan_merujuk" required />
            </div>
            <div class="mb-3">
                <label for="alasan_merujuk" class="form-label">Tempat Merujuk</label>
                <input type="text" class="form-control" id="tempat_merujuk" name="tempat_merujuk" required />
            </div>
            <div class="mb-3">
                <label for="pendamping" class="form-label">Pendamping pada saat merujuk</label>
                <div class="row">
                    @foreach (collect($pendamping)->chunk(8) as $chunk)
                        <div class="row">
                            @foreach ($chunk as $key => $value)
                                <div class="col-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pendamping"
                                            id="radio-{{ $loop->parent->index }}-{{ $loop->index }}" required>
                                        <label class="form-check-label"
                                            for="radio-{{ $loop->parent->index }}-{{ $loop->index }}">
                                            {{ $value }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="card w-100">
                <div class="card-header bg-white d-flex justify-content-center">
                    <h5 class="card-title fw-semibold mt-4" style="font-weight: bold !important;">KALA I</h5>
                </div>
                <div class="card-body row">
                    <div class="mb-3">
                        <label for="partogram" class="form-label mb-3">Patrogram melewati garis waspada</label>
                        <div class="row">
                            <div class="col-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="partogram" id="radioDefault1"
                                        required>
                                    <label class="form-check-label" for="radioDefault1">
                                        Ya
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="partogram" id="radioDefault2"
                                        required>
                                    <label class="form-check-label" for="radioDefault2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="masalah_lain" class="form-label mb-3">Masalah lain, sebutkan</label>
                        <input type="text" class="form-control" name="masalah_lain" id="masalah_lain">
                    </div>
                    <div class="mb-3">
                        <label for="penatalaksana" class="form-label mb-3">Penatalaksana masalah tersebut</label>
                        <input type="text" class="form-control" name="penatalaksana" id="penatalaksana">
                    </div>
                    <div class="mb-3">
                        <label for="hasil" class="form-label mb-3">Hasilnya</label>
                        <textarea name="hasil" class="form-control" cols="30" rows="5" id="hasil"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card w-100">
                <div class="card-header bg-white d-flex justify-content-center">
                    <h5 class="card-title fw-semibold mt-4" style="font-weight: bold !important;">KALA II</h5>
                </div>
                <div class="card-body row">
                    <div class="mb-3">
                        <label for="eposotormy" class="form-label mb-3">Eposotormy</label>
                        <div class="row gap-3">
                            <div class="row-6 d-flex gap-5 align-items-center">
                                <div class="form-check w-50">
                                    <input class="form-check-input" type="radio" name="partogram" id="radioDefault1"
                                        required>
                                    <label class="form-check-label" for="radioDefault1">
                                        Ya, Indikasi
                                    </label>
                                </div>
                                <input type="text" class="form-control" name="eposotormy" id="eposotormy">
                            </div>
                            <div class="row-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="partogram" id="radioDefault2"
                                        required>
                                    <label class="form-check-label" for="radioDefault2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="gawat-janin" class="form-label mb-3">Gawat Janin</label>
                        <div class="row gap-3">
                            <div class="row-6 d-flex gap-4 align-items-center">
                                <div class="form-check w-50">
                                    <input class="form-check-input" type="radio" name="gawat-janin" id="radioDefault1"
                                        required>
                                    <label class="form-check-label" for="radioDefault1">
                                        Ya, tindakan yang dilakukan
                                    </label>
                                </div>
                                <input type="text" class="form-control" name="tindakan-gawat-janin" id="tindakan-gawat-janin">
                            </div>
                            <div class="row-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="gawat-janin" id="radioDefault2"
                                        required>
                                    <label class="form-check-label" for="radioDefault2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="destosia" class="form-label mb-3">Destosia Bahu</label>
                        <div class="row gap-3">
                            <div class="row-6 d-flex gap-4 align-items-center">
                                <div class="form-check w-50">
                                    <input class="form-check-input" type="radio" name="destosia" id="radioDefault1"
                                        required>
                                    <label class="form-check-label" for="radioDefault1">
                                        Ya, tindakan yang dilakukan
                                    </label>
                                </div>
                                <input type="text" class="form-control" name="destosia" id="destosia">
                            </div>
                            <div class="row-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="destosia" id="radioDefault2"
                                        required>
                                    <label class="form-check-label" for="radioDefault2">
                                        Tidak
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header bg-white d-flex justify-content-center">
                    <h5 class="card-title fw-semibold mt-4" style="font-weight: bold !important;">KALA III</h5>
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="waktu-kala" class="form-label mb-3">Lama kala III</label>
                            <div class="input-group">
                                <input type="text" class="form-control" name="waktu-kala" id="waktu-kala"> 
                                <span class="input-group-text">Menit</span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="waktu-oksitosin" class="form-label mb-3">Pemberian oksitosin 10 U im?</label>
                            <div class="row gap-3">
                                <div class="row-6 input-group">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="waktu-oksitosin" id="radioDefault1"
                                            required>
                                        <label class="form-check-label" for="radioDefault1">
                                            Ya, waktu
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="waktu-oksitosin" id="waktu-oksitosin">
                                    <span class="input-group-text">Menit</span>
                                </div>
                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="waktu-oksitosin" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Tidak, alasan
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="waktu-ulang-oksitosin" class="form-label mb-3">Pemberian ulang oksitosin (2x)?</label>
                            <div class="row gap-3">
                                <div class="row-6 d-flex gap-4 align-items-center">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="waktu-ulang-oksitosin" id="radioDefault1"
                                            required>
                                        <label class="form-check-label" for="radioDefault1">
                                            Ya, alasan
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="waktu-ulang-oksitosin" id="waktu-ulang-oksitosin">
                    
                                </div>
                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="waktu-ulang-oksitosin" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="penegangan-tali" class="form-label mb-3">Penegangan tali pusat terkendali?</label>
                            <div class="row gap-3">
                         
                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="penegangan-tali" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Ya
                                        </label>
                                    </div>  
                                </div>
                                <div class="row-6 d-flex gap-4 align-items-center">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="penegangan-tali" id="radioDefault1"
                                            required>
                                        <label class="form-check-label" for="radioDefault1">
                                            Tidak, alasan
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="penegangan-tali" id="penegangan-tali">
                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="uteri" class="form-label mb-3">Mesase fundus uteri?</label>
                            <div class="row gap-3">
                         
                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="uteri" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Ya
                                        </label>
                                    </div>  
                                </div>
                                <div class="row-6 d-flex gap-4 align-items-center">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="uteri" id="radioDefault1"
                                            required>
                                        <label class="form-check-label" for="radioDefault1">
                                            Tidak, alasan
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="uteri" id="uteri">
                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="atoni-uteri" class="form-label mb-3">Atoni uteri?</label>
                            <div class="row gap-3">
                                <div class="row-6 d-flex gap-4 align-items-center">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="atoni-uteri" id="radioDefault1"
                                            required>
                                        <label class="form-check-label" for="radioDefault1">
                                            Ya, tindakan
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="atoni-uteri" id="atoni-uteri">
                    
                                </div>
                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="atoni-uteri" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Tidak
                                        </label>
                                    </div>  
                                </div>
           
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="plasenta-lahir" class="form-label mb-3">Plasenta lahir lengkap (intact)?</label>
                            <div class="row gap-3">

                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="plasenta-lahir" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Ya
                                        </label>
                                    </div>
                                </div>
                                <div class="row-6 d-flex gap-4 align-items-center">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="plasenta-lahir" id="radioDefault1"
                                            required>
                                        <label class="form-check-label" for="radioDefault1">
                                            Tidak, tindakan
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="plasenta-lahir" id="plasenta-lahir">
                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="plasenta-tidak-lahir" class="form-label mb-3">Plasenta  tidak lahir > 30 menit?</label>
                            <div class="row gap-3">
                                <div class="row-6 d-flex gap-4 align-items-center">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="plasenta-tidak-lahir" id="radioDefault1"
                                            required>
                                        <label class="form-check-label" for="radioDefault1">
                                            Ya, tindakan
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="plasenta-tidak-lahir" id="plasenta-tidak-lahir">
                    
                                </div>
                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="plasenta-tidak-lahir" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="laserasi" class="form-label mb-3">Laserasi?</label>
                            <div class="row gap-3">
                                <div class="row-6 d-flex gap-4 align-items-center">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="laserasi" id="radioDefault1"
                                            required>
                                        <label class="form-check-label" for="radioDefault1">
                                            Ya, dimana
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="laserasi" id="laserasi">
                    
                                </div>
                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="laserasi" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mb-3 d-flex gap-5 align-items-center">
                            <label for="laserasi-perineum" class="form-label mb-3">Jika laserasi perineum, derajat?</label>
                            <div>
                                @foreach(collect($laserasi_perineum)->chunk(4) as $chunk)
                                <div class="row">
                                        @foreach($chunk as $key => $value)
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="laserasi-perineum"
                                                    id="radio-{{ $loop->parent->index }}-{{ $loop->index }}" required>
                                                <label class="form-check-label"
                                                    for="radio-{{ $loop->parent->index }}-{{ $loop->index }}">
                                                    {{ $value }}
                                                </label>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="tindakan-penjahitan" class="form-label mb-3">Tindakan?</label>
                            <div class="row gap-3">

                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tindakan-penjahitan" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Penjahitan dengan / tanpa anestesi
                                        </label>
                                    </div>
                                </div>
                                <div class="row-6 d-flex gap-4 align-items-center">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="tindakan-penjahitan" id="radioDefault1"
                                            required>
                                        <label class="form-check-label" for="radioDefault1">
                                            Tidak dijahit, alasan
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="tindakan-penjahitan" id="tindakan-penjahitan">
                    
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jumlah-pendarahan">Jumlah Pendarahan</label>
                            <input type="text" class="form-control" name="jumlah-pendarahan" required>
                        </div>
                        <div class="mb-3">
                            <label for="masalah_lain">Masalah lain, sebutkan</label>
                            <input type="text" class="form-control" name="masalah_lain" required>
                        </div>
                        <div class="mb-3">
                            <label for="penatalaksanaan-masalah">Penatalaksanaan masalah tersebut</label>
                            <input type="text" class="form-control" name="penatalaksanaan-masalah" required>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="mb-3">
                            <label for="hasil">Hasilnya</label>
                            <input type="text" class="form-control" name="hasil" required>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header bg-white d-flex justify-content-center">
                    <h5 class="card-title fw-semibold mt-4" style="font-weight: bold !important;">KALA IV</h5>
                </div>
                <div class="card-body row">
                    <label for="kondisi-ibu" class="form-label mb-3">Kondisi ibu</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="ku">KU</label>
                                        <input type="text" class="form-control" name="ku" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="td">TD</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="td" required>
                                            <span class="input-group-text">mmHg</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nadi">Nadi</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="nadi" required>
                                            <span class="input-group-text">bpm</span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <label for="napas">Napas</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="napas" required>
                                            <span class="input-group-text">x/mnt</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="masalah-kala" class="form-label mb-3">Masalah pada kala IV dan penatalaksanaannya</label>
                            <textarea name="masalah-kala" id="masalah-kala" class="form-control" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header bg-white d-flex justify-content-center">
                    <h5 class="card-title fw-semibold mt-4" style="font-weight: bold !important;">BAYI BARU LAHIR</h5>
                </div>
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="normal" id="normal" class="form-check-input">
                                <label for="normal" class="form-check-label">Normal</label>
                            </div>
                            <div class="ms-3">
                                @foreach($bbl_normal as $key => $value)
                                <div class="form-check">
                                    <input type="checkbox" name="normal-{{ $key }}" id="normal-{{ $key }}" class="form-check-input">
                                    <label for="normal-{{ $key }}" class="form-check-label">{{ $value }}</label>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="cacat-bawaan" id="cacat-bawaan" class="form-check-input">
                                <label for="cacat-bawaan" class="form-check-label">Cacat bawaan, sebutkan</label>
                            </div>
                            <textarea name="cacat-bawaan" id="cacat-bawaan" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                     
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="hipotermia" id="hipotermia" class="form-check-input">
                                <label for="hipotermia" class="form-check-label">Masalah lain, sebutkan</label>
                            </div>
                            <div class="row gap-3 ms-4">
                                <div class="row-6 d-flex gap-4 align-items-center">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="hipotermia" id="radioDefault1"
                                            required>
                                        <label class="form-check-label" for="radioDefault1">
                                            Ya, tindakan
                                        </label>
                                    </div>
                                    <input type="text" class="form-control" name="hipotermia" id="hipotermia">
                    
                                </div>
                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="hipotermia" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Tidak
                                        </label>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="cacat-bawaan" id="cacat-bawaan" class="form-check-input">
                                <label for="bbl-masalah-lain" class="form-check-label">Masalah lain, sebutkan</label>
                            </div>
                            <textarea name="bbl-masalah-lain" id="bbl-masalah-lain" class="form-control" cols="30" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="asfiksia" id="asfiksia" class="form-check-input">
                                <label for="asfiksia" class="form-check-label">Asfiksia</label>
                            </div>
                            <div class="ms-3">
                                @foreach($bbl_asfiksia as $key => $value)
                                <div class="form-check">
                                    <input type="checkbox" name="asfiksia-{{ $key }}" id="asfiksia-{{ $key }}" class="form-check-input">
                                    <label for="asfiksia-{{ $key }}" class="form-check-label">{{ $value }}</label>
                                </div>
                                @endforeach 
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" name="hipotermia" id="hipotermia" class="form-check-input">
                                <label for="pemberian-asi" class="form-check-label">Pemberian ASI setelah jam pertama bayi kahir</label>
                            </div>
                            <div class="row gap-3 ms-4">
                                <div class="row-6 d-flex gap-4 align-items-center">
                                    <div class="form-check w-50">
                                        <input class="form-check-input" type="radio" name="pemberian-asi" id="radioDefault1"
                                            required>
                                        <label class="flex-shrink-0 form-check-label" for="radioDefault1">
                                            Ya, waktu
                                        </label>
                                    </div>
                                    <div class="input-group">

                                        <input type="text" class="form-control" name="pemberian-asi" id="pemberian-asi">
                                        <span class="input-group-text">jam setelah bayi lahir</span>                    
                                    </div>
                                </div>
                                <div class="row-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="pemberian-asi" id="radioDefault2"
                                            required>
                                        <label class="form-check-label" for="radioDefault2">
                                            Tidak, alasan
                                        </label>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check">
                                        <input type="checkbox" name="cacat-bawaan" id="cacat-bawaan" class="form-check-input">
                                        <label for="bbl-pentalasan-dan-hasil" class="form-check-label">Penatalaksanaan dan Hasilnya</label>
                                    </div>
                                    <textarea name="bbl-pentalasan-dan-hasil" id="bbl-pentalasan-dan-hasil" class="form-control" cols="30" rows="6"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card w-100">
                <div class="card-header bg-white d-flex justify-content-center">
                    <h5 class="card-title fw-semibold mt-4" style="font-weight: bold !important;">PEMANTAUAN PERSALINAN KALA IV</h5>
                </div>
                <div class="card-body row">
                    <div class="col-md-12 mb-4">
                        <div class="row">
                            <div class="col-md-3">
                              <label for="jam-ke" class="form-label">Jam ke</label>
                              <input type="text" class="form-control" name="jam-ke" id="jam-ke">
                            </div>
                            <div class="col-md-3">
                              <label for="tekanan-darah" class="form-label">Tekanan darah</label>
                              <div class="input-group">
                                <input type="text" class="form-control" name="tekanan-darah" id="tekanan-darah">
                                <span class="input-group-text">mmHg</span>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="tinggi-fundus" class="form-label">Tinggi fundus uteri</label>
                              <div class="input-group">
                                  <input type="text" class="form-control" name="tinggi-fundus" id="tinggi-fundus">
                                  <span class="input-group-text">cm</span>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="kandung-kemih" class="form-label">Kandung kemih</label>
                              <input type="text" class="form-control" name="kandung-kemih" id="kandung-kemih">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-4">
                        <div class="row">
                            <div class="col-md-3">
                              <label for="waktu" class="form-label">Waktu</label>
                              <input type="text" class="form-control" name="waktu" id="waktu">
                            </div>
                            <div class="col-md-3">
                              <label for="nado-kala-iv" class="form-label">Nadi</label>
                              <div class="input-group">
                                <input type="text" class="form-control" name="nado-kala-iv" id="nado-kala-iv">
                                <span class="input-group-text">bpm</span>
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="kontraksi-uterus" class="form-label">Kontraksi Uterus</label>
                              <div class="input-group">
                                  <input type="text" class="form-control" name="kontraksi-uterus" id="kontraksi-uterus">
                                
                              </div>
                            </div>
                            <div class="col-md-3">
                              <label for="pendarahan" class="form-label">Pendarahan</label>
                              <input type="text" class="form-control" name="pendarahan" id="pendarahan">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <table class="table">
                            <thead class="table-light">
                              <tr>
                                <th scope="col">Jam ke</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Tekanan darah</th>
                                <th scope="col">Nadi</th>
                                <th scope="col">Tinggi fundus uteri</th>
                                <th scope="col">Kontraksi</th>
                                <th scope="col">Kandung kemih</th>
                                <th scope="col">Penderahan</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td colspan="8" class="text-center">Belum ada data.</td>
                              </tr>
                            </tbody>
                          </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white d-flex justify-content-center">
                        <h5 class="card-title fw-semibold mt-4" style="font-weight: bold !important;">ANAMNESA (S)</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="hpht" class="form-label mb-3">HPHT</label>
                            <input type="date" class="form-control" name="hpht" id="hpht">
                        </div>
                        <div class="mb-3">
                            <label for="hpht" class="form-label mb-3">HPL</label>
                            <input type="date" class="form-control" name="hpht" id="hpht">
                        </div>
                        <div class="mb-3">
                            <label for="his" class="form-label mb-3">HIS Mulai</label>
                            <input type="date" class="form-control" name="his" id="his">
                        </div>
                        <div class="mb-3 d-flex gap-4">
                            <label for="his" class="form-label mb-3">Pengeluaran pervagina:</label>
                            <div>
                                <div class="row gap-3">
                                    <div class="col-2">
                                        <label for="lendir" class="form-label">Lendir</label>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lendir" id="radioDefault1"
                                                required>
                                            <label class="form-check-label" for="radioDefault1">
                                                Ya
                                            </label>
                                        </div>
                    
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="lendir" id="radioDefault2"
                                                required>
                                            <label class="form-check-label" for="radioDefault2">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row gap-3">
                                    <div class="col-2">
                                        <label for="lendir" class="form-label">Darah</label>
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="darah" id="radioDefault1"
                                                required>
                                            <label class="form-check-label" for="radioDefault1">
                                                Ya
                                            </label>
                                        </div>
                    
                                    </div>
                                    <div class="col-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="darah" id="radioDefault2"
                                                required>
                                            <label class="form-check-label" for="radioDefault2">
                                                Tidak
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 d-flex gap-4">
                            <label for="his" class="form-label mb-3">Cairan ketubah:</label>
                            <div>
                                <div class="row gap-3">
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ketuban" id="radioDefault1"
                                                required>
                                            <label class="form-check-label" for="radioDefault1">
                                                Pecah
                                            </label>
                                        </div>
                    
                                    </div>
                                    <div class="col-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="ketuban" id="radioDefault2"
                                                required>
                                            <label class="form-check-label" for="radioDefault2">
                                                Belum
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="keluhan" class="form-label mb-3">Keluhan saat ini:</label>
                            <input type="text" class="form-control" name="keluhan" id="keluhan">
                        </div>
                        <div class="mb-3">
                            <label for="riwayat-persalinan-ini" class="form-label mb-3">Riwayat persalinan yang lalu:</label>
                            <input type="text" class="form-control" name="riwayat-persalinan-ini" id="riwayat-persalinan-ini">
                        </div>
                        <div class="mb-3">
                            <label for="riwayat-alergi" class="form-label mb-3">Riwayat alergi obat-obatan:</label>
                            <input type="text" class="form-control" name="riwayat-alergi" id="riwayat-alergi">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-white d-flex justify-content-center">
                        <h5 class="card-title fw-semibold mt-4" style="font-weight: bold !important;">KEADAAN UMUM (O)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="tekanan-darah-o" class="form-label mb-3">Tekanan darah</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="tekanan-darah-o" id="tekanan-darah-o">
                                    <span class="input-group-text">mmHg</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="suhu" class="form-label mb-3">Suhu</label>
                                <div class="input-group">
                                <input type="number" class="form-control" name="suhu" id="suhu">
                                    <span class="input-group-text">°C</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nadi-o" class="form-label mb-3">Nadi</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="nadi-o" id="nadi-o">
                                    <span class="input-group-text">x/mnt</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="odema" class="form-label mb-3">Oedema</label>
                                <div class="input-group">
                                <input type="number" class="form-control" name="odema" id="odema">
                                  
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="palpasi" class="form-label mb-3">Pemeriksaan Palpasi:</label>
                            <input type="text" class="form-control" name="palpasi" id="palpasi">
                        </div>
                        <div class="mb-3">
                            <label for="teraba" class="form-label mb-3">Penurunan Kepala (teraba)</label>
                            <input type="text" class="form-control" name="teraba" id="teraba">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="djj" class="form-label mb-3">DJJ</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="djj" id="djj">
                                    <span class="input-group-text">x/mnt</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="kontraksi" class="form-label mb-3">Kontraksi</label>
                                <div class="input-group">
                                <input type="number" class="form-control" name="kontraksi" id="kontraksi">
                                  
                                </div>
                            </div>
     
                            
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="pemeriksaan_dalam" class="form-label mb-3">Pemeriksaan dalam (V1)</label>
                                <div class="input-group">
                                <input type="number" class="form-control" name="pemeriksaan_dalam" id="pemeriksaan_dalam">
                                  
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="oleh" class="form-label mb-3">Oleh</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="oleh" id="oleh">
                                  
                                </div>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="hasil_v1" class="form-label mb-3">Hasil V1</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" name="hasil_v1" id="hasil_v1">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <label for="" class="form-label mb-3">(A)</label>
                        <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <label for="" class="form-label mb-3">(P/I) observasi kala I (fase laten 0 < 4cm)</label>
                        <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



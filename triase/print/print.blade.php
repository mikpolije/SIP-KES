<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    </head>
    <body onload="printPage()">
        <div id="step-1" class="step-1 row" data-step="1">
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Informasi Pasien</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Nama Pasien:</label>
                                <input type="text" class="form-control" placeholder="Nama Pasien" name="nama_pasien" value="{{ $data['data']->nama }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Usia Pasien:</label>
                                <input type="number" class="form-control" placeholder="Usia Pasien" name="usia_pasien" value="{{ $data['data']->usia }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">No. Jamkes:</label>
                                <input type="text" class="form-control" placeholder="No. Jamkes" name="no_jamkes" value="{{ $data['data']->no_jamkes }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Nama Penanggung Jawab:</label>
                                <input type="text" class="form-control" placeholder="Nama Penanggung Jawab" name="nama_penanggung_jawab" value="{{ $data['data']->nama_penanggung_jawab }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Informasi Kondisi Pasien</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">*Tanggal Masuk:</label>
                                <input type="date" class="form-control" placeholder="Tanggal Masuk" name="tanggal_masuk" value="{{ $data['data']->kondisi->tanggal_masuk }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Sarana Transportasi Kedatangan:</label>
                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->sarana_transportasi_kedatangan }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">*Jam Masuk:</label>
                                <input type="time" class="form-control" placeholder="Jam Masuk" name="jam_masuk" value="{{ $data['data']->kondisi->jam_masuk }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Kondisi Pasien Tiba:</label>
                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->kondisi_pasien_tiba }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="" class="form-label">Triase</label>
                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->triase }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Riwayat Alergi:</label>
                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->riwayat_alergi }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Keluhan:</label>
                                <textarea name="keluhan" id="" cols="" rows="5" class="form-control" readonly>{{ $data['data']->kondisi->keluhan }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="input-group form-floating mb-3">
                                <input type="number" name="berat_badan" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->berat_badan }}" readonly>
                                <span class="input-group-text" id="basic-addon">KG</span>
                                <label for="">Berat Badan:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group form-floating mb-3">
                                <input type="number" name="tinggi_badan" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->tinggi_badan }}" readonly>
                                <span class="input-group-text" id="basic-addon">CM</span>
                                <label for="">Tinggi Badan:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group form-floating mb-3">
                                <input type="number" name="lingkar_perut" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->lingkar_perut }}" readonly>
                                <span class="input-group-text" id="basic-addon">CM</span>
                                <label for="">Lingkar Perut:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="IMT" name="imt" value="{{ $data['data']->kondisi->imt }}" readonly>
                                <label for="">IMT:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="Nafas" name="nafas" value="{{ $data['data']->kondisi->nafas }}" readonly>
                                <label for="">Nafas:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group form-floating mb-3">
                                <input type="number" name="sistol" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->sistol }}" readonly>
                                <span class="input-group-text" id="basic-addon">mmHg</span>
                                <label for="">Tensi - Sistol:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group form-floating mb-3">
                                <input type="number" name="diastol" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->diastol }}" readonly>
                                <span class="input-group-text" id="basic-addon">mmHg</span>
                                <label for="">Tensi - Diastol:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group form-floating mb-3">
                                <input type="number" name="suhu" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->suhu }}" readonly>
                                <span class="input-group-text" id="basic-addon">C</span>
                                <label for="">Suhu:</label>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" placeholder="Nadi" name="nadi" value="{{ $data['data']->kondisi->nadi }}" readonly>
                                <label for="">Nadi:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Kepala:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->kepala) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Mata:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->mata) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">THT:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->tht) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Leher:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->leher) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Thorax:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->thorax) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Abdomen:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->abdomen) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Extemitas:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->extemitas) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Genetalia:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->genetalia) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">ECG:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->ecg) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Ronsen:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->ronsen) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Terapi:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->terapi) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Kie:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->kie) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Pemeriksaan Penunjang:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->pemeriksaan_penunjang) }}" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                <div class="mb-3 mb-sm-0">
                                    <div class="card-subtitle">Pernafasan</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Jalur Nafas:</label>
                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->jalur_nafas }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Pola Nafas:</label>
                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->pola_nafas }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Gerakan Dada:</label>
                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->gerakan_dada }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                <div class="mb-3 mb-sm-0">
                                    <div class="card-subtitle">Sirkulasi</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Kulit:</label>
                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->kulit }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Turgor:</label>
                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->turgor }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Akral:</label>
                                <input type="text" class="form-control" value="{{ $data['data']->kondisi->akral }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">SPO:</label>
                                <div class="input-group">
                                    <input type="text" name="spo" id="" aria-describedby="basic-addon" class="form-control" value="{{ $data['data']->kondisi->spo }}" readonly>
                                    <span class="input-group-text" id="basic-addon">%</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                <div class="mb-3 mb-sm-0">
                                    <div class="card-subtitle">Neurologi</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Kesadaran:</label>
                                <input type="text" class="form-control" placeholder="Kesadaran" name="kesadaran" value="{{ ucwords($data['data']->kondisi->kesadaran) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="">Mata:</label>
                                <input type="text" class="form-control" placeholder="Mata" name="mata_neurologi" value="{{ ucwords($data['data']->kondisi->mata_neurologi) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="">Motorik:</label>
                                <input type="text" class="form-control" placeholder="Motorik" name="motorik" value="{{ ucwords($data['data']->kondisi->motorik) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group mb-3">
                                <label for="">Verbal:</label>
                                <input type="text" class="form-control" placeholder="Verbal" name="verbal" value="{{ ucwords($data['data']->kondisi->verbal) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Kondisi Umum:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->kondisi_umum) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="">Laborat:</label>
                                <input type="text" class="form-control" value="{{ ucwords($data['data']->kondisi->laborat) }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <label for="">Laboratorium / Farmasi:</label>
                                <img src="{{ asset('/upload/laboratorium_farmasi/' . $data['data']->id . '/' . $data['data']->kondisi->laboratorium_farmasi) }}" class="img-fluid" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Faktor Risiko</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-3 form-group">
                            <label for="" class="form-label">Aktifitas Fisik</label>
                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->aktivitas_fisik == 1 ? 'Ya' : 'Tidak' }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Konsumsi Alkohol</label>
                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->konsumsi_alkohol == 1 ? 'Ya' : 'Tidak' }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Makan Buah & Sayur</label>
                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->makan_buah_sayur == 1 ? 'Ya' : 'Tidak' }}" readonly>
                        </div>
                        <div class="col-md-3">
                            <label for="" class="form-label">Merokok</label>
                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->merokok == 1 ? 'Ya' : 'Tidak' }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Riwayat Keluarga</label>
                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->riwayat_keluarga == 1 ? 'Ya' : 'Tidak' }}" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="" class="form-label">Riwayat Penyakit Terdahulu</label>
                            <input type="text" class="form-control" value="{{ $data['data']->kondisi->riwayat_penyakit_terdahulu == 1 ? 'Ya' : 'Tidak' }}" readonly>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="step-2" class="step-2 row hidden" data-step="2">
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Data Pemeriksaan</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="">Nama:</label>
                                <input type="text" class="form-control" placeholder="Nama" readonly id="nama-readonly" value="{{ $data['data']->nama }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="">No. RM:</label>
                                <input type="text" class="form-control" placeholder="No. RM" readonly id="no_rm-readonly" value="{{ $data['data']->id }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="">Alamat:</label>
                                <input type="text" class="form-control" placeholder="Alamat" readonly id="alamat-readonly" value="-" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-3">
                                <label for="">Tanggal:</label>
                                <input type="text" class="form-control" placeholder="Tanggal" readonly id="tanggal-readonly" value="{{ $data['data']->kondisi->tanggal_masuk }}" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Subjective / Keluhan</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <textarea name="keluhan" id="" cols="30" rows="5" class="form-control w-100" readonly>{{ $data['data']->detail->keluhan }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Objective</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-floating input-group mb-3">
                                    <input type="number" class="form-control" placeholder="Sistole" name="sistole" value="{{ $data['data']->detail->sistole }}" readonly>
                                    <span class="input-group-text" id="basic-addon">mmHg</span>
                                    <label for="">Sistole:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Diastole" name="diastole" value="{{ $data['data']->detail->diastole }}" readonly>
                                    <span class="input-group-text" id="basic-addon">mmHg</span>
                                    <label for="">Diastole:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Berat Badan" name="berat_badan" value="{{ $data['data']->detail->berat_badan }}" readonly>
                                    <span class="input-group-text" id="basic-addon">KG</span>
                                    <label for="">Berat Badan:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Tinggi Badan" name="tinggi_badan" value="{{ $data['data']->detail->tinggi_badan }}" readonly>
                                    <span class="input-group-text" id="basic-addon">CM</span>
                                    <label for="">Tinggi Badan:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Suhu" name="suhu" value="{{ $data['data']->detail->suhu }}" readonly>
                                    <span class="input-group-text" id="basic-addon">C</span>
                                    <label for="">Suhu:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating input-group mb-3">
                                    <input type="text" class="form-control" placeholder="SpO2" name="spo02" value="{{ $data['data']->detail->spo02 }}" readonly>
                                    <span class="input-group-text" id="basic-addon">%</span>
                                    <label for="">SpO2:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Respiration Rate" name="respiration_rate" value="{{ $data['data']->detail->respiration_rate }}" readonly>
                                    <span class="input-group-text" id="basic-addon">/ mnt</span>
                                    <label for="">Respiration Rate:</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nadi" name="nadi" value="{{ $data['data']->detail->nadi }}" readonly>
                                    <span class="input-group-text" id="basic-addon">/ mnt</span>
                                    <label for="">Nadi:</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Plan</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <textarea name="plan" id="" cols="30" rows="5" class="form-control w-100" readonly>{{ $data['data']->detail->plan }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-6">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Assesment</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group mb-3">
                                <textarea name="assesment" id="" cols="30" rows="5" class="form-control w-100" readonly>{{ $data['data']->detail->assesment }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Layanan</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <td>Jumlah</td>
                                            <td>Nama Layanan</td>
                                            <td>Harga Layanan</td>
                                        </tr>
                                    </thead>
                                    <tbody id="tbodyLayanan">
                                        @foreach ($data['data']->layanan as $key => $item)
                                            <tr>
                                                <td>{{ $item->qty }}</td>
                                                <td>{{ $item->layanan->nama_layanan }}</td>
                                                <td>{{ $item->layanan->tarif_layanan }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title text-center">PENGKAJIAN RISIKO JATUH DEWASA (Moerse Fall Scale)</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Faktor Risiko</th>
                                            <th>Skala</th>
                                            <th>Poin</th>
                                            <th>Ket</th>
                                            <th>Skor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="background-color: #E7EEFF" class="text-dark">Riwayat Jatuh</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">Ya</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                25
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                <input type="radio" name="risiko_riwayat_jatuh" id="" class="form-check-input border-dark" value="25" readonly @checked($data['data']->pengkajianRisiko->riwayat_jatuh == 25)>
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark skor_riwayat_jatuh">{{ $data['data']->pengkajianRisiko->riwayat_jatuh }}</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                            <td style="background-color: #E7EEFF" class="text-dark">Tidak</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                0
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                <input type="radio" name="risiko_riwayat_jatuh" id="" class="form-check-input border-dark" value="0" readonly @checked($data['data']->pengkajianRisiko->riwayat_jatuh == 0)>
                                            </td>
                                            <td style="background-color: #E7EEFF"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Diagnosa sekunder (> 2 diagnosa medis)</td>
                                            <td>Ya</td>
                                            <td>
                                                15
                                            </td>
                                            <td>
                                                <input type="radio" name="risiko_diagnosa_sekunder" id="" class="form-check-input border-dark" value="15" readonly @checked($data['data']->pengkajianRisiko->diagnostik_sekunder == 15)>
                                            </td>
                                            <td class="skor_diagnosa_sekunder">{{ $data['data']->pengkajianRisiko->diagnostik_sekunder }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Tidak</td>
                                            <td>
                                                0
                                            </td>
                                            <td>
                                                <input type="radio" name="risiko_diagnosa_sekunder" id="" class="form-check-input border-dark" value="0" readonly @checked($data['data']->pengkajianRisiko->diagnostik_sekunder == 0)>
                                            </td>
                                            <td></td>
                                        </tr>


                                        <tr>
                                            <td style="background-color: #E7EEFF" class="text-dark">Alat bantu</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">Berpegangan pada perabot</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                30
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                <input type="radio" name="risiko_alat_bantu" id="" class="form-check-input border-dark" value="30" readonly @checked($data['data']->pengkajianRisiko->alat_bantu == 30)>
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark skor_alat_bantu">{{ $data['data']->pengkajianRisiko->alat_bantu }}</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                            <td style="background-color: #E7EEFF" class="text-dark">Tongkat/alat penopang</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                15
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                <input type="radio" name="risiko_alat_bantu" id="" class="form-check-input border-dark" value="15" readonly @checked($data['data']->pengkajianRisiko->alat_bantu == 15)>
                                            </td>
                                            <td style="background-color: #E7EEFF"></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                            <td style="background-color: #E7EEFF" class="text-dark">Tidak ada/kursi roda/perawat/tirah baring</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                0
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                <input type="radio" name="risiko_alat_bantu" id="" class="form-check-input border-dark" value="0" readonly @checked($data['data']->pengkajianRisiko->alat_bantu == 0)>
                                            </td>
                                            <td style="background-color: #E7EEFF"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Terpasang infuse</td>
                                            <td>Ya</td>
                                            <td>
                                                20
                                            </td>
                                            <td>
                                                <input type="radio" name="risiko_terpasang_infuse" id="" class="form-check-input border-dark" value="20" readonly @checked($data['data']->pengkajianRisiko->terpasang_infuse == 20)>
                                            </td>
                                            <td class="skor_terpasang_infuse">{{ $data['data']->pengkajianRisiko->terpasang_infuse }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Tidak</td>
                                            <td>
                                                0
                                            </td>
                                            <td>
                                                <input type="radio" name="risiko_terpasang_infuse" id="" class="form-check-input border-dark" value="0" readonly @checked($data['data']->pengkajianRisiko->terpasang_infuse == 0)>
                                            </td>
                                            <td></td>
                                        </tr>


                                        <tr>
                                            <td style="background-color: #E7EEFF" class="text-dark">Gaya berjalan</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">Terganggu</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                20
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                <input type="radio" name="risiko_gaya_berjalan" id="" class="form-check-input border-dark" value="20" readonly @checked($data['data']->pengkajianRisiko->gaya_berjalan == 20)>
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark skor_gaya_berjalan">{{ $data['data']->pengkajianRisiko->gaya_berjalan }}</td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                            <td style="background-color: #E7EEFF" class="text-dark">Lemah</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                10
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                <input type="radio" name="risiko_gaya_berjalan" id="" class="form-check-input border-dark" value="10" readonly @checked($data['data']->pengkajianRisiko->gaya_berjalan == 10)>
                                            </td>
                                            <td style="background-color: #E7EEFF"></td>
                                        </tr>
                                        <tr>
                                            <td style="background-color: #E7EEFF" class="text-dark"></td>
                                            <td style="background-color: #E7EEFF" class="text-dark">Normal/tirah baring/mobilisasi</td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                0
                                            </td>
                                            <td style="background-color: #E7EEFF" class="text-dark">
                                                <input type="radio" name="risiko_gaya_berjalan" id="" class="form-check-input border-dark" value="0" readonly @checked($data['data']->pengkajianRisiko->gaya_berjalan == 0)>
                                            </td>
                                            <td style="background-color: #E7EEFF"></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Status mental</td>
                                            <td>Sering lupa akan keterbatasan yang dimiliki</td>
                                            <td>
                                                15
                                            </td>
                                            <td>
                                                <input type="radio" name="risiko_status_mental" id="" class="form-check-input border-dark" value="15" readonly @checked($data['data']->pengkajianRisiko->status_mental == 15)>
                                            </td>
                                            <td class="skor_status_mental">{{ $data['data']->pengkajianRisiko->status_mental }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Sadarkan kemampuan diri sendiri</td>
                                            <td>
                                                0
                                            </td>
                                            <td>
                                                <input type="radio" name="risiko_status_mental" id="" class="form-check-input border-dark" value="0" readonly @checked($data['data']->pengkajianRisiko->status_mental == 0)>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        @php
                                            $totalRisiko = $data['data']->pengkajianRisiko->riwayat_jatuh + $data['data']->pengkajianRisiko->diagnostik_sekunder + $data['data']->pengkajianRisiko->alat_bantu + $data['data']->pengkajianRisiko->terpasang_infuse + $data['data']->pengkajianRisiko->gaya_berjalan + $data['data']->pengkajianRisiko->status_mental;
                                            $keterangan = '';
                                            if ($totalRisiko < 25) {
                                                $keterangan = 'Risiko Rendah';
                                            } else if ($totalRisiko > 24  && $totalRisiko < 51) {
                                                $keterangan = 'Risiko Sedang';
                                            } else {
                                                $keterangan = 'Risiko Tinggi';
                                            }
                                        @endphp
                                        <tr>
                                            <td colspan="2" style="background-color: #E7EEFF"  class="text-center text-dark"><b>Total Skor</b></td>
                                            <td colspan="3" style="background-color: #E7EEFF"  class="text-dark text-center"><b id="total-skor">{{ $totalRisiko }}</b></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2" style="background-color: #E7EEFF"  class="text-center text-dark"><b>Keterangan</b></td>
                                            <td colspan="3" style="background-color: #E7EEFF"  class="text-dark text-center"><b id="keterangan-skor">{{ $keterangan }}</b></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>Skor 0-24 : Risiko Rendah</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>Skor 25-50 : Risiko Sedang</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <p>Skor 51 : Risiko Tinggi</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">Pengkajian Fungsional (Diisi Oleh Perawat)</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Alat Bantu</label>
                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->alat_bantu == 1 ? 'Ya' : 'Tidak' }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Protesa</label>
                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->protesa == 1 ? 'Ya' : 'Tidak' }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Cacat Tubuh</label>
                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->cacat_tubuh == 1 ? 'Ya' : 'Tidak' }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Mandiri</label>
                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->mandiri == 1 ? 'Ya' : 'Tidak' }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">Dibantu</label>
                                <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->dibantu == 1 ? 'Ya' : 'Tidak' }}" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="">ADL</label>
                                <input type="text" name="" id="" class="form-control mb-3" value="{{ $data['data']->detail->adl == 1 ? 'Ya' : 'Tidak' }}" readonly>
                                @if ($data['data']->detail->adl == 1)
                                    @php
                                        $activities = [
                                            [
                                                'Makan',
                                                'makan',
                                                [5, 10]
                                            ],
                                            [
                                                'Berpindah dari kursi roda ke tempat tidur dan sebaliknya, termasuk duduk di tempat duduk',
                                                'berpindah',
                                                [5, 15]
                                            ],
                                            [
                                                'Kebersihan diri, mencuci muka, menyisir, mencukur dan menggosok gigi',
                                                'kebersihan_diri',
                                                [0, 5]
                                            ],
                                            [
                                                'Aktivitas di toilet (menyemprot, mengelap)',
                                                'aktiivitas_di_toilet',
                                                [5, 10]
                                            ],
                                            [
                                                'Mandi',
                                                'mandi',
                                                [0, 5]
                                            ],
                                            [
                                                'Berjalan di jalan yang datar (jika tidak mampu jalan melakukannya dengan kursi roda)',
                                                'berjalan_di_datar',
                                                [10, 15]
                                            ],
                                            [
                                                'Naik turun tangga',
                                                'naik_turun_tangga',
                                                [5, 10]
                                            ],
                                            [
                                                'Berpakaian termasuk menggunakan sepatu',
                                                'berpakaian',
                                                [5, 10]
                                            ],
                                            [
                                                'Mengontrol BAB',
                                                'mengontrol_bab',
                                                [5, 10]
                                            ],
                                            [
                                                'Mengontrol BAK',
                                                'mengontrol_bak',
                                                [5, 10]
                                            ],
                                        ]
                                    @endphp 
                                    <div class="table-responsive">
                                        <table class="table table-bordered table-striped">
                                            <thead class="">
                                                <tr>
                                                    <th style="vertical-align : middle;" rowspan="2">No.</th>
                                                    <th style="vertical-align : middle;" rowspan="2">Aktivitas</th>
                                                    <th class="text-center" colspan="2">Nilai</th>
                                                </tr>
                                                <tr>
                                                    <th>Bantuan</th>
                                                    <th>Mandiri</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $adl = json_decode(json_encode($data['data']->adl), true);
                                                    $total = 0;
                                                @endphp
                                                @foreach ($activities as $key => $item)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $item[0] }}</td>
                                                        <td>
                                                            <div class="form-check form-check-inline ml-3">
                                                                <input type="radio" value="{{ $item[2][0] }}" name="adl_{{ $item[1] }}" id="" class="form-check-input border-dark" disabled @checked($adl[$item[1]] == $item[2][0])>
                                                                <label for="">{{ $item[2][0] }}</label>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <div class="form-check form-check-inline ml-3">
                                                                <input type="radio" value="{{ $item[2][1] }}" name="adl_{{ $item[1] }}" id="" class="form-check-input border-dark" disabled @checked($adl[$item[1]] == $item[2][1])>
                                                                <label for="">{{ $item[2][1] }}</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $total += $adl[$item[1]];
                                                    @endphp
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2" class="text-center">Jumlah</td>
                                                    <td colspan="2" class="text-center"><b id="totalADL">{{ $total }}</b></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="step-3" class="step-3 row hidden" data-step="3">
            <div class="card col-md-12">
                <div class="card-body">
                    <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                        <div class="mb-3 mb-sm-0">
                            <div class="card-title">PEMERIKSAAN FISIK (Diisi Oleh Dokter)</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">KU dan Kesadaran</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->ku_dan_kesadaran }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">Kepala dan Leher</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <textarea name="kepala_dan_leher" id="" cols="30" rows="10" class="form-control" readonly>{{ $data['data']->detail->kepala_dan_leher }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">Dada</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <textarea name="dada" id="" cols="30" rows="10" class="form-control" readonly>{{ $data['data']->detail->dada }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">Perut</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <textarea name="perut" id="" cols="30" rows="10" class="form-control" readonly>{{ $data['data']->detail->perut }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">Ekstrimitas</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <textarea name="ekstrimitas" id="" cols="30" rows="10" class="form-control" readonly>{{ $data['data']->detail->ekstrimitas }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-12">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">Status Lokalis</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <img class='img-fluid w-100' src="{{ asset('assets/images/status-lokalis.jpg') }}" alt="">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="">Keterangan:</label>
                                            <textarea name="status_lokalis" id="" cols="30" rows="10" class="form-control" readonly>{{ $data['data']->detail->status_lokalis }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-12">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">PENATALAKSAAN / TERAPI (Diisi oleh Dokter)</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <textarea name="penatalaksanaan" id="" cols="30" rows="10" class="form-control" readonly>{{ $data['data']->detail->penatalaksanaan }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">DISCHARGE PLANNING (Diisi oleh Perawat)</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Umur > 65</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="umur_65" id="" class="form-check-input" readonly @checked($data['data']->detail->umur_65)>
                                            <label for="">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="umur_65" id="" class="form-check-input" readonly @checked(!$data['data']->detail->umur_65)>
                                            <label for="">Tidak</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Keterbatasan Mobilitas</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="keterbatasan_mobilitas" id="" class="form-check-input" readonly @checked($data['data']->detail->keterbatasan_mobilitas)>
                                            <label for="">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="keterbatasan_mobilitas" id="" class="form-check-input" readonly @checked(!$data['data']->detail->keterbatasan_mobilitas)>
                                            <label for="">Tidak</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Perawatan / Pengobatan Lanjutan</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="perawatan_lanjutan" id="" class="form-check-input" readonly @checked($data['data']->detail->perawatan_lanjutan)>
                                            <label for="">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="perawatan_lanjutan" id="" class="form-check-input" readonly @checked(!$data['data']->detail->perawatan_lanjutan)>
                                            <label for="">Tidak</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Bantuan untuk melakukan aktivitas harian</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="bantuan" id="" class="form-check-input" readonly @checked($data['data']->detail->bantuan)>
                                            <label for="">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="bantuan" id="" class="form-check-input" readonly @checked(!$data['data']->detail->bantuan)>
                                            <label for="">Tidak</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="" class="form-label">Tidak masuk kriteria</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="masuk_kriteria" id="" class="form-check-input" readonly @checked($data['data']->detail->masuk_kriteria)>
                                            <label for="">Ya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input type="radio" name="masuk_kriteria" id="" class="form-check-input" readonly @checked(!$data['data']->detail->masuk_kriteria)>
                                            <label for="">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">EDUKASI (Diisi oleh Dokter)</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_pemeriksaan" readonly @checked($data['data']->detail->hasil_pemeriksaan)>
                                            <label class="form-check-label" for="hasil_pemeriksaan">
                                              Hasil Pemeriksaan Fisik
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_pemeriksaan_penunjang" readonly @checked($data['data']->detail->penunjang)>
                                            <label class="form-check-label" for="hasil_pemeriksaan_penunjang">
                                              Hasil Pemeriksaan Penunjang
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_asuhan" readonly @checked($data['data']->detail->hasil_asuhan)>
                                            <label class="form-check-label" for="hasil_asuhan">
                                              Hasil Asuhan
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="lain_lain" readonly @checked($data['data']->detail->lain_lain)>
                                            <label class="form-check-label" for="lain_lain">
                                              Lain-lain
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="diagnosis" readonly @checked($data['data']->detail->diagnosis)>
                                            <label class="form-check-label" for="diagnosis">
                                              Diagnosis
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="rencana_asuhan" readonly @checked($data['data']->detail->rencana_asuhan)>
                                            <label class="form-check-label" for="rencana_asuhan">
                                              Rencana Asuhan
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="hasil_pengobatan" readonly @checked($data['data']->detail->hasil_pengobatan)>
                                            <label class="form-check-label" for="hasil_pengobatan">
                                              Hasil Pengobatan
                                            </label>
                                        </div>
                                        <div class="form-group mb-3">
                                            <input class="form-control" type="text" value="" name="keterangan_edukasi">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-12">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-center mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">RENCANA TINDAK LANJUT (Diisi oleh Dokter)</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="rawat_jalan" readonly @checked($data['data']->detail->rawat_jalan != null)>
                                            <label class="form-check-label" for="rawat_inap">
                                              Rawat jalan, kontrol ke:
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <div class="form">
                                            <input class="form-control" type="text" name="rawat_jalan" value="{{ $data['data']->detail->rawat_jalan }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="1" id="rawat_inap1" readonly @checked($data['data']->detail->rawat_inap != null)>
                                            <label class="form-check-label" for="rawat_inap1">
                                              Rawat inap, kontrol ke:
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <div class="form">
                                            <input class="form-control" type="text" name="rawat_inap" value="{{ $data['data']->detail->rawat_inap }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="rujuk" readonly @checked($data['data']->detail->rujuk != null)>
                                            <label class="form-check-label" for="rujuk">
                                              Rujuk, RS yang dituju:
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <div class="form">
                                            <input class="form-control" type="text" name="rujuk" value="{{ $data['data']->detail->rujuk }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="aps" readonly @checked($data['data']->detail->tanggal_pulang_paksa != null)>
                                            <label class="form-check-label" for="aps">
                                              Tanggal Pulang Paksa / APS:
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <div class="form">
                                            <input class="form-control" type="text" name="tanggal_pulang_paksa" value="{{ $data['data']->detail->tanggal_pulang_paksa }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="" id="meninggal" readonly @checked($data['data']->detail->meninggal != null)>
                                            <label class="form-check-label" for="meninggal">
                                              Meninggal:
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-8 mb-3">
                                        <div class="form">
                                            <input class="form-control" type="text" name="meninggal" value="{{ $data['data']->detail->meninggal }}" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">KONDISI SAAT KELUAR (Diisi oleh Dokter)</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <input type="text" name="" id="" class="form-control" value="{{ $data['data']->detail->kondisi_saat_keluar }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">ICD 10</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nama</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyIcd">
                                                @foreach ($data['data']->icd as $item)
                                                    <tr>
                                                        <td>{{ $item->icd->kode_diagnosa }} - {{ $item->icd->display }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">Rincian</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Jumlah</th>
                                                    <th>Nama Obat</th>
                                                    <th>Harga Obat</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyObat">
                                                @foreach ($data['data']->obat as $item)
                                                    <tr>
                                                        <th>{{ $item->qty }}</th>
                                                        <th>{{ $item->obat->nama }}</th>
                                                        <th>{{ $item->obat->harga }}</th>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card col-md-6">
                            <div class="card-body">
                                <div class="d-sm-flex d-block align-items-center justify-content-between mb-7">
                                    <div class="mb-3 mb-sm-0">
                                        <div class="card-title">Rencana Kontrol</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Tanggal</th>
                                                    <th>Alasan</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbodyKontrol">
                                                @foreach ($data['data']->rencanaKontrol as $item)
                                                    <td>{{ $item->tanggal }}</td>
                                                    <td>{{ $item->alasan }}</td>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-sm-flex d-block align-items-center justify-content-between">
            <div class="card w-1/4">
                <div class="card-header text-center">
                    <div class="card-title"><br></div>
                    <div class="card-subtitle">
                        Dokter
                    </div>
                </div>
                <div class="card-footer text-center">
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    (.............................)
                </div>
            </div>
            <div class="card w-1/4">
                <div class="card-header text-center">
                    <div class="card-title">
                        Jember, {{ date('d/m/Y', strtotime(now())) }}
                    </div>
                    <div class="card-subtitle">
                        Perawat
                    </div>
                </div>
                <div class="card-footer text-center">
                    <br>
                    <br>
                    <br>
                    <br>
                    (.............................)
                </div>
            </div>
        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
        <script>
            function printPage() {
                // Show print dialog
                window.print();

                // Generate PDF
                const doc = new jsPDF();
                const element = document.querySelector('.data-surat');
                doc.html(element, {
                    callback: function (doc) {
                        doc.save('Surat Perjanjian Kredit.pdf');
                    }
                });
            }
        </script>
    </body>
</html>
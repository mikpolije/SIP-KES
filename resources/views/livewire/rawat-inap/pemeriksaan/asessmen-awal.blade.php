<?php

namespace App\Livewire;

use Livewire\Volt\Component;
use App\Models\AsessmenAwal;
use Illuminate\Support\Facades\DB;

new class extends Component {
    public $pendaftaranId;
    public $keluhan = '';
    public $riwayatPenyakit = '';
    public $alergi = 'tidak';
    public $jenisAlergi = '';
    public $riwayatPengobatan = '';
    public $denyutJantung = '';
    public $pernafasan = '';
    public $suhuTubuh = '';
    public $sistole = '';
    public $diastole = '';
    public $skalaNyeri = '';
    public $statusPsikologi = [];
    public $bunuhDiri = false;
    public $bunuhDiriLaporan = '';
    public $lainLain = false;
    public $lainLainText = '';

    public function mount($pendaftaranId = null)
    {
        $this->pendaftaranId = $pendaftaranId;

        // Load existing data if available
        if ($pendaftaranId) {
            $asessmen = AsessmenAwal::where('id_pendaftaran', $pendaftaranId)->first();
            if ($asessmen) {
                $this->keluhan = $asessmen->keluhan_utama;
                $this->riwayatPenyakit = $asessmen->riwayat_penyakit;
                $this->riwayatPengobatan = $asessmen->riwayat_pengobatan;
                $this->denyutJantung = $asessmen->denyut_jantung;
                $this->pernafasan = $asessmen->pernafasan;
                $this->suhuTubuh = $asessmen->suhu_tubuh;
                $this->sistole = $asessmen->tekanan_darah_sistole;
                $this->diastole = $asessmen->tekanan_darah_diastole;
                $this->skalaNyeri = $asessmen->skala_nyeri;

                // Parse status psikologi from JSON or comma-separated string
                if ($asessmen->status_psikologi) {
                    if (str_contains($asessmen->status_psikologi, ',')) {
                        $this->statusPsikologi = explode(',', $asessmen->status_psikologi);
                    } else {
                        $this->statusPsikologi = json_decode($asessmen->status_psikologi, true) ?? [];
                    }
                }

                // Parse additional fields from JSON metadata if they exist
                $metadata = json_decode($asessmen->metadata ?? '{}', true);
                $this->alergi = $metadata['alergi'] ?? 'tidak';
                $this->jenisAlergi = $metadata['jenis_alergi'] ?? '';
                $this->bunuhDiri = $metadata['bunuh_diri'] ?? false;
                $this->bunuhDiriLaporan = $metadata['bunuh_diri_laporan'] ?? '';
                $this->lainLain = $metadata['lain_lain'] ?? false;
                $this->lainLainText = $metadata['lain_lain_text'] ?? '';
            }
        }
    }

    public function save()
    {
        $this->validate([
            'denyutJantung' => 'nullable|numeric',
            'pernafasan' => 'nullable|numeric',
            'suhuTubuh' => 'nullable|numeric',
            'sistole' => 'nullable|numeric',
            'diastole' => 'nullable|numeric',
            'skalaNyeri' => 'nullable|numeric',
        ]);

        // Prepare status psikologi field - convert array to string
        $statusPsikologiStr = implode(',', $this->statusPsikologi);

        // Prepare metadata for additional fields not in database schema
        $metadata = [
            'alergi' => $this->alergi,
            'jenis_alergi' => $this->jenisAlergi,
            'bunuh_diri' => $this->bunuhDiri,
            'bunuh_diri_laporan' => $this->bunuhDiriLaporan,
            'lain_lain' => $this->lainLain,
            'lain_lain_text' => $this->lainLainText,
        ];

        // Create or update record
        AsessmenAwal::updateOrCreate(
            ['id_pendaftaran' => $this->pendaftaranId],
            [
                'keluhan_utama' => $this->keluhan,
                'riwayat_penyakit' => $this->riwayatPenyakit,
                'riwayat_pengobatan' => $this->riwayatPengobatan,
                'denyut_jantung' => $this->denyutJantung,
                'pernafasan' => $this->pernafasan,
                'suhu_tubuh' => $this->suhuTubuh,
                'tekanan_darah_sistole' => $this->sistole,
                'tekanan_darah_diastole' => $this->diastole,
                'skala_nyeri' => $this->skalaNyeri,
                'status_psikologi' => $statusPsikologiStr,
                'metadata' => json_encode($metadata),
            ]
        );

        session()->flash('message', 'Data asessmen awal berhasil disimpan.');

        // Redirect or emit event as needed
        $this->dispatch('asessmenSaved');
    }
}; ?>

<div>
    <div class="container">
        <form wire:submit="save">
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="keluhan" class="form-label">Keluhan Utama</label>
                        <textarea wire:model="keluhan" class="form-control" id="keluhan" rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="riwayat-penyakit" class="form-label">Riwayat Penyakit</label>
                        <textarea wire:model="riwayatPenyakit" class="form-control" id="riwayat-penyakit"
                            rows="3"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Riwayat Alergi</label>
                        <div class="mb-2">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" wire:model="alergi" name="alergi"
                                    id="tidak-alergi" value="tidak">
                                <label class="form-check-label" for="tidak-alergi">Tidak</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" wire:model="alergi" name="alergi"
                                    id="ya-alergi" value="ya">
                                <label class="form-check-label" for="ya-alergi">Ya</label>
                            </div>
                        </div>
                        <input type="text" wire:model="jenisAlergi" class="form-control" id="jenis-alergi"
                            placeholder="Jenis alergi" @if ($alergi !== 'ya') disabled @endif>
                    </div>

                    <div class="mb-3">
                        <label for="riwayat-pengobatan" class="form-label">Riwayat Pengobatan</label>
                        <textarea wire:model="riwayatPengobatan" class="form-control" id="riwayat-pengobatan"
                            rows="3"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="denyut-jantung" class="form-label">Denyut Jantung</label>
                            <div class="position-relative">
                                <input type="text" wire:model="denyutJantung" class="form-control"
                                    id="denyut-jantung">
                                <span class="unit-label">bpm</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="pernafasan" class="form-label">Pernafasan</label>
                            <div class="position-relative">
                                <input type="text" wire:model="pernafasan" class="form-control" id="pernafasan">
                                <span class="unit-label">x/menit</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="suhu-tubuh" class="form-label">Suhu Tubuh</label>
                            <div class="position-relative">
                                <input type="text" wire:model="suhuTubuh" class="form-control" id="suhu-tubuh">
                                <span class="unit-label">°C</span>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tekanan Darah</label>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="position-relative">
                                    <input type="text" wire:model="sistole" class="form-control" id="sistole"
                                        placeholder="Sistole">
                                    <span class="unit-label">mmHg</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative">
                                    <input type="text" wire:model="diastole" class="form-control" id="diastole"
                                        placeholder="Diastole">
                                    <span class="unit-label">mmHg</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Skala Nyeri</label>
                        <div class="pain-scale-checkbox">
                            @foreach([0, 2, 4, 6, 8, 10] as $value)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" wire:model="skalaNyeri"
                                    name="skala-nyeri" id="nyeri-{{ $value }}" value="{{ $value }}">
                                <label class="form-check-label" for="nyeri-{{ $value }}">{{ $value }}</label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Psikologi</label>
                        <div class="mb-2">
                            @foreach(['tenang', 'cemas', 'takut', 'marah'] as $status)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" wire:model="statusPsikologi"
                                    id="{{ $status }}" value="{{ $status }}">
                                <label class="form-check-label" for="{{ $status }}">{{ ucfirst($status) }}</label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" wire:model="bunuhDiri" id="bunuh-diri"
                                value="1">
                            <label class="form-check-label" for="bunuh-diri">
                                Kecenderungan bunuh diri, dilapor ke
                                <input type="text" wire:model="bunuhDiriLaporan"
                                    class="form-control form-control-sm d-inline-block" style="width: 150px;"
                                    @if (!$bunuhDiri) disabled @endif>
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="lainLain" id="lain-lain"
                                value="1">
                            <label class="form-check-label" for="lain-lain">Lain-lain, tuliskan</label>
                            <textarea wire:model="lainLainText" class="form-control mt-2" id="lain-lain-text"
                                rows="2" @if (!$lainLain) disabled @endif></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary">Simpan Data</button>
                    </div>
                </div>
            </div>

            @if (session()->has('message'))
                <div class="alert alert-success mt-3">
                    {{ session('message') }}
                </div>
            @endif
        </form>
    </div>
</div>

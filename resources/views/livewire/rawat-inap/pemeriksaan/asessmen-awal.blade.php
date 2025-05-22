<?php


namespace App\Livewire;

use Livewire\Attributes\On;
use Livewire\Volt\Component;
use App\Models\AsessmenAwal;
use App\Models\Poli;
use App\Models\PoliRawatInap;
use Illuminate\Validation\Rule;

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

        if ($this->pendaftaranId) {
            $this->loadExistingData();
        }
    }

    protected function loadExistingData()
    {
        $asessmen = AsessmenAwal::where('id_pendaftaran', $this->pendaftaranId)->first();

        if ($asessmen) {
            $this->keluhan = $asessmen->keluhan_utama;
            $this->riwayatPenyakit = $asessmen->riwayat_penyakit;
            $this->riwayatPengobatan = $asessmen->riwayat_pengobatan;
            $this->alergi = $asessmen->alergi;
            $this->jenisAlergi = $asessmen->jenis_alergi;
            $this->denyutJantung = $asessmen->denyut_jantung;
            $this->pernafasan = $asessmen->pernafasan;
            $this->suhuTubuh = $asessmen->suhu_tubuh;
            $this->sistole = $asessmen->tekanan_darah_sistole;
            $this->diastole = $asessmen->tekanan_darah_diastole;
            $this->skalaNyeri = $asessmen->skala_nyeri;
            $this->statusPsikologi = $asessmen->status_psikologi;
            $this->bunuhDiri = $asessmen->bunuh_diri;
            $this->bunuhDiriLaporan = $asessmen->bunuh_diri_laporan;
            $this->lainLain = $asessmen->lain_lain;
            $this->lainLainText = $asessmen->lain_lain_text;
        }
    }

    public function rules()
    {
        return [
            'keluhan' => 'required|string|max:2000',
            'riwayatPenyakit' => 'required|string|max:2000',
            'alergi' => ['required', Rule::in(['tidak', 'ya'])],
            'jenisAlergi' => 'required_if:alergi,ya|max:255',
            'riwayatPengobatan' => 'required|string|max:2000',
            'denyutJantung' => 'required|numeric|min:30|max:200',
            'pernafasan' => 'required|numeric|min:10|max:60',
            'suhuTubuh' => 'required|numeric|min:30|max:45',
            'sistole' => 'required|numeric|min:60|max:250',
            'diastole' => 'required|numeric|min:40|max:150',
            'skalaNyeri' => 'required|in:0,2,4,6,8,10',
            'statusPsikologi' => 'required|in:tenang,cemas,takut,marah',
            'bunuhDiri' => 'boolean',
            'bunuhDiriLaporan' => 'nullable:bunuhDiri,true|max:255',
            'lainLain' => 'boolean',
            'lainLainText' => 'required_if:lainLain,true|max:2000',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field ini wajib diisi',
            'required_if' => 'Field ini wajib diisi ketika kondisi terkait dipilih',
            'numeric' => 'Harus berupa angka',
            'denyutJantung.min' => 'Denyut jantung tidak mungkin kurang dari :min bpm',
            'denyutJantung.max' => 'Denyut jantung tidak mungkin lebih dari :max bpm',
            'suhuTubuh.min' => 'Suhu tubuh tidak mungkin kurang dari :min °C',
            'suhuTubuh.max' => 'Suhu tubuh tidak mungkin lebih dari :max °C',
            'sistole.min' => 'Tekanan sistole tidak mungkin kurang dari :min mmHg',
            'sistole.max' => 'Tekanan sistole tidak mungkin lebih dari :max mmHg',
            'diastole.min' => 'Tekanan diastole tidak mungkin kurang dari :min mmHg',
            'diastole.max' => 'Tekanan diastole tidak mungkin lebih dari :max mmHg',
        ];
    }

    #[On('submit-step1')]
    public function submit()
    {
        $this->validate();

        $data = [
            'id_pendaftaran' => $this->pendaftaranId,
            'keluhan_utama' => $this->keluhan,
            'riwayat_penyakit' => $this->riwayatPenyakit,
            'riwayat_pengobatan' => $this->riwayatPengobatan,
            'alergi' => $this->alergi,
            'jenis_alergi' => $this->alergi === 'ya' ? $this->jenisAlergi : null,
            'denyut_jantung' => $this->denyutJantung,
            'pernafasan' => $this->pernafasan,
            'suhu_tubuh' => $this->suhuTubuh,
            'tekanan_darah_sistole' => $this->sistole,
            'tekanan_darah_diastole' => $this->diastole,
            'skala_nyeri' => $this->skalaNyeri,
            'status_psikologi' => $this->statusPsikologi,
            'bunuh_diri' => $this->bunuhDiri,
            'bunuh_diri_laporan' => $this->bunuhDiri ? $this->bunuhDiriLaporan : null,
            'lain_lain' => $this->lainLain,
            'lain_lain_text' => $this->lainLain ? $this->lainLainText : null,
        ];

        $asesmenAwal = AsessmenAwal::updateOrCreate(
            ['id_pendaftaran' => $this->pendaftaranId],
            $data
        );

        PoliRawatInap::where('id_pendaftaran', $this->pendaftaranId)
            ->update(['id_asessmen_awal' => $asesmenAwal->id]);

        flash()->success('Asesmen awal berhasil disimpan');
        $this->dispatch('go-next-step');
    }
}; ?>

<div>
    <div class="container">
        <form>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <div class="row mb-4">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="keluhan" class="form-label">Keluhan Utama</label>
                        <textarea wire:model="keluhan" class="form-control @error('keluhan') is-invalid @enderror" id="keluhan" rows="3"></textarea>
                        @error('keluhan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                <div class="mb-3">
                    <label for="riwayat-penyakit" class="form-label">Riwayat Penyakit</label>
                    <textarea wire:model="riwayatPenyakit" class="form-control @error('riwayatPenyakit') is-invalid @enderror" id="riwayat-penyakit"
                        rows="3"></textarea>
                    @error('riwayatPenyakit') <div class="invalid-feedback">{{ $message }}</div> @enderror
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
                            placeholder="Jenis alergi">
                        @error('jenisAlergi') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="riwayat-pengobatan" class="form-label">Riwayat Pengobatan</label>
                        <textarea wire:model="riwayatPengobatan" class="form-control" id="riwayat-pengobatan"
                            rows="3"></textarea>
                    </div>
                    @error('riwayatPengobatan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="denyut-jantung" class="form-label">Denyut Jantung</label>
                            <div class="position-relative">
                                <input type="text" wire:model="denyutJantung" class="form-control"
                                    id="denyut-jantung">
                                <span class="unit-label">bpm</span>
                                @error('denyutJantung')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="pernafasan" class="form-label">Pernafasan</label>
                            <div class="position-relative">
                                <input type="text" wire:model="pernafasan" class="form-control" id="pernafasan">
                                <span class="unit-label">x/menit</span>
                                @error('pernafasan')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <label for="suhu-tubuh" class="form-label">Suhu Tubuh</label>
                            <div class="position-relative">
                                <input type="text" wire:model="suhuTubuh" class="form-control" id="suhu-tubuh">
                                <span class="unit-label">°C</span>
                                @error('suhuTubuh')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
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
                                @error('sistole')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="position-relative">
                                    <input type="text" wire:model="diastole" class="form-control" id="diastole"
                                        placeholder="Diastole">
                                    <span class="unit-label">mmHg</span>
                                    @error('diastole')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
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
                            @error('skalaNyeri')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Status Psikologi</label>
                        <div class="mb-2">
                            @foreach(['tenang', 'cemas', 'takut', 'marah'] as $status)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                       wire:model="statusPsikologi"
                                       name="status-psikologi"
                                       id="psikologi-{{ $status }}"
                                       value="{{ $status }}">
                                <label class="form-check-label" for="psikologi-{{ $status }}">
                                    {{ ucfirst($status) }}
                                </label>
                                @error('statusPsikologi')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            @endforeach
                        </div>

                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" wire:model="bunuhDiri" id="bunuh-diri"
                                value="1">
                            <label class="form-check-label" for="bunuh-diri">
                                Kecenderungan bunuh diri, dilapor ke
                                <input type="text" wire:model="bunuhDiriLaporan"
                                    class="form-control form-control-sm d-inline-block" style="width: 150px;">
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" wire:model="lainLain" id="lain-lain"
                                value="1">
                            <label class="form-check-label" for="lain-lain">Lain-lain, tuliskan</label>
                            <textarea wire:model="lainLainText" class="form-control mt-2" id="lain-lain-text"
                                rows="2"></textarea>
                            @error('lainLainText')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

        </form>

    </div>
</div>

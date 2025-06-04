<?php

use Livewire\Volt\Component;
use App\Models\Pendaftaran;
use App\Models\Layanan;
use App\Models\Obat;
use Livewire\Attributes\On;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

new class extends Component {
    public $tanggalNota;
    public $noNota;

    public $pendaftaran;

    public $masterLayanan = [];
    public $masterObat = [];

    public $idLayananBaru;
    public $qtyLayananBaru;
    public $hargaLayananBaru;

    public $idObatBaru;
    public $qtyObatBaru;
    public $hargaObatBaru;

    public $notes;
    public $discount;
    public $tax;
    public $paymentMethod = 'tunai';
    public $paymentAmount;

    public function showPatientFinder()
    {
        LivewireAlert::title('')
            ->withOptions([
                'input' => 'text',
                'inputPlaceholder' => 'Masukkan nomor rekam medis',
            ])
            ->withConfirmButton('Cari')
            ->onConfirm('findPatient')
            ->show();
    }

    public function mount()
    {
        $this->tanggalNota = now()->format('Y-m-d');

        $this->masterLayanan = Layanan::all()->pluck('nama_layanan', 'id');
        $this->masterObat = Obat::all()->pluck('nama', 'id');
    }

    public function findPatient($data)
    {
        $noRm = $data['value'];
        $this->pendaftaran = Pendaftaran::with(['data_pasien', 'layananPendaftaran.layanan', 'obatPendaftaran.obat'])
            ->where('no_rm', $noRm)
            ->first();

        if (!$this->pendaftaran) {
            LivewireAlert::title('Data pemeriksaan pasien tidak ditemukan')->error()->position('top-end')->toast()->show();
            return;
        }
    }

    public function addService()
    {
        $this->pendaftaran->layananPendaftaran->create([
            'id_layanan' => $this->idLayananBaru,
            'qty' => $this->qtyLayananBaru,
        ]);
    }

    public function addMedicine()
    {
        $this->pendaftaran->obatPendaftaran->create([
            'id_obat' => $this->idObatBaru,
            'qty' => $this->qtyObatBaru,
        ]);
    }

    #[On('layanan-changed')]
    public function updateServiceField()
    {
        if ($this->qtyLayananBaru && $this->idLayananBaru) {
            $this->hargaLayananBaru = Layanan::find($this->idLayananBaru)->tarif_layanan * $this->qtyLayananBaru;
        }
    }

    #[On('obat-changed')]
    public function updateMedicineField()
    {
        if ($this->qtyObatBaru && $this->idObatBaru) {
            $this->hargaObatBaru = Obat::find($this->idObatBaru)->harga * $this->qtyObatBaru;
        }
    }

}; ?>

<div class="container-fluid py-4">
  <!-- Header -->
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
    <div>
      <h4 class="text-dark fw-bold mb-1">Pembayaran</h4>
      <p class="text-muted small mb-0">Kelola pembayaran pasien dan transaksi</p>
    </div>
    <button class="btn btn-primary rounded-pill px-4 py-2 shadow-sm" wire:click="showPatientFinder">
      <i class="bi bi-search me-2"></i>
      Cari Data Pasien
    </button>
  </div>

  <!-- Patient Information -->
  <div class="card mb-4 border-0 shadow-sm">
    <div class="card-header bg-light border-0 py-3">
      <h6 class="text-primary fw-semibold mb-0">
        <i class="bi bi-person-fill me-2"></i>Informasi Pasien
      </h6>
    </div>
    <div class="card-body p-4">
      <div class="row g-4">
        <div class="col-lg-6">
          <div class="row mb-3">
            <label class="col-sm-5 col-form-label text-muted">No Nota</label>
            <div class="col-sm-7">
              <input class="form-control bg-light border-0" type="text" wire:model="noNota"
                placeholder="Masukkan nomor nota" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-5 col-form-label text-muted">Tanggal Nota</label>
            <div class="col-sm-7">
              <input class="form-control bg-light border-0" type="date" wire:model="tanggalNota"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-5 col-form-label text-muted">Status</label>
            <div class="col-sm-7">
              <div class="form-control bg-light border-0">{{ $this->pendaftaran->layanan ?? '-' }}</div>
            </div>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="row mb-3">
            <label class="col-sm-5 col-form-label text-muted">No Rekam Medik</label>
            <div class="col-sm-7">
              <input class="form-control bg-light border-0" type="text" value="{{ $this->pendaftaran?->no_rm }}"
                placeholder="Nomor rekam medis" disabled>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-5 col-form-label text-muted">Nama Pasien</label>
            <div class="col-sm-7">
              <input class="form-control bg-light border-0" type="text"
                value="{{ $this->pendaftaran?->data_pasien?->nama_lengkap }}" placeholder="Nama lengkap pasien"
                disabled>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-5 col-form-label text-muted">No Telp</label>
            <div class="col-sm-7">
              <input class="form-control bg-light border-0" type="text"
                value="{{ $this->pendaftaran?->data_pasien?->nomor_telepon_pasien }}" placeholder="Nomor telepon"
                disabled>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="row g-4">
    <!-- Left Column - Service Details -->
    <div class="col-xl-8">
      <!-- Service Details -->
      <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-light border-0 py-3">
          <h6 class="text-primary fw-semibold mb-0">
            <i class="bi bi-clipboard-check me-2"></i>Rincian Layanan
          </h6>
        </div>
        <div class="card-body p-4">
          <div class="row g-2 mb-3">
            <div class="col-md-3">
              <input class="form-control" type="number" wire:change="updateServiceField" wire:model="qtyLayananBaru"
                placeholder="Jumlah" min="1" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-4" wire:ignore>
              <select class="form-select select2-layanan" wire:change="updateServiceField" wire:model="idLayananBaru">
                <option value="">Pilih Layanan</option>
                @foreach ($masterLayanan as $id => $nama)
                  <option value="{{ $id }}">{{ $nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <input class="form-control" type="number" wire:model="hargaLayananBaru" readonly placeholder="Harga"
                min="0" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary w-100" wire:click="addService"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table-hover table align-middle">
              <thead>
                <tr>
                  <th>Jumlah</th>
                  <th>Nama Layanan</th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($this->pendaftaran->layananPendaftaran ?? [] as $item)
                  <tr>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->layanan->nama_layanan }}</td>
                    <td>Rp {{ number_format($item->layanan->tarif_layanan, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->layanan->tarif_layanan * $item->qty, 0, ',', '.') }}</td>
                  </tr>
                @empty
                  <tr>
                    <td class="text-muted py-4 text-center" colspan="4">
                      <i class="bi bi-inbox display-6 d-block mb-2"></i>
                      Tidak Ada Data
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Medicine Details -->
      <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-light border-0 py-3">
          <h6 class="text-primary fw-semibold mb-0">
            <i class="bi bi-capsule me-2"></i>Rincian Obat
          </h6>
        </div>
        <div class="card-body p-4">
          <div class="row g-2 mb-3">
            <div class="col-md-3">
              <input class="form-control" type="number" wire:change="updateMedicineField" wire:model="qtyObatBaru" placeholder="Jumlah" min="1"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-4" wire:ignore>
              <select class="form-select select2-obat" wire:model="idObatBaru">
                <option value="">Pilih Obat</option>
                @foreach ($masterObat as $id => $nama)
                  <option value="{{ $id }}">{{ $nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-3">
              <input class="form-control" type="number" wire:model="hargaObatBaru" readonly placeholder="Harga"
                min="0" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary w-100" wire:click="addMedicine"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table-hover table align-middle">
              <thead>
                <tr>
                  <th>Jumlah</th>
                  <th>Nama Obat</th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($this->pendaftaran->obatLayanan ?? [] as $item)
                  <tr>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->obat->nama }}</td>
                    <td>Rp {{ number_format($item->obat->harga, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->obat->harga * $item->qty, 0, ',', '.') }}</td>
                  </tr>
                @empty
                  <tr>
                    <td class="text-muted py-4 text-center" colspan="4">
                      <i class="bi bi-inbox display-6 d-block mb-2"></i>
                      Tidak Ada Data
                    </td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Laboratory Details -->
      <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-light border-0 py-3">
          <h6 class="text-primary fw-semibold mb-0">
            <i class="bi bi-flask me-2"></i>Rincian Laboratorium
          </h6>
        </div>
        <div class="card-body p-4">
          <div class="row g-2 mb-3">
            <div class="col-md-3">
              <input class="form-control" type="date" wire:model="newLabDate"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-4">
              <input class="form-control" type="text" wire:model="newLabType" placeholder="Jenis Laboratorium"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-3">
              <input class="form-control" type="number" wire:model="newLabPrice" placeholder="Harga"
                min="0" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary w-100" wire:click="addLaboratory"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table-hover table align-middle">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Jenis Laboratorium</th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-muted py-4 text-center" colspan="4">
                    <i class="bi bi-inbox display-6 d-block mb-2"></i>
                    Tidak Ada Data
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Radiology Details -->
      <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-light border-0 py-3">
          <h6 class="text-primary fw-semibold mb-0">
            <i class="bi bi-x-ray me-2"></i>Rincian Radiologi
          </h6>
        </div>
        <div class="card-body p-4">
          <div class="row g-2 mb-3">
            <div class="col-md-3">
              <input class="form-control" type="date" wire:model="newRadDate"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-4">
              <input class="form-control" type="text" wire:model="newRadType" placeholder="Jenis Radiologi"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-3">
              <input class="form-control" type="number" wire:model="newRadPrice" placeholder="Harga"
                min="0" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary w-100" wire:click="addRadiology"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table-hover table align-middle">
              <thead>
                <tr>
                  <th>Tanggal</th>
                  <th>Jenis Radiologi</th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-muted py-4 text-center" colspan="4">
                    <i class="bi bi-inbox display-6 d-block mb-2"></i>
                    Tidak Ada Data
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Additional Details -->
      <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-light border-0 py-3">
          <h6 class="text-primary fw-semibold mb-0">
            <i class="bi bi-plus-circle me-2"></i>Rincian Tambahan
          </h6>
        </div>
        <div class="card-body p-4">
          <div class="row g-2 mb-3">
            <div class="col-md-3">
              <input class="form-control" type="number" wire:model="newAdditionalQty" placeholder="Jumlah"
                min="1" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-4">
              <input class="form-control" type="text" wire:model="newAdditionalCode" placeholder="Kode Tambahan"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-3">
              <input class="form-control" type="number" wire:model="newAdditionalPrice" placeholder="Harga"
                min="0" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary w-100" wire:click="addAdditionalItem"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table-hover table align-middle">
              <thead>
                <tr>
                  <th>Jumlah</th>
                  <th>Nama Tambahan</th>
                  <th>Harga</th>
                  <th>Total</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="text-muted py-4 text-center" colspan="4">
                    <i class="bi bi-inbox display-6 d-block mb-2"></i>
                    Tidak Ada Data
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Notes -->
      <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-light border-0 py-3">
          <h6 class="text-primary fw-semibold mb-0">
            <i class="bi bi-chat-left-text me-2"></i>Keterangan
          </h6>
        </div>
        <div class="card-body p-4">
          <textarea class="form-control bg-light border-0" wire:model="notes" rows="4"
            placeholder="Tambahkan keterangan atau catatan tambahan..." {{ !$this->pendaftaran ? 'disabled' : '' }}></textarea>
        </div>
      </div>
    </div>

    <!-- Right Column - Payment Summary -->
    <div class="col-xl-4">
      <!-- Billing Summary -->
      <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-light border-0 py-3">
          <h6 class="text-primary fw-semibold mb-0">
            <i class="bi bi-calculator me-2"></i>Rincian Tagihan
          </h6>
        </div>
        <div class="card-body p-4">
          <div class="row mb-3">
            <label class="col-sm-5 col-form-label text-muted fw-medium">Subtotal</label>
            <div class="col-sm-7">
              <input class="form-control bg-light border-0" type="text" value="Rp 0" readonly>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-5 col-form-label text-muted fw-medium">Diskon (%)</label>
            <div class="col-sm-7">
              <input class="form-control" type="number" wire:model="discount" min="0" max="100"
                placeholder="0" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
          </div>
          <div class="row mb-3">
            <label class="col-sm-5 col-form-label text-muted fw-medium">Pajak (%)</label>
            <div class="col-sm-7">
              <input class="form-control" type="number" wire:model="tax" min="0" max="100"
                placeholder="0" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
          </div>
        </div>
      </div>

      <!-- Payment Details -->
      <div class="card mb-4 border-0 shadow-sm">
        <div class="card-header bg-light border-0 py-3">
          <h6 class="text-primary fw-semibold mb-0">
            <i class="bi bi-credit-card me-2"></i>Rincian Pembayaran
          </h6>
        </div>
        <div class="card-body p-4">
          <div class="row g-2 mb-3">
            <div class="col-md-4">
              <select class="form-select" wire:model="paymentMethod" {{ !$this->pendaftaran ? 'disabled' : '' }}>
                <option value="tunai">Tunai</option>
                <option value="transfer">Transfer</option>
              </select>
            </div>
            <div class="col-md-6">
              <input class="form-control" type="number" wire:model="paymentAmount" placeholder="Jumlah"
                min="0" {{ !$this->pendaftaran ? 'disabled' : '' }}>
            </div>
            <div class="col-md-2">
              <button class="btn btn-primary w-100" wire:click="addPayment"
                {{ !$this->pendaftaran ? 'disabled' : '' }}>
                <i class="bi bi-plus"></i>
              </button>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table-hover table align-middle">
              <thead>
                <tr>
                  <th>Cara Bayar</th>
                  <th>Jumlah</th>
                </tr>
              </thead>
              <tbody>
                {{-- @forelse($paymentTransactions as $index => $transaction)
                      <tr>
                        <td>{{ ucfirst($transaction['method']) }}</td>
                        <td>Rp {{ number_format($transaction['amount'], 0, ',', '.') }}</td>
                      </tr>
                    @empty --}}
                <tr>
                  <td class="text-muted py-4 text-center" colspan="2">
                    <i class="bi bi-inbox display-6 d-block mb-2"></i>
                    Tidak Ada Data
                  </td>
                </tr>
                {{-- @endforelse --}}
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Total -->
      <div class="card bg-light mb-4">
        <div class="card-body">
          <h5 class="text-primary">TOTAL TAGIHAN</h5>
          <div class="row mb-2">
            <label class="col-sm-5 col-form-label">Total Bayar</label>
            <div class="col-sm-7">
              {{-- <input class="form-control-plaintext" type="text"
                    value="{{ number_format($total, 0, ',', '.') }}" readonly> --}}
            </div>
          </div>
          <div class="row mb-2">
            <label class="col-sm-5 col-form-label">Kembalian</label>
            <div class="col-sm-7">
              {{-- <input class="form-control-plaintext" type="text"
                    value="{{ number_format($change, 0, ',', '.') }}" readonly> --}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Buttons -->
  <div class="d-flex flex-column flex-md-row justify-content-between align-items-center mt-4 gap-3">
    <button class="btn btn-outline-primary px-4 py-2" {{ !$this->pendaftaran ? 'disabled' : '' }}>
      <i class="bi bi-printer me-2"></i>
      Cetak
    </button>
    <div>
      <button class="btn btn-primary px-4 py-2" wire:click="processPayment"
        {{ !$this->pendaftaran ? 'disabled' : '' }}>
        <i class="bi bi-credit-card me-2"></i>
        Proses Pembayaran
      </button>
    </div>
  </div>
</div>


@if (session()->has('message'))
  <div class="alert alert-success mt-3">
    {{ session('message') }}
  </div>
@endif

<script>
  document.addEventListener('livewire:navigated', function() {
    initializeSelect2();
  });

  document.addEventListener('livewire:updated', function() {
    initializeSelect2();
    updateSelect2DisabledState();
  });

  document.addEventListener('livewire:init', () => {
    $('.select2-layanan').on('select2:select', function(e) {
      Livewire.dispatch('layanan-changed');
    });

    $('.select2-obat').on('select2:select', function(e) {
      Livewire.dispatch('obat-changed');
    });
  });

  function initializeSelect2() {
    // Initialize Select2 for layanan dropdown
    $('.select2-layanan').select2({
      placeholder: 'Pilih Layanan',
      allowClear: true,
      width: '100%'
    }).on('change', function(e) {
      @this.set('idLayananBaru', $(this).val());
    });

    // Initialize Select2 for obat dropdown
    $('.select2-obat').select2({
      placeholder: 'Pilih Obat',
      allowClear: true,
      width: '100%'
    }).on('change', function(e) {
      @this.set('idObatBaru', $(this).val());
    });
  }
</script>

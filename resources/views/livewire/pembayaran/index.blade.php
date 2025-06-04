<?php

use Livewire\Volt\Component;
use App\Models\Pendaftaran;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

new class extends Component {
    public $noRekamMedik;
    public $namaPasien;
    public $noTelp;
    public $status;
    public $tanggalNota;
    public $idPendaftaran;
    public $layanan = [];

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
    }

    public function findPatient($data)
    {
        $noRm = $data['value'];
        $pendaftaran = Pendaftaran::with(['data_pasien', 'layananPendaftaran.layanan'])
            ->where('no_rm', $noRm)
            ->first();

        $this->noRekamMedik = $pendaftaran->no_rm;
        $this->namaPasien = $pendaftaran->data_pasien->nama_lengkap;
        $this->noTelp = $pendaftaran->data_pasien->nomor_telepon_pasien;
        $this->status = $pendaftaran->layanan;
        $this->idPendaftaran = $pendaftaran->id_pendaftaran;

        // Layanan
        $this->layanan = $pendaftaran->layananPendaftaran;
    }
}; ?>

<div class="container-fluid py-4">
  <div class="card bg-light">
    <div class="card-body p-4">
      <!-- Header -->
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="title mb-0">Pembayaran</h4>
        <button class="btn btn-outline-primary rounded-pill" wire:click="showPatientFinder">
          <svg class="bi bi-search" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
            viewBox="0 0 16 16">
            <path
              d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
          </svg>
          Data Pasien
        </button>
      </div>

      <!-- Patient Information -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-md-6">
              <div class="row mb-2">
                <div class="col-5">No Nota</div>
                <div class="col-1">:</div>
                <div class="col-6">
                  <input class="form-control form-control-sm" type="text" wire:model="noNota">
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-5">Tanggal Nota</div>
                <div class="col-1">:</div>
                <div class="col-6">
                  <input class="form-control form-control-sm" type="date" wire:model="tanggalNota">
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-5">Status</div>
                <div class="col-1">:</div>
                <div class="col-6">
                  <p>{{ $this->status }}</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="row mb-2">
                <div class="col-5">No Rekam Medik</div>
                <div class="col-1">:</div>
                <div class="col-6">
                  <input class="form-control form-control-sm" type="text" wire:model="noRekamMedik">
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-5">Nama Pasien</div>
                <div class="col-1">:</div>
                <div class="col-6">
                  <input class="form-control form-control-sm" type="text" wire:model="namaPasien">
                </div>
              </div>
              <div class="row mb-2">
                <div class="col-5">No Telp</div>
                <div class="col-1">:</div>
                <div class="col-6">
                  <input class="form-control form-control-sm" type="text" wire:model="noTelp">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Left Column - Service Details -->
        <div class="col-md-8">
          <!-- Service Details -->
          <div class="mb-4">
            <h6>Rincian Layanan</h6>
            <div class="input-group mb-2">
              <input class="form-control" type="number" wire:model="newServiceQty" placeholder="Jumlah" min="1">
              <input class="form-control" type="text" wire:model="newServiceName" placeholder="Nama Layanan">
              <input class="form-control" type="number" wire:model="newServicePrice" placeholder="Harga"
                min="0">
              <button class="btn btn-secondary" wire:click="addService">
                Tambah
                <svg class="bi bi-plus" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
              </button>
            </div>
            <div class="table-responsive">
              <table class="table-bordered table">
                <thead class="bg-secondary text-white">
                  <tr>
                    <th>Jumlah</th>
                    <th>Nama Layanan</th>
                    <th>Harga</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody class="bg-light">
                  @forelse ($this->layanan as $item)
                    <tr>
                      <td>{{ $item->id }}</td>
                      <td>{{ $item->layanan->nama_layanan }}</td>
                      <td>{{ $item->layanan->tarif_layanan }}</td>
                      <td>{{ 0 }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td class="text-center" colspan="4">Tidak Ada Data</td>
                    </tr>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>

          <!-- Medicine Details -->
          <div class="mb-4">
            <h6>Rincian Obat</h6>
            <div class="input-group mb-2">
              <input class="form-control" type="number" wire:model="newMedicineQty" placeholder="Jumlah"
                min="1">
              <input class="form-control" type="text" wire:model="newMedicineName" placeholder="Nama Obat">
              <input class="form-control" type="number" wire:model="newMedicinePrice" placeholder="Harga"
                min="0">
              <button class="btn btn-secondary" wire:click="addMedicine">
                Tambah
                <svg class="bi bi-plus" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
              </button>
            </div>
            <div class="table-responsive">
              <table class="table-bordered table">
                <thead class="bg-secondary text-white">
                  <tr>
                    <th>Jumlah</th>
                    <th>Nama Obat</th>
                    <th>Harga</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody class="bg-light">
                </tbody>
              </table>
            </div>
          </div>

          <!-- Laboratory Details -->
          <div class="mb-4">
            <h6>Rincian Laboratorium</h6>
            <div class="input-group mb-2">
              <input class="form-control" type="date" wire:model="newLabDate">
              <input class="form-control" type="text" wire:model="newLabType" placeholder="Jenis Laboratorium">
              <input class="form-control" type="number" wire:model="newLabPrice" placeholder="Harga"
                min="0">
              <button class="btn btn-secondary" wire:click="addLaboratory">
                Tambah
                <svg class="bi bi-plus" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
              </button>
            </div>
            <div class="table-responsive">
              <table class="table-bordered table">
                <thead class="bg-secondary text-white">
                  <tr>
                    <th>Tanggal</th>
                    <th>Jenis Laboratorium</th>
                    <th>Harga</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody class="bg-light">
                </tbody>
              </table>
            </div>
          </div>

          <!-- Radiology Details -->
          <div class="mb-4">
            <h6>Rincian Radiologi</h6>
            <div class="input-group mb-2">
              <input class="form-control" type="date" wire:model="newRadDate">
              <input class="form-control" type="text" wire:model="newRadType" placeholder="Jenis Radiologi">
              <input class="form-control" type="number" wire:model="newRadPrice" placeholder="Harga"
                min="0">
              <button class="btn btn-secondary" wire:click="addRadiology">
                Tambah
                <svg class="bi bi-plus" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
              </button>
            </div>
            <div class="table-responsive">
              <table class="table-bordered table">
                <thead class="bg-secondary text-white">
                  <tr>
                    <th>Tanggal</th>
                    <th>Jenis Radiologi</th>
                    <th>Harga</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody class="bg-light">
                </tbody>
              </table>
            </div>
          </div>

          <!-- Additional Details -->
          <div class="mb-4">
            <h6>Rincian Tambahan</h6>
            <div class="input-group mb-2">
              <input class="form-control" type="number" wire:model="newAdditionalQty" placeholder="Jumlah"
                min="1">
              <input class="form-control" type="text" wire:model="newAdditionalCode" placeholder="Kode Tambahan">
              <input class="form-control" type="number" wire:model="newAdditionalPrice" placeholder="Harga"
                min="0">
              <button class="btn btn-secondary" wire:click="addAdditionalItem">
                Tambah
                <svg class="bi bi-plus" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
              </button>
            </div>
            <div class="table-responsive">
              <table class="table-bordered table">
                <thead class="bg-secondary text-white">
                  <tr>
                    <th>Jumlah</th>
                    <th>Nama Tambahan</th>
                    <th>Harga</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody class="bg-light">
                </tbody>
              </table>
            </div>
          </div>

          <!-- Notes -->
          <div class="mb-4">
            <h6>Keterangan</h6>
            <textarea class="form-control" wire:model="notes" rows="4" placeholder="Tambah Keterangan"></textarea>
          </div>
        </div>

        <!-- Right Column - Payment Summary -->
        <div class="col-md-4">
          <!-- Billing Summary -->
          <div class="mb-4">
            <h6>Rincian Tagihan</h6>
            <div class="row mb-2">
              <label class="col-sm-4 col-form-label">Subtotal</label>
              <div class="col-sm-8">
                {{-- <input class="form-control-plaintext" type="text"
                  value="{{ number_format($subtotal, 0, ',', '.') }}" readonly> --}}
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-sm-4 col-form-label">Diskon</label>
              <div class="col-sm-8">
                <input class="form-control" type="number" wire:model="discount" min="0" max="100">
              </div>
            </div>
            <div class="row mb-2">
              <label class="col-sm-4 col-form-label">Pajak (%)</label>
              <div class="col-sm-8">
                <input class="form-control" type="number" wire:model="tax" min="0" max="100">
              </div>
            </div>
          </div>

          <!-- Payment Details -->
          <div class="mb-4">
            <h6>Rincian Pembayaran</h6>
            <div class="input-group mb-2">
              <select class="form-select" wire:model="paymentMethod">
                <option value="tunai">Tunai</option>
                <option value="transfer">Transfer</option>
              </select>
              <input class="form-control" type="number" wire:model="paymentAmount" placeholder="Jumlah"
                min="0">
              <button class="btn btn-secondary" wire:click="addPayment">
                Tambah
                <svg class="bi bi-plus" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                  fill="currentColor" viewBox="0 0 16 16">
                  <path
                    d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                </svg>
              </button>
            </div>

            <div class="table-responsive mt-3">
              <table class="table-bordered table">
                <thead class="bg-secondary text-white">
                  <tr>
                    <th>Cara Bayar</th>
                    <th>Jumlah</th>
                  </tr>
                </thead>
                <tbody class="bg-light">
                  {{-- @forelse($paymentTransactions as $index => $transaction)
                    <tr>
                      <td>{{ ucfirst($transaction['method']) }}</td>
                      <td>{{ number_format($transaction['amount'], 0, ',', '.') }}</td>
                    </tr>
                  @empty
                    <tr>
                      <td class="text-center" colspan="2">Tidak Ada Data</td>
                    </tr>
                  @endforelse --}}
                </tbody>
              </table>
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
      <div class="d-flex justify-content-between mt-3">
        <button class="btn btn-outline-primary">
          <svg class="bi bi-printer" xmlns="http://www.w3.org/2000/svg" width="16" height="16"
            fill="currentColor" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z" />
            <path
              d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z" />
          </svg>
          Cetak
        </button>
        <div>
          <button class="btn btn-primary" wire:click="processPayment">Proses Pembayaran</button>
        </div>
      </div>
    </div>
  </div>
</div>

@if (session()->has('message'))
  <div class="alert alert-success mt-3">
    {{ session('message') }}
  </div>
@endif

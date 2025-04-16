<?php

use Livewire\Volt\Component;

new class extends Component {
    public $noNota = '';
    public $tanggalNota = '';
    public $noRekamMedik = '';
    public $namaPasien = '';
    public $noTelp = '';

    // Service Details
    public $services = [];
    public $newServiceQty = 1;
    public $newServiceName = '';
    public $newServicePrice = '';

    // Medicine Details
    public $medicines = [];
    public $newMedicineQty = 1;
    public $newMedicineName = '';
    public $newMedicinePrice = '';

    // Laboratory Details
    public $laboratories = [];
    public $newLabDate = '';
    public $newLabType = '';
    public $newLabPrice = '';

    // Radiology Details
    public $radiologies = [];
    public $newRadDate = '';
    public $newRadType = '';
    public $newRadPrice = '';

    // Additional Details
    public $additionalItems = [];
    public $newAdditionalQty = 1;
    public $newAdditionalCode = '';
    public $newAdditionalPrice = '';

    // Notes
    public $notes = '';

    // Billing Summary
    public $subtotal = 0;
    public $discount = 0;
    public $tax = 0;
    public $total = 0;

    // Payment Details
    public $paymentMethod = 'tunai';
    public $paymentAmount = '';
    public $paymentTransactions = [];
    public $change = 0;

    public function mount()
    {
        // Initialize with current date for nota
        $this->tanggalNota = now()->format('Y-m-d');
    }

    public function addService()
    {
        $this->validate([
            'newServiceQty' => 'required|numeric|min:1',
            'newServiceName' => 'required',
            'newServicePrice' => 'required|numeric|min:0',
        ]);

        $total = $this->newServiceQty * $this->newServicePrice;

        $this->services[] = [
            'qty' => $this->newServiceQty,
            'name' => $this->newServiceName,
            'price' => $this->newServicePrice,
            'total' => $total
        ];

        $this->newServiceQty = 1;
        $this->newServiceName = '';
        $this->newServicePrice = '';
        $this->calculateTotals();
    }

    public function addMedicine()
    {
        $this->validate([
            'newMedicineQty' => 'required|numeric|min:1',
            'newMedicineName' => 'required',
            'newMedicinePrice' => 'required|numeric|min:0',
        ]);

        $total = $this->newMedicineQty * $this->newMedicinePrice;

        $this->medicines[] = [
            'qty' => $this->newMedicineQty,
            'name' => $this->newMedicineName,
            'price' => $this->newMedicinePrice,
            'total' => $total
        ];

        $this->newMedicineQty = 1;
        $this->newMedicineName = '';
        $this->newMedicinePrice = '';
        $this->calculateTotals();
    }

    public function addLaboratory()
    {
        $this->validate([
            'newLabDate' => 'required|date',
            'newLabType' => 'required',
            'newLabPrice' => 'required|numeric|min:0',
        ]);

        $this->laboratories[] = [
            'date' => $this->newLabDate,
            'type' => $this->newLabType,
            'price' => $this->newLabPrice,
            'total' => $this->newLabPrice
        ];

        $this->newLabDate = '';
        $this->newLabType = '';
        $this->newLabPrice = '';
        $this->calculateTotals();
    }

    public function addRadiology()
    {
        $this->validate([
            'newRadDate' => 'required|date',
            'newRadType' => 'required',
            'newRadPrice' => 'required|numeric|min:0',
        ]);

        $this->radiologies[] = [
            'date' => $this->newRadDate,
            'type' => $this->newRadType,
            'price' => $this->newRadPrice,
            'total' => $this->newRadPrice
        ];

        $this->newRadDate = '';
        $this->newRadType = '';
        $this->newRadPrice = '';
        $this->calculateTotals();
    }

    public function addAdditionalItem()
    {
        $this->validate([
            'newAdditionalQty' => 'required|numeric|min:1',
            'newAdditionalCode' => 'required',
            'newAdditionalPrice' => 'required|numeric|min:0',
        ]);

        $total = $this->newAdditionalQty * $this->newAdditionalPrice;

        $this->additionalItems[] = [
            'qty' => $this->newAdditionalQty,
            'code' => $this->newAdditionalCode,
            'price' => $this->newAdditionalPrice,
            'total' => $total
        ];

        $this->newAdditionalQty = 1;
        $this->newAdditionalCode = '';
        $this->newAdditionalPrice = '';
        $this->calculateTotals();
    }

    public function addPayment()
    {
        $this->validate([
            'paymentMethod' => 'required',
            'paymentAmount' => 'required|numeric|min:0',
        ]);

        $this->paymentTransactions[] = [
            'method' => $this->paymentMethod,
            'amount' => $this->paymentAmount
        ];

        $this->paymentAmount = '';
        $this->calculateChange();
    }

    public function calculateTotals()
    {
        $servicesTotal = collect($this->services)->sum('total');
        $medicinesTotal = collect($this->medicines)->sum('total');
        $labsTotal = collect($this->laboratories)->sum('total');
        $radsTotal = collect($this->radiologies)->sum('total');
        $additionalTotal = collect($this->additionalItems)->sum('total');

        $this->subtotal = $servicesTotal + $medicinesTotal + $labsTotal + $radsTotal + $additionalTotal;

        $discountAmount = $this->subtotal * ($this->discount / 100);
        $taxAmount = $this->subtotal * ($this->tax / 100);

        $this->total = $this->subtotal - $discountAmount + $taxAmount;

        $this->calculateChange();
    }

    public function calculateChange()
    {
        $paidAmount = collect($this->paymentTransactions)->sum('amount');
        $this->change = max(0, $paidAmount - $this->total);
    }

    public function processPayment()
    {
        $this->validate([
            'noNota' => 'required',
            'tanggalNota' => 'required|date',
            'noRekamMedik' => 'required',
            'namaPasien' => 'required',
            'paymentTransactions' => 'required|array|min:1',
        ]);

        // save the payment to the database (ya begitulah)
        // and perform any other necessary actions

        session()->flash('message', 'Pembayaran berhasil diproses!');
    }

    public function updatedDiscount()
    {
        $this->calculateTotals();
    }

    public function updatedTax()
    {
        $this->calculateTotals();
    }
}; ?>

<div class="container-fluid py-4">
    <div class="card bg-light">
        <div class="card-body p-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h4 class="text-primary mb-0">Data Pembayaran</h4>
                <button class="btn btn-outline-primary rounded-pill">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-search" viewBox="0 0 16 16">
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
                                    <input type="text" wire:model="noNota" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5">Tanggal Nota</div>
                                <div class="col-1">:</div>
                                <div class="col-6">
                                    <input type="date" wire:model="tanggalNota" class="form-control form-control-sm">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row mb-2">
                                <div class="col-5">No Rekam Medik</div>
                                <div class="col-1">:</div>
                                <div class="col-6">
                                    <input type="text" wire:model="noRekamMedik" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5">Nama Pasien</div>
                                <div class="col-1">:</div>
                                <div class="col-6">
                                    <input type="text" wire:model="namaPasien" class="form-control form-control-sm">
                                </div>
                            </div>
                            <div class="row mb-2">
                                <div class="col-5">No Telp</div>
                                <div class="col-1">:</div>
                                <div class="col-6">
                                    <input type="text" wire:model="noTelp" class="form-control form-control-sm">
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
                            <input type="number" wire:model="newServiceQty" class="form-control" placeholder="Jumlah"
                                min="1">
                            <input type="text" wire:model="newServiceName" class="form-control"
                                placeholder="Nama Layanan">
                            <input type="number" wire:model="newServicePrice" class="form-control" placeholder="Harga"
                                min="0">
                            <button class="btn btn-secondary" wire:click="addService">
                                Tambah
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>Jumlah</th>
                                        <th>Nama Layanan</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-light">
                                    @forelse($services as $index => $service)
                                    <tr>
                                        <td>{{ $service['qty'] }}</td>
                                        <td>{{ $service['name'] }}</td>
                                        <td>{{ number_format($service['price'], 0, ',', '.') }}</td>
                                        <td>{{ number_format($service['total'], 0, ',', '.') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Data</td>
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
                            <input type="number" wire:model="newMedicineQty" class="form-control" placeholder="Jumlah"
                                min="1">
                            <input type="text" wire:model="newMedicineName" class="form-control"
                                placeholder="Nama Obat">
                            <input type="number" wire:model="newMedicinePrice" class="form-control" placeholder="Harga"
                                min="0">
                            <button class="btn btn-secondary" wire:click="addMedicine">
                                Tambah
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>Jumlah</th>
                                        <th>Nama Obat</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-light">
                                    @forelse($medicines as $index => $medicine)
                                    <tr>
                                        <td>{{ $medicine['qty'] }}</td>
                                        <td>{{ $medicine['name'] }}</td>
                                        <td>{{ number_format($medicine['price'], 0, ',', '.') }}</td>
                                        <td>{{ number_format($medicine['total'], 0, ',', '.') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Laboratory Details -->
                    <div class="mb-4">
                        <h6>Rincian Laboratorium</h6>
                        <div class="input-group mb-2">
                            <input type="date" wire:model="newLabDate" class="form-control">
                            <input type="text" wire:model="newLabType" class="form-control"
                                placeholder="Jenis Laboratorium">
                            <input type="number" wire:model="newLabPrice" class="form-control" placeholder="Harga"
                                min="0">
                            <button class="btn btn-secondary" wire:click="addLaboratory">
                                Tambah
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jenis Laboratorium</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-light">
                                    @forelse($laboratories as $index => $lab)
                                    <tr>
                                        <td>{{ $lab['date'] }}</td>
                                        <td>{{ $lab['type'] }}</td>
                                        <td>{{ number_format($lab['price'], 0, ',', '.') }}</td>
                                        <td>{{ number_format($lab['total'], 0, ',', '.') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Radiology Details -->
                    <div class="mb-4">
                        <h6>Rincian Radiologi</h6>
                        <div class="input-group mb-2">
                            <input type="date" wire:model="newRadDate" class="form-control">
                            <input type="text" wire:model="newRadType" class="form-control"
                                placeholder="Jenis Radiologi">
                            <input type="number" wire:model="newRadPrice" class="form-control" placeholder="Harga"
                                min="0">
                            <button class="btn btn-secondary" wire:click="addRadiology">
                                Tambah
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Jenis Radiologi</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-light">
                                    @forelse($radiologies as $index => $rad)
                                    <tr>
                                        <td>{{ $rad['date'] }}</td>
                                        <td>{{ $rad['type'] }}</td>
                                        <td>{{ number_format($rad['price'], 0, ',', '.') }}</td>
                                        <td>{{ number_format($rad['total'], 0, ',', '.') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Additional Details -->
                    <div class="mb-4">
                        <h6>Rincian Tambahan</h6>
                        <div class="input-group mb-2">
                            <input type="number" wire:model="newAdditionalQty" class="form-control" placeholder="Jumlah"
                                min="1">
                            <input type="text" wire:model="newAdditionalCode" class="form-control"
                                placeholder="Kode Tambahan">
                            <input type="number" wire:model="newAdditionalPrice" class="form-control"
                                placeholder="Harga" min="0">
                            <button class="btn btn-secondary" wire:click="addAdditionalItem">
                                Tambah
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>Jumlah</th>
                                        <th>Nama Tambahan</th>
                                        <th>Harga</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-light">
                                    @forelse($additionalItems as $index => $item)
                                    <tr>
                                        <td>{{ $item['qty'] }}</td>
                                        <td>{{ $item['code'] }}</td>
                                        <td>{{ number_format($item['price'], 0, ',', '.') }}</td>
                                        <td>{{ number_format($item['total'], 0, ',', '.') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">Tidak Ada Data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Notes -->
                    <div class="mb-4">
                        <h6>Keterangan</h6>
                        <textarea class="form-control" wire:model="notes" rows="4"
                            placeholder="Tambah Keterangan"></textarea>
                    </div>
                </div>

                <!-- Right Column - Payment Summary -->
                <div class="col-md-4">
                    <!-- Billing Summary -->
                    <div class="mb-4">
                        <h6>Rincian Tagihan</h6>
                        <div class="mb-2 row">
                            <label class="col-sm-4 col-form-label">Subtotal</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control-plaintext"
                                    value="{{ number_format($subtotal, 0, ',', '.') }}">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-4 col-form-label">Diskon</label>
                            <div class="col-sm-8">
                                <input type="number" wire:model="discount" class="form-control" min="0" max="100">
                            </div>
                        </div>
                        <div class="mb-2 row">
                            <label class="col-sm-4 col-form-label">Pajak (%)</label>
                            <div class="col-sm-8">
                                <input type="number" wire:model="tax" class="form-control" min="0" max="100">
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
                            <input type="number" wire:model="paymentAmount" class="form-control" placeholder="Jumlah"
                                min="0">
                            <button class="btn btn-secondary" wire:click="addPayment">
                                Tambah
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-plus" viewBox="0 0 16 16">
                                    <path
                                        d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>
                            </button>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="paymentMethod" id="tunai"
                                value="tunai" checked>
                            <label class="form-check-label" for="tunai">
                                Tunai
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" wire:model="paymentMethod" id="transfer"
                                value="transfer">
                            <label class="form-check-label" for="transfer">
                                Transfer
                            </label>
                        </div>

                        <div class="table-responsive mt-3">
                            <table class="table table-bordered">
                                <thead class="bg-secondary text-white">
                                    <tr>
                                        <th>Cara Bayar</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-light">
                                    @forelse($paymentTransactions as $index => $transaction)
                                    <tr>
                                        <td>{{ ucfirst($transaction['method']) }}</td>
                                        <td>{{ number_format($transaction['amount'], 0, ',', '.') }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="2" class="text-center">Tidak Ada Data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <!-- Total -->
                    <div class="card bg-light mb-4">
                        <div class="card-body">
                            <h5 class="text-primary">TOTAL TAGIHAN</h5>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Total Bayar</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext"
                                        value="{{ number_format($total, 0, ',', '.') }}">
                                </div>
                            </div>
                            <div class="mb-2 row">
                                <label class="col-sm-5 col-form-label">Kembalian</label>
                                <div class="col-sm-7">
                                    <input type="text" readonly class="form-control-plaintext"
                                        value="{{ number_format($change, 0, ',', '.') }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Buttons -->
            <div class="d-flex justify-content-between mt-3">
                <button class="btn btn-outline-primary">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-printer" viewBox="0 0 16 16">
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

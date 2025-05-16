<?php
use Livewire\Volt\Component;

new class extends Component {
    public $pendaftaranId;

    public function mount($pendaftaranId = null) {
        $this->pendaftaranId = $pendaftaranId;
    }

    public function openCpptModal()
    {
        $this->dispatch('open-cppt-modal');
    }
};
?>

<div>
    <div>
        <div class="p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col" width="40">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="checkAll">
                                    <label class="form-check-label" for="checkAll"></label>
                                </div>
                            </th>
                            <th scope="col">NO <span class="text-primary">*</span></th>
                            <th scope="col">TANGGAL VISIT</th>
                            <th scope="col">DPJP</th>
                            <th scope="col">PERAWAT</th>
                            <th scope="col">KETERANGAN</th>
                            <th scope="col">OLEH</th>
                            <th scope="col" class="text-center">
                                <i class="bi bi-pencil-square"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Row 1 -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check1">
                                    <label class="form-check-label" for="check1"></label>
                                </div>
                            </td>
                            <td>1</td>
                            <td>09-01-2025 01:02</td>
                            <td>dr.Jeno Sp.J</td>
                            <td>Jaemin S.Kep.Ns</td>
                            <td>-</td>
                            <td>Jaemin S.Kep.Ns</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-sm btn-primary rounded-circle me-1">
                                        <i class="bi bi-file-text"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary rounded-circle">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        <!-- Row 2 -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check2">
                                    <label class="form-check-label" for="check2"></label>
                                </div>
                            </td>
                            <td>2</td>
                            <td></td>
                            <td>dr.Jeno Sp.J</td>
                            <td>Jaemin S.Kep.Ns</td>
                            <td>RUJUK LAB</td>
                            <td>dr.Jeno Sp.J</td>
                            <td>
                                <div class="d-flex justify-content-center">
                                    <button class="btn btn-sm btn-primary rounded-circle me-1">
                                        <i class="bi bi-file-text"></i>
                                    </button>
                                    <button class="btn btn-sm btn-primary rounded-circle">
                                        <i class="bi bi-arrow-repeat"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end mt-3">
        <button class="btn btn-primary rounded-pill" wire:click="openCpptModal">
            <i class="bi bi-plus-circle"></i> Tambah
        </button>
    </div>

    @livewire('rawat-inap.layanan.cppt-modal', ['pendaftaranId' => $pendaftaranId], key('cppt-modal-'.$pendaftaranId))
</div>

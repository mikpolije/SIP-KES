<?php

use Livewire\Volt\Component;

new class extends Component {
    public $patientId;

    public function mount($patientId = null) {
        $this->patientId = $patientId;
    }
} ?>

<div class="w-100">
    <div class="py-4">
        <h1 class="text-center mb-4">CPPT</h1>

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
                            <th scope="col">LAST EDIT</th>
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

                        <!-- Row 3 -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check3">
                                    <label class="form-check-label" for="check3"></label>
                                </div>
                            </td>
                            <td>3</td>
                            <td>09-01-2025 07:02</td>
                            <td>dr.Jeno Sp.J</td>
                            <td>Jaemin S.Kep.Ns</td>
                            <td>-</td>
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

                        <!-- Row 4 -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check4">
                                    <label class="form-check-label" for="check4"></label>
                                </div>
                            </td>
                            <td>4</td>
                            <td></td>
                            <td>dr.Jeno Sp.J</td>
                            <td>Jaemin S.Kep.Ns</td>
                            <td>RUJUK RADIOLOGI</td>
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

                        <!-- Row 5 -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check5">
                                    <label class="form-check-label" for="check5"></label>
                                </div>
                            </td>
                            <td>5</td>
                            <td>09-01-2025 14:02</td>
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

                        <!-- Row 6 -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check6">
                                    <label class="form-check-label" for="check6"></label>
                                </div>
                            </td>
                            <td>6</td>
                            <td></td>
                            <td>dr.Jeno Sp.J</td>
                            <td>Jaemin S.Kep.Ns</td>
                            <td>-</td>
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

                        <!-- Row 7 -->
                        <tr>
                            <td>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="check7">
                                    <label class="form-check-label" for="check7"></label>
                                </div>
                            </td>
                            <td>7</td>
                            <td>09-01-2025 20:02</td>
                            <td>dr.Jeno Sp.J</td>
                            <td>Jaemin S.Kep.Ns</td>
                            <td>-</td>
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
        <button class="btn btn-primary rounded-pill">
            <i class="bi bi-plus-circle"></i> Tambah
        </button>
    </div>
</div>

<?php

use Livewire\Volt\Component;

new class extends Component {
    public $patientId;

    public function mount($patientId = null) {
        $this->patientId = $patientId;
    }
} ?>

<div class="card w-100">
    <!-- <div class="container"> -->
    <!--     <h1 class="form-title">Asessmen Awal Ranap</h1> -->
    <!---->
    <!--     <form> -->
    <!--         <div class="row mb-4"> -->
    <!--             <div class="col-md-6"> -->
    <!--                 <div class="mb-3"> -->
    <!--                     <label for="keluhan" class="form-label">Keluhan Utama</label> -->
    <!--                     <textarea class="form-control" id="keluhan" rows="3"></textarea> -->
    <!--                 </div> -->
    <!---->
    <!--                 <div class="mb-3"> -->
    <!--                     <label for="riwayat-penyakit" class="form-label">Riwayat Penyakit</label> -->
    <!--                     <textarea class="form-control" id="riwayat-penyakit" rows="3"></textarea> -->
    <!--                 </div> -->
    <!---->
    <!--                 <div class="mb-3"> -->
    <!--                     <label class="form-label">Riwayat Alergi</label> -->
    <!--                     <div class="mb-2"> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="radio" name="alergi" id="tidak-alergi" -->
    <!--                                 value="tidak" checked> -->
    <!--                             <label class="form-check-label" for="tidak-alergi">Tidak</label> -->
    <!--                         </div> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="radio" name="alergi" id="ya-alergi" value="ya"> -->
    <!--                             <label class="form-check-label" for="ya-alergi">Ya</label> -->
    <!--                         </div> -->
    <!--                     </div> -->
    <!--                     <input type="text" class="form-control" id="jenis-alergi" placeholder="Jenis alergi"> -->
    <!--                 </div> -->
    <!---->
    <!--                 <div class="mb-3"> -->
    <!--                     <label for="riwayat-pengobatan" class="form-label">Riwayat Pengobatan</label> -->
    <!--                     <textarea class="form-control" id="riwayat-pengobatan" rows="3"></textarea> -->
    <!--                 </div> -->
    <!--             </div> -->
    <!---->
    <!--             <div class="col-md-6"> -->
    <!--                 <div class="row mb-3"> -->
    <!--                     <div class="col-md-4"> -->
    <!--                         <label for="denyut-jantung" class="form-label">Denyut Jantung</label> -->
    <!--                         <div class="position-relative"> -->
    <!--                             <input type="text" class="form-control" id="denyut-jantung"> -->
    <!--                             <span class="unit-label">bpm</span> -->
    <!--                         </div> -->
    <!--                     </div> -->
    <!---->
    <!--                     <div class="col-md-4"> -->
    <!--                         <label for="pernafasan" class="form-label">Pernafasan</label> -->
    <!--                         <div class="position-relative"> -->
    <!--                             <input type="text" class="form-control" id="pernafasan"> -->
    <!--                             <span class="unit-label">x/menit</span> -->
    <!--                         </div> -->
    <!--                     </div> -->
    <!---->
    <!--                     <div class="col-md-4"> -->
    <!--                         <label for="suhu-tubuh" class="form-label">Suhu Tubuh</label> -->
    <!--                         <div class="position-relative"> -->
    <!--                             <input type="text" class="form-control" id="suhu-tubuh"> -->
    <!--                             <span class="unit-label">°C</span> -->
    <!--                         </div> -->
    <!--                     </div> -->
    <!--                 </div> -->
    <!---->
    <!--                 <div class="mb-3"> -->
    <!--                     <label class="form-label">Tekanan Darah</label> -->
    <!--                     <div class="row"> -->
    <!--                         <div class="col-md-6"> -->
    <!--                             <div class="position-relative"> -->
    <!--                                 <input type="text" class="form-control" id="sistole" placeholder="Sistole"> -->
    <!--                                 <span class="unit-label">mmHg</span> -->
    <!--                             </div> -->
    <!--                         </div> -->
    <!--                         <div class="col-md-6"> -->
    <!--                             <div class="position-relative"> -->
    <!--                                 <input type="text" class="form-control" id="diastole" placeholder="Diastole"> -->
    <!--                                 <span class="unit-label">mmHg</span> -->
    <!--                             </div> -->
    <!--                         </div> -->
    <!--                     </div> -->
    <!--                 </div> -->
    <!---->
    <!--                 <div class="mb-3"> -->
    <!--                     <label class="form-label">Skala Nyeri</label> -->
    <!--                     <div class="pain-scale-checkbox"> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="radio" name="skala-nyeri" id="nyeri-0" value="0"> -->
    <!--                             <label class="form-check-label" for="nyeri-0">0</label> -->
    <!--                         </div> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="radio" name="skala-nyeri" id="nyeri-2" value="2"> -->
    <!--                             <label class="form-check-label" for="nyeri-2">2</label> -->
    <!--                         </div> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="radio" name="skala-nyeri" id="nyeri-4" value="4"> -->
    <!--                             <label class="form-check-label" for="nyeri-4">4</label> -->
    <!--                         </div> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="radio" name="skala-nyeri" id="nyeri-6" value="6"> -->
    <!--                             <label class="form-check-label" for="nyeri-6">6</label> -->
    <!--                         </div> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="radio" name="skala-nyeri" id="nyeri-8" value="8"> -->
    <!--                             <label class="form-check-label" for="nyeri-8">8</label> -->
    <!--                         </div> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="radio" name="skala-nyeri" id="nyeri-10" -->
    <!--                                 value="10"> -->
    <!--                             <label class="form-check-label" for="nyeri-10">10</label> -->
    <!--                         </div> -->
    <!--                     </div> -->
    <!--                 </div> -->
    <!---->
    <!--                 <div class="mb-3"> -->
    <!--                     <label class="form-label">Status Psikologi</label> -->
    <!--                     <div class="mb-2"> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="checkbox" id="tenang" value="tenang"> -->
    <!--                             <label class="form-check-label" for="tenang">Tenang</label> -->
    <!--                         </div> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="checkbox" id="cemas" value="cemas"> -->
    <!--                             <label class="form-check-label" for="cemas">Cemas</label> -->
    <!--                         </div> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="checkbox" id="takut" value="takut"> -->
    <!--                             <label class="form-check-label" for="takut">Takut</label> -->
    <!--                         </div> -->
    <!--                         <div class="form-check form-check-inline"> -->
    <!--                             <input class="form-check-input" type="checkbox" id="marah" value="marah"> -->
    <!--                             <label class="form-check-label" for="marah">Marah</label> -->
    <!--                         </div> -->
    <!--                     </div> -->
    <!---->
    <!--                     <div class="form-check mb-2"> -->
    <!--                         <input class="form-check-input" type="checkbox" id="bunuh-diri" value="bunuh-diri"> -->
    <!--                         <label class="form-check-label" for="bunuh-diri"> -->
    <!--                             Kecenderungan bunuh diri, dilapor ke -->
    <!--                             <input type="text" class="form-control form-control-sm d-inline-block" -->
    <!--                                 style="width: 150px;"> -->
    <!--                         </label> -->
    <!--                     </div> -->
    <!---->
    <!--                     <div class="form-check"> -->
    <!--                         <input class="form-check-input" type="checkbox" id="lain-lain" value="lain-lain"> -->
    <!--                         <label class="form-check-label" for="lain-lain">Lain-lain, tuliskan</label> -->
    <!--                         <textarea class="form-control mt-2" id="lain-lain-text" rows="2"></textarea> -->
    <!--                     </div> -->
    <!--                 </div> -->
    <!--             </div> -->
    <!--         </div> -->
    <!---->
    <!--         <div class="text-end"> -->
    <!--             <button type="submit" class="btn btn-primary save-btn">Simpan</button> -->
    <!--         </div> -->
    <!--     </form> -->
    <!-- </div> -->
</div>

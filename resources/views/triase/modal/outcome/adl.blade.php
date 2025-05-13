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
<div class="modal fade" id="exampleModalADL" tabindex="-1" aria-labelledby="exampleModalADLLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalADLLabel">ADL</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
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
        </div>
        {{-- <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div> --}}
      </div>
    </div>
  </div>
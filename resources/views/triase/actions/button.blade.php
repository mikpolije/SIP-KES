@php
    if ($data->data_pasien) {
        $birth_date = $data->data_pasien->tanggal_lahir_pasien;
        $current_date = date('Y-m-d');
        $birth_date_obj = new DateTime($birth_date);
        $current_date_obj = new DateTime($current_date);
        $diff = $current_date_obj->diff($birth_date_obj);
        $age_years = $diff->y;
    }
@endphp
@if ($data->data_pasien)
    <button type="button" class="btn text-white btn-primary btnPilihPasien closePasien" data-bs-dismiss="modal" aria-label="Close" data-no_rm="{{ $data->no_rm }}" data-nama="{{ $data->data_pasien->nama_lengkap }}" data-penanggung_jawab="{{ $data->wali_pasien->nama_lengkap }}" data-usia="{{ $age_years }}" data-alamat="{{ $data->data_pasien->alamat_lengkap }}" data-tanggal="{{ date('d/m/Y', strtotime($data->created_at)) }}" data-pendaftaran_id="{{ $data->id_pendaftaran }}">
        Pilih
    </button>
@else
    -
@endif
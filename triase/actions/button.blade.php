<button type="button" class="btn text-white btn-primary btnPilihPasien closePasien" data-bs-dismiss="modal" aria-label="Close" data-id="{{ $data->id }}" data-nama="{{ $data->nama }}" data-tanggal="{{ date('d/m/Y', strtotime($data->kondisi->tanggal_masuk)) }}">
    Pilih
</button>
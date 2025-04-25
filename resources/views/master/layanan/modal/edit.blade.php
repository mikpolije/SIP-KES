@forelse ($data['list'] as $key => $item)
    <!-- Modal -->
    <div class="modal fade" id="modalEdit-{{ $key }}" tabindex="-1" aria-labelledby="modalEditLabel-{{ $key }}" aria-hidden="true">
        <form action="{{ route('layanan.update', $item->id) }}" method="post" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalEditLabel">Tambah Layanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" placeholder="Nama Layanan" name="nama" value="{{ old('nama', $item->nama_layanan) }}">
                                    <label for="">Nama Layanan:</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" placeholder="Tarif Layanan" name="tarif" value="{{ old('tarif', $item->tarif_layanan) }}">
                                    <label for="">Tarif Layanan:</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-primary" type="submit">
                            <i class="ti ti-send fs-4"></i>
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@empty
@endforelse
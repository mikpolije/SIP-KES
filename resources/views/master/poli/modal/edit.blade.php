@forelse ($data['list'] as $key => $item)
    <!-- Modal -->
    <div class="modal fade" id="modalEditPoli-{{ $key }}" tabindex="-1" aria-labelledby="modalEditLabel-{{ $key }}" aria-hidden="true">
        <form action="{{ route('poli.update', $item->id_poli) }}" method="post" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="modalEditLabel">Tambah Poli</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" placeholder="Nama Poli" name="nama_poli" value="{{ old('nama_poli', $item->nama_poli) }}">
                                    <label for="">Nama Poli:</label>
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
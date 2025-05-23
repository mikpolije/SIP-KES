    @extends('layouts.main')

@section('content')
<h2>Data Poli</h2>
<a href="{{ route('poli.create') }}" class="btn btn-primary mb-3">+ Tambah Poli</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id. Poli</th>
            <th>Nama Poli</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($polis as $poli)
        <tr>
            <td>{{ $poli->id_layanan }}</td>
            <td>{{ $poli->nama_layanan }}</td>
            <td>
                <a href="{{ route('poli.edit', $poli->id) }}" class="btn btn-sm btn-primary">Edit</a>
                <form action="{{ route('poli.destroy', $poli->id) }}" method="POST" style="display:inline-block">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
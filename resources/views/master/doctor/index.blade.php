@extends('layouts.master')

@section('title', 'Dokter')

@section('pageContent')

  <div class="card">
    <div class="card-body">
      <h5 class="card-title fw-semibold mb-4">Daftar Dokter</h5>
      {{ $dataTable->table() }}
    </div>
  </div>

@endsection

@section('scripts')
  {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endsection

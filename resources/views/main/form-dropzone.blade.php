@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('build/libs/dropzone/dist/min/dropzone.min.css') }}">
@endsection

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Dropzone', 'subtitle' => 'Home'])
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Dropzone</h4>
            </div>
            <div class="card-body">
              <p class="card-subtitle mb-3">
                For multiple file upload put class <code>.dropzone</code> to
                form.
              </p>
              <form action="#" class="dropzone">
                <div class="fallback">
                  <input name="file" type="file" multiple />
                </div>
              </form>
            </div>
          </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/dropzone/dist/min/dropzone.min.js') }}"></script>
@endsection
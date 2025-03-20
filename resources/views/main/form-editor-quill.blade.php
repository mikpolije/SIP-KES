@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('build/libs/quill/dist/quill.snow.css') }}">
@endsection

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Quill Editor', 'subtitle' => 'Home'])
          <div class="card">
            <div class="card-body">
              <!-- Create the editor container -->
              <div id="editor">
                <p>Hello World!</p>
                <p>Some initial <strong>bold</strong> text</p>
                <p>
                  <br />
                </p>
              </div>
            </div>
          </div>

@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/quill/dist/quill.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/quill-init.js') }}"></script>
@endsection

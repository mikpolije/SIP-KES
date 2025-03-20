@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Tinymce', 'subtitle' => 'Home'])
          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Tinymce wysihtml5</h4>
            </div>
            <div class="card-body">
              <form method="post">
                <textarea id="mymce" name="area"></textarea>
              </form>
            </div>
          </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/tinymce-init.js') }}"></script>
@endsection

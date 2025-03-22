@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Sample Page</h5>
              <p class="mb-0">This is a sample page</p>
            </div>
          </div>
        
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
@endsection
@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Tabler Icon', 'subtitle' => 'Home'])
          <div class="card w-100 h-100 position-relative overflow-hidden">
            <div class="card-body p-0">
              <iframe class="w-100 h-n280" src="https://tabler-icons.io/" frameborder="0"
                data-simplebar=""></iframe>
            </div>
          </div>
@endsection

@section('scripts')
@endsection
</html>
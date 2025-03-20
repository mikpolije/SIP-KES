@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Session Timeout', 'subtitle' => 'Home'])
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                Session Timeout Notification Control
              </h4>
              <p>
                After a set amount of time, a dialog is shown to the user
                with the option to either log out now, or stay connected. If
                log out now is selected, the page is redirected to a logout
                URL. If stay connected is selected, a keep-alive URL is
                requested through AJAX. If no options is selected after
                another set amount of time, the page is automatically
                redirected to a timeout URL.
              </p>
            </div>
          </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/extra-libs/jquery-sessiontimeout/jquery.sessionTimeout.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/extra-libs/jquery-sessiontimeout/session-timeout-init.js') }}"></script>
@endsection

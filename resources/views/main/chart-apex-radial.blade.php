@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Chart Apex Radial', 'subtitle' => 'Home'])
        <div class="row">
            <!-- Start Basic Radial Bar Chart -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Basic Radial Bar Chart</h4>
                  <div id="chart-radial-basic"></div>
                </div>
              </div>
            </div>
            <!-- End Basic Radial Bar Chart -->
            <!-- Start Multiple Radial Bar Chart -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Multiple Radial Bar Chart</h4>
                  <div id="chart-radial-multiple"></div>
                </div>
              </div>
            </div>
            <!-- End Multiple Radial Bar Chart -->
            <!-- Start Circle Radial Bar Chart -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Circle Radial Bar Chart</h4>
                  <div id="chart-radial-circle"></div>
                </div>
              </div>
            </div>
            <!-- End Circle Radial Bar Chart -->
            <!-- Start Gradient Radial Bar Chart -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Gradient Radial Bar Chart</h4>
                  <div id="chart-radial-gradient"></div>
                </div>
              </div>
            </div>
            <!-- End Gradient Radial Bar Chart -->
            <!-- Start Stroked Gauge Radial Bar Chart -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Stroked Gauge Radial Bar Chart</h4>
                  <div id="chart-radial-stroked-gauge"></div>
                </div>
              </div>
            </div>
            <!-- End Stroked Gauge Radial Bar Chart -->
            <!-- Start Semi Circle Radial Bar Chart -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Semi Circle Radial Bar Chart</h4>
                  <div class="d-flex align-items-center justify-content-center mt-5">
                    <div id="chart-radial-semi-circle"></div>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Semi Circle Radial Bar Chart -->
          </div>

@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/apex-chart/apex.radial.init.js') }}"></script>
@endsection
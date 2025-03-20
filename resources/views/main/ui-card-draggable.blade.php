@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('build/libs/dragula/dist/dragula.min.css') }}">
@endsection

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Draggable', 'subtitle' => 'Home'])
          <div class="row">
            <div class="col-12">
              <h4 class="mb-3 fs-5">Basic Draggable options</h4>
              <div class="row draggable-cards" id="draggable-area">
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header text-bg-info">
                      <h4 class="mb-0 text-white card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header text-bg-danger">
                      <h4 class="mb-0 text-white card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header text-bg-success">
                      <h4 class="mb-0 text-white card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header text-bg-warning">
                      <h4 class="mb-0 text-white card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12">
              <h4 class="mb-3 mt-5 fs-5">Move card and apply color</h4>
              <div class="row draggable-cards" id="card-colors">
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header">
                      <h4 class="mb-0 text-dark card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header">
                      <h4 class="mb-0 text-dark card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header">
                      <h4 class="mb-0 text-dark card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card card-hover">
                    <div class="card-header">
                      <h4 class="mb-0 text-dark card-title">Card Title</h4>
                    </div>
                    <div class="card-body">
                      <h3 class="card-title">Special title treatment</h3>
                      <p class="card-text">
                        With supporting text below as a natural lead-in to
                        additional content.
                      </p>
                      <a href="javascript:void(0)" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/dragula/dist/dragula.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/draggable-init.js') }}"></script>
@endsection

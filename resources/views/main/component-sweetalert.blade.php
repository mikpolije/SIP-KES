@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('css')
<link rel="stylesheet" href="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.css') }}">
@endsection

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Sweetalert', 'subtitle' => 'Home'])
          <div class="row">
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">A basic message</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-basic" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">Title with a text under</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert2.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-title" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">Error Message</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert5.png') }}" alt="alert" class="img-fluid model_img"
                    id="model-error-icon" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">Success Message</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert3.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-success" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">Warning message</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert4.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-warning" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">With HTML Image</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert2.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-html" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">Custom Position Dialog</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-position" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">Confirm Dialog</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/model.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-confirm" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">Passing Parameter</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert6.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-passparameter" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">Alert with Image</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert7.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-image" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">With Background Message</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/model.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-bg" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">With Auto Close Timer</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert5.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-autoclose" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">With RTL Dialog</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert6.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-rtl" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">With Ajax Request</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-ajax" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">With Timer Function</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert4.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-timerfun" />
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-3">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title">Alert with time</h4>
                  <h6 class="card-subtitle">(Click on image)</h6>
                </div>
                <div class="card-body p-3">
                  <img src="{{ URL::asset('build/images/alert/alert6.png') }}" alt="alert" class="img-fluid model_img"
                    id="sa-close" />
                </div>
              </div>
            </div>
          </div>

@endsection

@section('scripts')
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/sweetalert2/dist/sweetalert2.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/forms/sweet-alert.init.js') }}"></script>
@endsection


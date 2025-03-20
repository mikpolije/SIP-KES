@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Toastr', 'subtitle' => 'Home'])
          <div class="row">
            <div class="col-lg-6">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Basic</h4>
                </div>
                <div class="card-body">
                  <div class="button-group">
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-success-subtle
                        text-success
                        fw-medium
                      " id="ts-success">
                      Success
                    </button>
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-info-subtle
                        text-info
                        fw-medium
                      " id="ts-info">
                      Info
                    </button>
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-warning-subtle
                        text-warning
                        fw-medium
                      " id="ts-warning">
                      Warning
                    </button>
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-danger-subtle
                        text-danger
                        fw-medium
                      " id="ts-error">
                      Error
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <div class="card">
                <div class="border-bottom title-part-padding">
                  <h4 class="card-title mb-0">Animation</h4>
                </div>
                <div class="card-body">
                  <div class="button-group">
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-primary-subtle
                        text-primary
                        fw-medium
                      " id="slide-toast">
                      slideDown - slideUp
                    </button>
                    <button type="button" class="
                        btn
                        px-4
                        fs-4
                        bg-success-subtle
                        text-success
                        fw-medium
                      " id="fade-toast">
                      fadeIn - fadeOut
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="border-bottom title-part-padding">
              <h4 class="card-title mb-0">Positions</h4>
            </div>
            <div class="card-body">
              <div class="button-group">
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-primary-subtle
                    text-primary
                    fw-medium
                  " id="pos-top-left">
                  Top Left
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-success-subtle
                    text-success
                    fw-medium
                  " id="pos-top-center">
                  Top Center
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-warning-subtle
                    text-warning
                    fw-medium
                  " id="pos-top-right">
                  Top Right
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-danger-subtle
                    text-danger
                    fw-medium
                  " id="pos-top-full">
                  Top Full Width
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-primary-subtle
                    text-primary
                    fw-medium
                  " id="pos-bottom-left">
                  Bottom Left
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-success-subtle
                    text-success
                    fw-medium
                  " id="pos-bottom-center">
                  Bottom Center
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-warning-subtle
                    text-warning
                    fw-medium
                  " id="pos-bottom-right">
                  Bottom Right
                </button>
                <button type="button" class="
                    btn
                    fs-4
                    px-4
                    bg-danger-subtle
                    text-danger
                    fw-medium
                  " id="pos-bottom-full">
                  Bottom Full Width
                </button>
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 col-sm-12">
                  <h4 class="card-title">Only Text</h4>
                  <p>This notification just includes text.</p>
                  <button type="button" class="
                      btn
                      px-4
                      fs-4
                      bg-success-subtle
                      text-success
                      fw-medium
                    " id="text-notification">
                    Show Toast
                  </button>
                </div>
                <div class="col-md-3 col-sm-12">
                  <h4 class="card-title">With Close Button</h4>
                  <p>Close on close button.</p>
                  <button type="button" class="
                      btn
                      px-4
                      fs-4
                      bg-danger-subtle
                      text-danger
                      fw-medium
                    " id="close-button">
                    Show Toast
                  </button>
                </div>
                <div class="col-md-3 col-sm-12">
                  <h4 class="card-title">With Progress</h4>
                  <p>Indicates toast's progress.</p>
                  <button type="button" class="
                      btn
                      px-4
                      fs-4
                      bg-primary-subtle
                      text-primary
                      fw-medium
                    " id="progress-bar">
                    Show Toast
                  </button>
                </div>
                <div class="col-md-3 col-sm-12">
                  <h4 class="card-title">With Button</h4>
                  <p>Add button to force clearing a toast.</p>
                  <button type="button" class="
                      btn
                      px-4
                      fs-4
                      bg-warning-subtle
                      text-warning
                      fw-medium
                    " id="clear-toast-btn">
                    Show Toast
                  </button>
                </div>
              </div>
            </div>
          </div>
                
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  <script src="{{ URL::asset('build/js/plugins/toastr-init.js') }}"></script>
@endsection
@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Block-UI', 'subtitle' => 'Home'])
          <div class="row">
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="form-group">
                    <h4 class="card-title">Block Element</h4>
                    <p class="card-subtitle mb-3">Block content components.</p>
                    <button class="
                        btn
                        d-block
                        w-100 
                        fw-medium
                        bg-success-subtle
                        text-success
                        block-card
                      ">
                      Block Card
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="form-group">
                    <h4 class="card-title">Block Layout Area</h4>
                    <p class="card-subtitle mb-3">Block layout areas.</p>
                    <button class="
                        btn
                        d-block
                        w-100
                        fw-medium
                        bg-warning-subtle
                        text-warning
                        block-sidenav
                      ">
                      Block Sidebar
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="form-group">
                    <h4 class="card-title">Block Whole Page</h4>
                    <p class="card-subtitle mb-3">Block Whole Page</p>
                    <button class="
                        btn
                        d-block
                        w-100
                        fw-medium
                        bg-danger-subtle
                        text-danger
                        block-default
                      ">
                      Block Page
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="form-group">
                    <h4 class="card-title">Block Without Message</h4>
                    <p class="card-subtitle mb-3">Block Wihtout Message.</p>
                    <button class="
                        btn
                        d-block
                        w-100
                        fw-medium
                        bg-info-subtle
                        text-info
                        without-msg
                      ">
                      Block Wihtout Message
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="form-group">
                    <h4 class="card-title">Block Without Overlay</h4>
                    <p class="card-subtitle mb-3">Block Without Overlay.</p>
                    <button class="
                        btn
                        d-block
                        w-100
                        fw-medium
                        bg-warning-subtle
                        text-warning
                        without-overlay
                      ">
                      Block Without Overlay
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="form-group">
                    <h4 class="card-title">Click Overlay To Unblock</h4>
                    <p class="card-subtitle mb-3">Click Overlay To Unblock</p>
                    <button class="
                        btn
                        d-block
                        w-100
                        fw-medium
                        bg-danger-subtle
                        text-danger
                        overlay-unblock
                      ">
                      Click Overlay To Unblock
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="form-group">
                    <h4 class="card-title">Growl Notification</h4>
                    <p class="card-subtitle mb-3">Growl Notification.</p>
                    <button class="
                        btn
                        d-block
                        w-100
                        fw-medium
                        bg-success-subtle
                        text-success
                        growl
                      ">
                      Growl Notification
                    </button>
                    <div class="growl-notification-example">
                      Growl Notification Example
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="form-group">
                    <h4 class="card-title">OnBlock Callback</h4>
                    <p class="card-subtitle mb-3">OnBlock Callback</p>
                    <button class="
                        btn
                        d-block
                        w-100
                        fw-medium
                        bg-success-subtle
                        text-success
                        onblock
                      ">
                      OnBlock
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="form-group">
                    <h4 class="card-title">OnUnblock Callback</h4>
                    <p class="card-subtitle mb-3">
                      useful when using fadeOut option as it is invoked when all
                      the blocking elements have been removed.
                    </p>
                    <button class="
                        btn
                        d-block
                        w-100
                        fw-medium
                        bg-warning-subtle
                        text-warning
                        onunblock
                      ">
                      OnUnblock
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="form-group">
                    <h4 class="card-title">OnOverlay Click Callback</h4>
                    <p class="card-subtitle mb-3">OnOverlay Click Callback.</p>
                    <button class="
                        btn
                        d-block
                        w-100
                        fw-medium
                        bg-danger-subtle
                        text-danger
                        onoverlay-click
                      ">
                      OnOverlay Click
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  <script src="{{ URL::asset('build/libs/block-ui/jquery.blockUI.js') }}"></script>
  <script src="{{ URL::asset('build/js/plugins/block-ui.js') }}"></script>
@endsection

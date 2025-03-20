@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Tooltips', 'subtitle' => 'Home'])
          <div class="row">
            <div class="col-12">
              <!-- ------------------------------------------------ -->
              <!-- 1. Tooltip -->
              <!-- ------------------------------------------------ -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Tooltips Position</h4>
                  <p class="mb-3 card-subtitle">
                    Just put this to any tag
                    <mark><code>data-bs-toggle="tooltip" title="Default
                        tooltip"</code></mark>
                  </p>
                  <div class="d-md-flex align-items-center button-group">
                    <button type="button" class="me-2 btn bg-info-subtle text-info " data-bs-toggle="tooltip"
                      data-bs-placement="top" title="Tooltip on top">
                      Tooltip on top
                    </button>
                    <button type="button" class="me-2 btn bg-primary-subtle text-primary " data-bs-toggle="tooltip"
                      data-bs-placement="right" title="Tooltip on right">
                      Tooltip on right
                    </button>
                    <button type="button" class="me-2 btn bg-success-subtle text-success " data-bs-toggle="tooltip"
                      data-bs-placement="bottom" title="Tooltip on bottom">
                      Tooltip on bottom
                    </button>
                    <button type="button" class="me-2 btn bg-danger-subtle text-danger " data-bs-toggle="tooltip"
                      data-bs-placement="left" title="Tooltip on left">
                      Tooltip on left
                    </button>
                  </div>
                </div>
              </div>

              <!-- ------------------------------------------------ -->
              <!-- 2. Popovers -->
              <!-- ------------------------------------------------ -->

              <div class="card">
                <div class="card-body">
                  <div class="mb-2">
                    <h4 class="card-title mb-0">Popover Directions</h4>
                  </div>
                  <p class="mb-3 card-subtitle">
                    Just put this to any tag
                    <mark><code>data-container="body" title="Popover title"
                        data-bs-toggle="popover" data-bs-placement="top"
                        data-content="..."</code></mark>
                  </p>
                  <div class="d-md-flex align-items-center button-group">
                    <button type="button" class="me-2 btn bg-info-subtle text-info d-flex align-items-center "
                      data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                      data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                      <i class="ti ti-chevron-up fs-4"></i>
                      Popover on top
                    </button>

                    <button type="button" class="me-2 btn bg-primary-subtle text-primary d-flex align-items-center "
                      data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right"
                      data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                      <i class="ti ti-chevron-right fs-4"></i>
                      Popover on right
                    </button>

                    <button type="button" class="me-2 btn bg-success-subtle text-success d-flex align-items-center "
                      data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom"
                      data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                      <i class="ti ti-chevron-down fs-4"></i>
                      Popover on bottom
                    </button>

                    <button type="button" class="me-2 btn bg-danger-subtle text-danger d-flex align-items-center "
                      data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                      data-bs-content="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
                      <i class="ti ti-chevron-left fs-4"></i>
                      Popover on left
                    </button>
                  </div>
                </div>
              </div>

            </div>
            <div class="col-lg-6">
              <!-- ------------------------------------------------ -->
              <!-- 3. Dismiss on next click -->
              <!-- ------------------------------------------------ -->

              <div class="card">
                <div class="card-body">
                  <div class="mb-3">
                    <h5 class="mb-0">Popover Dismiss on next click</h5>
                  </div>
                  <a tabindex="0" class="btn bg-danger-subtle d-inline-flex align-items-center text-danger "
                    role="button" data-bs-toggle="popover" data-bs-trigger="focus" title="Dismissible popover"
                    data-bs-content="And here's some amazing content. It's very engaging. Right?"><i
                      class="ti ti-alert-octagon me-2 fs-4"></i>Dismissible popover</a>
                </div>
              </div>

            </div>
            <div class="col-lg-6">
              <!-- ------------------------------------------------ -->
              <!-- 4. Disabled elements -->
              <!-- ------------------------------------------------ -->

              <div class="card">
                <div class="card-body">
                  <div class="mb-3">
                    <h5 class="mb-0">Disabled elements</h5>
                  </div>
                  <span class="d-inline-block" data-bs-toggle="popover" data-bs-content="Disabled popover">
                    <button class="btn bg-primary-subtle text-primary  d-inline-flex align-items-center"
                      style="pointer-events: none" type="button" disabled>
                      <i class="ti ti-clock-hour-4 me-2 fs-4"></i>Disabled button
                    </button>
                  </span>
                </div>
              </div>

            </div>
          </div>
@endsection

@section('scripts')
@endsection

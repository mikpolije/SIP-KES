@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Pricing', 'subtitle' => 'Home'])
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <h2 class="fw-bolder mb-0 fs-8 lh-base">Flexible Plans Tailored to Fit Your Community's Unique Needs!</h2>
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-center my-7">
            <span class="text-dark fw-bolder text-capitalize me-3">Monthly</span>
            <div class="form-check form-switch mb-0">
              <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckChecked" checked>
            </div>
            <span class="text-dark fw-bolder text-capitalize ms-2">Yearly</span>
          </div>
          <div class="row">
            <div class="col-sm-6 col-lg-4">
              <div class="card">
                <div class="card-body">
                  <span class="fw-bolder text-uppercase fs-2 d-block mb-7">Silver</span>
                  <div class="my-4">
                    <img src="{{ URL::asset('build/images/backgrounds/silver.png') }}" alt="modernize-img" class="img-fluid" width="80"
                      height="80">
                  </div>
                  <h2 class="fw-bolder fs-12 mb-3">Free</h2>
                  <ul class="list-unstyled mb-7">
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-check text-primary fs-4"></i>
                      <span class="text-dark">3 Members</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-check text-primary fs-4"></i>
                      <span class="text-dark">Single Devise</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-x text-muted fs-4"></i>
                      <span class="text-muted">50GB Storage</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-x text-muted fs-4"></i>
                      <span class="text-muted">Monthly Backups</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-x text-muted fs-4"></i>
                      <span class="text-muted">Permissions & workflows</span>
                    </li>
                  </ul>
                  <button class="btn btn-primary fw-bolder py-6 w-100 text-capitalize">Choose Silver</button>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="card">
                <div class="card-body pt-6">
                  <div class="text-end">
                    <span
                      class="badge fw-bolder py-1 bg-warning-subtle text-warning text-uppercase fs-2 rounded-3">POPULAR</span>
                  </div>
                  <span class="fw-bolder text-uppercase fs-2 d-block mb-7">bronze</span>
                  <div class="my-4">
                    <img src="{{ URL::asset('build/images/backgrounds/bronze.png') }}" alt="modernize-img" class="img-fluid" width="80"
                      height="80">
                  </div>
                  <div class="d-flex mb-3">
                    <h5 class="fw-bolder fs-6 mb-0">$</h5>
                    <h2 class="fw-bolder fs-12 ms-2 mb-0">4.99</h2>
                    <span class="ms-2 fs-4 d-flex align-items-center">/mo</span>
                  </div>
                  <ul class="list-unstyled mb-7">
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-check text-primary fs-4"></i>
                      <span class="text-dark">5 Members</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-check text-primary fs-4"></i>
                      <span class="text-dark">Single Devise</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-check text-primary fs-4"></i>
                      <span class="text-dark">80GB Storage</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-x text-muted fs-4"></i>
                      <span class="text-muted">Monthly Backups</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-x text-muted fs-4"></i>
                      <span class="text-muted">Permissions & workflows</span>
                    </li>
                  </ul>
                  <button class="btn btn-primary fw-bolder py-6 w-100 text-capitalize">choose bronze</button>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="card">
                <div class="card-body">
                  <span class="fw-bolder text-uppercase fs-2 d-block mb-7">gold</span>
                  <div class="my-4">
                    <img src="{{ URL::asset('build/images/backgrounds/gold.png') }}" alt="modernize-img" class="img-fluid" width="80"
                      height="80">
                  </div>
                  <div class="d-flex mb-3">
                    <h5 class="fw-bolder fs-6 mb-0">$</h5>
                    <h2 class="fw-bolder fs-12 ms-2 mb-0">9.99</h2>
                    <span class="ms-2 fs-4 d-flex align-items-center">/mo</span>
                  </div>
                  <ul class="list-unstyled mb-7">
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-check text-primary fs-4"></i>
                      <span class="text-dark">5 Members</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-check text-primary fs-4"></i>
                      <span class="text-dark">Single Devise</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-check text-primary fs-4"></i>
                      <span class="text-dark">120GB Storage</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-check text-primary fs-4"></i>
                      <span class="text-dark">Monthly Backups</span>
                    </li>
                    <li class="d-flex align-items-center gap-2 py-2">
                      <i class="ti ti-check text-primary fs-4"></i>
                      <span class="text-dark">Permissions & workflows</span>
                    </li>
                  </ul>
                  <button class="btn btn-primary fw-bolder py-6 w-100 text-capitalize">choose gold</button>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
@endsection

@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Form Switch', 'subtitle' => 'Home'])
          <div class="row">
            <div class="col-lg-12">
              <!-- start Bootstrap Switch -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Bootstrap Switch</h4>

                  <div class="form-check form-switch py-2">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" />
                    <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                  </div>
                  <div class="form-check form-switch py-2">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked />
                    <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label>
                  </div>
                  <div class="form-check form-switch py-2">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckDisabled" disabled />
                    <label class="form-check-label" for="flexSwitchCheckDisabled">Disabled switch checkbox input</label>
                  </div>
                  <div class="form-check form-switch py-2">
                    <input class="form-check-input" type="checkbox" id="flexSwitchCheckCheckedDisabled" checked
                      disabled />
                    <label class="form-check-label" for="flexSwitchCheckCheckedDisabled">Disabled checked switch
                      checkbox input</label>
                  </div>
                </div>
              </div>
              <!-- end Bootstrap Switch -->
            </div>
            <div class="col-lg-12">
              <!-- start Bootstrap Switch -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Color Variation</h4>

                  <div class="d-flex flex-wrap gap-6">
                    <div class="form-check form-switch">
                      <input class="form-check-input" type="checkbox" id="color-primary" checked />
                      <label class="form-check-label" for="color-primary">Primary</label>
                    </div>

                    <div class="form-check form-switch">
                      <input class="form-check-input secondary" type="checkbox" id="color-secondary" checked />
                      <label class="form-check-label" for="color-secondary">Secondary</label>
                    </div>

                    <div class="form-check form-switch">
                      <input class="form-check-input danger" type="checkbox" id="color-danger" checked />
                      <label class="form-check-label" for="color-danger">Danger</label>
                    </div>

                    <div class="form-check form-switch">
                      <input class="form-check-input success" type="checkbox" id="color-success" checked />
                      <label class="form-check-label" for="color-success">Success</label>
                    </div>

                    <div class="form-check form-switch">
                      <input class="form-check-input warning" type="checkbox" id="color-warning" checked />
                      <label class="form-check-label" for="color-warning">Warning</label>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end Bootstrap Switch -->
            </div>
          </div>
@endsection

@section('scripts')
@endsection
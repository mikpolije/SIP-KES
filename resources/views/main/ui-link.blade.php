@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Link', 'subtitle' => 'Home'])
          <div class="row">
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="mb-3 card-title">Link opacity</h4>
                  <p><a class="link-opacity-10 text-decoration-underline" href="javascript:void(0)">Link opacity 10</a></p>
                  <p><a class="link-opacity-25 text-decoration-underline" href="javascript:void(0)">Link opacity 25</a></p>
                  <p><a class="link-opacity-50 text-decoration-underline" href="javascript:void(0)">Link opacity 50</a></p>
                  <p><a class="link-opacity-75 text-decoration-underline" href="javascript:void(0)">Link opacity 75</a></p>
                  <p><a class="link-opacity-100 text-decoration-underline" href="javascript:void(0)">Link opacity 100</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="mb-3 card-title">Link Hover</h4>
                  <p><a class="link-opacity-10-hover text-decoration-underline" href="javascript:void(0)">Link hover opacity 10</a></p>
                  <p><a class="link-opacity-25-hover text-decoration-underline" href="javascript:void(0)">Link hover opacity 25</a></p>
                  <p><a class="link-opacity-50-hover text-decoration-underline" href="javascript:void(0)">Link hover opacity 50</a></p>
                  <p><a class="link-opacity-75-hover text-decoration-underline" href="javascript:void(0)">Link hover opacity 75</a></p>
                  <p><a class="link-opacity-100-hover text-decoration-underline" href="javascript:void(0)">Link hover opacity 100</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="mb-3 card-title">Underline color</h4>
                  <p><a href="javascript:void(0)" class="link-underline-primary text-decoration-underline">Primary underline</a></p>
                  <p><a href="javascript:void(0)" class="link-underline-secondary text-decoration-underline">Secondary underline</a></p>
                  <p><a href="javascript:void(0)" class="link-underline-success text-decoration-underline">Success underline</a></p>
                  <p><a href="javascript:void(0)" class="link-underline-danger text-decoration-underline">Danger underline</a></p>
                  <p><a href="javascript:void(0)" class="link-underline-warning text-decoration-underline">Warning underline</a></p>
                  <p><a href="javascript:void(0)" class="link-underline-info text-decoration-underline">Info underline</a></p>
                  <p><a href="javascript:void(0)" class="link-underline-light text-decoration-underline">Light underline</a></p>
                  <p><a href="javascript:void(0)" class="link-underline-dark text-decoration-underline">Dark underline</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="mb-3 card-title">Underline offset</h4>
                  <p><a href="javascript:void(0)">Default link</a></p>
                  <p><a class="link-offset-1 text-decoration-underline" href="javascript:void(0)">Offset 1 link</a></p>
                  <p><a class="link-offset-2 text-decoration-underline" href="javascript:void(0)">Offset 2 link</a></p>
                  <p><a class="link-offset-3 text-decoration-underline" href="javascript:void(0)">Offset 3 link</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="mb-3 card-title">Underline opacity</h4>
                  <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-0"
                      href="javascript:void(0)">Underline opacity 0</a></p>
                  <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-10"
                      href="javascript:void(0)">Underline opacity 10</a></p>
                  <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-25"
                      href="javascript:void(0)">Underline opacity 25</a></p>
                  <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-50"
                      href="javascript:void(0)">Underline opacity 50</a></p>
                  <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-75"
                      href="javascript:void(0)">Underline opacity 75</a></p>
                  <p><a class="link-offset-2 text-decoration-underline link-underline link-underline-opacity-100"
                      href="javascript:void(0)">Underline opacity 100</a></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="mb-3 card-title">Hover variants</h4>
                  <a class="link-offset-2 link-offset-3-hover link-underline link-underline-opacity-0 link-underline-opacity-75-hover"
                    href="javascript:void(0)">
                    Underline opacity 0
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="mb-3 card-title">Colored links</h4>
                  <p><a href="javascript:void(0)"
                      class="link-primary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Primary
                      link</a></p>
                  <p><a href="javascript:void(0)"
                      class="link-secondary link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Secondary
                      link</a></p>
                  <p><a href="javascript:void(0)"
                      class="link-success link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Success
                      link</a></p>
                  <p><a href="javascript:void(0)"
                      class="link-danger link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Danger
                      link</a></p>
                  <p><a href="javascript:void(0)"
                      class="link-warning link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Warning
                      link</a></p>
                  <p><a href="javascript:void(0)"
                      class="link-info link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Info
                      link</a></p>
                  <p><a href="javascript:void(0)"
                      class="link-light link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Light
                      link</a></p>
                  <p><a href="javascript:void(0)"
                      class="link-dark link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-100-hover">Dark
                      link</a></p>
                  <p><a href="javascript:void(0)"
                      class="link-body-emphasis link-offset-2 text-decoration-underline link-underline-opacity-25 link-underline-opacity-75-hover">Emphasis
                      link</a></p>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
@endsection

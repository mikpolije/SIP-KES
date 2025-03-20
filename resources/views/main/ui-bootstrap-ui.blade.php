@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Bootstrap UI', 'subtitle' => 'Home'])
          <div class="row">
            <!-- ------------------------------------- -->
            <!-- 1. Image rounded -->
            <!-- ------------------------------------- -->
            <div class="col-lg-4">
              <!-- start Image with round corner -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Image with round corner</h4>
                  <p class="mb-3 card-subtitle">
                    Use Class for rounded image<mark><code>.rounded</code></mark>
                  </p>
                  <div class="text-center">
                    <img src="{{ URL::asset('build/images/products/s7.jpg') }}" alt="image" class="rounded" width="200" />
                  </div>
                </div>
              </div>
              <!-- end Image with round corner -->
            </div>
            <!-- ------------------------------------- -->
            <!-- 2. Image Circle -->
            <!-- ------------------------------------- -->
            <div class="col-lg-4">
              <!-- start Image with Circle -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Image with Circle</h4>
                  <p class="mb-3 card-subtitle">
                    Use Class for rounded image<mark><code>.rounded-circle</code></mark>
                  </p>
                  <div class="text-center">
                    <img src="{{ URL::asset('build/images/products/s7.jpg') }}" alt="image" class="rounded-circle" width="200" />
                  </div>
                </div>
              </div>
              <!-- end Image with Circle -->
            </div>
            <!-- ------------------------------------- -->
            <!-- 3. Image Thumbnail -->
            <!-- ------------------------------------- -->
            <div class="col-lg-4">
              <!-- start Image Thumbnail -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Image Thumbnail</h4>
                  <p class="mb-3 card-subtitle">
                    Use Class for thumbnail image<mark><code>.img-thumbnail</code></mark>
                  </p>
                  <div class="text-center">
                    <img src="{{ URL::asset('build/images/products/s7.jpg') }}" alt="image" class="img-thumbnail" width="200" />
                  </div>
                </div>
              </div>
              <!-- end Image Thumbnail -->
            </div>
          </div>
@endsection

@section('scripts')
@endsection
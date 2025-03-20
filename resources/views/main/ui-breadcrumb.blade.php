@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Breadcrumb', 'subtitle' => 'Home'])
          <div class="row">
            <!-- ----------------------------------------- -->
            <!-- 1. Default Breadcrumb -->
            <!-- ----------------------------------------- -->
            <div class="col-lg-6">
              <!--  start Default Breadcrumb -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Default Breadcrumb</h4>
                  <nav class="py-2" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item active" aria-current="page">
                        Home
                      </li>
                    </ol>
                  </nav>

                  <nav class="py-2" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Library
                      </li>
                    </ol>
                  </nav>

                  <nav class="py-2" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Library</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!--  end Default Breadcrumb -->
            </div>
            <!-- ----------------------------------------- -->
            <!-- 2. Custom Dividers -->
            <!-- ----------------------------------------- -->
            <div class="col-lg-6">
              <!--  start Custom Dividers -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-4">Custom Dividers</h4>
                  <nav class="py-2" style="--bs-breadcrumb-divider: '>'" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Library
                      </li>
                    </ol>
                  </nav>
                  <nav class="py-2" style="--bs-breadcrumb-divider: ':'" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Library
                      </li>
                    </ol>
                  </nav>
                  <nav class="py-2" style="--bs-breadcrumb-divider: '-'" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                        Library
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!--  end Custom Dividers -->
            </div>
            <!-- ----------------------------------------- -->
            <!-- 3. Colored Breadcrumb -->
            <!-- ----------------------------------------- -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <!--  start Colored Breadcrumb -->
              <div class="card w-100">
                <div class="card-body">
                  <h5 class="card-title mb-3">Colored Breadcrumb</h5>
                  <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb bg-info-subtle px-3 py-2 rounded">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-info d-flex align-items-center"><i class="ti ti-home fs-4 mt-1"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-info">Library</a>
                      </li>
                      <li class="breadcrumb-item active text-info " aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>

                  <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb bg-primary-subtle px-3 py-2 rounded">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-primary d-flex align-items-center"><i
                            class="ti ti-home fs-4 mt-1"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-primary">Library</a>
                      </li>
                      <li class="breadcrumb-item active text-primary " aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>
                  <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb bg-warning-subtle px-3 py-2 rounded">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-warning d-flex align-items-center"><i
                            class="ti ti-home fs-4 mt-1"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-warning">Library</a>
                      </li>
                      <li class="breadcrumb-item active text-warning " aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>
                  <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb bg-danger-subtle px-3 py-2 rounded">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-danger d-flex align-items-center"><i
                            class="ti ti-home fs-4 mt-1"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-danger">Library</a>
                      </li>
                      <li class="breadcrumb-item active text-danger " aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>
                  <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb bg-success-subtle px-3 py-2 rounded">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-success d-flex align-items-center"><i
                            class="ti ti-home fs-4 mt-1"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-success">Library</a>
                      </li>
                      <li class="breadcrumb-item active text-success " aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!--  end Colored Breadcrumb -->
            </div>
            <!-- ----------------------------------------- -->
            <!-- 4. Colored Border Breadcrumb -->
            <!-- ----------------------------------------- -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <!--  start Colored Border Breadcrumb -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Colored Border Breadcrumb</h4>
                  <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb border border-info px-3 py-2 rounded">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-info d-flex align-items-center"><i class="ti ti-home fs-4 mt-1"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-info">Library</a>
                      </li>
                      <li class="breadcrumb-item active text-info " aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>
                  <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb border border-primary px-3 py-2 rounded">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-primary d-flex align-items-center"><i
                            class="ti ti-home fs-4 mt-1"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-primary">Library</a>
                      </li>
                      <li class="breadcrumb-item active text-primary " aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>
                  <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb border border-warning px-3 py-2 rounded">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-warning d-flex align-items-center"><i
                            class="ti ti-home fs-4 mt-1"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-warning">Library</a>
                      </li>
                      <li class="breadcrumb-item active text-warning " aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>
                  <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb border border-danger px-3 py-2 rounded">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-danger d-flex align-items-center"><i
                            class="ti ti-home fs-4 mt-1"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-danger">Library</a>
                      </li>
                      <li class="breadcrumb-item active text-danger " aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>
                  <nav aria-label="breadcrumb" class="mb-3">
                    <ol class="breadcrumb border border-success px-3 py-2 rounded">
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-success d-flex align-items-center"><i
                            class="ti ti-home fs-4 mt-1"></i></a>
                      </li>
                      <li class="breadcrumb-item">
                        <a href="javascript:void(0)" class="text-success">Library</a>
                      </li>
                      <li class="breadcrumb-item active text-success " aria-current="page">
                        Data
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!--  end Colored Border Breadcrumb -->
            </div>
          </div>
@endsection

@section('scripts')
@endsection
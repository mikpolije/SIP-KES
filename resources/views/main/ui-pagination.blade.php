@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Pagination', 'subtitle' => 'Home'])
          <div class="row">
            <!-- ------------------------------------------------ -->
            <!-- 1. Default Pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-4 d-flex align-items-stretch">
              <!--  start Default Pagination -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Default Pagination</h4>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">Previous</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!--  end Default Pagination -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 2. Pagination with Icon -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-4 d-flex align-items-stretch">
              <!--  start Pagination with Icon -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">Pagination with Icon</h4>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination">
                      <li class="page-item">
                        <a class="page-link link" href="javascript:void(0)" aria-label="Previous">
                          <span aria-hidden="true">
                            <i class="ti ti-chevrons-left fs-4"></i>
                          </span>
                        </a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="javascript:void(0)">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="javascript:void(0)">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="javascript:void(0)">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link link" href="javascript:void(0)" aria-label="Next">
                          <span aria-hidden="true">
                            <i class="ti ti-chevrons-right fs-4"></i>
                          </span>
                        </a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!--  end Pagination with Icon -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 3. Pagination with Active and Disabled States -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-4 d-flex align-items-stretch">
              <!--  start Pagination with Active and Disabled States -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title mb-3">
                    Pagination with Active and Disabled States
                  </h4>
                  <nav aria-label="...">
                    <ul class="pagination">
                      <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">1</a>
                      </li>
                      <li class="page-item active" aria-current="page">
                        <a class="page-link" href="javascript:void(0)">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!--  end Pagination with Active and Disabled States -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 4. Large Pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <!--  start Large Pagination -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Large Pagination</h4>
                  <p class="mb-3 card-subtitle">
                    Fancy larger or smaller pagination? Add
                    <mark><code>.pagination-lg</code></mark> or
                    <mark><code>.pagination-sm</code></mark> for additional
                    sizes.
                  </p>
                  <nav aria-label="...">
                    <ul class="pagination pagination-lg">
                      <li class="page-item active" aria-current="page">
                        <span class="page-link">1</span>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!--  end Large Pagination -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 5. Small Pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <!--  start Small Pagination -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Small Pagination</h4>
                  <p class="mb-3 card-subtitle">
                    Fancy larger or smaller pagination? Add
                    <mark><code>.pagination-lg</code></mark> or
                    <mark><code>.pagination-sm</code></mark> for additional
                    sizes.
                  </p>
                  <nav aria-label="...">
                    <ul class="pagination pagination-sm">
                      <li class="page-item active" aria-current="page">
                        <span class="page-link">1</span>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!--  end Small Pagination -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 6. Center Alignment Pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <!--  start Center Alignment Pagination -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Center Alignment Pagination</h4>
                  <p class="mb-3 card-subtitle">
                    Change the alignment of pagination components with flexbox
                    utilities.
                  </p>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                      <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!--  end Center Alignment Pagination -->
            </div>
            <!-- ------------------------------------------------ -->
            <!-- 6. Right Alignment Pagination -->
            <!-- ------------------------------------------------ -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <!--  start Right Alignment Pagination -->
              <div class="card w-100">
                <div class="card-body">
                  <h4 class="card-title">Right Alignment Pagination</h4>
                  <p class="mb-3 card-subtitle">
                    Change the alignment of pagination components with flexbox
                    utilities.
                  </p>
                  <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-end">
                      <li class="page-item disabled">
                        <a class="page-link" href="javascript:void(0)" tabindex="-1" aria-disabled="true">Previous</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">1</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">2</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">3</a>
                      </li>
                      <li class="page-item">
                        <a class="page-link" href="javascript:void(0)">Next</a>
                      </li>
                    </ul>
                  </nav>
                </div>
              </div>
              <!--  end Right Alignment Pagination -->
            </div>
          </div>
@endsection

@section('scripts')
@endsection

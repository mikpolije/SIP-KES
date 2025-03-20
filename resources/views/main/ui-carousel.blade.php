@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Carousel', 'subtitle' => 'Home'])
          <div class="row">
            <!-- ------------------------------------------ -->
            <!-- 1. Slides only -->
            <!-- ------------------------------------------ -->
            <div class="col-lg-6">
              <!-- start Slides only -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Slides only</h4>
                  <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img3.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- end Slides only -->
            </div>
            <!-- ------------------------------------------ -->
            <!-- 2. With controls -->
            <!-- ------------------------------------------ -->
            <div class="col-lg-6">
              <!-- start With controls -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">With controls</h4>
                  <div id="carouselExampleControls" class="carousel slide carousel-dark" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img3.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </a>
                  </div>
                </div>
              </div>
              <!-- end With controls -->
            </div>
            <!-- ------------------------------------------ -->
            <!-- 3. With indicators -->
            <!-- ------------------------------------------ -->
            <div class="col-lg-6">
              <!-- start With indicators -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">With indicators</h4>
                  <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                      <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                      <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img3.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button"
                      data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button"
                      data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </a>
                  </div>
                </div>
              </div>
              <!-- end With indicators -->
            </div>
            <!-- ------------------------------------------ -->
            <!-- 4. With captions -->
            <!-- ------------------------------------------ -->
            <div class="col-lg-6">
              <!-- start With captions -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">With captions</h4>
                  <div id="carouselExampleCaptions" class="carousel slide carousel-dark" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
                      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"></li>
                      <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}" class="d-block w-100" alt="modernize-img" />
                        <div class="carousel-caption d-none d-md-block">
                          <h5>First slide label</h5>
                          <p>
                            Nulla vitae elit libero, a pharetra augue mollis
                            interdum.
                          </p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Second slide label</h5>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit.
                          </p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img3.jpg') }}" class="d-block w-100" alt="modernize-img" />
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Third slide label</h5>
                          <p>
                            Praesent commodo cursus magna, vel scelerisque
                            nisl consectetur.
                          </p>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </a>
                  </div>
                </div>
              </div>
              <!-- end With captions -->
            </div>
            <!-- ------------------------------------------ -->
            <!-- 5. Crossfade -->
            <!-- ------------------------------------------ -->
            <div class="col-lg-6">
              <!-- start Crossfade -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Crossfade</h4>
                  <div id="carouselExampleFade" class="carousel slide carousel-fade carousel-dark"
                    data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img3.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </a>
                  </div>
                </div>
              </div>
              <!-- end Crossfade -->
            </div>
            <!-- ------------------------------------------ -->
            <!-- 6. Individual .carousel-item interval -->
            <!-- ------------------------------------------ -->
            <div class="col-lg-6">
              <!-- start Individual -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">
                    Individual
                    <mark><code>.carousel-item</code></mark> interval
                  </h4>
                  <div id="carouselExampleInterval" class="carousel slide carousel-dark" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="10000">
                        <img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img3.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleInterval" role="button" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleInterval" role="button" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </a>
                  </div>
                </div>
              </div>
              <!-- end Individual -->
            </div>
            <!-- ------------------------------------------ -->
            <!-- 7. Dark variant -->
            <!-- ------------------------------------------ -->
            <div class="col-lg-6">
              <!-- start Dark variant -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Dark variant</h4>
                  <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                    <ol class="carousel-indicators">
                      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"></li>
                      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="1"></li>
                      <li data-bs-target="#carouselExampleDark" data-bs-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                      <div class="carousel-item active" data-bs-interval="10000">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                        <div class="carousel-caption d-none d-md-block">
                          <h5>First slide label</h5>
                          <p>
                            Nulla vitae elit libero, a pharetra augue mollis
                            interdum.
                          </p>
                        </div>
                      </div>
                      <div class="carousel-item" data-bs-interval="2000">
                        <img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}" class="d-block w-100" alt="modernize-img" />
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Second slide label</h5>
                          <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing
                            elit.
                          </p>
                        </div>
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                        <div class="carousel-caption d-none d-md-block">
                          <h5>Third slide label</h5>
                          <p>
                            Praesent commodo cursus magna, vel scelerisque
                            nisl consectetur.
                          </p>
                        </div>
                      </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleDark" role="button" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleDark" role="button" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </a>
                  </div>
                </div>
              </div>
              <!-- end Dark variant -->
            </div>
            <div class="col-lg-6">
              <!-- start Disable touch swiping -->
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title mb-3">Disable touch swiping</h4>
                  <div id="carouselExampleControlsNoTouching" class="carousel carousel-dark slide" data-bs-touch="false"
                    data-bs-interval="false">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img1.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                      <div class="carousel-item">
                        <img src="{{ URL::asset('build/images/blog/blog-img2.jpg') }}" class="d-block w-100" alt="modernize-img" />
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button"
                      data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button"
                      data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                </div>
              </div>
              <!-- end Disable touch swiping -->
            </div>
          </div>
@endsection

@section('scripts')
@endsection

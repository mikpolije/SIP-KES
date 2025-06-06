@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Accordian', 'subtitle' => 'Home'])
          <div class="row">
            <!-- ---------------------------------------------- -->
            <!-- 1. Accordian -->
            <!-- ---------------------------------------------- -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="mb-4">
                    <h4 class="card-title mb-0">Accordian</h4>
                  </div>
                  <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Accordion Item #1
                        </button>
                      </h2>
                      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the first item's accordion body.</strong>
                          It is hidden by default, until the collapse plugin
                          adds the appropriate classes that we use to style
                          each element. These classes control the overall
                          appearance, as well as the showing and hiding via
                          CSS transitions. You can modify any of this with
                          custom CSS or overriding our default variables. It's
                          also worth noting that just about any HTML can go
                          within the
                          <code>.accordion-body</code>, though the transition
                          does limit overflow.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Accordion Item #2
                        </button>
                      </h2>
                      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the second item's accordion body.</strong>
                          It is hidden by default, until the collapse plugin
                          adds the appropriate classes that we use to style
                          each element. These classes control the overall
                          appearance, as well as the showing and hiding via
                          CSS transitions. You can modify any of this with
                          custom CSS or overriding our default variables. It's
                          also worth noting that just about any HTML can go
                          within the
                          <code>.accordion-body</code>, though the transition
                          does limit overflow.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                        data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                          <strong>This is the third item's accordion body.</strong>
                          It is hidden by default, until the collapse plugin
                          adds the appropriate classes that we use to style
                          each element. These classes control the overall
                          appearance, as well as the showing and hiding via
                          CSS transitions. You can modify any of this with
                          custom CSS or overriding our default variables. It's
                          also worth noting that just about any HTML can go
                          within the
                          <code>.accordion-body</code>, though the transition
                          does limit overflow.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ---------------------------------------------- -->
            <!-- 2. Accordian Flush -->
            <!-- ---------------------------------------------- -->
            <div class="col-lg-6 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="mb-4">
                    <h4 class="card-title mb-0">Accordian Flush</h4>
                  </div>
                  <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                          Accordion Item #1
                        </button>
                      </h2>
                      <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod
                          high life accusamus terry richardson ad squid. 3
                          wolf moon officia aute, non cupidatat skateboard
                          dolor brunch. Food truck quinoa nesciunt laborum
                          eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put
                          a bird on it squid single-origin coffee nulla
                          assumenda shoreditch et. Nihil anim keffiyeh
                          helvetica, craft beer labore wes anderson cred
                          nesciunt sapiente ea proident. Ad vegan excepteur
                          butcher vice lomo. Leggings occaecat craft beer
                          farm-to-table, raw denim aesthetic synth nesciunt
                          you probably haven't heard of them accusamus labore
                          sustainable VHS.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                          Accordion Item #2
                        </button>
                      </h2>
                      <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                        data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod
                          high life accusamus terry richardson ad squid. 3
                          wolf moon officia aute, non cupidatat skateboard
                          dolor brunch. Food truck quinoa nesciunt laborum
                          eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put
                          a bird on it squid single-origin coffee nulla
                          assumenda shoreditch et. Nihil anim keffiyeh
                          helvetica, craft beer labore wes anderson cred
                          nesciunt sapiente ea proident. Ad vegan excepteur
                          butcher vice lomo. Leggings occaecat craft beer
                          farm-to-table, raw denim aesthetic synth nesciunt
                          you probably haven't heard of them accusamus labore
                          sustainable VHS.
                        </div>
                      </div>
                    </div>
                    <div class="accordion-item">
                      <h2 class="accordion-header" id="flush-headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                          data-bs-target="#flush-collapseThree" aria-expanded="false"
                          aria-controls="flush-collapseThree">
                          Accordion Item #3
                        </button>
                      </h2>
                      <div id="flush-collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod
                          high life accusamus terry richardson ad squid. 3
                          wolf moon officia aute, non cupidatat skateboard
                          dolor brunch. Food truck quinoa nesciunt laborum
                          eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put
                          a bird on it squid single-origin coffee nulla
                          assumenda shoreditch et. Nihil anim keffiyeh
                          helvetica, craft beer labore wes anderson cred
                          nesciunt sapiente ea proident. Ad vegan excepteur
                          butcher vice lomo. Leggings occaecat craft beer
                          farm-to-table, raw denim aesthetic synth nesciunt
                          you probably haven't heard of them accusamus labore
                          sustainable VHS.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ---------------------------------------------- -->
            <!-- 3. Collapse -->
            <!-- ---------------------------------------------- -->
            <div class="col-lg-5 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="mb-4">
                    <h4 class="card-title mb-0">Collapse</h4>
                  </div>
                  <p class="button-group">
                    <a class="btn bg-info-subtle mb-2  text-info" data-bs-toggle="collapse"
                      href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                      Link with href
                    </a>
                    <button class="btn bg-warning-subtle  text-warning" type="button"
                      data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false"
                      aria-controls="collapseExample">
                      Button with data-bs-target
                    </button>
                  </p>
                  <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high
                      life accusamus terry richardson ad squid. Nihil anim
                      keffiyeh helvetica, craft beer labore wes anderson cred
                      nesciunt sapiente ea proident.
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- ---------------------------------------------- -->
            <!-- 4. Collapse with multiple targets -->
            <!-- ---------------------------------------------- -->
            <div class="col-lg-7 d-flex align-items-stretch">
              <div class="card w-100">
                <div class="card-body">
                  <div class="mb-4">
                    <h4 class="card-title mb-0">Collapse with multiple targets</h4>
                  </div>
                  <div class="button-group">
                    <a class="btn bg-primary-subtle mb-2 text-primary "
                      data-bs-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false"
                      aria-controls="multiCollapseExample1">Toggle 1st obejct</a>
                    <button class="btn bg-success-subtle mb-2 text-success " type="button"
                      data-bs-toggle="collapse" data-bs-target="#multiCollapseExample2" aria-expanded="false"
                      aria-controls="multiCollapseExample2">
                      Toggle 2nd obejct
                    </button>
                    <button class="btn bg-danger-subtle mb-2 text-danger " type="button"
                      data-bs-toggle="collapse" data-bs-target=".multi-collapse" aria-expanded="false"
                      aria-controls="multiCollapseExample1 multiCollapseExample2">
                      Toggle both elements
                    </button>
                  </div>
                  <div class="row">
                    <div class="col">
                      <div class="collapse multi-collapse" id="multiCollapseExample1">
                        <div class="card card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod
                          high life accusamus terry richardson ad squid. Nihil
                          anim keffiyeh helvetica, craft beer labore wes
                          anderson cred nesciunt sapiente ea proident.
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class="collapse multi-collapse" id="multiCollapseExample2">
                        <div class="card card-body">
                          Anim pariatur cliche reprehenderit, enim eiusmod
                          high life accusamus terry richardson ad squid. Nihil
                          anim keffiyeh helvetica, craft beer labore wes
                          anderson cred nesciunt sapiente ea proident.
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection

@section('scripts')
@endsection
@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Floating-Input', 'subtitle' => 'Home'])
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                Animated Line Inputs Form With Floating Labels
              </h4>
              <p class="card-subtitle">
                Just add <code>floating-labels</code> class to the form.
              </p>
              <form class="floating-labels mt-4 pt-2">
                <div class="form-group mb-4">
                  <input type="text" class="form-control" id="input1">
                  <span class="bar"></span>
                  <label for="input1">Regular Input</label>
                </div>
                <div class="form-group mb-4">
                  <input type="password" class="form-control" id="input2">
                  <span class="bar"></span>
                  <label for="input2">Password</label>
                </div>
                <div class="form-group mb-4">
                  <input type="text" class="form-control" id="input3">
                  <span class="bar"></span>
                  <label for="input3">Placeholder</label>
                </div>
                <div class="form-group mb-4">
                  <input type="text" class="form-control" id="input4">
                  <span class="bar"></span>
                  <label for="input4">Helping text</label>
                  <span class="help-block"><small>A block of help text that breaks onto a new line and may extend
                      beyond one line.</small></span>
                </div>
                <div class="form-group mb-4">
                  <input type="text" class="form-control" id="input5" data-toggle="tooltip" data-placement="bottom"
                    title="input with tooltip!!">
                  <span class="bar"></span>
                  <label for="input5">Input with tooltip</label>
                </div>
                <div class="form-group mb-4">
                  <select class="form-control form-select" id="input6">
                    <option></option>
                    <option>Male</option>
                    <option>Female</option>
                  </select><span class="bar"></span>
                  <label for="input6">Gender</label>
                </div>
                <div class="form-group mb-4">
                  <textarea class="form-control" rows="4" id="input7"></textarea>
                  <span class="bar"></span>
                  <label for="input7">Text area</label>
                </div>
              </form>
            </div>
          </div>
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">
                Animated Line Inputs Form With Floating Labels
              </h4>
              <p class="card-subtitle">
                Just add <code>floating-labels</code> class to the form and
                <code>has-warning, has-success, has-danger & has-error</code>
                for various inputs. For input with icon add
                <code>has-feedback</code> class.
              </p>
              <form class="floating-labels mt-4">
                <div class="form-group mb-4">
                  <input type="text" class="form-control input-lg" id="input8" /><span class="bar"></span>
                  <label for="input8">Large Input</label>
                </div>
                <div class="form-group mb-4">
                  <input type="text" class="form-control input-sm" id="input9" /><span class="bar"></span>
                  <label for="input9">Small Input</label>
                </div>
                <div class="form-group has-warning mb-4">
                  <input type="text" class="form-control" id="input10" /><span class="bar"></span>
                  <label for="input10">Warning State</label>
                </div>
                <div class="form-group has-success mb-4">
                  <input type="text" class="form-control" id="input11" /><span class="bar"></span>
                  <label for="input11">Success State</label>
                </div>
                <div class="form-group has-error has-danger mb-4">
                  <input type="text" class="form-control" id="input12" /><span class="bar"></span>
                  <label for="input12">Error State</label>
                </div>
                <div class="form-group has-warning has-feedback mb-4">
                  <input type="text" class="form-control form-control-warning" id="input13" /><span
                    class="bar"></span>
                  <label for="input13">Warning State With Feedback</label>
                </div>
                <div class="form-group has-success has-feedback mb-4">
                  <input type="text" class="form-control form-control-success" id="input14" /><span
                    class="bar"></span>
                  <label for="input14">Success State With Feedback</label>
                </div>
                <div class="form-group has-danger has-error has-feedback mb-1">
                  <input type="text" class="form-control form-control-danger" id="input15" /><span
                    class="bar"></span>
                  <label for="input15">Error State With Feedback</label>
                </div>
              </form>
            </div>
          </div>
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
  <script>
    $('.floating-labels .form-control').on('focus blur', function (e) {
      $(this).parents('.form-group').toggleClass('focused', (e.type === 'focus' || this.value.length > 0));
    }).trigger('blur');
  </script>
@endsection
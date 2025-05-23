@extends('layouts.master')

@section('title', 'Modernize Bootstrap Admin')

@section('css')
  <link rel="stylesheet" href="{{ URL::asset('build/libs/prismjs/themes/prism-okaidia.min.css') }}">
@endsection

@section('pageContent')

        @include('layouts.breadcrumb', ['title' => 'Table Dark', 'subtitle' => 'Home'])
          <!-- start Inverse Table -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-1 align-items-center">
                <h4 class="card-title mb-0">Inverse Table</h4>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary  btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code1-modal">
                    <i class="ti ti-code fs-5 d-flex"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code1-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Inverse Table - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                          <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-dark mb-0&quot;&gt;
    &lt;thead&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;First&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Last&lt;/th&gt;
            &lt;th scope=&quot;col&quot;&gt;Handle&lt;/th&gt;
        &lt;/tr&gt;
    &lt;/thead&gt;
    &lt;tbody&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
            &lt;td&gt;Mark&lt;/td&gt;
            &lt;td&gt;Otto&lt;/td&gt;
            &lt;td&gt;@mdo&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
            &lt;td&gt;Jacob&lt;/td&gt;
            &lt;td&gt;Thornton&lt;/td&gt;
            &lt;td&gt;@fat&lt;/td&gt;
        &lt;/tr&gt;
        &lt;tr&gt;
            &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
            &lt;td&gt;Larry&lt;/td&gt;
            &lt;td&gt;the Bird&lt;/td&gt;
            &lt;td&gt;@twitter&lt;/td&gt;
        &lt;/tr&gt;
    &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
</code>
</pre>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>
              <p class="card-subtitle mb-3">
                You can also invert the colors—with light text on dark
                backgrounds—with
                <code> .table-inverse</code>.
              </p>
              <div class="table-responsive border rounded-4" data-bs-theme="dark">
                <table class="table text-nowrap table-dark  mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>
                        <h6 class="fs-4 fw-semibold text-white mb-0">User</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold text-white mb-0">Project Name</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold text-white mb-0">Team</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold text-white mb-0">Status</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold text-white mb-0">Budget</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                            <span class="fw-normal">Web Designer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Elite Admin</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            S
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            D
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$3.9k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Arlene McCoy</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Real Homes WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            A
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-warning text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            X
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            N
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-warning-subtle text-warning">Pending</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$24.5k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Christopher Jamil</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">MedicalPro WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-primary-subtle text-primary">Completed</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$12.8k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Evelyn Pope</h6>
                            <span class="fw-normal">Frontend Engineer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            Y
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$2.4k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Micheal Doe</h6>
                            <span class="fw-normal">Content Writer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            S
                          </a>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-danger-subtle text-danger">Cancel</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$9.3k</h6>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end Inverse Table -->
          <!-- start Striped with Inverse Table -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-1 align-items-center">
                <div>
                  <h5 class="mb-0">Striped with Inverse Table</h5>
                </div>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code2-modal">
                    <i class="ti ti-code fs-5 d-flex"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code2-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Striped with Inverse Table - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                          <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-striped table-dark mb-0&quot;&gt;
  &lt;thead&gt;
      &lt;tr&gt;
          &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
          &lt;th scope=&quot;col&quot;&gt;First&lt;/th&gt;
          &lt;th scope=&quot;col&quot;&gt;Last&lt;/th&gt;
          &lt;th scope=&quot;col&quot;&gt;Handle&lt;/th&gt;
      &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
      &lt;tr&gt;
          &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
          &lt;td&gt;Mark&lt;/td&gt;
          &lt;td&gt;Otto&lt;/td&gt;
          &lt;td&gt;@mdo&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
          &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
          &lt;td&gt;Jacob&lt;/td&gt;
          &lt;td&gt;Thornton&lt;/td&gt;
          &lt;td&gt;@fat&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
          &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
          &lt;td&gt;Larry&lt;/td&gt;
          &lt;td&gt;the Bird&lt;/td&gt;
          &lt;td&gt;@twitter&lt;/td&gt;
      &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
</code>
</pre>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>
              <p class="card-subtitle mb-3">
                Use .table-striped to add zebra-striping to any table row
                within the
                <code>&lt;tbody&gt;</code>.
              </p>
              <div class="table-responsive border rounded-4" data-bs-theme="dark">
                <table class="table table-striped table-dark border text-nowrap  mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">User</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Project Name</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Team</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Budget</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                            <span class="fw-normal">Web Designer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Elite Admin</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            S
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            D
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$3.9k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Arlene McCoy</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Real Homes WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            A
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-warning text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            X
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            N
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-warning-subtle text-warning">Pending</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$24.5k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Christopher Jamil</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">MedicalPro WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-primary-subtle text-primary">Completed</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$12.8k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Evelyn Pope</h6>
                            <span class="fw-normal">Frontend Engineer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            Y
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$2.4k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Micheal Doe</h6>
                            <span class="fw-normal">Content Writer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            S
                          </a>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-danger-subtle text-danger">Cancel</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$9.3k</h6>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- end Striped with Inverse Table -->
          <!-- start Bordered with Inverse Table -->
          <div class="card">
            <div class="card-body">
              <div class="d-flex mb-1 align-items-center">
                <div>
                  <h5 class="mb-0">Bordered with Inverse Table</h5>
                </div>
                <div class="ms-auto flex-shrink-0">
                  <button class="btn bg-primary-subtle text-primary btn-sm" title="View Code"
                    data-bs-toggle="modal" data-bs-target="#view-code3-modal">
                    <i class="ti ti-code fs-5 d-flex"></i>
                  </button>
                  <!-- Code Modal -->
                  <div id="view-code3-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-lg">
                      <div class="modal-content">
                        <div class="modal-header border-bottom">
                          <h5 class="modal-title" id="exampleModalLabel">
                            Bordered with Inverse Table - View Code
                          </h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                        </div>
                        <div class="modal-body p-4">
                          <pre class="language-html scrollable">
<code>
&lt;div class=&quot;table-responsive&quot;&gt;
&lt;table class=&quot;table table-bordered table-dark mb-0&quot;&gt;
  &lt;thead&gt;
      &lt;tr&gt;
          &lt;th scope=&quot;col&quot;&gt;#&lt;/th&gt;
          &lt;th scope=&quot;col&quot;&gt;First&lt;/th&gt;
          &lt;th scope=&quot;col&quot;&gt;Last&lt;/th&gt;
          &lt;th scope=&quot;col&quot;&gt;Handle&lt;/th&gt;
      &lt;/tr&gt;
  &lt;/thead&gt;
  &lt;tbody&gt;
      &lt;tr&gt;
          &lt;th scope=&quot;row&quot;&gt;1&lt;/th&gt;
          &lt;td&gt;Mark&lt;/td&gt;
          &lt;td&gt;Otto&lt;/td&gt;
          &lt;td&gt;@mdo&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
          &lt;th scope=&quot;row&quot;&gt;2&lt;/th&gt;
          &lt;td&gt;Jacob&lt;/td&gt;
          &lt;td&gt;Thornton&lt;/td&gt;
          &lt;td&gt;@fat&lt;/td&gt;
      &lt;/tr&gt;
      &lt;tr&gt;
          &lt;th scope=&quot;row&quot;&gt;3&lt;/th&gt;
          &lt;td colspan=&quot;2&quot;&gt;Larry the Bird&lt;/td&gt;
          &lt;td&gt;@twitter&lt;/td&gt;
      &lt;/tr&gt;
  &lt;/tbody&gt;
&lt;/table&gt;
&lt;/div&gt;
</code>
</pre>
                        </div>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                  </div>
                  <!-- /.modal -->
                </div>
              </div>
              <p class="card-subtitle mb-3">
                Add <code>.table-bordered</code> for borders on all sides
                of the table and cells.
              </p>
              <div class="table-responsive border rounded-4" data-bs-theme="dark">
                <table class="table text-nowrap  table-bordered table-dark mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">User</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Project Name</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Team</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Status</h6>
                      </th>
                      <th>
                        <h6 class="fs-4 fw-semibold mb-0">Budget</h6>
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Sunil Joshi</h6>
                            <span class="fw-normal">Web Designer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Elite Admin</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            S
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            D
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$3.9k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-2.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Arlene McCoy</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Real Homes WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            A
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-warning text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            X
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            N
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-warning-subtle text-warning">Pending</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$24.5k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-3.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Christopher Jamil</h6>
                            <span class="fw-normal">Project Manager</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">MedicalPro WP Theme</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-primary-subtle text-primary">Completed</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$12.8k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-4.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Evelyn Pope</h6>
                            <span class="fw-normal">Frontend Engineer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-primary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            Y
                          </a>
                          <a href="javascript:void(0)"
                            class="text-bg-danger text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            X
                          </a>
                        </div>
                      </td>
                      <td>
                        <span
                          class="badge bg-success-subtle text-success">Active</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$2.4k</h6>
                      </td>
                    </tr>
                    <tr>
                      <td>
                        <div class="d-flex align-items-center">
                          <img src="{{ URL::asset('build/images/profile/user-5.jpg') }}" class="rounded-circle" width="40"
                            height="40" />
                          <div class="ms-3">
                            <h6 class="fs-4 fw-semibold mb-0">Micheal Doe</h6>
                            <span class="fw-normal">Content Writer</span>
                          </div>
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 fw-normal fs-4">Hosting Press HTML</p>
                      </td>
                      <td>
                        <div class="d-flex align-items-center">
                          <a href="javascript:void(0)"
                            class="text-bg-secondary text-white fs-6 rounded-circle round-40 me-n2 card-hover border border-2 border-white d-flex align-items-center justify-content-center">
                            S
                          </a>
                        </div>
                      </td>
                      <td>
                        <span class="badge bg-danger-subtle text-danger">Cancel</span>
                      </td>
                      <td>
                        <h6 class="fs-4 fw-semibold mb-0">$9.3k</h6>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!-- send Bordered with Inverse Table -->
@endsection

@section('scripts')
  <script src="{{ URL::asset('build/libs/prismjs/prism.js') }}"></script>
@endsection

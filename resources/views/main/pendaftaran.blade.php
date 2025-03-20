@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
        <div class="container-fluid">
            <div class="card w-300">
                <div class="card-body wizard-content">
                <h4 class="card-title">Pendaftaran</h4>
                <form action="#" class="validation-wizard wizard-circle mt-5">
                    <!-- Step 1 -->
                    <h6>Pendaftaran</h6>
                    <section>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wfirstName2"> First Name : <span class="danger">*</span>
                            </label>
                            <input type="text" class="form-control required" id="wfirstName2" name="firstName" />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wlastName2"> Last Name : <span class="danger">*</span>
                            </label>
                            <input type="text" class="form-control required" id="wlastName2" name="lastName" />
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wemailAddress2"> Email Address : <span class="danger">*</span>
                            </label>
                            <input type="email" class="form-control required" id="wemailAddress2" name="emailAddress" />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wphoneNumber2">Phone Number :</label>
                            <input type="tel" class="form-control" id="wphoneNumber2" />
                        </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wlocation2"> Select City : <span class="danger">*</span>
                            </label>
                            <select class="form-select required" id="wlocation2" name="location">
                            <option value="">Select City</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="Dubai">Dubai</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wdate2">Date of Birth :</label>
                            <input type="date" class="form-control" id="wdate2" />
                        </div>
                        </div>
                    </div>
                    </section>
                    <!-- Step 2 -->
                    <h6>Layanan</h6>
                    <section>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="jobTitle3">Company Name :</label>
                            <input type="text" class="form-control required" id="jobTitle3" />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="webUrl3">Company URL :</label>
                            <input type="url" class="form-control required" id="webUrl3" name="webUrl3" />
                        </div>
                        </div>
                        <div class="col-md-12">
                        <div class="mb-3">
                            <label class="form-label" for="shortDescription3">Short Description :</label>
                            <textarea name="shortDescription" id="shortDescription3" rows="6"
                            class="form-control"></textarea>
                        </div>
                        </div>
                    </div>
                    </section>
                    <!-- Step 3 -->
                    <h6>Pemeriksaan</h6>
                    <section>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wint1">Interview For :</label>
                            <input type="text" class="form-control required" id="wint1" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="wintType1">Interview Type :</label>
                            <select class="form-select required" id="wintType1" data-placeholder="Type to search cities"
                            name="wintType1">
                            <option value="Banquet">Normal</option>
                            <option value="Fund Raiser">Difficult</option>
                            <option value="Dinner Party">Hard</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="wLocation1">Location :</label>
                            <select class="form-select required" id="wLocation1" name="wlocation">
                            <option value="">Select City</option>
                            <option value="India">India</option>
                            <option value="USA">USA</option>
                            <option value="Dubai">Dubai</option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="wjobTitle2">Interview Date :</label>
                            <input type="date" class="form-control required" id="wjobTitle2" />
                        </div>
                        <div class="mb-3">
                            <label for="customRadio16" class="form-label">Requirements :</label>
                            <div class="c-inputs-stacked">
                            <div class="form-check">
                                <input type="radio" id="customRadio16" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio16">Employee</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="customRadio17" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio17">Contract</label>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </section>
                    <!-- Step 4 -->
                    <h6>Farmasi</h6>
                    <section>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="behName2">Behaviour :</label>
                            <input type="text" class="form-control required" id="behName2" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="participants3">Confidance</label>
                            <input type="text" class="form-control required" id="participants3" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="participants4">Result</label>
                            <select class="form-select required" id="participants4" name="location">
                            <option value="">Select Result</option>
                            <option value="Selected">Selected</option>
                            <option value="Rejected">Rejected</option>
                            <option value="Call Second-time"> Call Second-time </option>
                            </select>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="decisions3">Comments</label>
                            <textarea name="decisions" id="decisions3" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="customRadio11" class="form-label">Rate Interviwer :</label>
                            <div class="c-inputs-stacked">
                            <div class="form-check">
                                <input type="radio" id="customRadio11" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio11">1 star</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="customRadio12" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio12">2 star</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="customRadio13" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio13">3 star</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="customRadio14" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio14">4 star</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="customRadio15" name="customRadio" class="form-check-input" />
                                <label class="form-check-label" for="customRadio15">5 star</label>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </section>
                    
                    <!-- Step 5 -->
                    <h6>Pembayaran</h6>
                    <section>
                    <div class="row">
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="paymentMethod">Metode Pembayaran :</label>
                            <select class="form-select required" id="paymentMethod" name="paymentMethod">
                                <option value="">Pilih Metode</option>
                                <option value="Cash">Tunai</option>
                                <option value="Credit">Kartu Kredit</option>
                                <option value="Debit">Kartu Debit</option>
                                <option value="BPJS">BPJS</option>
                                <option value="Insurance">Asuransi</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="totalAmount">Total Biaya :</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text">Rp</span>
                                <input type="number" class="form-control required" id="totalAmount" name="totalAmount" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="discountCode">Kode Diskon (Opsional) :</label>
                            <input type="text" class="form-control" id="discountCode" name="discountCode" />
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="paymentDate">Tanggal Pembayaran :</label>
                            <input type="date" class="form-control required" id="paymentDate" name="paymentDate" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="paymentNotes">Catatan Pembayaran :</label>
                            <textarea name="paymentNotes" id="paymentNotes" rows="4" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status Pembayaran :</label>
                            <div class="c-inputs-stacked">
                            <div class="form-check">
                                <input type="radio" id="paidFull" name="paymentStatus" class="form-check-input" value="paidFull" />
                                <label class="form-check-label" for="paidFull">Lunas</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="paidPartial" name="paymentStatus" class="form-check-input" value="paidPartial" />
                                <label class="form-check-label" for="paidPartial">Bayar Sebagian</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" id="pending" name="paymentStatus" class="form-check-input" value="pending" />
                                <label class="form-check-label" for="pending">Tertunda</label>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                    </section>
                </form>
                </div>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script src="{{ URL::asset('build/js/vendor.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-steps/build/jquery.steps.min.js') }}"></script>
    <script src="{{ URL::asset('build/libs/jquery-validation/dist/jquery.validate.min.js') }}"></script>
    <script src="{{ URL::asset('build/js/forms/form-wizard.js') }}"></script>
@endsection
@extends('layouts.master')

@section('title', 'SIP-Kes')

@section('pageContent')
    <div class="container-fluid">
        <div class="card w-100">
            <div class="card-body wizard-content">
                <h1 class="card-title"></h1>
                <h1 class="title">Pendaftaran Rawat Jalan</h1>
                
                <!-- Form with added ID and method -->
                <form id="patient-registration-form" action="{{ route('patient.register') }}" method="POST" class="validation-wizard wizard-circle mt-5">
                    @csrf
                    <!-- Rest of the existing form content remains the same -->
                    <!-- Just add this script at the end of the form -->
                    <script>
                    $(document).ready(function() {
                        // Initialize form wizard
                        $('.validation-wizard').steps({
                            headerTag: "h6",
                            bodyTag: "section",
                            transitionEffect: "fade",
                            titleTemplate: '<span class="step">#index#</span> #title#',
                            onFinished: function (event, currentIndex) {
                                // Validate and submit the form
                                submitPatientRegistration();
                            }
                        });

                        function submitPatientRegistration() {
                            var form = $('#patient-registration-form');
                            
                            $.ajax({
                                url: form.attr('action'),
                                method: 'POST',
                                data: form.serialize(),
                                dataType: 'json',
                                success: function(response) {
                                    if (response.success) {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Pendaftaran Berhasil',
                                            text: 'Nomor Rekam Medis: ' + response.no_rm,
                                            confirmButtonText: 'OK'
                                        }).then(() => {
                                            // Optional: Redirect or reset form
                                            window.location.reload();
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Pendaftaran Gagal',
                                            text: response.message
                                        });
                                    }
                                },
                                error: function(xhr) {
                                    // Handle validation errors
                                    var errors = xhr.responseJSON.errors;
                                    var errorMessage = '';
                                    
                                    $.each(errors, function(field, messages) {
                                        errorMessage += messages[0] + '\n';
                                    });

                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Validasi Gagal',
                                        text: errorMessage
                                    });
                                }
                            });
                        }
                    });
                    </script>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <!-- Existing scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
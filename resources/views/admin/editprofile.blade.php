@extends('layouts.admin', ['title' => 'Edit Profile', 'active' => '']);

@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">
                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Edit Profile</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.profile') }}" class="d-flex">
                                    <svg class="header-icon me-3" x="1008" y="1248" viewBox="0 0 24 24" height="100%"
                                        width="100%" preserveAspectRatio="xMidYMid meet" focusable="false">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z" opacity=".3" />
                                        <circle cx="12" cy="8" opacity=".3" r="2" />
                                        <path
                                            d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" />
                                    </svg>
                                    <span class="breadcrumb-icon"> Profile</span>
                                </a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">Edit Profile</li>
                        </ol>
                    </div>
                </div>
                <!--End Page header-->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        @include('admin.widgets.profile.update_image')
                        @include('admin.widgets.profile.updatepassword')
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="row">
                            <div class="col-md-12">
                                @include('admin.widgets.profile.updateprofileinfo')
                            </div>
                            <div class="col-md-6">
                                @include('admin.widgets.profile.update_email')
                            </div>
                            <div class="col-md-6">
                                @include('admin.widgets.profile.deleteprofile')
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row-->

            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <script src="{{ asset('assets/admin/plugins/sweet-alert/sweetalert.min.js') }}"></script>
    @include('admin.widgets.alert')

    <script>
        $(document).ready(function() {
            $('#updateEmailForm').submit(function(event) {
                let button = $(event.target).find('button[type="submit"]');
                console.log('Sending OTP...');
                event.preventDefault();
                let emailError = $(this).find('#emailError');
                // Get the CSRF token from the meta tag
                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                //form data
                let formData = $(this).serialize();
                // Make the AJAX request
                button.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Loading...');
                $.ajax({
                    url: "{{ route('admin.update_email.otp') }}",
                    type: 'POST',
                    dataType: 'json',
                    data: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(response) {
                        if (response.status) {
                            $('#update_email_message').html(response.message)
                            $('#myModal').modal('show');
                            $('#otp_email').attr('value', response.email);
                        }
                        emailError.html('');
                    },
                    error: function(error) {
                        if (error.responseJSON && error.responseJSON.errors) {
                            // Display email validation error
                            if (error.responseJSON.errors.email) {
                                console.error('Error:', error);
                                emailError.html(error.responseJSON.errors.email[0]);
                            }
                        }
                    },
                    complete: function() {
                        button.prop('disabled', false).html('Submit');
                    }
                });
            });
        });
    </script>
@endsection

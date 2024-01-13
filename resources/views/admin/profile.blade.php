@extends('layouts.admin', ['title'=> 'Profile', 'active'=> ''])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">
                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Profile</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)" class="d-flex"><svg
                                        class="header-icon me-3" x="1008" y="1248" viewBox="0 0 24 24"
                                        height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                        focusable="false">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z"
                                            opacity=".3" />
                                        <circle cx="12" cy="8" opacity=".3" r="2" />
                                        <path
                                            d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" />
                                    </svg><span class="breadcrumb-icon"> Profile</span></a>
                            </li>

                        </ol>
                    </div>
                </div>
                <!--End Page header-->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-4 col-lg-5">
                        <div class="card box-widget widget-user">
                            <div class="widget-user-image mx-auto mt-5 text-center"><img alt="User Avatar"
                                    class="rounded-circle" src="../assets/images/users/16.jpg"></div>
                            <div class="card-body text-center">
                                <div class="pro-user">
                                    <h3 class="pro-user-username text-dark mb-1">Jenna Side</h3>
                                    <h6 class="pro-user-desc text-muted">Web Designer</h6>
                                    <a href="{{route('admin.profile.edit')}}" class="btn btn-primary mt-3">Edit Profile</a>
                                </div>
                            </div>
                            <div class="card-footer p-0">

                            </div>
                        </div>

                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Profile Details</div>
                            </div>
                            <div class="card-body">
                                <div class="card-title font-weight-bold">Basci info:</div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">First Name</label>
                                            <input type="text" class="form-control" disabled value="First Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Last Name</label>
                                            <input type="text" class="form-control" disabled value="Last Name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Email address</label>
                                            <input type="email" class="form-control" disabled value="Email">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Phone Number</label>
                                            <input type="number" class="form-control" disabled
                                                value="01700000000">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Address</label>
                                            <input type="text" class="form-control" disabled
                                                value="Home Address">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4">
                                        <div class="mb-3">
                                            <label class="form-label">City</label>
                                            <input type="text" class="form-control" disabled value="City">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-3">
                                        <div class="mb-3">
                                            <label class="form-label">Postal Code</label>
                                            <input type="number" class="form-control" disabled value="00000">
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="mb-3">
                                            <label class="form-label">Country</label>

                                            <input type="text" class="form-control" disabled value="Bangladesh">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Role</label>
                                        <input type="text" class="form-control" disabled value="Super Admin">
                                    </div>
                                </div>
                                <div class="card-title font-weight-bold mt-5">External Links:</div>
                                <div class="row">
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Facebook</label>
                                            <input type="text" class="form-control" disabled
                                                value="https://www.facebook.com/">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Google</label>
                                            <input type="text" class="form-control" disabled
                                                value="https://www.google.com/">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Twitter</label>
                                            <input type="text" class="form-control" disabled
                                                value="https://twitter.com/">
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Pinterest</label>
                                            <input type="text" class="form-control" disabled
                                                value="https://in.pinterest.com/">
                                        </div>
                                    </div>
                                </div>
                                <div class="card-title font-weight-bold mt-5">About:</div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">About Me</label>
                                            <input rows="5" class="form-control" disabled
                                                value="Enter About your description"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Row-->

            </div>
        </div>
    </div>
@endsection
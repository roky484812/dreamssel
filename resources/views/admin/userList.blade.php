@extends('layouts.admin', ['title'=> 'User Management', 'active'=> 'user'])
@section('content')
<div class="app-content main-content">
    <div class="side-app">
        <div class="container-fluid main-container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">User List</h4>
                </div>
                <div class="page-rightheader ms-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)" class="d-flex"><svg
                                    class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg><span class="breadcrumb-icon"> User List</span></a></li>

                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row flex-lg-nowrap">
                <div class="col-12">
                    <div class="row flex-lg-nowrap">
                        <div class="col-12 mb-3">
                            <div class="e-panel card">
                                <div class="card-body pb-2">
                                    <div class="row">
                                        <div class="col mb-4">
                                            <a href="{{route('admin.adduserView')}}" class="btn btn-primary"><i
                                                    class="fe fe-plus"></i> Add New User</a>
                                        </div>
                                        <div class="col col-auto mb-4">
                                            <div class="mb-3 w-100">
                                                <div class="input-icon">
                                                    <span class="input-icon-addon">
                                                        <i class="fe fe-search"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Search User">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        @foreach ($users_data as $user_data)
                                            <div class="col-xxl-3 col-xl-4 col-md-6">
                                                <div class="card border p-0 shadow-none" @if (!$user_data['is_active']) style="background: #ff000021;" @endif>
                                                    <div class="d-flex align-items-center p-4">
                                                        <div class="avatar avatar-lg brround d-block cover-image"
                                                            data-image-src="../assets/images/users/7.jpg">
                                                        </div>
                                                        <div class="wrapper ms-3">
                                                            <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                                {{$user_data['name']}}</p>
                                                            <small class="text-muted text-capitalize">{{$user_data['role_name']}}</small>
                                                        </div>
                                                        <div class="float-end ms-auto">
                                                            <div class="btn-group ms-3 mb-0">
                                                                <a href="javascript:void(0)" class="option-dots"
                                                                    data-bs-toggle="dropdown"
                                                                    aria-expanded="false"><i
                                                                        class="fa fa-ellipsis-v"></i></a>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item"
                                                                        href="editprofile.html"><i
                                                                            class="fe fe-edit me-2"></i>
                                                                        Edit</a>
                                                                    <a class="dropdown-item" href="{{route('admin.user.status', ['user_id' => $user_data['id']])}}">
                                                                        @if ($user_data['is_active'])
                                                                            <i class="fa fa-lock me-2" aria-hidden="true"></i>
                                                                            Block
                                                                        @else
                                                                            <i class="fa fa-unlock me-2" aria-hidden="true"></i>
                                                                            Unblock
                                                                        @endif
                                                                    </a>
                                                                    <a class="dropdown-item"
                                                                        href="javascript:void(0)"><i
                                                                            class="fe fe-trash me-2"></i>
                                                                        Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card-body border-top">
                                                        <div class="d-flex">
                                                            <div class="media-icon lh-1">
                                                                <svg class="svg-icon"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    height="24" viewBox="0 0 24 24" width="24">
                                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                                    <path
                                                                        d="M20 8l-8 5-8-5v10h16zm0-2H4l8 4.99z"
                                                                        opacity=".3" />
                                                                    <path
                                                                        d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2zM20 6l-8 4.99L4 6h16zM4 8l8 5 8-5v10H4V8z" />
                                                                </svg>
                                                            </div>
                                                            <div class="h6 mb-0 ms-3 mt-1">
                                                                {{$user_data['email']}}</div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="media-icon lh-1">
                                                                <svg class="svg-icon"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    height="24" viewBox="0 0 24 24" width="24">
                                                                    <path d="M0 0h24v24H0V0z" fill="none" />
                                                                    <path
                                                                        d="M15.2 18.21c1.21.41 2.48.67 3.8.76v-1.5c-.88-.07-1.75-.22-2.6-.45l-1.2 1.19zM6.54 5h-1.5c.09 1.32.35 2.59.75 3.79l1.2-1.21c-.24-.83-.39-1.7-.45-2.58zM14 8h5V5h-5z"
                                                                        opacity=".3" />
                                                                    <path
                                                                        d="M20 15.5c-1.25 0-2.45-.2-3.57-.57-.1-.03-.21-.05-.31-.05-.26 0-.51.1-.71.29l-2.2 2.2c-2.83-1.44-5.15-3.75-6.59-6.58l2.2-2.21c.28-.27.36-.66.25-1.01C8.7 6.45 8.5 5.25 8.5 4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1 0 9.39 7.61 17 17 17 .55 0 1-.45 1-1v-3.5c0-.55-.45-1-1-1zM5.03 5h1.5c.07.88.22 1.75.46 2.59L5.79 8.8c-.41-1.21-.67-2.48-.76-3.8zM19 18.97c-1.32-.09-2.6-.35-3.8-.76l1.2-1.2c.85.24 1.72.39 2.6.45v1.51zM12 3v10l3-3h6V3h-9zm7 5h-5V5h5v3z" />
                                                                </svg>
                                                            </div>
                                                            <div class="h6 mb-0 ms-3 mt-1">{{$user_data['user_meta.phone']}}</div>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <a href="profile-2.html" class="btn btn-primary btn-sm">View Profile</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->

        </div>
    </div>
</div>
@endsection
@section('custom_js')
    <script src="{{asset('assets/admin/plugins/sweet-alert/sweetalert.min.js')}}"></script>
    <script>
        function successAlert(message) {
            swal('Saved!', '{{Session::get('success')}}', 'success');
        };
    </script>

    @if (Session::has('success'))
        <script>
            console.log();
            window.onload = successAlert;
        </script>
    @endif
@endsection
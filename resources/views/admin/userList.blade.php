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
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/7.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Denis Rosenblum</p>
                                                        <small class="text-muted">Project Manager</small>
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

                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fa-solid fa-user-lock"></i>
                                                                    Block</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                            denisrenblum@gmail.com</div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">

                                                    <a href="profile-2.html"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/6.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Harvey Mattos</p>
                                                        <small class="text-muted">Developer</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                            harveymattos@gmail.com</div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/5.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Catrice Doshier</p>
                                                        <small class="text-muted">Assistant Manager</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                            catricedoshier@gmail.com</div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/1.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Catherina Bamber</p>
                                                        <small class="text-muted">Company Manager</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">catherina@gmail.com
                                                        </div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/8.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Margie Fitts</p>
                                                        <small class="text-muted">It Manager</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">margiefitts@gmail.com
                                                        </div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/5.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Dana Lott</p>
                                                        <small class="text-muted">Hr Manager</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">danalott@gmail.com
                                                        </div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/6.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Benedict Vallone</p>
                                                        <small class="text-muted">Hr Recriuter</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">benedict@gmail.com
                                                        </div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/8.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Robbie Ruder</p>
                                                        <small class="text-muted">Ceo</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">robbieruder@gmail.com
                                                        </div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/3.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Micaela Aultman</p>
                                                        <small class="text-muted">Php developer</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">micaelaault@gmail.com
                                                        </div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/4.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Jacquelynn Sapienza</p>
                                                        <small class="text-muted">Web developer</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">jacquelyn@gmail.com
                                                        </div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/9.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Elida Distefano</p>
                                                        <small class="text-muted">Hr Manager</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                            elidadistefano@gmail.com</div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6">
                                            <div class="card border p-0 shadow-none">
                                                <div class="d-flex align-items-center p-4">
                                                    <div class="avatar avatar-lg brround d-block cover-image"
                                                        data-image-src="../assets/images/users/7.jpg">
                                                    </div>
                                                    <div class="wrapper ms-3">
                                                        <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                            Collin Bridgman</p>
                                                        <small class="text-muted">web designer</small>
                                                    </div>
                                                    <div class="float-end ms-auto">
                                                        <div class="btn-group ms-3 mb-0">
                                                            <a href="javascript:void(0)" class="option-dots"
                                                                data-bs-toggle="dropdown"
                                                                aria-expanded="false"><i
                                                                    class="fa fa-ellipsis-v"></i></a>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-edit me-2"></i>
                                                                    Edit</a>
                                                                <a class="dropdown-item"
                                                                    href="javascript:void(0)"><i
                                                                        class="fe fe-trash me-2"></i>
                                                                    Delete</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="card-body border-top">
                                                    <p class="text-muted">Duis aute irure dolor in
                                                        reprehenderit in voluptate velit esse cillum dolore
                                                        eu fugiat nulla pariatur</p>
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
                                                            collinbridgman@gmail.com</div>
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
                                                        <div class="h6 mb-0 ms-3 mt-1">+345 657 567</div>
                                                    </div>
                                                </div>
                                                <div class="card-footer">
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-white btn-sm">Message</a>
                                                    <a href="javascript:void(0)"
                                                        class="btn btn-primary btn-sm">View Profile</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Form Modal -->
                    <div class="modal fade" role="dialog" tabindex="-1" id="user-form-modal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Create User</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="py-1">
                                        <form class="form" novalidate="">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label>Full Name</label>
                                                                <input class="form-control" type="text"
                                                                    name="name" placeholder="John Smith"
                                                                    value="John Smith">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label>Username</label>
                                                                <input class="form-control" type="text"
                                                                    name="username" placeholder="johnny.s"
                                                                    value="johnny.s">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label>Email</label>
                                                                <input class="form-control" type="text"
                                                                    placeholder="user@example.com">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <div class="mb-3">
                                                                <label>About</label>
                                                                <textarea class="form-control" rows="5"
                                                                    placeholder="My Bio"></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-sm-6 mb-3">
                                                    <div class="mb-2"><b>Change Password</b></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label>Current Password</label>
                                                                <input class="form-control" type="password"
                                                                    placeholder="••••••">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label>New Password</label>
                                                                <input class="form-control" type="password"
                                                                    placeholder="••••••">
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3">
                                                                <label>Confirm <span
                                                                        class="d-none d-xl-inline">Password</span></label>
                                                                <input class="form-control" type="password"
                                                                    placeholder="••••••">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-5 offset-sm-1 mb-3">
                                                    <div class="mb-2"><b>Keeping in Touch</b></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <label>Email Notifications</label>
                                                            <div class="custom-controls-stacked px-2">
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox"
                                                                        class="custom-control-input"
                                                                        id="notifications-blog" checked="">
                                                                    <label class="custom-control-label"
                                                                        for="notifications-blog">Blog
                                                                        posts</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox"
                                                                        class="custom-control-input"
                                                                        id="notifications-news" checked="">
                                                                    <label class="custom-control-label"
                                                                        for="notifications-news">Newsletter</label>
                                                                </div>
                                                                <div class="custom-control custom-checkbox">
                                                                    <input type="checkbox"
                                                                        class="custom-control-input"
                                                                        id="notifications-offers"
                                                                        checked="">
                                                                    <label class="custom-control-label"
                                                                        for="notifications-offers">Personal
                                                                        Offers</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col d-flex justify-content-end">
                                                    <button class="btn btn-primary" type="submit">Save
                                                        Changes</button>
                                                </div>
                                            </div>
                                        </form>
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
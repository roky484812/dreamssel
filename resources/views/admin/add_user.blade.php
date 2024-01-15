@extends('layouts.admin', ['title'=> 'Add New User', 'active'=> 'user'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Add New User</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="users-list-3.html" class="d-flex"><svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg><span class="breadcrumb-icon"> User List</span></a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">Add New User</li>
                        </ol>
                    </div>
                </div>
                <!--End Page header-->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        @include('admin.widgets.users.add_user_basicinfo')
                    </div>
                </div>
                <!-- End Row-->

            </div>
        </div>
    </div>
@endsection
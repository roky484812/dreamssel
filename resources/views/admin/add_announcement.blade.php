@extends('layouts.admin', ['title'=> ' Post new announcement', 'active'=> 'announcement'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">
                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Post new announcement</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{route('admin.announcement.list')}}" class="d-flex">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg>
                                    <span class="breadcrumb-icon">Announcement</span>
                                </a>
                            </li>

                            <li class="breadcrumb-item active" aria-current="page">Post announcement</li>
                        </ol>
                    </div>
                </div>
                <!--End Page header-->

                <!-- Row -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        @include('admin.widgets.announcement.add_announcement_info')
                    </div>
                </div>
                <!-- End Row-->

            </div>
        </div>
    </div>
@endsection
@section('custom_css')
    <link rel="stylesheet" href="{{asset('assets/admin/plugins/richtexteditor/rte_theme_default.css')}}" />
@endsection
@section('custom_js')
    <script type="text/javascript" src='{{asset('assets/admin/plugins/richtexteditor/plugins/all_plugins.js')}}'></script>
    <script type="text/javascript" src="{{asset('assets/admin/plugins/richtexteditor/rte.js')}}"></script>
    <script>
        $(document).ready(function() {
            var editor1 = new RichTextEditor("#richeditor",  {
                skin: 'blue'
            });
        });
    </script>
@endsection
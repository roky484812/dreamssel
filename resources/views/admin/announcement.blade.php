@extends('layouts.admin', ['title'=> 'Announcement List', 'active'=> 'announcement'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Announcement List</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.announcement.list')}}" class="d-flex">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"  stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                <span class="breadcrumb-icon">Announcement</span></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Announcement</li>
                        </ol>
                    </div>
                </div>
                <!--End Page header-->
                <div class="row flex-lg-nowrap">
                    <div class="col-12">
                        <div class="e-panel card">
                            <div class="card-body pb-2">
                                <div class="row">
                                    <div class="col mb-4">
                                        <a href="{{route('admin.announcement.addview')}}" class="btn btn-primary">
                                            <i class="fe fe-plus"></i>
                                            Post new announcement
                                        </a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12">
                                        <div class="list-group">
                                            <div class="row">
                                                @foreach ($announcements as $announcement)
                                                    <div class="col-md-6 p-2">
                                                        <a href="javascript:void(0)" class="list-group-item list-group-item-action flex-column align-items-start active">
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <h5 class="mb-4">{{ $announcement['title'] }}</h5>
                                                                <small>{{ \Carbon\Carbon::createFromDate($announcement['created_at'])->diffForHumans() }}</small>
                                                            </div>
                                                            <div class="d-flex w-100 justify-content-between">
                                                                <p class="mb-1">{{ $announcement['short_description'] }}</p>
                                                                <div class="text-right">
                                                                    <form action="">
                                                                        <button class="btn text-warning border btn-sm m-1" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                                                    </form>
                                                                    <form action="">
                                                                        <button class="btn text-danger border btn-sm m-1" href="#"><i class="fa fa-trash" aria-hidden="true"></i></button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                                
                                            </div>
                                        </div>
                                            {{$announcements->links()}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
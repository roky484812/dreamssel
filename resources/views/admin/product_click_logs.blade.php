@extends('layouts.admin', ['title'=> 'Product Clicked Log', 'active'=> 'product_click_log'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Click Log</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)" class="d-flex">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg>
                                    <span class="breadcrumb-icon">Product Clicked Log</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!--End Page header-->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    @foreach ($product_click_logs as $product_click_log)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="list-group-item list-group-item-action flex-column align-items-start">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-4">
                                                    <a href="{{ route('home.productPage', $product_click_log->product->id) }}" target="_blank">{{ Str::limit($product_click_log->product->title, 50) }}</a>
                                                </h5>
                                                <small>Clicked: {{ $product_click_log->view_count }}</small>
                                            </div>
                                            <div class="w-100">
                                                @if(auth()->user()->role == 1)
                                                <p class="mb-1">
                                                    <a href="{{ route('admin.user.view', $product_click_log->user->id) }}">{{ $product_click_log->user->name }}</a>
                                                </p>
                                                @else
                                                <p class="mb-1">{{ $product_click_log->user->name }}</p>
                                                @endif
                                            </div>
                                            <div class="w-100">
                                                <small class="mb-1">{{ \Carbon\Carbon::createFromDate($product_click_log->updated_at)->diffForHumans() }}</small>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="mt-3">
                                    {{ $product_click_logs->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
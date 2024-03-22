@extends('layouts.admin', ['title' => 'Order Management | Cancel Order', 'active' => 'cancelled_order'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Cancelled Order List</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)" class="d-flex">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg>
                                    <span class="breadcrumb-icon"> Cancelled Orders</span></a></li>
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
                                        @if($orders->count() == 0)
                                        <div class="nothing-to-show d-flex justify-content-center">
                                            Nothing to show :<
                                        </div>
                                        @endif

                                        <div class="row">
                                            @foreach ($orders as $order)
                                               
                                                    <?php $product = $products->find($order->product_id);
                                                    $user = $users->find($order->user_id);
                                                    $orderedAt = new DateTime($order->created_at);
                                                    $currentTime = new DateTime();
                                                    $interval = $currentTime->diff($orderedAt);
                                                    $timeElapsed = $interval->format('%hh %im ago');
                                                    $localPrice=0;
                                                    ?>


                                                    <div class="col-xl-4 col-md-6">
                                                        <div class="card border p-0 shadow-none">
                                                            <!-- Card Header -->
                                                            <div class="d-flex flex-wrap align-items-center p-4">
                                                                <!-- Customer Avatar -->
                                                                <div class="avatar avatar-lg brround d-block cover-image"
                                                                    data-image-src="{{ asset('images/profile_pictures/default.jpg') }}">
                                                                </div>
                                                                <!-- Customer Information -->
                                                                <div class="wrapper ms-3">
                                                                    <p class="mb-0 mt-1 text-dark font-weight-semibold">
                                                                        {{ $order->name }}
                                                                    </p>
                                                                    <small class="text-muted">{{ $order->email }}</small>
                                                                </div>
                                                                <!-- Dropdown Menu -->
                                                                <div class="float-end ms-auto flex-wrap">
                                                                    <p class="text-muted ms-1">{{ $timeElapsed }}</p>
                                                                </div>
                                                            </div>
                                                            <!-- Card Body -->
                                                            <div class="card-body border-top">
                                                                <div class="product-details overflow-scroll">
                                                                    @foreach ($order->order_list as $list_item)
                                                                        @php
                                                                            $product = $products->find(
                                                                                $list_item->product_id,
                                                                            );
                                                                            $localPrice+=$product->discounted_price*$list_item->quantity;
                                                                        @endphp
    
                                                                        <!-- Product Image and title -->
    
                                                                        <div class="d-flex align-items-center">
                                                                            <img src="{{ $product->thumbnail_image }}"
                                                                                alt="Product Image" class="img-fluid mb-3"
                                                                                style="max-width: 50px" />
                                                                            <!-- Product Title -->
                                                                            <p class="text-dark font-weight-semibold ms-3">
                                                                                {{ $product->title }}
                                                                            </p>
                                                                        </div>
                                                                        <div class="orderCardAttributes d-flex flex-wrap">
                                                                            <div class="orderCardAttrLeft">
                                                                                <!-- Color -->
    
                                                                                <div
                                                                                    class="orderAttrItem d-flex align-items-center justify-content-between">
                                                                                    <p class="text-muted mb-0">Color:</p>
                                                                                    <div class="me-2"
                                                                                        style="
                                                                                        width: 20px;
                                                                                        height: 20px;
                                                                                        background-color: {{ $list_item->color }};
                                                                                      ">
                                                                                    </div>
                                                                                </div>
                                                                                <!-- price -->
                                                                                <div
                                                                                    class="orderAttrItem d-flex align-items-center justify-content-between">
                                                                                    <p class="text-muted">Price:</p>
                                                                                    <span>{{ $product->discounted_price }}</span>
                                                                                </div>
                                                                            </div>
                                                                            <div class="orderCardAttrRight">
                                                                                <!-- Size -->
                                                                                <div
                                                                                    class="orderAttrItem d-flex align-items-center justify-content-between">
                                                                                    <p class="text-muted mb-0">Size:</p>
                                                                                    <span>{{ $list_item->size }}</span>
                                                                                </div>
                                                                                <!-- Quantity -->
                                                                                <div
                                                                                    class="orderAttrItem d-flex align-items-center justify-content-between">
                                                                                    <p class="text-muted">Quantity:</p>
                                                                                    <span>{{ $list_item->quantity }}</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                                
    
                                                                <!-- Total Price -->
                                                                <div class="orderAttrItem d-flex align-items-center">
                                                                    <p class="text-muted">Total Price:</p>
                                                                    <span>{{ $order->total_price+$localPrice }}</span>
                                                                </div>
                                                                <!-- Phone -->
                                                                <div class="orderAttrItem d-flex align-items-center">
                                                                    <p class="text-muted">Phone:</p>
                                                                    <span>{{ $order->phone }}</span>
                                                                </div>
                                                                <!-- Delivery Address -->
                                                                <div class="orderAttrItem d-flex align-items-center">
                                                                    <p class="text-muted">Delivery Address:</p>
                                                                    <span>{{ $order->address }}</span>
                                                                </div>
                                                                <div class="orderAttrItem d-flex align-items-center">
                                                                    <p class="text-muted">Order Token :</p>
                                                                    <span>{{ $order->order_token }}</span>
                                                                </div>
                                                            </div>
                                                            <!-- Card Footer -->
                                                            <div class="card-footer">
                                                                <!-- order confirm Button -->
                                                                <form action="{{ route('admin.order.confrim', ['order_id' => $order->id]) }}" method="POST">
                                                                    @csrf
                                                                    <button type="submit" class="btn btn-primary bg-green-dark border-0 btn-sm">Order Confirm</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                               
                                            @endforeach
                                        </div>
                                        <div class=" paginate-style justify-content-center">
                                            {!! $orders->links() !!}
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
    @include('admin.widgets.alert')
@endsection
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/orderCard.css') }}">
@endsection

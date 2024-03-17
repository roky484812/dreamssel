@extends('layouts.client.client')
@section('content')
    <!-- mid content -->
    <div class="midContent">
        @include('client.widgets.product_filter')
        <!-- filter end -->
        <div class="svCardBox" id="data">
            <div class="d-flex justify-content-center mt-5">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="link" class="d-flex justify-content-end">
            
        </div>
    </div>
    <!-- populer product section -->
    <div class="populerProductBox">
        <div class="header-category">
            <div class="box-pointer"></div>
            <div class="header-category-title">
                <h6>Populer's</h6>
            </div>
        </div>
        <div class="our-feature-product-header">
            <h1>Populer Products</h1>
        </div>
        <div class="PopulerProducts owl-carousel">
            <!-- product card start -->
            <div class="populerItem ">
                <div class="wrapper">
                    <div class="pic-wrapper">
                        <div class="negative-percentage">
                            <p>-36%</p>
                        </div>
                        <div class="product-pic">
                            <img src="assets/client/images/img.jpeg" alt="" />
                        </div>
                    </div>
                    <div class="title-price-wrapper">
                        <h3 class="product-title">Product Title</h3>
                        <div class="rate-buy-now-wrapper">
                            <div class="price-wrapper">
                                <h2 class="price">1.48 ৳</h2>
                                <div class="closePriceAndCategory">
                                    <del class="crossed-price">180</del>
                                    <div class="regional-tag">
                                        <p>IND</p>
                                    </div>
                                </div>
                            </div>
                            <button class="buy-now-button">Buy now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/client/css/searchView.css') }}">
@endpush
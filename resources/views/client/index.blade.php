@extends('layouts.client.client')
@section('content')
    <!-- mid content -->
    <div class="midContent">
        @include('client.widgets.sidebar')
        <div class="productsBox">
            <div class="carouselBox">
                <div class="topCarousel owl-carousel owl-theme">
                    <div class="topCarouselItem"><img src="{{ asset('assets/client/images/product2.png') }}" alt=""></div>
                    <div class="topCarouselItem"><img src="{{ asset('assets/client/images/product2.png') }}" alt=""></div>
                    <div class="topCarouselItem"><img src="{{ asset('assets/client/images/product2.png') }}" alt=""></div>
                    <div class="topCarouselItem"><img src="{{ asset('assets/client/images/product2.png') }}" alt=""></div>
                    <div class="topCarouselItem"><img src="{{ asset('assets/client/images/product2.png') }}" alt=""></div>
                </div>
            </div>
            <!-- heading -->
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>Our Product's</h6>
                </div>
            </div>
            <div class="our-feature-product-header">
                <h1>Explore Our Products</h1>
            </div>
            <div class="allProducts row g-3">
                <!-- card design -->
                @foreach ($products as $product)
                <div class="productItem col-md-3 col-sm-4 col-xsm-6">
                    <div class="wrapper">
                        <div class="pic-wrapper">
                            <div class="negative-percentage">
                                <p>                                                
                                @php
                                    try {
                                        echo round((($product->price - $product->distributor_price) / $product->price) * 100);
                                    } catch (\Throwable $th) {
                                        echo 0;
                                    }
                                @endphp %
                                </p>
                            </div>
                            <div class="product-pic">
                                <img src="{{ asset($product->thumbnail_image) }}" alt="" />
                            </div>
                        </div>
                        <div class="title-price-wrapper">
                            <a href="{{ route('client.product.view', $product->id) }}" class="text-decoration-none product-title h3">{!! Str::limit ($product->title, 25) !!}</a>
                            <div class="rate-buy-now-wrapper">
                                <div class="price-wrapper">
                                    @if(auth()->user())
                                    <h2 class="price">{{ $product->distributor_price }} ৳</h2>
                                    <div class="closePriceAndCategory">
                                        <del class="crossed-price">{{ $product->price }}</del>
                                        <div class="regional-tag">
                                            <p>{{ $product->country_code }}</p>
                                        </div>
                                    </div>
                                    @else
                                    <h2 class="price">{{ $product->price }} ৳</h2>
                                    <div class="closePriceAndCategory">
                                        <div class="regional-tag">
                                            <p>{{ $product->country_code }}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <button class="buy-now-button">Buy now</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                <!-- card end -->
                @if (!count($products))
                    <h4 class="text-muted text-center">No Product!</h4>
                @endif
            </div>
        </div>
    </div>
    <div class="featureProduct">
        <div class="featureBox1">
            <img src="{{ asset('assets/client/images/1.svg') }}" alt="" />
            <div class="featureContent1">
                <div class="featureContentText1">
                    <button class="fetureBtn">
                    Read More <span><i class="fa-solid fa-arrow-right"></i></span>
                    </button>
                </div>
            </div>
        </div>
        <div class="featureBox2">
            <img src="{{ asset('assets/client/images/2.svg') }}" alt="" />
            <div class="featureContent2">
                <div class="featureContentText2">
                    <button class="fetureBtn">
                    Read More <span><i class="fa-solid fa-arrow-right"></i></span>
                    </button>
                </div>
            </div>
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
            @foreach ($popular_products as $popular_product)
            <div class="populerItem ">
                <div class="wrapper">
                    <div class="pic-wrapper">
                        <div class="negative-percentage">
                            <p>
                            @php
                                try {
                                    echo round((($popular_product->price - $popular_product->distributor_price) / $popular_product->price) * 100);
                                } catch (\Throwable $th) {
                                    echo 0;
                                }
                            @endphp %
                            </p>
                        </div>
                        <div class="product-pic">
                            <img src="{{ asset($popular_product->thumbnail_image) }}" alt="" />
                        </div>
                    </div>
                    <div class="title-price-wrapper">
                        <a href="{{ route('client.product.view', $popular_product->id) }}" class="text-decoration-none product-title h3">{{ $popular_product->title }}</a>
                        <div class="rate-buy-now-wrapper">
                            <div class="price-wrapper">
                                <div class="price-wrapper">
                                    @if(auth()->user())
                                    <h2 class="price">{{ $popular_product->distributor_price }} ৳</h2>
                                    <div class="closePriceAndCategory">
                                        <del class="crossed-price">{{ $popular_product->price }}</del>
                                        <div class="regional-tag">
                                            <p>{{ $popular_product->country_code }}</p>
                                        </div>
                                    </div>
                                    @else
                                    <h2 class="price">{{ $popular_product->price }} ৳</h2>
                                    <div class="closePriceAndCategory">
                                        <div class="regional-tag">
                                            <p>{{ $popular_product->country_code }}</p>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <button class="buy-now-button">Buy now</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- product card end --}}
        </div>
    </div>
    <!-- fature box for mobile device -->
    <div class="featureProduct featureProductMbl">
        <div class="featureBox2 featureBox2Mbl">
            <img src="{{ asset('assets/client/images/2.svg') }}" alt="" />
            <div class="featureContent2">
                <div class="featureContentText2">
                    <button class="fetureBtn">
                    Read More <span><i class="fa-solid fa-arrow-right"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- features product section from farhan -->
    <div class="bottomFeatureProducts">
        <div class="header-category">
            <div class="box-pointer"></div>
            <div class="header-category-title">
                <h6>Feature's</h6>
            </div>
        </div>
        <div class="our-feature-product-header">
            <h1>Feature Products</h1>
        </div>
        <div class="new-arival-products">
            <div class="left-large">
                <a href="">
                <img src="{{ asset('assets/client/images/left-large.svg') }}" alt="" />
                </a>
            </div>
            <div class="right-wrapper">
                <div class="right-top">
                    <a href="">
                    <img src="{{ asset('assets/client/images/right-top.svg') }}" alt="" />
                    </a>
                </div>
                <div class="right-bottom-wrapper">
                    <div class="right-bottom-left">
                        <a href="">
                        <img src="{{ asset('assets/client/images/right-bottom-left.svg') }}" alt="" />
                        </a>
                    </div>
                    <div class="right-bottom-right">
                        <a href="">
                        <img src="{{ asset('assets/client/images/right-bottom-right.svg') }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end -->
    <!-- cutomer says section here -->
    <div class="customerSays">
        <div class="saysHead">
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>Customer's</h6>
                </div>
            </div>
            <div class="our-feature-product-header">
                <h1>Our Customer Says</h1>
            </div>
        </div>
        <!-- carousel -->
        <div class="owl-carousel quoteCarousel">
            <div class="quote-card">
                <h3>
                    "Mela kicui likha thakbe dreamssel somporke. customer ra likhbe j
                    eta ekta valo site melai valo site. apnara sobai product kinen."
                </h3>
                <p>Md Nuruzzaman Emon</p>
                <img src="{{ asset('assets/client/images/emon.jpg') }}" alt="" />
            </div>
            <div class="quote-card">
                <h3>
                    "Mela kicui likha thakbe dreamssel somporke. customer ra likhbe j
                    eta ekta valo site melai valo site. apnara sobai product kinen."
                </h3>
                <p>Md Nuruzzaman Emon</p>
                <img src="{{ asset('assets/client/images/emon.jpg') }}" alt="" />
            </div>
            <div class="quote-card">
                <h3>
                    "Mela kicui likha thakbe dreamssel somporke. customer ra likhbe j
                    eta ekta valo site melai valo site. apnara sobai product kinen."
                </h3>
                <p>Md Nuruzzaman Emon</p>
                <img src="{{ asset('assets/client/images/emon.jpg') }}" alt="" />
            </div>
            <div class="quote-card">
                <h3>
                    "Mela kicui likha thakbe dreamssel somporke. customer ra likhbe j
                    eta ekta valo site melai valo site. apnara sobai product kinen."
                </h3>
                <p>Md Nuruzzaman Emon</p>
                <img src="{{ asset('assets/client/images/emon.jpg') }}" alt="" />
            </div>
            <div class="quote-card">
                <h3>
                    "Mela kicui likha thakbe dreamssel somporke. customer ra likhbe j
                    eta ekta valo site melai valo site. apnara sobai product kinen."
                </h3>
                <p>Md Nuruzzaman Emon</p>
                <img src="{{ asset('assets/client/images/emon.jpg') }}" alt="" />
            </div>
        </div>
    </div>
@endsection
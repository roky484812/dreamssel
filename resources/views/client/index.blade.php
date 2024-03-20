@extends('layouts.client.index', ['title' => 'Dreamssel Collection'])

@section('content')
    <div class="container">
        <div class="topCarouselCategoryBox">
            <div class="categoryMenuBox">
                <ul>
                    @foreach ($_categories as $category)
                        <li>

                            {{-- {{ route('your.route.name', ['category_id' => $category->id]) }} --}}
                            {{-- Route handler for category --}}
                            <a href="javascript:void(0)">
                                {{ $category->category_name }}
                                @if (count($category->sub_category))
                                    <span><i class="fa-solid fa-angle-right"></i></span>
                                @endif
                            </a>
                            <ul>
                                @foreach ($category->sub_category as $sub_category)
                                    <li><a>{{ $sub_category->sub_category_name }}</a></li>
                                @endforeach

                                {{-- {{ route('your.route.name', ['subcategory_id' => $subcategory->id]) }} --}}
                            </ul>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="carouselBox">
                <div class="topCarousel owl-carousel owl-theme">
                    <div class="topCarouselItem">
                        <img src="{{ asset('assets/client_old/images/product2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- banner section -->

    <!-- new banner-->
    @if(isset($featured_image))
    <div class="container">
        <div class="bottomBannerBox">
            <div class="bannerBox ">
               
                    
                
                    <img src="{{$featured_image->image}}" alt="" />

                
                <div class="bannerContent">
                    <div class="bannerContentText">
                        <button class="bannerBtn">
                            অর্ডার করুন
                        </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- explore our product -->
    <div class="container">
        <div class="headerSection">
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>Our Product's</h6>
                </div>
            </div>
            <div class="flashSaleHeader">
                <div class="header">
                    <h1>Explore Our Products</h1>
                </div>
            </div>
        </div>

        <div class="ourProductBox">
            <div class="product-list-wrapper">
                <div class="row g-2">
                    @foreach ($products as $product)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="product-card">
                            <div class="card-product-image">
                                <a href="{{ route('client.product.view', $product->id) }}"
                                    class="product-card-link">
                                    <img src="{{ asset($product->thumbnail_image) }}" alt="Product image" />
                                </a>
                                <div class="card-discount">
                                    @if (auth()->user()) 
                                    <p>                                                
                                    @php
                                        try {
                                            echo round((($product->price - $product->distributor_price) / $product->price) * 100);
                                        } catch (\Throwable $th) {
                                            echo 0;
                                        }
                                    @endphp %
                                    </p>
                                    @endif
                                </div>
                                <div class="card-add-to-wishlist">
                                    <span class="badge text-bg-dark">{{ $product->country_code }}</span>
                                </div>
                            </div>
                            <div class="card-product-name">
                                <p>{{ \Illuminate\Support\Str::limit($product->title, 40, $end = '...') }}</p>
                            </div>
                            <div class="card-price">
                                @if (auth()->user())
                                <p>&#2547; {{ $product->distributor_price }} </p>
                                <span><del>&#2547; {{ $product->price }}</del></span>
                                @else
                                <p>&#2547; {{ $product->price }} </p>
                                @endif
                            </div>

                            <a href="#" class="card-buy-now text-decoration-none" type="button">
                                <p>অর্ডার করুন</p>
                            </a>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="viewAllBtnSection">
            <button class="viewAllProductBtn">View All Products</button>
        </div>
    </div>

    @include('client.widgets.popular_products')

    <!-- advartisement section -->

    <div class="container">
        <div class="addvartiseBox">
            <div class="addvartiseItem">
                <div class="addvartiseIcon"><i class="fa-solid fa-truck"></i></div>
                <h4>Free and Fast Delivery</h4>
                <p>Free Delivery for all order over 10000</p>
            </div>

            <div class="addvartiseItem">
                <div class="addvartiseIcon"><i class="fa-solid fa-headset"></i></div>
                <h4>24/7 Customer Service</h4>
                <p>Friendly 24/7 Customer Support</p>
            </div>

            <div class="addvartiseItem">
                <div class="addvartiseIcon"><i class="fa-solid fa-shield-heart"></i></div>
                <h4>Money Back Guarantee</h4>
                <p>We return money within 30 days</p>
            </div>
        </div>
    </div>
@endsection
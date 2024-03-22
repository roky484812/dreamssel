@extends('layout.master', ['title' => 'Home'])


<!-- top carousel and category start here -->

@section('content')
    <div class="container">
        <div class="topCarouselCategoryBox">
            <div class="categoryMenuBox">
                <ul>
                    @foreach ($categories as $category)
                        <li>

                            {{-- {{ route('your.route.name', ['category_id' => $category->id]) }} --}}
                            {{-- Route handler for category --}}
                            <a href="">
                                {{ $category->category_name }}
                                @if ($subcategories->where('category_id', $category->id)->isNotEmpty())
                                    <span><i class="fa-solid fa-angle-right"></i></span>
                                @endif
                            </a>
                            <ul>
                                @foreach ($subcategories->where('category_id', $category->id) as $subcategory)
                                    <li><a
                                            href="{{ route('home.subCategoryView', ['category_name' => $category->category_name, 'sub_category_id' => $subcategory->id, 'sub_category_name' => $subcategory->sub_category_name]) }}">{{ $subcategory->sub_category_name }}</a>
                                    </li>
                                @endforeach

                                {{-- {{ route('your.route.name', ['subcategory_id' => $subcategory->id]) }} --}}
                            </ul>
                        </li>
                    @endforeach





                </ul>
            </div>
            <div class="carouselBox">
                <div class="topCarousel owl-carousel owl-theme">
                    @foreach ($carousel_gallery as $carousel)
                        <div class="topCarouselItem"><img src="{{ $carousel->image }}" alt=""></div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

    <!-- flash sale section -->

    <div class="container">
        <div class="headerSection">
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>Today's</h6>
                </div>
            </div>
            <div class="flashSaleHeader flashSaleHeaderTimer">
                <div class="header">
                    <h1>Flash Sales</h1>
                </div>
                <div class="timer">
                    <div class="day">
                        <p>Days</p>
                        <h1>03</h1>
                    </div>
                    <span>:</span>
                    <div class="hours">
                        <p>Hours</p>
                        <h1>23</h1>
                    </div>
                    <span>:</span>
                    <div class="minutes">
                        <p>Minutes</p>
                        <h1>59</h1>
                    </div>
                    <span>:</span>
                    <div class="seconds">
                        <p>Seconds</p>
                        <h1>50</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="carouselSection">
            <div class="product-list-wrapper">
                <div class="flashSaleCarousel owl-carousel owl-theme">
                    @foreach ($flash_items as $product)
                        <div class="product-card">
                            <div class="card-product-image">

                                <a href="{{ route('home.productPage', ['id' => $product->id]) }}"
                                    class="product-card-link">
                                    <img src="{{ $product->thumbnail_image }}" alt="Product image" />
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
                                    @if (auth()->user())
                                        <a href="" class="addToFavBtn"
                                            data-product-fav-id="{{ $product->id }}">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('home.signInPage') }}"
                                            data-product-fav-id="{{ $product->id }}">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="card-add-to-cart">
                                    @if (auth()->user())
                                        <a href="" class="addToCartBtn"
                                            data-product-id="{{ $product->id }}">
                                            <i class="bi bi-cart3"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('home.signInPage') }}"
                                            data-product-id="{{ $product->id }}">
                                            <i class="bi bi-cart3"></i>
                                        </a>
                                    @endif
                                </div>
                                <div class="position-absolute bottom-0 end-0">
                                    <span class="badge text-bg-dark">{{ $product->country_code }}</span>
                                </div>
                            </div>
                            <div class="card-product-name">
                                <p>{{ \Illuminate\Support\Str::limit($product->title, 25, $end = '...') }}</p>
                            </div>
                            <div class="card-price">
                                @if (auth()->user())
                                    <p>&#2547; {{ $product->distributor_price }} </p>
                                    <span><del>&#2547; {{ $product->price }}</del></span>
                                @else
                                    <p>&#2547; {{ $product->price }} </p>
                                @endif
                            </div>

                            <div class="card-review-wrapper">
                                <div class="card-review">
                                    @php
                                        $rating = $product->rating;
                                    @endphp
                                    @for ($i = 0; $i < 5; $i++)
                                        @if ($rating >= 1)
                                            <img src="{{ asset('assets/client/images/filled_star.svg') }}"
                                                alt="" data-index="1" />
                                        @else
                                            <img src="{{ asset('assets/client/images/blank_star.svg') }}"
                                                alt="" data-index="5" />
                                        @endif
                                        @php
                                            $rating--;
                                        @endphp
                                    @endfor
                                </div>
                                <div class="card-number-of-reviews">
                                    <p>&#x28;{{ $product->rating_count }}&#x29;</p>
                                </div>
                            </div>
                            <a href="@if (auth()->user()) {{ route('home.placeOrderView', ['product_id' => $product->id]) }}@else
                            {{ route('home.signInPage') }} @endif"
                                class="card-buy-now text-decoration-none" type="button">
                                <p>অর্ডার করুন</p>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <div class="viewAllBtnSection">
            <button class="viewAllProductBtn">
                <a href="{{ route('flash_sale') }}" class="text-decoration-none text-light">
                    View All Products
                </a>
            </button>
        </div>
    </div>

    <!-- browse by category section -->

    <div class="container browseByCategory">
        <div class="header-category header-category-browse">
            <div class="box-pointer"></div>
            <div class="header-category-title">
                <h6>Categories</h6>
            </div>
        </div>
        <div class="flashSaleHeader browseByCategoryHeader">
            <h1>Browse by Category</h1>
        </div>
        <div class="categoryCarouselBox owl-carousel owl-theme">

            @foreach ($categories as $category)
                <div class="categoryCarouselItem">
                    <span>
                        <img src="{{ asset($category->image) }}" alt="">
                    </span>
                    <p>{{ $category->category_name }}</p>
                </div>
            @endforeach

        </div>
    </div>

    <!-- best selling product -->

    <div class="container">
        <div class="header-category">
            <div class="box-pointer"></div>
            <div class="header-category-title">
                <h6>This Month</h6>
            </div>
        </div>
        <div class="flashSaleHeader bestSellHeader">
            <div class="header">
                <h1>Best Selling Products</h1>
            </div>
            <div class="ViewAllBtnBox">
                <button class="ViewAllBtn">View All</button>
            </div>
        </div>
        <!-- product list  -->
        <div class="product-list-wrapper">
            <div class="row">
                @foreach ($products as $product)
                    @if ($product->status == 3)
                        <div class="col-md-3 col-sm-4 col-xsm-6">

                            <div class="product-card">
                                <div class="card-product-image">

                                    <a href="{{ route('home.productPage', ['id' => $product->id]) }}"
                                        class="product-card-link">
                                        <img src="{{ $product->thumbnail_image }}" alt="Product image" />
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
                                        @if (auth()->user())
                                            <a href="" class="addToFavBtn"
                                                data-product-fav-id="{{ $product->id }}">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('home.signInPage') }}"
                                                data-product-fav-id="{{ $product->id }}">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="card-add-to-cart">
                                        @if (auth()->user())
                                            <a href="" class="addToCartBtn"
                                                data-product-id="{{ $product->id }}">
                                                <i class="bi bi-cart3"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('home.signInPage') }}"
                                                data-product-id="{{ $product->id }}">
                                                <i class="bi bi-cart3"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-product-name">
                                    <p>{{ \Illuminate\Support\Str::limit($product->title, 25, $end = '...') }}</p>
                                </div>
                                <div class="card-price">
                                    @if (auth()->user())
                                        <p>&#2547; {{ $product->distributor_price }} </p>
                                        <span><del>&#2547; {{ $product->price }}</del></span>
                                    @else
                                        <p>&#2547; {{ $product->price }} </p>
                                    @endif
                                </div>

                                <div class="card-review-wrapper">
                                    <div class="card-review">
                                        @php
                                            $rating = $product->rating;
                                        @endphp
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($rating >= 1)
                                                <img src="{{ asset('assets/client/images/filled_star.svg') }}"
                                                    alt="" data-index="1" />
                                            @else
                                                <img src="{{ asset('assets/client/images/blank_star.svg') }}"
                                                    alt="" data-index="5" />
                                            @endif
                                            @php
                                                $rating--;
                                            @endphp
                                        @endfor
                                    </div>
                                    <div class="card-number-of-reviews">
                                        <p>&#x28;{{ $product->rating_count }}&#x29;</p>
                                    </div>
                                </div>
                                <a href="@if (auth()->user()) {{ route('home.placeOrderView', ['product_id' => $product->id]) }}@else
                                {{ route('home.signInPage') }} @endif"
                                    class="card-buy-now text-decoration-none" type="button">
                                    <p>অর্ডার করুন</p>
                                </a>
                            </div>

                        </div>
                    @endif
                @endforeach

            </div>
        </div>
    </div>

    <!-- banner section -->

    <!-- new banner-->
    <div class="container">
        <div class="bottomBannerBox">
            <div class="bannerBox ">


                @if ($featured_image)
                    <img src="{{ $featured_image->image }}" alt="" />
                @endif

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
                <div class="row">
                    @foreach ($products as $product)
                        <div class="col-md-3 col-sm-4 col-xsm-6">

                            <div class="product-card">
                                <div class="card-product-image">

                                    <a href="{{ route('home.productPage', ['id' => $product->id]) }}"
                                        class="product-card-link">
                                        <img src="{{ $product->thumbnail_image }}" alt="Product image" />
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
                                        @if (auth()->user())
                                            <a href="" class="addToFavBtn"
                                                data-product-fav-id="{{ $product->id }}">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('home.signInPage') }}"
                                                data-product-fav-id="{{ $product->id }}">
                                                <i class="fa-regular fa-heart"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="position-absolute bottom-0 end-0">
                                        <span class="badge text-bg-dark">{{ $product->country_code }}</span>
                                    </div>
                                    <div class="card-add-to-cart">
                                        @if (auth()->user())
                                            <a href="" class="addToCartBtn"
                                                data-product-id="{{ $product->id }}">
                                                <i class="bi bi-cart3"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('home.signInPage') }}"
                                                data-product-id="{{ $product->id }}">
                                                <i class="bi bi-cart3"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-product-name">
                                    <p>{{ \Illuminate\Support\Str::limit($product->title, 25, $end = '...') }}</p>
                                </div>
                                <div class="card-price">
                                    @if (auth()->user())
                                        <p>&#2547; {{ $product->distributor_price }} </p>
                                        <span><del>&#2547; {{ $product->price }}</del></span>
                                        @else
                                        <p>&#2547; {{ $product->price }} </p>
                                    @endif
                                </div>

                                <div class="card-review-wrapper">
                                    <div class="card-review">
                                        @php
                                            $rating = $product->rating;
                                        @endphp
                                        @for ($i = 0; $i < 5; $i++)
                                            @if ($rating >= 1)
                                                <img src="{{ asset('assets/client/images/filled_star.svg') }}"
                                                    alt="" data-index="1" />
                                            @else
                                                <img src="{{ asset('assets/client/images/blank_star.svg') }}"
                                                    alt="" data-index="5" />
                                            @endif
                                            @php
                                                $rating--;
                                            @endphp
                                        @endfor
                                    </div>
                                    <div class="card-number-of-reviews">
                                        <p>&#x28;{{ $product->rating_count }}&#x29;</p>
                                    </div>
                                </div>
                                <a href="{{ route('home.placeOrderView', ['product_id' => $product->id]) }}"
                                    class="card-buy-now text-decoration-none" type="button">
                                    <p>অর্ডার করুন</p>
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="viewAllBtnSection">
            <button class="viewAllProductBtn">
                <a href="{{ route('home.shopPage') }}" class="text-decoration-none text-light">
                    View All Products
                </a>
            </button>
        </div>
    </div>

    <!-- bottom features product section -->
    <!-- features product section from farhan -->
    <div class="container">
        <div class="bottomFeatureProducts">
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>Featured</h6>
                </div>
            </div>
            <div class="flashSaleHeader">
                <h1>New Arrival</h1>
            </div>

            @if ($new_araival)
                <div class="new-arival-products">
                    <div class="left-large">
                        <a href="">
                            <img src="{{ $new_araival->large_potrait }}" alt="" />
                        </a>
                    </div>

                    <div class="right-wrapper">
                        <div class="right-top">
                            <a href="">
                                <img src="{{ $new_araival->large_landscape }}" alt="" />
                            </a>
                        </div>
                        <div class="right-bottom-wrapper">
                            <div class="right-bottom-left">
                                <a href="">
                                    <img src="{{ $new_araival->lsm_potrait }}" alt="" />
                                </a>
                            </div>
                            <div class="right-bottom-right">
                                <a href="">
                                    <img src="{{ $new_araival->rsm_potrait }}" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    </div>
    </div>
    <!-- end -->

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
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.addToCartBtn').on('click', function(event) {
                event.preventDefault(); // Prevent the default behavior (following the link)

                // Get the product ID from the data attribute
                var productId = $(this).data('product-id');


                $.ajax({
                    url: "{{ url('/add-to-cart-v') }}/" + productId,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message, 'Success');
                        } else {
                            toastr.error(response.message, 'Error');
                        }


                    },
                    error: function(error) {
                        toastr.error('Something went wrong ):', 'Error');
                        console.log(error);
                    }
                });
            });


        });
    </script>

    <script>
        $(document).ready(function() {
            $('.addToFavBtn').on('click', function(event) {
                event.preventDefault(); // Prevent the default behavior (following the link)

                // Get the product ID from the data attribute
                var productId = $(this).data('product-fav-id');

                // Make an Ajax request to add the product to the cart
                $.ajax({
                    url: "{{ url('/add/fav-list') }}/" + productId,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message, 'Success');
                        } else {
                            toastr.error(response.message, 'Error');
                        }
                        // Update the cart badge count or handle the response as needed

                    },
                    error: function(error) {
                        toastr.error('Something went wrong ):', 'Error');
                        console.log(error);
                    }
                });
            });


        });
    </script>
@endsection

@extends('layout.master', ['title' => $sub_category_name])


@section('content')
    <div class="container mb-5">
        <div class="headerSection">
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>{{ $category_name }}</h6>
                </div>
            </div>
            <div class="flashSaleHeader">
                <div class="header">
                    <h1>{{ $sub_category_name }}</h1>
                </div>
            </div>
        </div>

        <div class="ourProductBox">
            <div class="product-list-wrapper">
                <div class="row g-1">
                    @foreach ($products as $product)
                        <div class="col-md-3 col-sm-4 col-xsm-6">

                            <div class="product-card">
                                <div class="card-product-image">
        
                                    <a href="{{ route('home.productPage', ['id' => $product->id]) }}" class="product-card-link">
                                        <img src="{{ asset($product->thumbnail_image) }}" alt="Product image" />
                                    </a>
                                    <div class="card-discount">
                                        @if (auth()->user())
                                            <p>
                                                @php
                                                    try {
                                                        echo round(
                                                            (($product->price - $product->distributor_price) /
                                                                $product->price) *
                                                                100,
                                                        );
                                                    } catch (\Throwable $th) {
                                                        echo 0;
                                                    }
                                                @endphp %
                                            </p>
                                        @endif
                                    </div>
                                    <div class="card-add-to-wishlist">
                                        @if (auth()->user())
                                            <a href="javascript:void(0)" class="addToFavBtn" data-product-fav-id="{{ $product->id }}">
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
                                            <a href="javascript:void(0)" class="addToCartBtn" data-product-id="{{ $product->id }}">
                                                <i class="bi bi-cart3"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('home.signInPage') }}" data-product-id="{{ $product->id }}">
                                                <i class="bi bi-cart3"></i>
                                            </a>
                                        @endif
                                    </div>
                                    <div class="position-absolute bottom-0 end-0">
                                        <span class="badge text-bg-dark">{{ $product->country_code }}</span>
                                    </div>
                                </div>
                                <div class="card-product-name">
                                    <p>
                                        <a href="{{ route('home.productPage', ['id' => $product->id]) }}" class="text-decoration-none text-dark">
                                            {{ \Illuminate\Support\Str::limit($product->title, 25, $end = '...') }}
                                        </a>
                                    </p>
                                </div>
                                <div class="card-price">
                                    @if (auth()->user())
                                        <p>&#2547; {{ $product->distributor_price }} </p>
                                        <span><del>&#2547; {{ $product->price }}</del></span>
                                    @else
                                        <p>&#2547; {{ $product->price }} </p>
                                    @endif
                                </div>
        
                                @if ($product->rating_count > 0)
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
                                @endif
                                <a href="{{ route('home.placeOrderView', ['product_id' => $product->id]) }}"
                                    class="card-buy-now btn text-decoration-none" type="button">
                                    <p>অর্ডার করুন</p>
                                </a>
                            </div>

                        </div>
                    @endforeach

                    <!-- Pagination -->
                    <div class=" paginate-style justify-content-center">
                        {!! $products->links() !!}
                    </div>


                </div>

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

                // Make an Ajax request to add the product to the cart
                $.ajax({
                    url: "{{ url('/add-to-cart-v') }}/" + productId,
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

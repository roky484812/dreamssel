@extends('layout.master', ['title' => 'Search'])


@section('content')
    <div class="container mb-5">
        <div class="headerSection">
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>search</h6>
                </div>
            </div>
            <div class="flashSaleHeader">
                <div class="header">
                    <h1>Search results</h1>
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
                                        <p>-{{ round((($product->price - $product->discounted_price) / $product->price) * 100) }}%
                                        </p>
                                    </div>
                                    <div class="card-add-to-wishlist">
                                        @if (auth()->user())
                                            <a href="" class="addToFavBtn" data-product-fav-id="{{ $product->id }}">
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
                                            <a href="" class="addToCartBtn" data-product-id="{{ $product->id }}">
                                                <i class="bi bi-cart3"></i>
                                            </a>
                                        @else
                                            <a href="{{ route('home.signInPage') }}" data-product-id="{{ $product->id }}">
                                                <i class="bi bi-cart3"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                                <div class="card-product-name">
                                    <p>{{ \Illuminate\Support\Str::limit($product->title, 40, $end = '...') }}</p>
                                </div>
                                <div class="card-price">
                                    <p>&#2547; {{ $product->discounted_price }} </p>
                                    <span><del>&#2547; {{ $product->price }}</del></span>
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
                    @endforeach

                    <!-- Pagination -->
                    {{-- <div class=" paginate-style justify-content-center">
                        {!! $products->links() !!}
                    </div> --}}


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
@extends('layout.master', ['title' => 'Favorite List'])

@php
    use App\Models\Product;
@endphp


@section('content')
    <div class="container mb-5">
        <div class="headerSection">
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>Beloved Products</h6>
                </div>
            </div>
            <div class="flashSaleHeader">
                <div class="header">
                    <h1>Favourite Lists</h1>
                </div>
            </div>
        </div>



        <div class="ourProductBox">
            <div class="product-list-wrapper">
                <div class="row g-1">
                    @if ($fav_product_lists->count() > 0)
                        @foreach ($fav_product_lists as $fav_product_list)
                            <?php
                            $product = Product::where('products.id', $fav_product_list->product_id)
                                ->leftJoin('product_countries', 'product_countries.id', 'products.country_id')
                                ->select('products.*', 'product_countries.code as country_code')
                                ->first();
                            ?>
                            <div class="col-md-3 col-sm-4 col-xsm-6" class="card-col">

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
                                            <a href="javascript:void(0)" class="remove-product"
                                                data-fav-list-id="{{ $fav_product_list->id }}">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
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
                                        @if ($product->rating_count > 0)
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
                                        @endif
                                    </div>
                                    <a href="{{ route('home.placeOrderView', ['product_id' => $product->id]) }}"
                                        class="card-buy-now btn text-decoration-none" type="button">
                                        <p>অর্ডার করুন</p>
                                    </a>
                                </div>

                            </div>
                        @endforeach
                    @else
                        <div class=" col-md-12 d-flex justify-content-center">
                            <p>No Favorite item has been added</p>
                        </div>
                    @endif

                    <!-- Pagination -->



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
            $('.remove-product').on('click', function() {
                event.preventDefault();

                var productCard = $(this).closest('.product-card');
                productCard.addClass('remove-animation');

                // Optionally, you can remove the element from the DOM after the animation completes
                setTimeout(function() {
                    productCard.remove();
                }, 300);
                var product_list_id = $(this).data(
                    'fav-list-id'); // Use the appropriate way to get the product ID



                console.log(product_list_id);

                $.ajax({
                    url: "{{ url('/remove-from-fav') }}/" + product_list_id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        // Add any other data you need to send to the server
                    },
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
@endsection

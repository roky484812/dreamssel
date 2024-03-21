<div class="container">
    <div class="headerSection">
        <div class="header-category">
            <div class="box-pointer"></div>
            <div class="header-category-title">
                <h6>Discount's</h6>
            </div>
        </div>
        <div class="flashSaleHeader flashSaleHeaderTimer">
            <div class="header">
                <h1>Most Discount Products</h1>
            </div>
        </div>
    </div>
    <div class="carouselSection">
        <div class="product-list-wrapper">
            @if (count($discount_products))
            <div class="flashSaleCarousel owl-carousel owl-theme">
                
                @foreach ($discount_products as $discount_product)
                    <div class="product-card">
                        <div class="card-product-image">

                            <a href="{{ route('client.product.view', $discount_product->id) }}"
                                class="product-card-link">
                                <img src="{{ $discount_product->thumbnail_image }}" alt="Product image" />
                            </a>
                            <div class="card-discount">
                                @if (auth()->user()) 
                                <p>                                                
                                @php
                                    try {
                                        echo round((($discount_product->price - $discount_product->distributor_price) / $discount_product->price) * 100);
                                    } catch (\Throwable $th) {
                                        echo 0;
                                    }
                                @endphp %
                                </p>
                                @endif
                            </div>
                            <div class="card-add-to-wishlist">
                                <span class="badge text-bg-dark">{{ $discount_product->country_code }}</span>
                            </div>
                        </div>
                        <div class="card-product-name">
                            <a href="{{ route('client.product.view', $discount_product->id) }}">{{ \Illuminate\Support\Str::limit($discount_product->title, 40, $end = '...') }}</a>
                        </div>
                        <div class="card-price">
                            @if (auth()->user())
                                <p>&#2547; {{ $discount_product->distributor_price }} </p>
                                <span><del>&#2547; {{ $discount_product->price }}</del></span>
                            @else
                                <p>&#2547; {{ $discount_product->price }} </p>
                            @endif
                        </div>

                        <a href="#" class="card-buy-now text-decoration-none" type="button">
                            <p>অর্ডার করুন</p>
                        </a>
                    </div>
                @endforeach

            </div>
            @else
            <div>
                <h3 class="text-center text-muted">No Products!</h3>
            </div>
            @endif
        </div>
    </div>
    {{-- <div class="viewAllBtnSection">
        <button class="viewAllProductBtn">View All Products</button>
    </div> --}}
</div>
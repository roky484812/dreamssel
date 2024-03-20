<div class="container">
    <div class="headerSection">
        <div class="header-category">
            <div class="box-pointer"></div>
            <div class="header-category-title">
                <h6>Popular's</h6>
            </div>
        </div>
        <div class="flashSaleHeader flashSaleHeaderTimer">
            <div class="header">
                <h1>Popular Products</h1>
            </div>
        </div>
    </div>
    <div class="carouselSection">
        <div class="product-list-wrapper">
            <div class="flashSaleCarousel owl-carousel owl-theme">

                @foreach ($popular_products as $popular_product)
                    <div class="product-card">
                        <div class="card-product-image">

                            <a href="{{ route('client.product.view', $popular_product->id) }}"
                                class="product-card-link">
                                <img src="{{ $popular_product->thumbnail_image }}" alt="Product image" />
                            </a>
                            <div class="card-discount">
                                @if (auth()->user()) 
                                <p>                                                
                                @php
                                    try {
                                        echo round((($popular_product->price - $popular_product->distributor_price) / $popular_product->price) * 100);
                                    } catch (\Throwable $th) {
                                        echo 0;
                                    }
                                @endphp %
                                </p>
                                @endif
                            </div>
                            <div class="card-add-to-wishlist">
                                <span class="badge text-bg-dark">{{ $popular_product->country_code }}</span>
                            </div>
                        </div>
                        <div class="card-product-name">
                            <p>{{ \Illuminate\Support\Str::limit($popular_product->title, 40, $end = '...') }}</p>
                        </div>
                        <div class="card-price">
                            @if (auth()->user())
                                <p>&#2547; {{ $popular_product->distributor_price }} </p>
                                <span><del>&#2547; {{ $popular_product->price }}</del></span>
                            @else
                                <p>&#2547; {{ $popular_product->price }} </p>
                            @endif
                        </div>

                        <a href="#" class="card-buy-now text-decoration-none" type="button">
                            <p>অর্ডার করুন</p>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
    <div class="viewAllBtnSection">
        <button class="viewAllProductBtn">View All Products</button>
    </div>
</div>
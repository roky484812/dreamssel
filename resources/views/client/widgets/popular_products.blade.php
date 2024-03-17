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
                    @if (auth()->user())  
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
                    @endif
                    <div class="product-pic">
                        <img src="{{ asset($popular_product->thumbnail_image) }}" alt="" />
                    </div>
                </div>
                <div class="title-price-wrapper">
                    <a href="{{ route('client.product.view', $popular_product->id) }}" class="text-decoration-none product-title h3">{{ Str::limit($popular_product->title, 40) }}</a>
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
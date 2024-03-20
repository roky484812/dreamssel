<!-- Related product section -->
<div class="populerProductBox">
    <div class="header-category">
        <div class="box-pointer"></div>
        <div class="header-category-title">
            <h6>Related's</h6>
        </div>
    </div>

    <div class="our-feature-product-header">
        <h1>Related Products</h1>
    </div>

    <div class="PopulerProducts owl-carousel">
        <!-- product card start -->
        @foreach ($related_products as $related_product)
        <div class="populerItem ">
            <div class="wrapper">
                <div class="pic-wrapper">
                    <div class="negative-percentage">
                        @if (auth()->user()) 
                        <p>
                            @php
                                try {
                                    echo round((($related_product->price - $related_product->distributor_price) / $related_product->price) * 100);
                                } catch (\Throwable $th) {
                                    echo 0;
                                }
                            @endphp %
                        </p>
                        @endif
                    </div>
                    <div class="product-pic">
                        <img src="{{ asset($related_product->thumbnail_image) }}" alt="" />
                    </div>
                </div>
                <div class="title-price-wrapper">
                    <a href="{{ route('client.product.view', $related_product->id) }}" class="text-decoration-none product-title h3">{{ Str::limit($related_product->title, 40) }}</a>

                    <div class="rate-buy-now-wrapper">
                        <div class="price-wrapper">
                            @if(auth()->user())
                            <h2 class="price">{{ $related_product->distributor_price }} ৳</h2>
                            <div class="closePriceAndCategory">
                                <del class="crossed-price">{{ $related_product->price }}</del>
                                <div class="regional-tag">
                                    <p>{{ $related_product->country_code }}</p>
                                </div>
                            </div>
                            @else
                            <h2 class="price">{{ $related_product->price }} ৳</h2>
                            <div class="closePriceAndCategory">
                                <div class="regional-tag">
                                    <p>{{ $related_product->country_code }}</p>
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
    </div>
</div>
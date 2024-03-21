    <div class="related-product-wrapper">
        <div class="container">
            <div class="section-devider">
                <div class="front-box"></div>
                <p>Related</p>
            </div>
            <div class="flashSaleHeader flashSaleHeaderTimer">
                <div class="header">
                    <h4>Related Products</h4>
                </div>
            </div>

            <div class="product-list-wrapper">
                <div class="row g-2">
                    @foreach ($related_products as $related_product)
                        <div class="col-lg-3 col-md-4 col-sm-6">
                            <div class="product-card">
                                <div class="card-product-image">
                                    <a href="{{ route('client.product.view', $related_product->id) }}"
                                        class="product-card-link">
                                        <img src="{{ asset($related_product->thumbnail_image) }}" alt="Product image" />
                                    </a>
                                    <div class="card-discount">
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
                                    <div class="card-add-to-wishlist">
                                        <span class="badge text-bg-dark">{{ $related_product->country_code }}</span>
                                    </div>
                                </div>
                                <div class="card-product-name">
                                    <a href="{{ route('client.product.view', $related_product->id) }}">{{ \Illuminate\Support\Str::limit($related_product->title, 40, $end = '...') }}</a>
                                </div>
                                <div class="card-price">
                                    @if (auth()->user())
                                        <p>&#2547; {{ $related_product->distributor_price }} </p>
                                        <span><del>&#2547; {{ $related_product->price }}</del></span>
                                    @else
                                        <p>&#2547; {{ $related_product->price }} </p>
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
    </div>
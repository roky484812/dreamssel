@extends('layouts.client.index', ['title' => 'Dreamssel Collection'])
@section('content')
    <div class="container mb-5">
        <div class="headerSection">
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>{{ $category->category_name }}</h6>
                </div>
            </div>
            <div class="flashSaleHeader">
                <div class="header">
                    <h1>{{ $category->sub_category_name }}</h1>
                </div>
            </div>
        </div>

        <div class="ourProductBox">
            <div class="product-list-wrapper">
                <div class="row">
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

                    <!-- Pagination -->
                    <div class=" paginate-style justify-content-center">
                        {!! $products->links() !!}
                    </div>
                   

                </div>
            </div>
        </div>
    </div>
@endsection
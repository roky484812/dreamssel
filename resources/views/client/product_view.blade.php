@extends('layouts.client.client')
@section('content')
    <!-- breadcrumb start here -->
    <div class="container breadcrumbContainer">
        <div class="path-bar">
            <div class="full-path">
                <p class="inactive-path">Home /</p>
                <span class="active-path">{{ $product->title }}</span>
            </div>
        </div>
    </div>

    <div class="productView">
        <div class="product-images">
            <div class="secondary-images">
            @foreach ($product_galleries as $product_gallery)
            <div class="image"><img src="{{ asset($product_gallery->image) }}" alt="" /></div>
            @endforeach
            </div>
            <div class="primary-image">
            <img src="{{ asset($product->thumbnail_image) }}" alt="" />
            </div>
        </div>

        <div class="productDetails ">
            <div class="productDescription">
                <h1>{{ $product->title }}</h1>
                <p>{{ $product->short_description }}</p>
            </div>
            <div class="proDesTable">
                <div class="proDesTableLeft">
                    <div class="productAttributeItem">
                        <div class="descriptionTitle">
                            <p>Category:</p>
                        </div>
                        <div class="descriptionBox">
                            <p>{{ $product->category_name }}</p>
                        </div>
                    </div>
                    <div class="productAttributeItem">
                        <div class="descriptionTitle">
                            <p>Sub Category:</p>
                        </div>
                        <div class="descriptionBox">
                            <p>{{ $product->sub_category_name }}</p>
                        </div>
                    </div>
                    <div class="productAttributeItem">
                        <div class="descriptionTitle">
                            <p>Stock:</p>
                        </div>
                        <div class="descriptionBox">
                            <p id="sku">
                                @if ($product->sku)
                                InStock ({{ $product->sku }})
                                @else
                                OutOfStock ({{ $product->sku }})
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
                <form id="product_attr" class="proDesTableRight">
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <div class="productAttributeItem">
                        <div class="descriptionTitle">
                            <p>Date:</p>
                        </div>
                        <div class="descriptionBox">
                            <p>{{ $carbon->parse($product->created_at)->format('d-m-Y') }}</p>
                        </div>
                    </div>
                    <div class="productAttributeItem">
                        <div class="descriptionTitle">
                            <p>Country:</p>
                        </div>
                        <div class="descriptionBox">
                            <p><span class="regional-tag">{{ $product->country_name }}</span></p>
                        </div>
                    </div>
                    @foreach ($product_attributes as $i => $product_attribute)
                    <input type="hidden" name="attributes[{{ $i }}]" value="{{ $product_attribute->name }}">
                    <div class="productAttributeItem">
                        <div class="descriptionTitle">
                            <p>{{ $product_attribute->name }}:</p>
                        </div>
                        <div class="descriptionBox">
                            @foreach ($product_attribute->attribute_values as $attribute_value)
                            <input class="sizeRadioBtn product_attr_val" type="radio" id="{{ $attribute_value->value }}" name="{{ $product_attribute->name }}" value="{{ $attribute_value->value }}">
                            <label class="sizeLabel" for="{{ $attribute_value->value }}"> <span>{{ $attribute_value->value }}</span></label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach

                </form>
            </div>
            <div class="proDesPriceBox">
                @if (auth()->user())
                <div class="desPriceBox">
                    <h2 class="price" id="distributor_price">{{ $product->distributor_price }} BDT</h2>
                    <div class="closePriceAndCategory">
                        <del class="crossed-price" id="price">{{ $product->price }}</del>
                    </div>
                </div>
                @else
                <div class="desPriceBox">
                    <h2 class="price" id="price">{{ $product->price }} BDT</h2>
                </div>
                @endif
                <div class="desQuantity">
                    <form class="quantityForm" role="search">

                        <input class="quanInputBox" type="text" placeholder="1..">
                        <!-- drop down -->
                        <div class="quantityDropdown">
                            <button class="pscBtn" type="button">
                                PSC <span><i class="fa-solid fa-angle-down"></i></span>
                            </button>

                        </div>
                        <!-- drop down end -->

                    </form>
                </div>
                <div class="desBuyBtn">
                    <button class="buy-now-button">
                        Buy now
                    </button>
                </div>


            </div>
            <div class="full_description">
                <h4 class="mb-2">Full Description</h4>
                <p>{!! $product->description !!}</p>
            </div>
        </div>
    </div>
    <!-- populer product section -->
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
                            <p>
                                @php
                                    try {
                                        echo round((($related_product->price - $related_product->distributor_price) / $related_product->price) * 100);
                                    } catch (\Throwable $th) {
                                        echo 0;
                                    }
                                @endphp %
                            </p>
                        </div>
                        <div class="product-pic">
                            <img src="{{ asset($related_product->thumbnail_image) }}" alt="" />
                        </div>
                    </div>
                    <div class="title-price-wrapper">
                        <a href="{{ route('client.product.view', $related_product->id) }}" class="text-decoration-none product-title h3">{{ $related_product->title }}</a>

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
@endsection
@push('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('change', '.product_attr_val', function(){
                var formData = new FormData($('#product_attr')[0]);
                var dataObject = Object.fromEntries(formData.entries());
                $.ajax({
                    url: '{{ route('client.product.combination') }}',
                    type: 'GET',
                    data: dataObject,
                    dataType: 'json',
                    success: function(response) {
                        if(response.status){
                            var stock = '';
                            if(response.data.sku){
                                stock = `InStock: (${response.data.sku})`;
                            }else{
                                stock = `OutOfStock: (${response.data.sku})`;
                            }
                            $('#sku').html(stock);

                            @if (auth()->user())
                                $('#distributor_price').html(`${response.data.distributor_price} BDT`);
                                $('#price').html(response.data.price);
                            @else
                                $('#price').html(`${response.data.price} BDT`);
                            @endif

                        }
                    },
                    error: function(error){
                        console.log(error);
                    }
                });
            });
        });
    </script>
@endpush
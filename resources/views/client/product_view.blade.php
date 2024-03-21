@extends('layouts.client.index', ['title' => $product->title])
@section('content')
    <div class="container" id="single_product">
        <div class="path-bar">
            <div class="full-path">
                <p class="inactive-path">Products /</p>
                <span class="active-path">{{ $product->title }}</span>
            </div>
        </div>

        <div class="viewProduct">
            <div class="product-images">
                @if (count($product_galleries))
                <div class="secondary-images">
                    @foreach ($product_galleries as $product_gallery)
                        <div class="image">
                            <img onclick="swapImages('{{ asset($product_gallery->image) }}','{{ asset($product->thumbnail_image) }}')" src="{{ asset($product_gallery->image) }}" alt="Product gallery images" />
                        </div>
                    @endforeach
                </div>
                @endif
                <div class="primary-image">
                    <img id="big-image" src="{{ asset($product->thumbnail_image) }}" alt="Product images " />
                </div>
            </div>
            <div class="product-details">
                <form id="product_attr">
                    <input type="hidden" value="{{ $product->id }}" name="product_id">
                    @csrf
                    <div class="product-name">
                        <h4>{{ $product->title }}</h4>
                    </div>
                    <div class="review-stock-wrapper" id="sku">
                        @if ($product->sku > '0')
                            <div class="in-stock">
                                <p>In Stock</p>
                            </div>
                        @else
                            <div class="out-stock">
                                <p>Stock Out</p>
                            </div>
                        @endif
                    </div>

                    <div class="price" id="price">
                        @if(auth()->user())
                            <h3>&#2547; {{ $product->distributor_price }}</h3>
                            <h6><del>(&#2547; {{ $product->price }})</del></h6>
                        @else
                            <h3>&#2547; {{ $product->price }}</h3>
                        @endif
                    </div>
                    <div class="product-dessriptions">
                        <p>
                            {{ $product->short_description }}
                        </p>
                    </div>
                    <div class="header-devider"></div>
                    @foreach ($product_attributes as $i => $product_attribute)
                    <div class="size-radio">
                        <input type="hidden" name="attributes[{{ $i }}]" value="{{ $product_attribute->name }}">
                        <p>{{ $product_attribute->name }}:</p>
                        <div class="size-radio-button">
                            @foreach ($product_attribute->attribute_values as $attribute_value)
                            <label class="square-radio">
                                <input class="color-value product_attr_val" type="radio" name="{{ $product_attribute->name }}" value="{{ $attribute_value->value }}" />
                                <span class="checkmark"></span>
                                <span class="label-text">{{ $attribute_value->value }}</span>
                            </label>
                            @endforeach
                        </div>
                    </div>
                    @endforeach
                    

                    <a href="#" class="text-decoration-none">
                        <div class="add-to-cart cart-phn-whatsapp" type="button">
                            অর্ডার করুন
                        </div>
                    </a>

                    <a href="tel:01752922241" class="text-decoration-none">
                        <div class="add-to-cart cart-phn-whatsapp" type="button">
                            <i class="bi bi-telephone-fill"></i>
                            <p>01752922241</p>
                        </div>
                    </a>

                    <a href="https://wa.me/8801752922241" target="_blank" class="text-decoration-none">
                        <div class="add-to-cart cart-phn-whatsapp" type="button">
                            <i class="bi bi-whatsapp"></i>
                            <p>01752922241</p>
                        </div>
                    </a>

                </form>
                <div class="header-devider mb-2 mt-3"></div>
                <div class="desc">
                    <p>{!! $product->description !!}</p>
                </div>
            </div>
        </div>
    </div>
    <!-- product-details end -->


    {{-- Related product start --}}
    @include('client.widgets.related_products')
@endsection

@push('scripts')
    <script>
        $(document).ready(function(){
            $(document).on('change', '.product_attr_val', function(){
                var formData = new FormData($('#product_attr')[0]);
                var dataObject = Object.fromEntries(formData.entries());
                $('#single_product').addClass('disabled');
                $.ajax({
                    url: '{{ route('client.product.combination') }}',
                    type: 'GET',
                    data: dataObject,
                    dataType: 'json',
                    success: function(response) {
                        if(response.status){
                            var stock = '';
                            if(response.data.sku){
                                stock = `
                                    <div class="in-stock">
                                        <p>In Stock</p>
                                    </div>
                                `;
                            }else{
                                stock = `
                                    <div class="out-stock">
                                        <p>Stock Out</p>
                                    </div>
                                `;
                            }
                            $('#sku').html(stock);

                            @if (auth()->user())
                            
                                $('#distributor_price').html(`${response.data.distributor_price} BDT`);
                                $('#price').html(`
                                    <h3>&#2547; ${response.data.distributor_price}</h3>
                                    <h6>
                                        <del>(&#2547; ${response.data.price})</del>
                                    </h6>
                                `);
                            @else
                                $('#price').html(`<h3>&#2547; ${response.data.price}</h3>`);
                            @endif

                        }
                    },
                    error: function(error){
                        console.log(error);
                    },
                    complete: function(){
                        $('#single_product').removeClass('disabled');
                    }
                });
            });
        });
        function swapImages(smallImage, bigImage) {
            var bigImageElement = document.getElementById('big-image');
            var thumbnailElement = event.target;

            // Swap src attributes
            var temp = bigImageElement.src;
            bigImageElement.src = thumbnailElement.src;
            thumbnailElement.src = temp;
        }
    </script>
@endpush
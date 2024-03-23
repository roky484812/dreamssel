@extends('layout.master', ['title' => 'Product'])

@section('content')
    <div class="container">
        <div class="path-bar">
            <div class="full-path">
                <p class="inactive-path">{{ $single_category->category_name }} /</p>
                <span class="active-path">{{ $single_sub_category->sub_category_name }}</span>
            </div>
        </div>

        <div class="viewProduct" id="single_product">
            <div class="product-images">
                <div class="secondary-images">
                    @foreach ($product_galleries as $product_gallery)
                        <div class="image"><img
                                onclick="swapImages('{{ asset($product_gallery->image) }}','{{ asset($product->thumbnail_image) }}')"
                                src="{{ asset($product_gallery->image) }}" alt="Product gallery images" /></div>
                    @endforeach
                </div>
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
                        <div class="fav-icon addToFavBtn" data-product-fav-id="{{ $product->id }}">
                            <div class="toggle-button" type="button" id="fav-toggle">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                        </div>
                    </div>
                    <div class="review-stock-wrapper">
                        <div class="review">
                            @php
                                $rating = $product->rating;
                            @endphp
                            @for ($i = 0; $i < 5; $i++)
                                @if ($rating >= 1)
                                    <img src="{{ asset('assets/client/images/filled_star.svg') }}" alt=""
                                        data-index="1" />
                                @else
                                    <img src="{{ asset('assets/client/images/blank_star.svg') }}" alt=""
                                        data-index="5" />
                                @endif
                                @php
                                    $rating--;
                                @endphp
                            @endfor
                        </div>
                        <div class="number-of-reviews">
                            <p>&#x28;{{ $product->rating_count }} reviews&#x29;</p>
                        </div>
                        <div class="vertical-devider"></div>
                        <div id="sku">
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
                        <div class="vertical-devider"></div>
                        <div>
                            {{$product->country_name}}
                        </div>
                    </div>

                    <div class="price" id="price">
                    @if (auth()->user())
                        <h3 >&#2547; {{ $product->distributor_price }}</h3>
                        <h6 ><del>(&#2547; {{ $product->price }})</del></h6>
                    @else
                        <h3 >&#2547; {{ $product->price }}</h3>
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

                    <div class="quantity-buy-fav-wrapper">
                        <div class="quantity">
                            <button class="negative" type="button" onclick="decreaseQuantity()">-</button>
                            <input type="number" id="quantity" name="quantity" min="1" value="1" />
                            <button class="positive" type="button" onclick="increaseQuantity()">+</button>
                        </div>
                        <div class="buyNowReviewBtnBox">
                            <div class="buy-now ">
                                <button type="submit" class="buy-now-button ">অর্ডার করুন</button>
                            </div>
                            <div class="buy-now reviewBtnBox">
                                <a href="#review-section" type="button"
                                    class=" btn d-flex align-items-center text-decoration-none reviewBtn commonBtn">রিভিউ
                                    দেখুন</a>
                            </div>

                        </div>

                    </div>
                </form>
                    @if (auth()->user())
                        <div class="add-to-cart cart-phn-whatsapp" type="button" id="add-to-cart"
                            data-main-product-id="{{ $product->id }}">
                            <i class="bi bi-cart3"></i>
                            <p>কার্টে যোগ করুন</p>
                        </div>
                    @else
                        <a href="{{ route('home.signInPage') }}"
                            class=" text-decoration-none add-to-cart cart-phn-whatsapp" type="button"
                            data-main-product-id="{{ $product->id }}">
                            <i class="bi bi-cart3"></i>
                            <p>কার্টে যোগ করুন</p>
                        </a>
                    @endif
                    <a href="{{ route('download_product_images', $product->id) }}" class="text-decoration-none add-to-cart cart-phn-whatsapp" type="button">
                        <i class="bi bi-download"></i>
                        <p>ছবি ডাউনলোড করুন</p>
                    </a>
                    @if (auth()->user())
                        <div class="add-to-cart cart-phn-whatsapp" type="button" id="copy" data-url="{{ route('home.productPage', ['id' => $product->id, 'ref'=> auth()->user()->id]) }}">
                            <i class="bi bi-clipboard"></i>
                            <p>লিংক কপি করুন</p>
                        </div>
                    @endif

                
                <div class="product-dessriptions mt-3 border-top pt-2">
                    <p>
                        {!! $product->description !!}
                    </p>
                </div>

            </div>
        </div>
    </div>
    <!-- product-details end -->


    <div id="review-section" class="container reviewBox reviewBoxHidden">

        <div class="section-devider">
            <div class="front-box"></div>
            <p>Review</p>
        </div>

        <div class="allReviewBox">
            @foreach ($reviews as $review)
                <div class="reviewItem ">
                    <div class="reviewer">
                        <div class="reviewerPic">
                            <img src="{{ asset('images/profile_pictures/default.jpg') }}" alt="">
                        </div>
                        <div class="reviewerName">
                            <h6>{{ $review->name }}</h6>
                            <div class="reviewIn">
                                @php
                                    $rating = $review->rating;
                                @endphp
                                @for ($i = 0; $i < 5; $i++)
                                    @if ($rating >= 1)
                                        <img src="{{ asset('assets/client/images/filled_star.svg') }}" alt=""
                                            data-index="1" />
                                    @else
                                        <img src="{{ asset('assets/client/images/blank_star.svg') }}" alt=""
                                            data-index="5" />
                                    @endif
                                    @php
                                        $rating--;
                                    @endphp
                                @endfor



                            </div>
                        </div>


                    </div>
                    <div class="reviewText">
                        <p>{{ $review->review }}</p>
                    </div>
                </div>
            @endforeach





            <!-- Button for popup -->
            <div class="submitReviewBtnBox">
                <button class="submitReviewBtn commonBtn" id="openPopupBtn">Submit Review</button>
            </div>


        </div>

    </div>

    <!-- popup for review -->
    <div class="reviewPopup" id="reviewPopup">
        <div class="popup-content">
            <span class="reviewPopupClose" id="closePopupBtn"><i class="fas fa-times"></i></span>
            <h2>Rate Products</h2>
            <div class="reviewStarsBox">
                <img src="{{ asset('/assets/client/images/blank_star.svg') }}" alt="" data-index="1" />
                <img src="{{ asset('/assets/client/images/blank_star.svg') }}" alt="" data-index="2" />
                <img src="{{ asset('/assets/client/images/blank_star.svg') }}" alt="" data-index="3" />
                <img src="{{ asset('/assets/client/images/blank_star.svg') }}" alt="" data-index="4" />
                <img src="{{ asset('/assets/client/images/blank_star.svg') }}" alt="" data-index="5" />
            </div>

            <form id="ratingForm" action="{{ route('home.sendReview') }}" method="POST">
                @csrf
                <input type="hidden" name="rating" id="ratingValue" value="0">
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <!-- Hidden input to store the selected rating -->
                <!-- Your other form fields here -->
                <textarea name="review-text" id="reviewMessage" placeholder="Enter your review message"></textarea>
                <button class="commonBtn" id="submitReviewBtn">Submit Rating</button>
            </form>
        </div>
    </div>


    {{-- Related product start --}}

    <div class="related-product-wrapper">
        <div class="container">
            <div class="section-devider">
                <div class="front-box"></div>
                <p>Related</p>
            </div>

            <div class="product-list-wrapper">
                <div class="row">
                    @foreach ($products as $product)
                    <div class="col-md-3 col-sm-4 col-xsm-6">
                        <div class="product-card">
                            <div class="card-product-image">

                                <a href="{{ route('home.productPage', ['id' => $product->id]) }}"
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
                                    @if (auth()->user())
                                        <a href="javascript:void(0)" class="addToFavBtn"
                                            data-product-fav-id="{{ $product->id }}">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    @else
                                        <a href="{{ route('home.signInPage') }}"
                                            data-product-fav-id="{{ $product->id }}">
                                            <i class="fa-regular fa-heart"></i>
                                        </a>
                                    @endif
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
                            <a href="{{ route('home.placeOrderView', ['product_id' => $product->id]) }}"
                                class="card-buy-now text-decoration-none" type="button">
                                <p>অর্ডার করুন</p>
                            </a>
                        </div>
                    </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/client/js/reviewInput.js') }}"></script>
    
    <script>
        function swapImages(smallImage, bigImage) {
            var bigImageElement = document.getElementById('big-image');
            var thumbnailElement = event.target;
            
            // Swap src attributes
            var temp = bigImageElement.src;
            bigImageElement.src = thumbnailElement.src;
            thumbnailElement.src = temp;
        }

        function decreaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentValue = parseInt(quantityInput.value, 10);

            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        }

        function increaseQuantity() {
            var quantityInput = document.getElementById('quantity');
            var currentValue = parseInt(quantityInput.value, 10);

            quantityInput.value = currentValue + 1;
        }
    </script>

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
            $('#add-to-cart').on('click', function() {
                var product_id = $(this).data('main-product-id'); // Use the appropriate way to get the product ID

                var color_code = $('input[name="color"]:checked').val();
                var size_value = $('input[name="size"]:checked').val();
                var quantity = $('input[name="quantity"]').val();



                $.ajax({
                    url: "{{ url('/add-to-cart-v') }}/" + product_id,
                    type: 'get',
                    data: {

                        color_code: color_code,
                        size_value: size_value,
                        quantity: quantity,
                        _token: '{{ csrf_token() }}',
                        // Add any other data you need to send to the server
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update the cart badge count or handle the response as needed
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
    <script>
        $(document).ready(function() {
            $('#copy').click(function() {
                var urlToCopy = $(this).data('url');
                copyToClipboard(urlToCopy);
            });
        
            function copyToClipboard(text) {
                var input = $('<textarea>');
                $('body').append(input);
                input.val(text).select();
                document.execCommand('copy');
                input.remove();
                toastr.success('লিংকটি সফলভাবে কপি করা হয়েছে');
            }
        });
    </script>
@endsection

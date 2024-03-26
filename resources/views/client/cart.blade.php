@extends('layout.master', ['title' => 'Cart'])
{{-- Import the Product class --}}
@php
    use App\Models\Product;
@endphp

@section('meta')
    <!-- Add this meta tag in the head section of your layout -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container">
        <div class="path-bar">
            <div class="full-path">
                <p class="inactive-path">Home /</p>
                <span class="active-path">Cart</span>
            </div>
        </div>
    </div>


    <!-- cart option start from here -->
    <div class="container">
        <div class="shopping-cart">
            <div class="column-labels">
                <label class="product-image">Image</label>
                <label class="productDetails">Product</label>
                <label class="product-price">Price</label>
                <label class="product-quantity">Quantity</label>
                <label class="product-line-price">Total</label>
                <label class="product-removal">Remove</label>
            </div>
            @php
                $sub_total = 0;
            @endphp



            @foreach ($product_carts as $product_cart)
                <?php $product = Product::whereId($product_cart->product_id)->first(); ?>
                <div class="product" data-product-id="{{ $product->id }}">
                    <div class="product-image">
                        <img src="{{ $product->thumbnail_image }}">
                    </div>
                    <div class="productDetails">
                        <div class="product-title">{{ Str::limit($product->title, 30) }}</div>
                    </div>
                    <div class="product-price">{{ $product->distributor_price }}</div>
                    <div class="product-quantity">
                        <div class="inputSection">
                            <button class="quantity-button decrease">-</button>
                            <input type="number" class="quantity-input" data-product-cart-id="{{ $product_cart->id }}"
                                value="{{ $product_cart->quantity }}" min="1">
                            <button class="quantity-button increase">+</button>
                        </div>
                    </div>
                    <div class="product-line-price">{{ $product_cart->quantity * $product->distributor_price }}</div>
                    <div class="product-removal">
                        <button class="remove-product text-danger" data-product-cart-id="{{ $product_cart->id }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                    <input type="hidden" value="{{ $sub_total += $product_cart->quantity * $product->distributor_price }}">
                </div>
            @endforeach


            <!-- update button section -->
            <div class="updateButtons mt-5">
                <a href="{{ route('home') }}" class="returnToShopBtn btn border-dark text-decoration-none">Return to
                    home</a>
            </div>


            <!-- total box -->

            <div class="totalBox">

                <div class="totals">
                    <div class="totalTittle">
                        <h3>Cart Total</h3>
                    </div>
                    <div class="totals-item mb-4">
                        <label>Subtotal</label>
                        <div class="totals-value" id="cart-subtotal">{{ $sub_total }}</div>
                    </div>

                    <div class="checkOutBtn">
                        <a href="{{ route('home.placeOrdersView') }}" class="checkout text-decoration-none">Procees to
                            Checkout</a>
                    </div>

                </div>


            </div>

        </div>

    </div>
@endsection

@section('custom_css')
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            var fadeTime = 300;

            function updateQuantity(quantityInput) {
                /* Calculate line price */
                var productRow = $(quantityInput).closest('.product');
                var price = parseFloat(productRow.find('.product-price').text());
                var quantity = parseInt($(quantityInput).val());
                var linePrice = price * quantity;

                /* Update line price display and recalc cart totals */
                productRow.find('.product-line-price').text(linePrice.toFixed(0));
                recalculateCart();
            }

            function recalculateCart() {
                var subtotal = 0;

                /* Sum up row totals */
                $('.product').each(function() {
                    subtotal += parseFloat($(this).find('.product-line-price').text());
                });
                /* Calculate totals */
                // var total = subtotal;

                /* Update totals display */
                $('.totals-value').fadeOut(fadeTime, function() {
                    $('#cart-subtotal').html(subtotal.toFixed(0));
                    $('#cart-total').html(subtotal.toFixed(0));
                    if (subtotal == 0) {
                        $('.checkout').fadeOut(fadeTime);
                    } else {
                        $('.checkout').fadeIn(fadeTime);
                    }
                    $('.totals-value').fadeIn(fadeTime);
                });
            }

            /* Remove item from cart */
            function removeItem(removeButton) {
                /* Remove row from DOM and recalc cart total */
                var productRow = $(removeButton).parent().parent();
                console.log(productRow);
                productRow.slideUp(fadeTime, function() {
                    productRow.remove();
                    recalculateCart();
                });
            }
            $(document).on('click', '.remove-product', function() {
                var product_cart_id = $(this).data(
                    'product-cart-id'); // Use the appropriate way to get the product ID
                var remove_btn = $(this);
                $(remove_btn).parent().parent().addClass('disabled');
                $.ajax({
                    url: "{{ url('/remove-from-cart') }}/" + product_cart_id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message, 'Success');
                            removeItem(remove_btn);
                        } else {
                            toastr.error(response.message, 'Error');
                        }
                    },
                    error: function(error) {
                        toastr.error('Something went wrong ):', 'Error');
                        console.log(error);
                    },
                    complete: function() {
                        $(remove_btn).parent().parent().removeClass('disabled');
                    }
                });
            });

            $(".increase").click(function() {
                adjustQuantity($(this), 1);
                var sub = parseInt($('.product-line-price').val());
                var price = parseInt($('.product-price').val());

                var total_price = sub + price;
                console.log(total_price);


            });

            $(".decrease").click(function() {
                adjustQuantity($(this), -1);
            });

            function adjustQuantity(button, change) {
                var productItem = button.closest('.product');
                productItem.addClass('disabled');
                var productId = button.closest('.product').data('product-id');
                var quantityInput = button.siblings('.quantity-input');

                var product_cart_id = quantityInput.data('product-cart-id');
                console.log('cart', product_cart_id);
                var currentQuantity = parseInt(quantityInput.val());
                var newQuantity = currentQuantity + change;

                // Ensure quantity doesn't go below 1
                if (newQuantity < 1) {
                    newQuantity = 1;
                }

                $.ajax({
                    url: "{{ route('home.updateCartQuantity') }}",
                    type: "POST",
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        quantity: newQuantity,
                        cart_id: product_cart_id
                    },
                    success: function(response) {
                        if (response.success) {
                            // Update the quantity displayed on the frontend
                            quantityInput.val(newQuantity);
                            // Update the line price
                            updateQuantity(quantityInput);

                            var linePrice = response.line_price;
                            button.closest('.product').find('.product-line-price').text(linePrice);
                            // Update the total
                            var subTotal = response.sub_total;
                            $('#cart-total').text(subTotal);
                        }
                    },
                    complete: function() {
                        productItem.removeClass('disabled');
                    }
                });
            }
        });
    </script>
@endsection

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
                        <div class="product-title">{{ $product->title }}</div>
                    </div>
                    <div class="product-price">{{ $product->distributor_price }}</div>
                    <div class="product-quantity">
                        <div class="inputSection">
                            <button class="quantity-button decrease">-</button>
                            <input type="number" class="quantity-input" data-product-cart-id="{{ $product_cart->id }}" value="{{ $product_cart->quantity }}"
                                min="1">
                            <button class="quantity-button increase">+</button>
                        </div>
                    </div>
                    <div class="product-line-price">{{ $product_cart->quantity * $product->distributor_price }}</div>
                    <div class="product-removal">
                        <button class="remove-product" data-product-cart-id="{{ $product_cart->id }}">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
                <input type="hidden" value="{{ $sub_total += $product_cart->quantity * $product->distributor_price }}">
            @endforeach


            <!-- update button section -->
            <div class="updateButtons mt-5">
                <a href="{{route('home')}}" class="returnToShopBtn btn border-dark text-decoration-none">Return to home</a>
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
    <link rel="stylesheet" href="{{ asset('assets/client/css/cart.css') }}">
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('.remove-product').on('click', function() {
                var product_cart_id = $(this).data(
                    'product-cart-id'); // Use the appropriate way to get the product ID




                console.log(product_cart_id);

                $.ajax({
                    url: "{{ url('/remove-from-cart') }}/" + product_cart_id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}',
                        // Add any other data you need to send to the server
                    },
                    success: function(response) {
                        if (response.success) {

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
            $(".increase").click(function() {
                adjustQuantity($(this), 1);
                var sub=parseInt( $('.product-line-price').val());
                var price=parseInt( $('.product-price').val());

                var total_price=sub+price;
                console.log(total_price);
                

            });

            $(".decrease").click(function() {
                adjustQuantity($(this), -1);
            });
        });

        function adjustQuantity(button, change) {
            var productId = button.closest('.product').data('product-id');
            var quantityInput = button.siblings('.quantity-input');
            var product_cart_id = quantityInput.data('product-cart-id');
            console.log('cart',product_cart_id);
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
                        var linePrice = response.line_price;
                        button.closest('.product').find('.product-line-price').text(linePrice);
                        // Update the total
                        var subTotal = response.sub_total;
                        $('#cart-total').text(subTotal);
                    }
                }
            });
        }
    </script>
@endsection

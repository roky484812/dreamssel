@extends('layout.master', ['title' => 'Place Order'])

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/client/css/placeOrder.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/cart.css') }}">
@endsection
@section('content')
    <div class="container">
        <div class="path-bar">
            <div class="full-path">
                <p class="inactive-path">Home /</p>
                <span class="active-path">Order</span>
            </div>
        </div>
    </div>


    <form action="{{ route('home.placeOrder') }}" method="POST">
        <!-- form  start from here -->
        <div class="container">

            @csrf
            <div class="row">


                <div class="col-md-6">
                    <div class="orderFormLeft">
                        <h2 class="billingHeader">Billing Details</h2>

                        <div class="form-group orderFormGroup">
                            <p>নাম*:</p>

                            <div class="inputfield-wrapper">
                                <input name="name" type="text"
                                    class="inputfield orderInputControl @error('name') is-invalid  @enderror"
                                    id="phone">
                            </div>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>


                        <div class="form-group orderFormGroup">
                            <p>ডেলিভারি ঠিকানা*:</p>
                            <div class="inputfield-wrapper">
                                <input name="address" required type="address"
                                    class=" orderInputControl inputfield @error('address') is-invalid  @enderror"
                                    id="address">
                            </div>
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group orderFormGroup">
                            <p>ফোন*:</p>
                            <div class="inputfield-wrapper">
                                <input name="phone" type="text"
                                    class="inputfield orderInputControl @error('phone') is-invalid  @enderror"
                                    id="phone">

                            </div>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                        <div class="form-group orderFormGroup d-none ">
                            <p>ই-মেইল*:</p>
                            <div class="form-check">
                                <input name="email-from-ac" class="form-check-input" type="checkbox" id="checkEmail">
                                <label class="form-check-label" for="checkEmail">একাউন্ট থেকে ই-মেইল ব্যবহার করুন</label>
                            </div>
                            <div class="inputfield-wrapper">
                                <input name="email" type="email" class="inputfield orderInputControl" id="email">
                            </div>
                        </div>
                        <div class="form-group orderFormGroup">
                            <p>ডেলিভারি চার্জ*:</p>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="shipping" id="insideDhaka"
                                    value="60">
                                <label class="form-check-label" for="insideDhaka">ঢাকার ভিতরে (৬০)</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="shipping" id="outsideDhaka"
                                    value="120">
                                <label class="form-check-label" for="outsideDhaka">ঢাকার বাইরে (১২০)</label>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="col-md-6">
                    <div class="orderFormRight">
                        
                            <input name="product_id" value="{{ $product->id }}" type="hidden">


                            <div class="orderProductTable">
                                <div class="orderProductItem">
                                    <div class="product-image">
                                        <img src="{{ $product->thumbnail_image }}">
                                    </div>
                                    <div class="productDetails">
                                        <div class="product-title">{{ $product->title }}
                                        </div>
                                    </div>
                                    <div class="product-line-price">{{ $product->discounted_price }}</div>

                                </div>

                            </div>
                     

                        <div class="Ordertotals">

                            <div class="totals-item">
                                <label>Subtotal</label>
                                <div class="totals-value" id="cart-subtotal"
                                    data-subtotal="{{ $product->discounted_price }}">
                                    {{ $product->discounted_price }}</div>
                            </div>
                            <div class="totals-item">
                                <label>Shipping</label>
                                <div class="totals-value" id="cart-shipping">00</div>
                            </div>
                            <div class="totals-item totals-item-total">
                                <label>Total</label>
                                <div class="totals-value" id="cart-total">00</div>
                            </div>


                        </div>

                        <!-- payment buttons -->
                        <div class="payment-options">
                            <div class="form-check form-check-inline payment-option bankPayOption">
                                <div class="bankPayRadio">
                                    <input class="form-check-input" type="radio" name="payment" id="bankPay"
                                        value="bank">
                                    <label class="form-check-label" for="bankPay">Bank Pay</label>
                                </div>
                                <div class="bankPayIterface">
                                    <img src="{{ asset('assets/client/images/image 30.svg') }}" alt="bkash">
                                    <img src="{{ asset('assets/client/images/image 31.svg') }}" alt="visa">
                                    <img src="{{ asset('assets/client/images/image 32.svg') }}" alt="mastercard">
                                    <img src="{{ asset('assets/client/images/image 33.svg') }}" alt="nagad">
                                </div>
                            </div>
                            <div class="form-check form-check-inline payment-option">
                                <input class="form-check-input" type="radio" name="payment" id="cashOnDelivery"
                                    value="cash">
                                <label class="form-check-label" for="cashOnDelivery">Cash on Delivery</label>
                            </div>
                        </div>

                        <!-- Coupon code -->

                        <div class="coupon-section row">
                            <div class="couponInputBox col-xl-8  mb-3 ">
                                <input name="coupon" type="text" id="coupon-code" placeholder="Enter Coupon Code">
                            </div>
                            <div class="couponSubmitBox col-xl-4 ">
                                <button type="button">Apply Coupon</button>
                            </div>
                        </div>



                        <!-- Place Order button -->
                        <button type="submit" id="place-order">Place Order</button>


                    </div>


                </div>




                <!-- end -->
            </div>


        </div>
    </form>
@endsection
@section('scripts')
    <script src="{{ asset('assets/client/js/placeOrder.js') }}"></script>
@endsection
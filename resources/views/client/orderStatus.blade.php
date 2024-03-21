@extends('layout.master', ['title' => 'Pending Order'])
{{-- Import the Product class --}}


@section('meta')
    <!-- Add this meta tag in the head section of your layout -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="container">
        <div class="path-bar">
            <div class="full-path">
                <p class="inactive-path">Profile /</p>
                <span class="active-path">Orders</span>
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
                <label class="product-removal">Token</label>
            </div>

            @if($orders->count() == 0)
            <div class="nothing-to-show d-flex justify-content-center mt-5 mb-5">
                Nothing to show :<
            </div>
            @endif
         

            @foreach ($orders as $order)
                <?php $product = $products->find($order->product_id); ?>
                <div class="product">
                    <div class="product-image">
                        <img src="{{ $product->thumbnail_image }}">
                    </div>
                    <div class="productDetails">
                        <div class="product-title">{{ $product->title }}</div>
                    </div>
                    <div class="product-price">{{ $product->discounted_price }}</div>
                    <div class="product-quantity">
                        <div class="inputSection">
                            
                            <input disabled type="number" value="{{ $order->quantity }}" min="1">
                            
                        </div>
                    </div>
                    <div class="product-line-price">{{ $order->quantity * $product->discounted_price }}</div>
                    <div class="product-removal">{{$order->order_token}}</div>
                 
                </div>
                
                
            @endforeach

        </div>
    </div>
@endsection

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/client/css/cart.css') }}">
@endsection
@section('scripts')
    
@endsection

@extends('layout.master',['title'=>'Thank you'])

@section('content')
    <!-- thanking start from here -->
    <div class="container">
        <div class="thankingHeading">
            <h1>Thanks For order <i class="fa-regular fa-face-smile-beam"></i></h1>
            <p>Your Order Has Been Received</p>
            <p>Our Sales Representative Will contact you, to ensure this order</p>
            <p>Your Invoice Number is : <span>#{{ session()->get('order_token') }}</span></p>
            <div class="tankingBtnBox">
                <button class="commonBtn btn">
                    <a href="{{ route('home') }}" class="text-light text-decoration-none">
                        Back to Home
                    </a>
                </button>
                <button class="commonBtn">
                    <a href="{{ route('home.pendingOrder') }}" class="text-light text-decoration-none">
                        See All Order
                    </a>
                </button>
            </div>
        </div>
        
    </div>

@endsection

@section('custom_css')

<link rel="stylesheet" href="{{asset('assets/client/css/thanking.css')}}"> 
@endsection












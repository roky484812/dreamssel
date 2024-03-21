@extends('layout.master',['title'=>'Thank you'])

@section('content')
    <!-- thanking start from here -->
    <div class="container">
        <div class="thankingHeading">
            <h1>Thanks For order <i class="fa-regular fa-face-smile-beam"></i></h1>
            <p>Your Order Has Been Received</p>
            <p>Our Sales Representative Will contact you, to ensure this order</p>
            <p>Your Invoice Number is : <span>#101</span></p>
            <div class="tankingBtnBox">
                <button class="commonBtn">Back to Home</button>
                <button class="commonBtn">See All Order</button>
            </div>
        </div>
        
    </div>

@endsection

@section('custom_css')

<link rel="stylesheet" href="{{asset('assets/client/css/thanking.css')}}"> 
@endsection












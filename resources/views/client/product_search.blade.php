@extends('layouts.client.client')
@section('content')
    <!-- mid content -->
    <div class="midContent">
        @include('client.widgets.product_filter')
        <!-- filter end -->
        <div class="svCardBox" id="data">
            <div class="d-flex justify-content-center mt-5">
                <div class="spinner-border" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="link" class="d-flex justify-content-end">
            
        </div>
    </div>
    @include('client.widgets.popular_products')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/client/css/searchView.css') }}">
@endpush
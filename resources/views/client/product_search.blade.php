@extends('layouts.client.index', ['title' => 'Dreamssel | Search | '.$search_product])
@section('content')
    <!-- mid content -->
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-3">
                @include('client.widgets.product_filter')
            </div>
            <div class="col-md-9">
                <div class="row g-2" id="data">
                    <div class="d-flex justify-content-center mt-5">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- filter end -->
    </div>
    <div class="container">
        <div id="link" class="d-flex justify-content-end">
            
        </div>
    </div>
    @include('client.widgets.popular_products')
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/client_old/css/searchView.css') }}">
@endpush
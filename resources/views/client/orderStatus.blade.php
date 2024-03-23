@extends('layout.master', ['title' => 'Pending Order'])
{{-- Import the Product class --}}


@section('meta')
    <!-- Add this meta tag in the head section of your layout -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')
    <div class="mb-10">
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
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Order Token</th>
                        <th>Address</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($orders->count() == 0)
                    <td colspan="5">
                        Nothing to show :<
                    </div>
                    @endif
                    @foreach ($orders as $index => $order)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $order->order_token }}</td>
                        <td>{{ $order->address }}</td>
                        <td>{{ $order->total_price }}</td>
                        <td>
                            <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{ $order->id }}">Details</button>                        
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop{{ $order->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel{{ $order->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-xl">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel{{ $order->id }}">Order List</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Product</th>
                                                        <th>Quantity</th>
                                                        <th>Single Price</th>
                                                        <th>Total Price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($order->order_list as $index => $order_list)   
                                                    <tr>
                                                        <td>{{ $index+1 }}</td>
                                                        <td>
                                                            <a href="{{ route('home.productPage', ['id' => $order_list->product_fetch->id]) }}" class="text-dark">
                                                                {{ Str::limit($order_list->product_fetch->title, '50') }}
                                                            </a>
                                                        </td>
                                                        <td> {{ $order_list->quantity }} </td>
                                                        <td>{{ $order_list->product_fetch->distributor_price }}</td>
                                                        <td>{{ $order_list->quantity * $order_list->product_fetch->distributor_price }}</td>
                                                    </tr>   
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/client/css/cart.css') }}">
    <style>
        .mb-10{
            margin-bottom: 250px;
        }
    </style>
@endsection
@section('scripts')
    
@endsection

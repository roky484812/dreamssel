@extends('layouts.admin', ['title' => 'Flash Sale', 'active' => 'flashSale'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">
                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Flash Sale</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.product.flashSale.index')}}" class="d-flex">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"  stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                <span class="breadcrumb-icon">Flash Sale</span></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Flash Sale</li>
                        </ol>
                    </div>
                </div>
                <div class="row row-deck">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Flash Sale Products</h3>
                            </div>
                            <div class="card-body table-responsive p-0 mx-313 scroll-3">
                                <table class="table card-table table-vcenter text-nowrap table-borderedless border-0 inde4-table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Remove</th>
                                            <th>Varient</th>
                                            <th>Category</th>
                                            <th>Stock</th>
                                            <th>Dist Discount</th>
                                            <th>Dist Price</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $i=>$product)
                                        <tr>
                                            <td>
                                                <img src="{{ asset($product->thumbnail_image) }}" class="w-7 h-7 shadow me-3 rounded">
                                                {{  $product->title }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="{{ route('admin.product.flashSale.remove', $product->flash_sale_id) }}" class="dropdown-item del-product">Remove</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $product->country_name }}
                                            </td>
                                            <td class="text-center">{{ $product->category_name }} ({{ $product->sub_category_name }})
                                            <td class="text-center">{{ $product->sku }}
                                            </td>
                                            <td class="text-center">
                                                @php
                                                try {
                                                    echo round((($product->price - $product->distributor_price) / $product->price) * 100);
                                                } catch (\Throwable $th) {
                                                    echo 0;
                                                }
                                                @endphp
                                                %
                                            </td>                                        
                                            <td class="text-center">{{ $product->distributor_price }}
                                            </td>

                                            <td class="text-center">
                                                <strong>{{ $product->price }}</strong>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
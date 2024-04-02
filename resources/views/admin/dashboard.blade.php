@extends('layouts.admin', ['title'=> 'Dashboard', 'active'=> 'dashboard'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Business Analytics</h4>
                    </div>
                </div>
                <!--End Page header-->

                <!--Row-->
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mb-lg-4 mb-xl-0">
                                        <div class="mb-2 fs-18 text-muted">
                                            Total Product
                                        </div>
                                        <h1 class="font-weight-bold mb-1">{{ $total_product }}</h1>
                                        <span class="text-primary">
                                    </div>
                                    <div class="col col-auto">
                                        <div class="mx-auto mt-sm-0 mb-0">
                                            <i class="fa fa-shopping-bag text-info" style="font-size: 70px" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mb-lg-4 mb-xl-0">
                                        <div class="mb-2 fs-18 text-muted">
                                            Total User
                                        </div>
                                        <h1 class="font-weight-bold mb-1">{{ $total_user }}</h1>
                                        
                                    </div>
                                    <div class="col col-auto">
                                        <div class="mx-auto mt-sm-0 mb-0">
                                            <i class="fa fa-users text-primary" style="font-size: 70px" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mb-lg-4 mb-xl-0">
                                        <div class="mb-2 fs-18 text-muted">
                                            Total Announcement
                                        </div>
                                        <h1 class="font-weight-bold mb-1">{{ $total_announcement }}</h1>
                                    </div>
                                    <div class="col col-auto">
                                        <div class="mx-auto mt-sm-0 mb-0">
                                            <i class="fa fa-bullhorn text-danger" style="font-size: 70px" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mb-lg-4 mb-xl-0">
                                        <div class="mb-2 fs-18 text-muted">
                                            Success Rate
                                        </div>
                                        <h1 class="font-weight-bold mb-1">{{ $total_orders }}</h1>
                                        <span class="text-primary">
                                            {{ $totalViewCount }}</span>

                                    </div>
                                    <div class="col col-auto">
                                        <div class="mx-auto chart-circle chart-circle-md chart-circle mt-sm-0 mb-0"
                                            id="chart-circle-primary" data-value="@if ($totalViewCount>0)
                                            {{ $total_orders / $totalViewCount }}
                                            
                                            @else
                                            0
                                            @endif
                                            "
                                            data-thickness="12" data-color="">
                                            <div class="mx-auto chart-circle-value text-center fs-20">
                                                @if ($totalViewCount>0)
                                                {{ number_format($total_orders / $totalViewCount, 2) * 100 }}

                                                @else
                                                0
                                                @endif
                                                %</div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mb-lg-4 mb-xl-0">
                                        <div class="mb-2 fs-18 text-muted">
                                            Confirmed Orders
                                        </div>
                                        <h1 class="font-weight-bold mb-1">{{ $confirmed_orders }}</h1>

                                    </div>
                                    <div class="col col-auto">
                                        <div class="mx-auto chart-circle chart-circle-md chart-circle mt-sm-0 mb-0 "
                                            id="chart-circle-primary" data-value="
                                            @if ($total_orders>0)
                                            {{ $confirmed_orders / $total_orders }}

                                            @else
                                            0
                                            @endif
                                            "
                                            data-thickness="12" data-color="green">
                                            <div class="mx-auto chart-circle-value text-center fs-20">
                                                @if ($total_orders>0)
                                                {{ number_format($confirmed_orders / $total_orders, 2) * 100 }}
                                                @else
                                                0
                                                @endif
                                                %</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mb-lg-4 mb-xl-0">
                                        <div class="mb-2 fs-18 text-muted">
                                            Cancelled Orders
                                        </div>
                                        <h1 class="font-weight-bold mb-1">{{ $cancelled_orders }}</h1>

                                    </div>
                                    <div class="col col-auto">
                                        <div class="mx-auto chart-circle chart-circle-md chart-circle mt-sm-0 mb-0"
                                            data-value="
                                            @if ($total_orders>0)
                                            {{ $cancelled_orders / $total_orders }}
                                            @else
                                            0
                                            @endif
                                            " data-thickness="12"
                                            data-color="red">
                                            <div class="mx-auto chart-circle-value text-center fs-20">
                                                @if ($total_orders>0)

                                                {{ number_format($cancelled_orders / $total_orders, 2) * 100 }}
                                                @else
                                                0
                                                @endif
                                                %</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                

                <div class="row row-deck">
                    <div class="col-xl-8 col-md-12 col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Most Discounted Products</h3>
                            </div>
                            <div class="card-body table-responsive p-0 mx-313 scroll-3">
                                <table class="table card-table table-vcenter text-nowrap table-borderedless border-0 inde4-table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Edit/Del</th>
                                            <th>Varient</th>
                                            <th>Category</th>
                                            <th>Stock</th>
                                            <th>Dist Discount</th>
                                            <th>Dist Price</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($top_discounted_products as $i=>$p_product) 
                                        <tr>
                                            <td>
                                                <img src="{{ asset($p_product->thumbnail_image) }}" class="w-7 h-7 shadow me-3 rounded">
                                                {{  Str::limit($p_product->title, 40) }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="{{route('admin.product.updateView', $p_product->id)}}" class="dropdown-item">Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('admin.product.delete', $p_product->id) }}" class="dropdown-item del-product">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $p_product->country_name }}
                                            </td>
                                            <td class="text-center">{{ $p_product->category_name }} ({{ $p_product->sub_category_name }})
                                            <td class="text-center">{{ $p_product->sku }}
                                            </td>
                                            <td class="text-center">
                                                @php
                                                try {
                                                    echo round((($p_product->price - $p_product->distributor_price) / $p_product->price) * 100);
                                                } catch (\Throwable $th) {
                                                    echo 0;
                                                }
                                                @endphp
                                                 %
                                            </td>                                        
                                            <td class="text-center">{{ $p_product->distributor_price }}
                                            </td>

                                            <td class="text-center">
                                                <strong>{{ $p_product->price }}</strong>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-center">
                                <a class="btn-link" href="{{ route('admin.productManagement') }}">View All</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-12 col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Recently Added Distributors</h3>
                            </div>
                            <div class="card-body p-3">
                                <div class="table-responsive">
                                    <table class="table transaction-table mb-0 text-nowrap">
                                        <tbody>
                                            @foreach ($distributors as $distributor) 
                                            <tr>
                                                <td class="d-sm-flex">
                                                    <img class="w-7 h-7 rounded shadow me-3"
                                                        src="{{ asset($distributor->profile_picture) }}" alt="media1">
                                                    <div class="mt-1">
                                                        <h6 class="mb-1 font-weight-semibold">{{ $distributor->name }}</h6>
                                                        <small class="text-muted text-capitalize">{{ $distributor->role }}</small>
                                                    </div>
                                                </td>
                                                @if (auth()->user()->role == 1)
                                                <td class="text-end">
                                                    <a class="btn btn-white" href="{{route('admin.user.view', ['user_id'=>$distributor['id']])}}">
                                                        Profile
                                                    </a>
                                                </td>
                                                @endif
                                            </tr>
                                            @endforeach
                                            @if (!count($distributors))
                                                <h4 class="text-muted text-center mt-5">Not Found!</h4>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--End Row-->

                <!-- Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">05 Most successful products</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-vcenter text-nowrap mb-0 border">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Product</th>
                                                <th class="text-center">Category</th>
                                                <th class="text-center">Clicks</th>
                                                <th class="text-center">Success Rate</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($products as $product)
                                                <tr>
                                                    <td class="d-flex">
                                                        <img class="avatar-lg rounded-circle me-3"
                                                            src="{{ $product->thumbnail_image }}" alt="Image description">
                                                        <div class="ms-3 mt-2">
                                                            <h5 class="mb-0 text-dark">
                                                                {{ \Illuminate\Support\Str::limit($product->title, 40, $end = '...') }}
                                                            </h5>
                                                            <p class="mb-0  fs-13 text-muted">
                                                                {{ \Illuminate\Support\Str::limit($product->short_description, 40, $end = '...') }}
                                                            </ </p>
                                                        </div>
                                                    </td>
                                                    <td class="text-center">{{$product->category->category_name}}</td>
                                                    <td class="text-center">{{ $product->view_count }}</td>
                                                    <td>
                                                        <div class="mx-auto chart-circle chart-circle-xs chart-circle mt-sm-0 mb-0 "
                                                            data-value="
                                                        @if ($product->view_count > 0) {{ $product->totalOrderedQuantity() / $product->view_count }}
                                                        @else
                                                            0 @endif
                                                        "
                                                            data-thickness="5" data-color="green">
                                                            <div class="mx-auto chart-circle-value text-center">
                                                                @if ($product->view_count > 0)
                                                                    {{ number_format($product->totalOrderedQuantity() / $product->view_count, 2) * 100 }}
                                                                @else
                                                                    0
                                                                @endif

                                                                %
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="text-end"><a class="btn btn-light"
                                                            href="{{ route('home.productPage', ['id' => $product->id]) }}">
                                                            View Details</a></td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->

                <div class="row row-deck">
                    <div class="col-xl-4 col-lg-5">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Product Status</h3>
                            </div>
                            <div class="card-body mx-auto text-center">
                                <div class="overflow-hidden">
                                    <div class="chart-container">
                                        <canvas class="canvasDoughnut3" height="200" width="200"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <table class="table table-hover mb-0">
                                    <tbody>
                                        <tr class="border-bottom">
                                            <td class="p-3 d-flex">
                                                <div class="w-3 h-3 bg-primary me-2 mt-1 brround"></div>
                                                Total Release Product
                                            </td>
                                            <td class="p-3">{{ $total_released_product }}</td>
                                        </tr>
                                        <tr class="border-bottom">
                                            <td class="p-3 d-flex">
                                                <div class="w-3 h-3 bg-danger me-2 mt-1 brround"></div>
                                                Total Unrelease Product
                                            </td>
                                            <td class="p-3">{{ $total_draft_product }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 col-lg-7">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Most Clicked Product</h3>
                            </div>
                            <div class="card-body table-responsive p-0 mx-313 scroll-3">
                                <table class="table card-table table-vcenter text-nowrap table-borderedless border-0 inde4-table">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Edit/Del</th>
                                            <th>Varient</th>
                                            <th>Category</th>
                                            <th>Stock</th>
                                            <th>Dist Discount</th>
                                            <th>Dist Price</th>
                                            <th>Price</th>
                                            <th>Clicked</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($popular_products as $i=>$p_product) 
                                        <tr>
                                            <td>
                                                <img src="{{ asset($p_product->thumbnail_image) }}" class="w-7 h-7 shadow me-3 rounded">
                                                {{  Str::limit($p_product->title, 40) }}
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="{{route('admin.product.updateView', $p_product->id)}}" class="dropdown-item">Edit</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{ route('admin.product.delete', $p_product->id) }}" class="dropdown-item del-product">Delete</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                            <td class="text-center">{{ $p_product->country_name }}
                                            </td>
                                            <td class="text-center">{{ $p_product->category_name }} ({{ $p_product->sub_category_name }})
                                            <td class="text-center">{{ $p_product->sku }}
                                            </td>
                                            <td class="text-center">
                                                @php
                                                try {
                                                    echo round((($p_product->price - $p_product->distributor_price) / $p_product->price) * 100);
                                                } catch (\Throwable $th) {
                                                    echo 0;
                                                }
                                                @endphp
                                                 %
                                            </td>                                        
                                            <td class="text-center">{{ $p_product->distributor_price }}
                                            </td>

                                            <td class="text-center">
                                                <strong>{{ $p_product->price }}</strong>
                                            </td>

                                            <td class="text-end">
                                                <strong>{{ $p_product->view_count }}</strong>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-center">
                                <a class="btn-link" href="{{ route('admin.productManagement') }}">View All</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Editor Details</h3>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-vcenter text-nowrap mb-0 border">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">Name</th>
                                                <th class="text-center">Occupation</th>
                                                <th class="text-center">Products</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($editors as $editor)
                                            <tr>
                                                <td class="d-flex">
                                                    <img class="avatar-lg rounded-circle me-3"
                                                        src="{{ asset($editor->profile_picture) }}"
                                                        alt="Image description">
                                                    <div class="ms-3 mt-2">
                                                        <h5 class="mb-0 text-dark">{{ $editor->name }}</h5>
                                                        <p class="mb-0  fs-13 text-muted">{{ $editor->email }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="text-center">Editor</td>
                                                <td class="text-center">{{ $editor->products->count() }}</td>
                                                <td class="text-end">
                                                    <a class="btn btn-light" href="{{route('admin.user.view', ['user_id'=>$editor['id']])}}"> View Profile</a>
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
                <!-- End Row -->

            </div>
        </div>
    </div>
@endsection
@section('custom_js')
    <!--Chart js -->
    <script src="{{ asset('assets/admin/plugins/chart/chart.min.js') }}"></script> 
    
    @include('admin.widgets.alert')
    <script>
        product_status();
        function product_status() {

            document.querySelector(".chart-container").innerHTML = '<canvas class="canvasDoughnut3" height="200" width="200"></canvas>';
            if ($('.canvasDoughnut3').length){

                var chart_doughnut_settings = {
                    type: 'doughnut',
                    tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                    data: {
                        labels: [
                            "Total Release Product",
                            "Total Unrelease Product"
                        ],
                        datasets: [{
                            data: [{{ $total_released_product }}, {{ $total_draft_product }}],
                            backgroundColor: [ myVarVal, '#f72d66'],
                            hoverBackgroundColor: [ myVarVal, '#f72d66']
                        }]
                    },
                    options: {
                        plugins: {
                        legend: {
                            display: false,
                        }
                        },
                        cutout: "70%",
                        responsive: true,
                    },
                }

                $('.canvasDoughnut3').each(function(){

                    var chart_element = $(this);
                    var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);

                });
            }
            /*-----canvasDoughnut-----*/
            }
    </script>
@endsection

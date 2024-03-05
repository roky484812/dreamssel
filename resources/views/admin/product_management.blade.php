@extends('layouts.admin', ['title'=> 'Product Management', 'active'=> 'product'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Product Management</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)" class="d-flex"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                        </path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                        </path>
                                    </svg><span class="breadcrumb-icon">Product Management</span></a></li>

                        </ol>
                    </div>
                </div>
                <!--End Page header-->

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="col mb-4">
                                    <a href="{{route('admin.product.addView')}}" class="btn btn-primary"><i class="fe fe-plus"></i>
                                        Add New Product</a>
                                </div>
                                <div class="card">
                               
                                    <div class="card-body">
                                        <form action="{{ route('admin.productManagement') }}" method="get">
                                            <div class="row">
                                                <div class="mb-3 col-md-4">
                                                    <select id="category" name="category" class="form-control form-select select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                        <option value="">--Categories--</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{ $category->id }}" {{ $selected['category'] == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <select id="sub_category" name="sub_category" class="form-control form-select select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                        <option value="">--Sub Categories--</option>
                                                    </select>
                                                </div>
                                                <div class="mb-3 col-md-4">
                                                    <select name="country" id="select-beast1" class="form-control form-select select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                        <option value="">--Country--</option>
                                                        @foreach ($countries as $country)
                                                            <option value="{{ $country->id }}" {{ $selected['country'] == $country->id ? 'selected' : '' }}>{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="input-group">
                                                <input type="text" value="{{ $selected['search'] }}" class="form-control br-tl-7 br-bl-7" name="search" placeholder="Search by product title">
                                                <div class="btn-group">
                                                    <button type="submit" class="btn btn-primary br-tr-7 br-br-7">
                                                        <i class="fa fa-search" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        
                        <div class="card mt-5 store">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th class="text-center">Edit/Del</th>
                                            <th class="text-center">Variant</th>
                                            <th class="text-center">Category</th>
                                            <th class="text-center">Stock</th>
                                            <th class="text-center">Discount</th>
                                            <th class="text-center">Distributor Price</th>
                                            <th class="text-end"><strong>Public Price</strong></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    @foreach ($products as $product)
                                        
                                        <tr>
                                            <td>{{ $product->title }}</td>
                                            <td class="text-center">
                                                <div class="dropdown">
                                                    <button class="btn btn-light btn-sm" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a href="{{route('admin.product.updateView', $product->id)}}" class="dropdown-item">Edit</a>
                                                        </li>
                                                        <li><button class="dropdown-item del-product">Delete</bu></li>
                                                    </ul>
                                                </div>
                                            </td>

                                            <td class="text-center">{{ $product->country_name }}
                                            </td>
                                            <td class="text-center">{{ $product->category_name }} ({{ $product->sub_category_name }})
                                            <td class="text-center">{{ $product->sku }}
                                            </td>
                                            <td class="text-center">
                                                {{ round((($product->price - $product->distributor_price) / $product->price) * 100) }}%
                                            </td>                                        
                                            <td class="text-center">{{ $product->distributor_price }}
                                            </td>

                                            <td class="text-end">
                                                <strong>{{ $product->price }}</strong>
                                            </td>
                                        </tr>
                                    @endforeach
                                    @if (!count($products))
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">Product Not Found!</td>
                                        </tr>
                                    @endif

                                </tbody></table>
                            </div>
                            <div class="p-4 border-top">
                                {{$products->links()}}
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
    <script>
        function sub_category_fetch (e, id=null){
            var category_id = id ? id : $(this).val();
            if (category_id) {
                $.ajax({
                    url: "{{ route('admin.product.subcategory.category') }}/"+category_id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(response) {
                        console.log(response);
                        if(response.status){
                            $('#sub_category').empty();
                            let options = '<option value="">--Sub Categories--</option>'
                            response.sub_categories.forEach((sub_category) => {
                                @if ($selected['sub_category'])
                                    options += `<option value="${sub_category.id}" ${ {{ $selected['sub_category'] }} == sub_category.id? 'selected': '' }>${sub_category.sub_category_name}</option>`;
                                @else
                                    options += `<option value="${sub_category.id}">${sub_category.sub_category_name}</option>`;
                                @endif
                            });
                            $('#sub_category').append(options);
                        }
                    },
                    error: function(error) {
                        if (error.responseJSON && error.responseJSON.errors) {
                            // Display email validation error
                            if (error.responseJSON.errors) {
                                console.error('Error:', error);
                            }
                        }
                    },
                    complete: function() {
                        console.log('finish');
                    }
                });
            }else{
                $('#sub_category').empty();
                let options = '<option value="">--Sub Categories--</option>'
                $('#sub_category').append(options);
            }
        }
        $('#category').change(sub_category_fetch);
        @if ($selected['category']) 
            sub_category_fetch('', {{ $selected['category'] }});
        @endif
    </script>
@endsection
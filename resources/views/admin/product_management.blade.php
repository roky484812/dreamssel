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
                    <div class="col-lg-3">
                        <div class="row">
                            <div class="col-md-12 col-lg-12">
                                <div class="col mb-4">
                                    <a href="{{route('admin.product.add')}}" class="btn btn-primary"><i class="fe fe-plus"></i>
                                        Add New Product</a>
                                </div>
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title"> Filter </h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="form-label">Categories</label>
                                            <select name="beast" id="select-beast" class="form-control form-select select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                <option value="0">--Select--</option>
                                                <option value="1">Foot wear</option>
                                                <option value="2">Top wear</option>
                                                <option value="3">Bootom wear</option>
                                                <option value="4">Men's Groming</option>
                                                <option value="5">Accessories</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 333.75px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-select-beast-container"><span class="select2-selection__rendered" id="select2-select-beast-container" title="--Select--">--Select--</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Sub Categories</label>
                                            <select name="beast" id="select-beast1" class="form-control form-select select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                <option value="0">--Select--</option>
                                                <option value="1">Western wear</option>
                                                <option value="2">Foot wear</option>
                                                <option value="3">Top wear</option>
                                                <option value="4">Bootom wear</option>
                                                <option value="5">Beuty Groming</option>
                                                <option value="6">Accessories</option>
                                                <option value="7">jewellery</option>
                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 333.75px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-select-beast1-container"><span class="select2-selection__rendered" id="select2-select-beast1-container" title="--Select--">--Select--</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label">Country</label>
                                            <select name="beast" id="select-beast1" class="form-control form-select select2 select2-hidden-accessible" tabindex="-1" aria-hidden="true">
                                                <option value="0">--Select--</option>
                                                <option value="1">China</option>
                                                <option value="2">India</option>
                                                <option value="3">Bangladesh</option>

                                            </select><span class="select2 select2-container select2-container--default" dir="ltr" style="width: 333.75px;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-select-beast1-container"><span class="select2-selection__rendered" id="select2-select-beast1-container" title="--Select--">--Select--</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                        </div>



                                        <a class="btn btn-primary btn-block" href="javascript:void(0)">Search</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="input-group">
                            <input type="text" class="form-control br-tl-7 br-bl-7" placeholder="">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary br-tr-7 br-br-7">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card mt-5 store">
                            <div class="table-responsive">
                                <table class="table card-table table-vcenter text-nowrap">
                                    <tbody><tr>
                                        <th>Product Name</th>
                                        <th class="text-center">Edit/Del</th>
                                        <th class="text-center">Variant</th>
                                        <th class="text-center">Stock</th>
                                        <th class="text-center">Discount</th>
                                        <th class="text-center">Distributor Price</th>
                                        <th class="text-end"><strong>Public Price</strong></th>
                                    </tr>


                                    <tr>
                                        <td>Mens Jackets</td>

                                        <td class="text-center"><a href="update_product.html"><i class="fa-solid fa-pen-to-square "></i></a>
                                        </td>

                                        <td class="text-center">China
                                        </td>
                                        <td class="text-center">500
                                        </td>
                                        <td class="text-center">50%

                                        </td>
                                        <td class="text-center">400
                                        </td>

                                        <td class="text-end">
                                            <strong>500</strong>
                                        </td>
                                    </tr>


                                </tbody></table>
                            </div>
                            <div class="d-flex p-4 border-top">
                                <ul class="pagination mb-0">
                                    <li class="disabled page-item"><a href="javascript:void(0)" class="page-link">‹</a></li>
                                    <li class="active page-item"><a href="javascript:void(0)" class="page-link">1</a></li>
                                    <li class="page-item"><a href="javascript:void(0)" class="page-link">2</a>
                                    </li>
                                    <li class="page-item"><a href="javascript:void(0)" class="page-link">3</a>
                                    </li>
                                    <li class="page-item"><a href="javascript:void(0)" class="page-link">4</a>
                                    </li>
                                    <li class="page-item"><a href="javascript:void(0)" class="page-link">5</a>
                                    </li>
                                    <li class="page-item"><a href="javascript:void(0)" class="page-link">›</a>
                                    </li>
                                    <li class="page-item"><a href="javascript:void(0)" class="page-link">»</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row -->

            </div>
        </div>
    </div>
@endsection
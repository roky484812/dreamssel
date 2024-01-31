@extends('layouts.admin', ['title'=> 'Product Sub Category', 'active'=> 'product_subcategory'])
@section('content')
<div class="app-content main-content">
    <div class="side-app">
        <div class="container-fluid main-container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Sub Category List</h4>
                </div>
                <div class="page-rightheader ms-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="d-flex">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                <span class="breadcrumb-icon">Product Sub Category List</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row flex-lg-nowrap">
                <div class="col-12">
                    <div class="row flex-lg-nowrap">
                        <div class="col-12 mb-3">
                            <div class="e-panel card">
                                <div class="card-body pb-2">
                                    <div class="row">
                                        <div class="col mb-4">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addproduct">
                                                <i class="fe fe-plus"></i>
                                                Add New Sub Category
                                            </button>
                                        </div>
                                        <div class="col col-auto mb-4">
                                            <div class="mb-3 w-100">
                                                <div class="input-icon">
                                                    <span class="input-icon-addon">
                                                        <i class="fe fe-search"></i>
                                                    </span>
                                                    <input type="text" class="form-control"
                                                        placeholder="Search Sub-Category">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <table class="table table-hover table-inbox">
                                                <thead>
                                                    <tr>
                                                        <th>Serial</th>
                                                        <th>Sub-Category Name</th>
                                                        <th>Category Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                @if (!count($subcategories))
                                                <tbody>
                                                    <tr>
                                                        <td colspan="4" class="text-center text-muted">No data found!
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                @else
                                                <tbody>
                                                    @foreach ($subcategories as $index => $subcategory)
                                                    <tr>
                                                        <td>{{$index+1}}</td>
                                                        <td>{{$subcategory['sub_category_name']}}</td>
                                                        <td>{{$subcategory['category_name']}}</td>
                                                        <td>
                                                            <button data-bs-toggle="modal"
                                                                data-bs-target="#editproduct_{{$subcategory['id']}}"
                                                                class="btn border border-1 text-warning btn-sm mx-1">
                                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                            </button>
                                                            <form action="{{route('admin.product.subcategory.delete')}}"
                                                                class="d-inline-block" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <input type="hidden" name="id"
                                                                    value="{{$subcategory['id']}}">
                                                                <button
                                                                    class="btn border border-1 text-danger btn-sm mx-1"
                                                                    type="submit">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </button>
                                                            </form>
                                                            <div class="modal fade"
                                                                id="editproduct_{{$subcategory['id']}}" tabindex="-1"
                                                                aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <form method="POST" class="modal-content"
                                                                        action="{{route('admin.product.subcategory.update')}}">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <input type="hidden" name="id"
                                                                            value="{{$subcategory['id']}}">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5">Update Category
                                                                            </h1>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <div class="mb-3">
                                                                                <label for="sub_category"
                                                                                    class="form-label">Sub-Category
                                                                                    Title</label>
                                                                                <input type="text" name="sub_category"
                                                                                    value="{{$subcategory['sub_category_name']}}"
                                                                                    class="form-control @error('sub_category') is-invalid @enderror"
                                                                                    id="sub_category"
                                                                                    placeholder="Enter Category Title">
                                                                                @error('sub_category')
                                                                                <p class="invalid-feedback">{{$message}}
                                                                                </p>
                                                                                @enderror
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="category"
                                                                                    class="form-label">Category</label>
                                                                                <select name="category_id" id="category"
                                                                                    class="select2 form-control @error('category_id') is-invalid @enderror">
                                                                                    <option>Select Category</option>
                                                                                    @foreach ($categories as $category)
                                                                                    <option value="{{$category['id']}}"
                                                                                        @if
                                                                                        ($subcategory['category_id']==$category['id'])
                                                                                        selected @endif>
                                                                                        {{$category['category_name']}}
                                                                                    </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('category_id')
                                                                                <p class="invalid-feedback">{{$message}}
                                                                                </p>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Update
                                                                                Category</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                                @endif
                                            </table>
                                            {{$subcategories->links()}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>

<!-- SubCategory add modal -->
<div class="modal fade" id="addproduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form action="{{route('admin.product.subcategory.add')}}" method="POST" class="modal-content">
            @csrf
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add New Sub Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="subcategory" class="form-label">Sub-Category Title</label>
                    <input type="text" name="sub_category_name"
                        class="form-control @error('sub_category_name') is-invalid @enderror" id="subcategory"
                        placeholder="Enter Sub-Category Title">
                    @error('sub_category_name')
                    <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-control select2">
                        <option>Select Category</option>
                        @foreach ($categories as $category)
                        <option value="{{$category['id']}}">{{$category['category_name']}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <p class="invalid-feedback">{{$message}}</p>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add Sub-Category</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('custom_js')
@include('admin.widgets.alert')
@endsection
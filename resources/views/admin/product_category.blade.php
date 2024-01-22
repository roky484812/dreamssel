@extends('layouts.admin', ['title'=> 'Product Category', 'active'=> 'product_category'])
@section('content')
<div class="app-content main-content">
    <div class="side-app">
        <div class="container-fluid main-container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Category List</h4>
                </div>
                <div class="page-rightheader ms-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="d-flex">
                                <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                    <polyline points="2 17 12 22 22 17"></polyline>
                                    <polyline points="2 12 12 17 22 12"></polyline>
                                </svg>
                                <span class="breadcrumb-icon">Product Category List</span>
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
                                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addproduct">
                                                <i class="fe fe-plus"></i>
                                                Add New Category
                                            </button>
                                        </div>
                                        <div class="col col-auto mb-4">
                                            <div class="mb-3 w-100">
                                                <div class="input-icon">
                                                    <span class="input-icon-addon">
                                                        <i class="fe fe-search"></i>
                                                    </span>
                                                    <input type="text" class="form-control" placeholder="Search Category">
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
                                                        <th>Product Category Name</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>data</td>
                                                        <td>
                                                            <button data-bs-toggle="modal" data-bs-target="#editproduct_1" class="btn btn-warning"></button>
                                                            <a href="#" class="btn btn-danger"></a>
                                                            <div class="modal fade" id="editproduct_1" tabindex="-1" aria-hidden="true">
                                                                <div class="modal-dialog modal-dialog-centered">
                                                                    <form method="POST" class="modal-content">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5">Update Category</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label for="category" class="form-label">Category Title</label>
                                                                                    <input type="text" name="category" class="form-control" id="category" placeholder="Enter Category Title">
                                                                                </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                                            <button type="button" class="btn btn-primary">Update Category</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
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

<!-- Category add modal -->
<div class="modal fade" id="addproduct" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <form method="POST" class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Add Category</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label for="category" class="form-label">Category Title</label>
                    <input type="text" name="category" class="form-control" id="category" placeholder="Enter Category Title">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Add Category</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('custom_js')
    @include('admin.widgets.alert')
@endsection
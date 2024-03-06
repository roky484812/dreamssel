@extends('layouts.admin', ['title' => 'Update Product', 'active' => 'product_update'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">
                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Update Items</h4>
                    </div>
                    <div class="page-rightheader ms-auto d-lg-flex d-none">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="javascript:void(0)" class="d-flex">
                                    <svg class="side-menu__icon" width="24" height="24" viewBox="0 0 40 40"
                                        fill="none" xmlns="http://www.w3.org/2000/svg" stroke="currentColor"
                                        stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M26.6667 21.8833H13.3334" />
                                        <path d="M20 28.5499V15.2166" />
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M24.7666 3.33325H9.99996C9.1159 3.33325 8.26806 3.68444 7.64294 4.30956C7.01782 4.93468 6.66663 5.78253 6.66663 6.66659V33.3333C6.66663 34.2173 7.01782 35.0652 7.64294 35.6903C8.26806 36.3154 9.1159 36.6666 9.99996 36.6666H30C30.884 36.6666 31.7319 36.3154 32.357 35.6903C32.9821 35.0652 33.3333 34.2173 33.3333 33.3333V14.8666C33.3393 14.5257 33.234 14.1922 33.0333 13.9166L26.1166 4.04992C25.9651 3.83144 25.7635 3.65238 25.5286 3.52771C25.2938 3.40304 25.0325 3.33636 24.7666 3.33325V3.33325Z" />
                                    </svg>
                                    <span class="breadcrumb-icon">Update Item</span>
                                </a>
                            </li>
                        </ol>
                    </div>
                </div>
                <!--End Page header-->

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form method="post" action="{{ route('admin.product.add') }}" id="product_add"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">File Upload</h3>
                                </div>
                                <div class=" card-body">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-label text-dark" for="">Thumbnail *</label>
                                            <input type="file" class="dropify" accept=".jpg, .png, image/jpeg, image/png"
                                                name="thumbnail" />
                                            @error('thumbnail')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6 col-sm-12">
                                            <label class="form-label text-dark" for="">Multiple Image</label>
                                            <div id="multiple_image"></div>
                                            @error('images.*')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-lg-12 col-sm-12">
                                            <label class="form-label text-dark" for="">Manage Image</label>
                                            <div class="all_imgages">
                                                <div class="edit-item">
                                                    <div class="delete-icon">

                                                        <i class="fa fa-trash"></i>
                                                    </div>
                                                    <img src="{{ asset('/assets/admin/images/brand/logo.png') }}"
                                                        alt="">
                                                </div>

                                            </div>
                                            @error('images.*')
                                                <p class="text-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Product Details</h3>
                                </div>
                                <div class="card-body ">
                                    <div class="form-group">
                                        <label class="form-label text-dark">Product Title *</label>
                                        <input type="text" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="I tell a teil of a tail">
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="row ">
                                        <div class="col-md-12">
                                            <label class="form-label text-dark">Product Description *</label>
                                            <div class="ql-wrapper ql-wrapper-demo bg-light">
                                                <div id="quillEditor">
                                                </div>
                                            </div>
                                            <textarea name="description" style="display:none" id="hidden-textarea"
                                                class="@error('description') is-invalid @enderror"></textarea>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <label for="" class="form-label-text-dark">Product Short Description</label>
                                        <textarea name="short_description" class="form-control" placeholder="enter product short description"></textarea>
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-md-4 col-sm-6">
                                            <label class="form-label">Select Category *</label>
                                            <!-- category adding popup -->
                                            <select class="select2 @error('category') is-invalid @enderror" id="category"
                                                name="category">
                                                <option value="">Select Category</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category['id'] }}">
                                                        {{ $category['category_name'] }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <label class="form-label">Select Sub Category *</label>
                                            <!-- category adding popup -->
                                            <select class="select2 @error('sub_category') is-invalid @enderror"
                                                name="sub_category" id="sub_category">
                                            </select>
                                            @error('sub_category')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 col-sm-6">
                                            <div class="form-group">
                                                <label class="form-label">Select Country *</label>
                                                <select name="country"
                                                    class="form-control SlectBox @error('country')
                                                    is-invalid
                                                @enderror">
                                                    <!--placeholder-->
                                                    <option value="3">China</option>
                                                    <option value="2">India</option>
                                                    <option value="1">Bangladesh</option>
                                                </select>
                                                @error('country')
                                                    <span class="invalid-feedback" role="alert">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-3 col-sm-6">
                                            <label class="form-label text-dark">Available Quantity</label>
                                            <input type="number" class="form-control" name="sku"
                                                placeholder="Number of Product">
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <label class="form-label text-dark">Public Price *</label>
                                            <input type="number"
                                                class="form-control @error('price') is-invalid @enderror" name="price"
                                                placeholder="Price of product">
                                            @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-md-3 col-sm-6">
                                            <label class="form-label text-dark">Distributor Price *</label>
                                            <input type="number"
                                                class="form-control @error('dist_price') is-invalid @enderror"
                                                name="dist_price" placeholder="Price for distributor">
                                            @error('dist_price')
                                                <span class="invalid-feedback" role="alert">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="card-footer ">
                                        <div class="row">
                                            <div class=" col-sm-6 mb-3">
                                                <button type="submit" name="status" value="0" id="draft"
                                                    class="btn btn-secondary">Save to Draft</button>
                                            </div>
                                            <div class=" col-sm-6">
                                                <button type="submit" id="save" name="status" value="1"
                                                    class="btn btn-primary float-end"> Publish Now</button>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- popup for adding item -->
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Product attributes</h3>
                                </div>
                                <div class="card-body">


                                    <!-- Product details input generated -->

                                    <div class="generated-product-details mt-3">
                                        <div class="mb-0">
                                            <div class="add-category">
                                                <label class="form-label"> combination </label>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <input id="tagInput" name="combination[${row_index}][stock]"
                                                        type="number" class="form-control mb-1" placeholder="Stock">
                                                </div>
                                                <input type='hidden' name="combination[${row_index}][combination_value]"
                                                    value='${combination}'>

                                                <div class="col-sm-4">
                                                    <input id="tagInput" name="combination[${row_index}][price]"
                                                        type="number" class="form-control mb-1"
                                                        placeholder="Regular Price">
                                                </div>
                                                <div class="col-sm-4">
                                                    <input id="tagInput" name="combination[${row_index}][dist_price]"
                                                        type="number" class="form-control mb-1"
                                                        placeholder="Distributor Price">
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- /Row -->
                </div>
            </div>
        </div>
        <!-- end app-content-->
    </div>
@endsection
@section('custom_js')
    @include('admin.widgets.alert')
    <script src="{{ asset('assets/admin/plugins/notify/js/notifIt.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/notify/js/sample.js') }}"></script>
    <script src="{{ asset('assets/admin/js/product-variation.js') }}"></script>
    <!--Select2 js -->
    <script src="{{ asset('assets/admin/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- Include Select2 JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.full.min.js"></script>

    <!--File-Uploads Js-->
    {{-- <script src="{{ asset('assets/admin/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/admin/plugins/fancyuploder/fancy-uploader.js') }}"></script> --}}

    <script src="{{ asset('assets\admin\plugins\image-uploader\dist\image-uploader.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            var editor = new Quill('#quillEditor', {
                theme: 'snow'
            });
            $('#multiple_image').imageUploader({
                extensions: ['.jpg', '.jpeg', '.png', ],
                maxFiles: 5
            });

            $("#product_add").submit(function() {
                // var formdata = new FormData();
                // var data = object.formEntries(formdata.entries());
                // if(){

                // }
                $("#hidden-textarea").val(editor.root.innerHTML);
            });

            $('#category').change((e) => {
                var category_id = e.target.value;
                if (category_id) {
                    $.ajax({
                        url: "{{ route('admin.product.subcategory.category') }}/" + category_id,
                        type: 'GET',
                        dataType: 'json',
                        success: function(response) {
                            console.log(response);
                            if (response.status) {
                                $('#sub_category').empty();
                                response.sub_categories.forEach((sub_category) => {
                                    let options = document.createElement('option');
                                    options.setAttribute('value', sub_category.id);
                                    options.append(sub_category.sub_category_name);
                                    $('#sub_category').append(options);
                                });
                            }
                        },
                        error: function(error) {
                            if (error.responseJSON && error.responseJSON.errors) {
                                if (error.responseJSON.errors) {
                                    console.error('Error:', error);
                                }
                            }
                        }
                    });
                }
            });
        });
    </script>




    {{-- <script type="text/javascript">
        let csrfToken = $('meta[name="csrf-token"]').attr('content');
        $(function() {    
            $('#fandyfile').FancyFileUpload({
                params : {
                    action : 'fileuploader'
                },
                maxfilesize : 1000000,
                startupload : function(SubmitUpload, e, data) {
                    let imageForm = new FormData($('#image_upload')[0]);
                    console.log($('#image_upload'));
                    $.ajax({
                        url : '{{route("admin.product.image.temp")}}',
                        method : 'POST',
                        dataType : 'json',
                        data: imageForm,
                        headers: {
                            'X-CSRF-TOKEN': csrfToken
                        },
                        success : function(response) {
                            console.log('success',response)
                            SubmitUpload();
                        },
                        error: function(error){
                            console.log('error', error);
                        },
                        complete: function(){
                            console.log('hello')
                        }
                    });
                },
                continueupload : function(e, data) {
                    console.log('hello')
                    var ts = Math.round(new Date().getTime() / 1000);
                },
                uploadcompleted : function(e, data) {
                    data.ff_info.RemoveFile();
                }
            });
        });
    </script> --}}

    {{-- <script>
        $(document).ready(function(){
            // Dropzone.options.images = {
            //     init: function(){
            //         console.log('working.');
            //     },
            //     paramName: 'image',
            //     addRemoveLinks: true,
            //     acceptedFiles: 'image/jpeg, image/png, image/jpg',
            //     success: function(file, response){
            //         console.log('success');
            //         console.log(response);
            //     },
            //     complete: function(){
            //         console.log('hello')
            //     }
            // }
        });
    </script> --}}
@endsection
@section('custom_css')
    <style>

    </style>
    <link rel="stylesheet" href="{{ asset('assets\admin\plugins\image-uploader\dist\image-uploader.min.css') }}">
@endsection

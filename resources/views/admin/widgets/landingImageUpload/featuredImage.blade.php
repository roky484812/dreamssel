@extends('layouts.admin', ['title' => 'Order Management', 'active' => 'user'])
@section('content')
<div class="app-content main-content">
    <div class="side-app">
        <div class="container-fluid main-container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Featured Image</h4>
                </div>
                
            </div>
            <!--End Page header-->

            <!-- Row -->
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <form method="post" class="card" action="{{route('admin.featured.image.upload')}}" enctype="multipart/form-data"      >
                        @csrf
                        <div class="card-header">
                            <h3 class="card-title">File Upload</h3>
                        </div>
                        <div class=" card-body">
                            <div class="row">

                                <div class="col-lg-12 col-sm-12">
                                    <label class="form-label text-dark" for="">Featured Photo</label>
                                    <input type="file" class="dropify"
                                        accept=".jpg, .png, image/jpeg, image/png" data-height="180" name="image" />
                                </div>

                                <div class="col-lg-12 col-sm-12">
                                    <label class="form-label text-dark" for="">Manage Image</label>
                                    <div class="all_imgages d-flex">
                                        @foreach ($featured_image as $image)
                                        <div class="edit-item del-image m-1" data-image_id="{{ $image->id }}">
                                            <div class="delete-icon">
                                                <i class="fa fa-trash"></i>
                                            </div>
                                            <img src="{{ asset($image->image) }}" alt="">
                                        </div>
                                        @endforeach

                                    </div>
                                    @error('images.*')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class=" col-sm-12">
                                    <button type="submit" id="save" class="btn btn-primary float-end mb-5 mt-5">
                                        Publish Now</button>
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
<script>
    $(document).ready(function() {

        $(document).on('click', '.del-image', function(){
            var id = $(this).data('image_id');
            let current_elemenet = $(this);
            current_elemenet.addClass('opacity-25');
            let csrfToken = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: "{{ route('admin.featured.deleteImage') }}/"+id,
                type: "delete",
                headers: {
                    'X-CSRF-TOKEN': csrfToken
                },
                success: function(data) {
                    if(data.status){
                        swal("Success!", data.message, "success");
                        current_elemenet.remove();
                    }else{
                        current_elemenet.removeClass('opacity-25');
                        swal("Error!", data.message, "error");
                    }
                }
            });
        })

       

        
    });
</script>
    @include('admin.widgets.alert')
@endsection
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/admin/css/orderCard.css') }}">
@endsection

@extends('layouts.admin', ['title' => 'Resources | Carousel', 'active' => 'carousel'])
@section('content')
    <div class="app-content main-content">
        <div class="side-app">
            <div class="container-fluid main-container">

                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <h4 class="page-title">Top Carousel</h4>
                    </div>

                </div>
                <!--End Page header-->

                <!-- Row -->
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <form method="post" action="{{route('admin.carousel.images.upload')}}" enctype="multipart/form-data" class="card">
                            @csrf
                            <div class="card-header">
                                <h3 class="card-title">File Upload</h3>
                            </div>
                            <div class=" card-body">
                                <div class="row">

                                    <div class="col-lg-12 col-sm-12">
                                        <label class="form-label text-dark" for="">Carousel Image(1000*350)</label>
                                        <div id="multiple_image"></div>
                                        @error('images.*')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="col-lg-12 col-sm-12">
                                        <label class="form-label text-dark" for="">Manage Image</label>
                                        <div class="all_imgages d-flex">
                                            @foreach ($carousel_gallery as $carousel_image)
                                            <div class="edit-item del-image m-1" data-image_id="{{ $carousel_image->id }}">
                                                <div class="delete-icon">
                                                    <i class="fa fa-trash"></i>
                                                </div>
                                                <img src="{{ asset($carousel_image->image) }}" alt="">
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
    @include('admin.widgets.alert')
    <script src="{{ asset('assets\admin\plugins\image-uploader\dist\image-uploader.min.js') }}"></script>

    <script>
        $(document).ready(function() {

            $('#multiple_image').imageUploader({
                extensions: ['.jpg', '.jpeg', '.png', ],
                maxFiles: 5
            });


            $(document).on('click', '.del-image', function(){
                var id = $(this).data('image_id');
                let current_elemenet = $(this);
                current_elemenet.addClass('opacity-25');
                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('admin.carousel.deleteImage') }}/"+id,
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
@endsection
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets\admin\plugins\image-uploader\dist\image-uploader.min.css') }}">
@endsection

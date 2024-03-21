@extends('layouts.admin', ['title'=> 'Site Carousal', 'active'=> 'carousal'])
@section('content')
<div class="app-content main-content">
    <div class="side-app">
        <div class="container-fluid main-container">

            <!--Page header-->
            <div class="page-header">
                <div class="page-leftheader">
                    <h4 class="page-title">Carousal Image</h4>
                </div>
                <div class="page-rightheader ms-auto d-lg-flex d-none">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="javascript:void(0)" class="d-flex">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                                    <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7">
                                    </path>
                                    <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z">
                                    </path>
                                </svg>
                                <span class="breadcrumb-icon">Resources</span>
                            </a>
                        </li>

                    </ol>
                </div>
            </div>
            <!--End Page header-->
            
            <!-- Row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-4">
                        <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#add_carousal">
                            <i class="fe fe-plus"></i>
                            Add New Carousal Image
                        </button>
                        @include('admin.resources.modals.add_carousal')
                    </div>
                </div>
                <div class="col-lg-12 my-3">
                    <small class="text-danger fst-italic"><span class="fw-bold">Note:</span> Only latest five image will show in site carousal. 1000px X 350px is recommended.</small>
                </div>
                <div class="col-lg-12">
                    <div class="row">
                        @foreach ($carousels as $carousel)
                        <div class="col-lg-3 col-md-4 col-sm-6 edit-item del-image" data-image_id="{{ $carousel->id }}">
                            <div class="card">
                                <div>
                                    <div class="delete-icon">
                                        <i class="fa fa-trash"></i>
                                    </div>
                                    <img src="{{ asset($carousel->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-12 my-3">
                    {{ $carousels->links() }}
                </div>
            </div>
            <!-- End Row -->
        </div>
    </div>
</div>
@endsection
@section('custom_js')
    @include('admin.widgets.alert')
    <script src="{{ asset('assets/admin/plugins/image-uploader/dist/image-uploader.min.js') }}"></script>
    <script>
        $('#multiple_image').imageUploader({
            extensions: ['.jpg', '.jpeg', '.png', ],
            maxFiles: 5
        });
        $(document).on('click', '.del-image', function(){
                var id = $(this).data('image_id');
                let current_elemenet = $(this);
                current_elemenet.addClass('disabled');
                let csrfToken = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('admin.carousel.deleteImage','') }}/"+id,
                    type: "delete",
                    headers: {
                        'X-CSRF-TOKEN': csrfToken
                    },
                    success: function(data) {
                        if(data.status){
                            swal("Success!", data.message, "success");
                            current_elemenet.remove();
                        }else{
                            current_elemenet.removeClass('disabled');
                            swal("Error!", data.message, "error");
                        }
                    }
                });
            })
    </script>
@endsection
@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets\admin\plugins\image-uploader\dist\image-uploader.min.css') }}">
@endsection
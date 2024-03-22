@extends('layout.master', ['title' => 'Search'])


@section('content')
    <div class="container mb-5">
        <div class="headerSection">
            <div class="header-category">
                <div class="box-pointer"></div>
                <div class="header-category-title">
                    <h6>search</h6>
                </div>
            </div>
        </div>

        <div class="ourProductBox">
            <div class="product-list-wrapper">
                <div class="row">
                    <div class="col-md-3">
                        @include('client.widgets.product_filter')
                    </div>
                    <div class="col-md-9">
                        <div class="row" id="data">
                            <div class="d-flex justify-content-center">
                                <div class="spinner-border" role="status">
                                  <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end" id="link">
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('custom_css')
    <link rel="stylesheet" href="{{ asset('assets/client_old/css/searchView.css') }}">
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addToCartBtn', function(event) {
                event.preventDefault(); // Prevent the default behavior (following the link)

                // Get the product ID from the data attribute
                var productId = $(this).data('product-id');

                // Make an Ajax request to add the product to the cart
                $.ajax({
                    url: "{{ url('/add-to-cart-v') }}/" + productId,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message, 'Success');
                        } else {
                            toastr.error(response.message, 'Error');
                        }
                        // Update the cart badge count or handle the response as needed

                    },
                    error: function(error) {
                        toastr.error('Something went wrong ):', 'Error');
                        console.log(error);
                    }
                });
            });


        });
    </script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.addToFavBtn', function(event) {
                event.preventDefault(); // Prevent the default behavior (following the link)

                // Get the product ID from the data attribute
                var productId = $(this).data('product-fav-id');

                // Make an Ajax request to add the product to the cart
                $.ajax({
                    url: "{{ url('/add/fav-list') }}/" + productId,
                    method: 'GET',
                    success: function(response) {
                        if (response.success) {
                            toastr.success(response.message, 'Success');
                        } else {
                            toastr.error(response.message, 'Error');
                        }
                        // Update the cart badge count or handle the response as needed

                    },
                    error: function(error) {
                        toastr.error('Something went wrong ):', 'Error');
                        console.log(error);
                    }
                });
            });
        });
    </script>

    <script src="{{ asset('assets/client_old/js/priceRange.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/moment/moment.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(document).on('change', '.category_check', function(){
                var category = $('input[name="category_id[]"]:checked');
                var category_id = [];
                category.each(function(){
                    category_id.push($(this).val());
                })
                
                $.ajax({
                    url: "{{ route('client.product.sub_category_filter') }}",
                    type: 'GET',
                    dataType: 'json',
                    data: {
                        'category_id[]': category_id
                    },
                    success: function(response) {
                        if(response.status){
                            console.log(response);
                            searchProducts();
                            $('#sub_cat').empty();
                            let options = '';
                            if(response.data.length){
                                response.data.forEach(sub_category => {
                                    options += `
                                        <div>
                                            <input class="filterCheckBox subcategory_check" type="checkbox" id="sub_cat_${ sub_category.id }" name="sub_category_id[]" value="${sub_category.id}">
                                            <label for="sub_cat_${ sub_category.id }" class="form-label" >${ sub_category.sub_category_name }</label>
                                        </div>
                                    `;
                                });
                                let sub_cat_section = `
                                    <h3>Sub Categories</h3>
                                    ${options}
                                `;
                                $('#sub_cat').html(sub_cat_section);
                            }
                        }
                    },
                    error: function(error) {
                        if (error.responseJSON && error.responseJSON.errors) {
                            if (error.responseJSON.errors) {
                                console.error('Error:', error);
                            }
                        }
                    },
                });
            });
            $('#min_price').on('change', function(){
                searchProducts();
            });
            
            $('#max_price').on('change', function(){
                searchProducts();
            });

            $('#search_filter').on('keyup', function(){
                searchProducts();
            });

            $(document).on('change', '.subcategory_check', function(){
                searchProducts();
            });

            function searchProducts(page = 1){
                let form = $('#product_filter')[0];
                let formData = new FormData(form);
                let objectData = {};
                for (let [key, value] of formData.entries()) {
                    if (objectData[key]) {
                        if (Array.isArray(objectData[key])) {
                            objectData[key].push(value);
                        } else {
                            objectData[key] = [objectData[key], value];
                        }
                    } else {
                        objectData[key] = value;
                    }
                }
                $('#data').addClass('disabled');
                $.ajax({
                    url: "{{ route('client.product.search') }}"+"?page="+page,
                    type: 'GET',
                    dataType: 'json',
                    data: objectData,
                    success: function(response) {
                        var products = '';
                        response.data.data.forEach((product)=>{
                            console.log(product);
                            var rating = product.rating;
                            var i = 0;
                            var image = '';
                            for(i; i < 5; i++){
                                if(rating >= 1){
                                    image += `<img src="{{ asset('assets/client/images/filled_star.svg') }}" alt="" data-index="1" />`;
                                }else{
                                    image += `<img src="{{ asset('assets/client/images/blank_star.svg') }}" alt="" data-index="5" />`;
                                }
                                rating--;
                            }
                            var review = `
                                <div class="card-review">
                                    ${image}
                                </div>
                            `;
                            products +=`
                            <div class="col-md-4 col-sm-6">
                                <div class="product-card">
                                    <div class="card-product-image">

                                        <a href="{{ route('home.productPage', '') }}/${product.id}" class="product-card-link">
                                            
                                            <img src="${product.thumbnail_image}" alt="Product image"/>
                                        </a>
                                        <div class="card-discount">
                                            @if (auth()->user()) 
                                                <p>                                                
                                                    ${Math.round(((product.price - product.distributor_price) / product.price) * 100)+'%'}
                                                </p>
                                            @endif
                                        </div>
                                        <div class="card-add-to-wishlist">
                                            @if (auth()->user())
                                                <a href="javascript:void(0)" class="addToFavBtn"
                                                    data-product-fav-id="${ product.id }">
                                                    <i class="fa-regular fa-heart"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('home.signInPage') }}"
                                                    data-product-fav-id="${ product.id }">
                                                    <i class="fa-regular fa-heart"></i>
                                                </a>
                                            @endif
                                        </div>
                                        <div class="position-absolute bottom-0 end-0">
                                            <span class="badge text-bg-dark">${ product.country_code }</span>
                                        </div>
                                        <div class="card-add-to-cart">
                                            @if (auth()->user())
                                                <a href="javascript:void(0)" class="addToCartBtn"
                                                    data-product-id="${ product.id }">
                                                    <i class="bi bi-cart3"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('home.signInPage') }}"
                                                    data-product-id="${ product.id }">
                                                    <i class="bi bi-cart3"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-product-name">
                                        <p>${str_limit(product.title, 25)}</p>
                                    </div>
                                    <div class="card-price">
                                        @if (auth()->user())
                                            <p>&#2547; ${ product.distributor_price } </p>
                                            <span><del>&#2547; ${ product.price }</del></span>
                                        @else
                                            <p>&#2547; ${ product.price } </p>
                                        @endif
                                    </div>

                                    <div class="card-review-wrapper">
                                        ${review}
                                        <div class="card-number-of-reviews">
                                            <p>&#x28;${ product.rating_count }&#x29;</p>
                                        </div>
                                    </div>
                                    <a href="{{ route('home.placeOrderView', '') }}/${product.id}"
                                        class="card-buy-now text-decoration-none" type="button">
                                        <p>অর্ডার করুন</p>
                                    </a>
                                </div>
                            </div>
                            `;
                        });
                        if(products.length > 0){
                            $('#data').html(products);
                            $('html,body').scrollTop(0);
                        }else{
                            $('#data').html('<h4 class="text-muted text-center">No Product!</h4>');
                        }

                        // create links
                        var options = '';
                        response.data.links.forEach(function(link) {
                            if(link.url){
                                options += `
                                    <li class="page-item ${link.active ? 'active': ''} ">
                                        <a class="page-link" href="${link.url}">${link.label}</a>
                                    </li>`;
                            }
                        });
                        var links = `<ul class="pagination">
                            ${options}
                        </ul>`;
                        if(products.length > 0){
                            $('#link').html(links);
                        }else{
                            $('#link').empty();
                        }
                    },
                    complete: function(){
                        $('#data').removeClass('disabled');
                    }
                });
            }
            function str_limit(text, count){
                return text.slice(0, count) + (text.length > count ? "..." : "");
            }

            $('#product_filter').on('submit', function(e){
                e.preventDefault();
            });

            $(document).on('click', '.pagination a.page-link', function(event) {
                event.preventDefault();
                var page = $(this).attr('href').split('page=')[1];
                searchProducts(page);
            });
            @if ($search_product)
                searchProducts();
            @else
                $('#data').html('<h4 class="text-muted text-center">No Product!</h4>');
            @endif
        });
    </script>
@endsection

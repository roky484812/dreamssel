<form id="product_filter" class="sideBar filterBox">
    <div class="search mb-3">
        <h4 class="mb-2">Search</h4>
        <input type="text" name="search" value="{{ $search_product }}" id="search_filter" class="form-control" placeholder="Search Product">
    </div>
    <div class="category mb-3">
        <h3>Categories</h3>
        @foreach ($_categories as $category)
        <div>
            <input class="filterCheckBox category_check" type="checkbox" id="cat_{{ $category->id }}" name="category_id[]" value="{{ $category->id }}">
            <label for="cat_{{ $category->id }}" class="form-label" >{{ $category->category_name }}</label>
        </div>
        @endforeach
    </div>
    <div id="sub_cat">

    </div>
    <!-- range start -->
    <div class="priceRange">
        <h3>Price</h3>
        <div class="slider">
            <div class="progress"></div>
        </div>
        <div class="range-input">
            <input type="range" name="min_price" id="min_price" class="range-min" min="0" max="10000" value="0" step="100">
            <input type="range" name="max_price" id="max_price" class="range-max" min="0" max="10000" value="7500" step="100">
        </div>
        <div class="price-input">
            <div class="field">
                <span>Min</span>
                <input type="number" class="input-min" value="0">
            </div>
            <div class="separator">-</div>
            <div class="field">
                <span>Max</span>
                <input type="number" class="input-max" value="7500">
            </div>
        </div>
    </div>
</form>
<div class="overlay"></div>
@push('scripts')
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
                            
                            products +=`
                            <div class="col-md-4 col-sm-6">
                                <div class="product-card">
                                    <div class="card-product-image">
                                        <a href="{{ route('client.product.view', '') }}/${product.id}"
                                            class="product-card-link">
                                            <img src="${product.thumbnail_image}" alt="Product image"/>
                                        </a>
                                        <div class="card-discount">
                                            @if (auth()->user()) 
                                            <p> 
                                                ${Math.round(((product.price - product.distributor_price) / product.price) * 100) %}
                                            </p>
                                            @endif
                                        </div>
                                        <div class="card-add-to-wishlist">
                                            <span class="badge text-bg-dark">${ product.country_code }</span>
                                        </div>
                                    </div>
                                    <div class="card-product-name">
                                        ${str_limit(product.title, 40)}
                                    </div>
                                    <div class="card-price">
                                        @if (auth()->user())
                                            <p>&#2547; {{ $related_product->distributor_price }} </p>
                                            <span><del>&#2547; ${ product.price }</del></span>
                                        @else
                                            <p>&#2547; ${ product.price } </p>
                                        @endif
                                    </div>
            
                                    <a href="#" class="card-buy-now text-decoration-none" type="button">
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
@endpush
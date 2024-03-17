<form id="product_filter" class="sideBar filterBox">
    <!-- language change button -->
    <div class="switchPhoneMenu">
        <div class="switch">
            <input id="language-toggle-Mbl" class="check-toggle check-toggle-round-flat" type="checkbox" />
            <label for="language-toggle-Mbl"></label>
            <span class="on">BN</span>
            <span class="off">EN</span>
        </div>
    </div>
    <!-- end -->
    <button class="sideBarCloseBtn" onclick="toggleSideMenuBar()">
    <i class="fa-solid fa-xmark"></i>
    </button>
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
        <div class="applyBtnBox">
            <button class="applyBtn">Apply</button>
            <button class="resetBtn">Reset</button>
        </div>
    </div>
</form>
<div class="overlay"></div>
@push('scripts')
    <script src="{{ asset('assets/client/js/priceRange.js') }}"></script>
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

                $.ajax({
                    url: "{{ route('client.product.search') }}"+"?page="+page,
                    type: 'GET',
                    dataType: 'json',
                    data: objectData,
                    success: function(response) {
                        console.log('response: ', response);
                        var products = '';
                        response.data.data.forEach((product)=>{
                            products +=`
                            <div class="svCard">
                                <div class="svDesWraper">
                                    <div class="svImgSection">
                                        <img src="${product.thumbnail_image}" alt="pic">
                                    </div>
                                    <div class="svDesSection">
                                        ${'<a href="' + "{{ route('client.product.view', '') }}/" + product.id + '" class="h3 text-decoration-none">' + str_limit(product.title, 50) + '</a>'}
                                        <div class="svProductDetails">
                                            <div class="productAttributeItem">
                                                <div class="descriptionTitle">
                                                    <p>Category:</p>
                                                </div>
                                                <div class="descriptionBox">
                                                    <p>${product.category_name}</p>
                                                </div>
                                            </div>
                                            <div class="productAttributeItem">
                                                <div class="descriptionTitle">
                                                    <p>Stock:</p>
                                                </div>
                                                <div class="descriptionBox">
                                                    <p>${product.sku ? 'InStock ('+product.sku+')' : 'OutOfStock'}</p>
                                                </div>
                                            </div>
                                            <div class="productAttributeItem">
                                                <div class="descriptionTitle">
                                                    <p>Date:</p>
                                                </div>
                                                <div class="descriptionBox">
                                                    <p>${moment(product.crated_at).format('DD-MM-YYYY')}</p>
                                                </div>
                                            </div>
                                            <div class="productAttributeItem">
                                                <div class="descriptionTitle">
                                                    <p>Country:</p>
                                                </div>
                                                <div class="descriptionBox">
                                                    <p><span class="regional-tag">${product.country_code}</span></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="svPriceSection">
                                    <div class="svProDesPriceBox">
                                        <div class="desPriceBox">
                                            @if (auth()->user())
                                                <h2 class="price">${product.distributor_price}</h2>
                                                <div class="closePriceAndCategory">
                                                    <del class="crossed-price">${product.price}</del>
                                                </div>
                                            @else
                                                <h2 class="price">${product.price} BDT</h2>
                                            @endif
                                        </div>
                                        <div class="desQuantity">
                                            <form class="quantityForm" role="search">
                                                <input class="quanInputBox" type="text" placeholder="1..">
                                                <!-- drop down -->
                                                <div class="quantityDropdown">
                                                    <button class="pscBtn" type="button">
                                                    PSC <span><i class="fa-solid fa-angle-down"></i></span>
                                                    </button>
                                                </div>
                                                <!-- drop down end -->
                                            </form>
                                        </div>
                                        <div class="desBuyBtn">
                                            <button class="buy-now-button">
                                                Buy now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
                        });
                        if(products.length > 0){
                            $('#data').html(products);
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
            @endif
        });
    </script>
@endpush
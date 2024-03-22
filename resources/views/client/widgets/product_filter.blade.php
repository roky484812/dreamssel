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
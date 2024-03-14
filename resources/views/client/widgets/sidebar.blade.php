<div class="sideBar">
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
    <div class="productCategories">
        <h3>Categories</h3>
        <ul class="drawerCategoryMenu" id="drawerCategoryMenu">
            @foreach ($categories as $category)   
            <li class="subCategoryItem">
                <a href="javascript:void(0)">
                    {{ $category->category_name }}
                    @if (count($category->sub_category))  
                    <div class="dropDownIcon">
                        <i class="fa-solid fa-angle-right angleRight"></i>
                    </div>
                    <ul class="subCategoryMenu">
                        @foreach ($category->sub_category as $sub_category)
                        <li><a href="">{{ $sub_category->sub_category_name }}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>
<div class="overlay"></div>
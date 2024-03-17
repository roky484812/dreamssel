    <!-- navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container navContainer">
            <a class="navbar-brand" href="{{ route('client.index') }}">
                <img class="brand-logo lineLogo" src="{{ asset('assets/client/images/lineLogo.svg') }}" alt="logo" />
            </a>
            <div class="searchBar">
                <form class="searchForm" role="search" action="{{ route('client.product.search_page') }}">
                    <!-- drop down -->
                    <!-- comment -->
                    <div class="dropdown">
                        <button class="catagoryBtnSearchBar catagoryBtn" type="button">
                            All categories
                            <div class="dropDownIcon"><i class="fa-solid fa-angle-down"></i></div>
                        </button>
                        <div class="searchBoxDropdown" aria-labelledby="dropdownMenuButton">
                            <ul>
                                @foreach ($_categories as $category)
                                <li><a href="">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- drop down end -->
                    <input id="search" class="searchBox" value="@if(isset($search_product)){{ $search_product }}@endif" name="search" type="search" placeholder="Search products, categories..."
                        aria-label="Search" />
                    <button class="SearchBtn" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
            <div class="userTopBtn">
                <div class="userLogin">
                    <a href="{{ route('login') }}" class="loginBtn text-decoration-none">
                        <i class="fa-regular fa-user"></i>
                        <p class="loginText">Login</p>
                    </a>
                </div>
                <!-- language change button -->
                <div class="switch switchBtnTop">
                    <input id="language-toggle" class="check-toggle check-toggle-round-flat" type="checkbox" />
                    <label for="language-toggle"></label>
                    <span class="on">BN</span>
                    <span class="off">EN</span>
                </div>
                <!-- end -->
            </div>
        </div>
    </nav>
    <!-- for responsive menu -->
    <div class="phoneMenu">
        <div class="container phoneNavContainer">
            <div class="menuBarBtn">
                <button onclick="toggleSideMenuBar()">
                <i class="fa-solid fa-bars"></i>
                </button>
            </div>
            <div class="searchBar">
                <form class="searchForm" role="search" action="{{ route('client.product.search_page') }}">
                    <!-- drop down -->
                    <div class="dropdown">
                        <button class="catagoryBtnSearchBar catagoryBtn" type="button">
                            <span class="allCategoryText">All categories</span>
                            <div class="dropDownIcon"><i class="fa-solid fa-angle-down"></i></div>
                        </button>
                        <div class="searchBoxDropdown" aria-labelledby="dropdownMenuButton">
                            <ul>
                                @foreach ($_categories as $category)
                                <li><a href="">{{ $category->category_name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!-- drop down end -->
                    <input class="searchBox" value="@if(isset($search_product)){{ $search_product }}@endif" type="search" name="search" placeholder="Search products, categories..." aria-label="Search" />
                    <button class="SearchBtn" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
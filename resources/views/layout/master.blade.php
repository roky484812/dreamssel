<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta property="og:title" content="Dreamssel Ecommerce">
    <meta property="og:description" content="For your fashion dream">
    <meta property="og:image" content="{{ asset('assets/admin/images/brand/white_single_logo.svg') }}">
    <meta property="og:url" content="https://dreamssel.com/">
    <meta property="og:type" content="Ecommerce">

    @yield('meta')
    <title>Dreamssel | {{ $title }}</title>
    <style>
        *{
            transition: 0.2s;
        }
    </style>
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/brand/white_single_logo.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <!-- font-family -->
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- bootstrap  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <!-- Bootstrap icon -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <!-- custom css -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">

    @yield('custom_css')
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .message-btn{
            right: 40px;
            bottom: 40px;
            z-index: 1000;
            background: #6a983c;
        }
    </style>

</head>

<body>

    {{-- loader --}}
    <div id="global-loader">
        <img src="{{ asset('assets/admin/images/svgs/loader.svg') }}" alt="loader">
    </div>
    <!-- Navigation Drawer -->

    <!-- Toolbar -->
    <div class="drawer">
        <div class="drawer-header">
            <a href="{{ route('home') }}" class="drawer-brand-logo-line">
                <img src="{{ asset('assets/admin/images/brand/lineLogo.svg') }}" alt="Logo">
            </a>
            <a href="{{ route('home') }}" class="drawer-brand-logo-single">
                <img src="{{ asset('assets/admin/images/brand/black_single_logo.svg') }}" alt="Logo">
            </a>
            <button class="btn-close" aria-label="Close"></button>
        </div>
        <div class="drawer-body">
            <div class="shop-access-wrapper nav-shop-access-hidden">
                <a href="{{ route('home.favPage') }}"><i class="fa-regular fa-heart"></i></a>
                <a href="{{ route('home.cart') }}"><i class="fa-solid fa-cart-shopping"></i></a>
                <a href="{{ route('home.accountPage') }}"><i class="fa-regular fa-user"></i></a>
            </div>
            <div class="header-devider"></div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="drawer-nav-link" href="{{ route('home') }}">Home</a></li>
                <li class="nav-item" id="categoryDropDown">
                    <a class="drawer-nav-link" href="#">Category
                        <div class="dropDownIcon" id="dropDownIcon"><i class="fa-solid fa-angle-right angleRight"
                                id="angleRight"></i></div>
                    </a>
                    <!-- category menu -->
                    <ul class="drawerCategoryMenu" id="drawerCategoryMenu">
                        @foreach ($categories as $category)
                            <li class="subCategoryItem"><a href="#"> {{ $category->category_name }}
                                    @if ($subcategories->where('category_id', $category->id)->isNotEmpty())
                                        <div class="dropDownIcon">
                                            <i class="fa-solid fa-angle-right angleRight"></i>
                                        </div>
                                    @endif
                                    <ul class="subCategoryMenu">
                                        @foreach ($subcategories->where('category_id', $category->id) as $subcategory)
                                            <li><a
                                                    href="{{ route('home.subCategoryView', ['category_name' => $category->category_name, 'sub_category_id' => $subcategory->id, 'sub_category_name' => $subcategory->sub_category_name]) }}">{{ $subcategory->sub_category_name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </a></li>
                        @endforeach

                    </ul>
                </li>

                <li class="nav-item">
                    <a class="drawer-nav-link" href="{{ route('home.abouts') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="drawer-nav-link" href="{{ route('home.shopPage') }}">Shop Now</a>
                </li>
                <div class="header-devider"></div>
                @if (!Auth::check())
                    <li class="nav-item">
                        <a class="drawer-nav-link" href="{{ route('home.signInPage') }}">Sign In</a>
                    </li>
                @endif

            </ul>
        </div>
    </div>

    <!-- naviagion-drawer end -->
    <div class="drawer-overlay"></div>

    <header class="">
        @if (isset($_announcement))  
        <div class="status-bar-top">
            <div class="container statusBar">
                <p class="status-offer">
                    <a href="{{route('client.announcement.view', $_announcement->id)}}" class="text-decoration-none text-light">
                        {{ $_announcement->title }}
                    </a>
                </p>
                <a class="shop-now-link" href="{{ route('home.shopPage') }}">ShopNow</a>
            </div>
        </div>
        @endif

        <div class="container">
            <nav class="navigation-bar">
                <div class="menus-brand-logo-wrapper">
                    <div class="toggle-menu">
                        <i class="fas fa-bars"></i>
                    </div>
                    <a href="{{ route('home') }}" class="brand-logo-line">
                        <img src="{{ asset('assets/admin/images/brand/lineLogo.svg') }}" alt="Logo">
                    </a>
                    <a href="{{ route('home') }}" class="brand-logo-single">
                        <img src="{{ asset('assets/admin/images/brand/black_single_logo.svg') }}" alt="Logo">
                    </a>

                    <div class="menus">
                        <a href="{{ route('home') }}">Home</a>
                        <a href="{{ route('home.abouts') }}">About</a>
                        <a href="{{ route('client.announcement.list') }}">Announcement</a>
                        @if (!Auth::check())
                            <a class="" href="{{ route('home.signUpPage') }}">Sign Up</a>
                        @endif

                    </div>
                </div>

                <div class="controller">
                    <form class="topSearchForm" action="{{ route('home.searchView') }}" method="GET">
                        <div class="search-box-icon-wrapper">
                            <input class="search-input-field" type="text" name="query"
                                placeholder="Search products..." />
                            <span><button class=" border-0" type="submit"><i
                                        class="fa-solid fa-magnifying-glass"></i></button></span>
                        </div>
                    </form>
                    <div class="shop-access-wrapper shop-access-hidden">
                        <a href="{{ route('home.favPage') }}"><i class="fa-regular fa-heart"></i></a>
                        <a href="{{ route('home.cart') }}">
                            <i class="fa-solid fa-cart-shopping"></i>
                        </a>
                        
                        <a href="@if(auth()->user()) 
                                    @if( auth()->user()->role == 1 || auth()->user()->role == 2)
                                        {{ route('admin.dashboard') }} 
                                    @else
                                        {{ route('home.accountPage') }} 
                                    @endif
                                @else
                                    {{ route('home.accountPage') }} 
                                @endif">
                                    <i class="fa-regular fa-user"></i></a>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <div class="header-devider"></div>

    <!-- toolbar end -->

    <!-- top carousel and category start here -->

    @yield('content')

    <!-- Footer -->
    <footer class="footer" id="foot">
        <div class="container">
            <div class="footer-row-wrapper">
                <div class="row">
                    <div class="col">
                        <h6>IT Partner</h6>
                        <div class="footer-logo">
                            <div class="footer-brand-logo-single">
                                <a href="https://pirhotech.com/"><img class="bg-transparent" src="{{ asset('assets/client/images/whitelogoPiRhoTech.svg') }}" alt="Logo"></a>
                            </div>
                        </div>
                        
                    </div>
                    <div class="col">
                        <h6>Support</h6>
                        <p>
                            Gangni Bazer, Meherpur, <br />
                            Gangni 7110, Bangladesh.
                        </p>
                        <p>Email: support@dreamssel.com<br />Phone: +8801408-518196</p>
                    </div>

                    <div class="col">
                        <h6>Account</h6>
                        <ul class="list-unstyled">
                            <li><a href="{{ route('home.accountPage') }}">My Account</a></li>
                            <li><a href="{{ route('home.signInPage') }}">Login / Register</a></li>
                            <li><a href="{{ route('home.cart') }}">Cart</a></li>
                            <li><a href="{{ route('home.shopPage') }}">Shop</a></li>
                        </ul>
                    </div>
                    <div class="col">
                        <h6>Quick Link</h6>
                        <ul class="list-unstyled">
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms Of Use</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>

                    <div class="col">
                        <h6>Follow Us</h6>
                        <ul class="list-unstyled">
                            <li>
                                <a href="https://www.facebook.com/profile.php?id=100083962342934" target="_blank"><i class="fa-brands fa-square-facebook social-icon"></i>Facebook</a>
                            </li>
                            <li>
                                <a href="https://www.instagram.com/dreamssel_group/" target="_blank"><i class="fa-brands fa-instagram social-icon"></i>Instagram</a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/@DreamsselGroup" target="_blank"><i class="fa-brands fa-youtube social-icon"></i>Youtube</a>
                            </li>
                            <li>
                                <a href="https://www.tiktok.com/@dreamssel" target="_blank"><i class="fa-brands fa-tiktok social-icon"></i>Tiktok</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright-text">
                <p>
                    Copyright &copy 2023 <a href="https://dreamssel.com/" class="text-success text-decoration-none">Dreamssel</a>. Developed with <span
                      class="fa fa-heart text-danger"></span> by <a class="text-success text-decoration-none" href="https://www.pirhotech.com"> PiRhoTech
                    </a> All rights reserved.
                  </p>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <a href="https://wa.me/+8801408518196" target="_blank" class="message-btn position-fixed btn btn-success">
        <i class="fa-brands fa-whatsapp" style="font-size: 30px;"></i>
    </a>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/client/js/viewProduct.js') }}"></script>
    {{-- <script src="{{ asset('assets/client/js/cart.js') }}"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            @if (session()->has('success'))
                toastr.success("{{ session()->get('success') }}");
            @endif
            @if (session()->has('error'))
                toastr.error("{{ session()->get('error') }}");
            @endif
        });
    </script>

    @yield('scripts')
</body>

</html>

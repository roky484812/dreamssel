<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('meta')
    <title>Bd Inclusive | {{ $title }}</title>
    <link rel="shortcut icon" href="{{ asset('assets/admin/images/brand/fav-icon.jpg') }}" type="image/x-icon">
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
    <link rel="stylesheet" href="{{ asset('assets/client/css/viewProduct.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/test.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/card.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/toolbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/bottomFetureProducts.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/account.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/signup.css') }}">

    @stack('styles')
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{ asset('assets/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


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
            <a href="{{ route('client.index') }}" class="drawer-brand-logo-line">
                <img src="{{ asset('assets/client/images/line-logo.svg') }}" alt="Logo">
            </a>
            <a href="{{ route('client.index') }}" class="drawer-brand-logo-single">
                <img src="{{ asset('assets/client/images/single-logo.svg') }}" alt="Logo">
            </a>
            <button class="btn-close" aria-label="Close"></button>
        </div>
        <div class="drawer-body">
            <div class="shop-access-wrapper nav-shop-access-hidden">
                @if (Auth::check() && Auth::user()->role == 3)
                <a href="{{ route('dist.edit_profile') }}"><i class="fa-regular fa-user"></i></a>
                @else
                <a href="{{ route('login') }}"><i class="fa-regular fa-user"></i></a>
                @endif
            </div>
            <div class="header-devider"></div>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="drawer-nav-link" href="{{ route('client.index') }}">Home</a></li>
                <li class="nav-item" id="categoryDropDown">
                    <a class="drawer-nav-link" href="#">Category
                        <div class="dropDownIcon" id="dropDownIcon"><i class="fa-solid fa-angle-right angleRight"
                                id="angleRight"></i></div>
                    </a>
                    <!-- category menu -->
                    <ul class="drawerCategoryMenu" id="drawerCategoryMenu">
                        @foreach ($_categories as $category)
                            <li class="subCategoryItem"><a href="#"> {{ $category->category_name }}
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
                                </a></li>
                        @endforeach

                    </ul>
                </li>

                <li class="nav-item">
                    <a class="drawer-nav-link" href="#">About</a>
                </li>
                <li class="nav-item">
                    <a class="drawer-nav-link" href="{{ route('client.shopping_products') }}">Shop Now</a>
                </li>
                <li class="nav-item">
                    <a class="drawer-nav-link" href="{{ route('client.announcement.list') }}">Annoucements</a>
                </li>
                <div class="header-devider"></div>
                <li class="nav-item">
                    <a class="drawer-nav-link" href="{{ route('login') }}">Login</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- naviagion-drawer end -->
    <div class="drawer-overlay"></div>

    <header class="">
        <div class="status-bar-top">
            <div class="container statusBar">
                <p class="status-offer">
                    Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!
                </p>
                <a class="shop-now-link" href="{{ route('client.shopping_products') }}">ShopNow</a>
            </div>
        </div>

        <div class="container">
            <nav class="navigation-bar">
                <div class="menus-brand-logo-wrapper">
                    <div class="toggle-menu">
                        <i class="fas fa-bars"></i>
                    </div>
                    <a href="{{ route('client.index') }}" class="brand-logo-line">
                        <img src="{{ asset('assets/client/images/line-logo.svg') }}" alt="Logo">
                    </a>
                    <a href="{{ route('client.index') }}" class="brand-logo-single">
                        <img src="{{ asset('assets/client/images/single-logo.svg') }}" alt="Logo">
                    </a>

                    <div class="menus">
                        <a href="{{ route('client.index') }}">Home</a>
                        <a href="{{ route('client.shopping_products') }}">Shop now</a>
                        <a href="#">About</a>
                        <a href="{{ route('client.announcement.list') }}">Announcements</a>
                        @if (!Auth::check())
                            <a class="" href="{{ route('login') }}">Login</a>
                        @else
                            <a class="" href="{{ route('dist.logout') }}">Log Out</a>
                        @endif

                    </div>
                </div>

                <div class="controller">
                    <form action="{{ route('client.product.search_page') }}" method="GET">
                        <div class="search-box-icon-wrapper">
                            <input class="search-input-field" type="text" name="search"
                                placeholder="Search products..." />
                            <span ><button class=" border-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button></span>
                        </div>
                    </form>
                    <div class="shop-access-wrapper shop-access-hidden">
                        @if (Auth::check() && Auth::user()->role == 3)
                        <a href="{{ route('dist.edit_profile') }}"><i class="fa-regular fa-user"></i></a>
                        @else
                        <a href="{{ route('login') }}"><i class="fa-regular fa-user"></i></a>
                        @endif
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
                        <div class="footer-logo">
                            <div class="footer-brand-logo-single">
                                <img src="{{ asset('assets/client/images/single-logo.svg') }}" alt="Logo">
                            </div>
                        </div>
                        <div class="subscribe">
                            <a href="">Subscribe</a>
                            <p>Get 10% off your first order</p>
                            <div class="email-wrapper">
                                <input class="email-field" type="email" placeholder="example@gmail.com" />
                                <span><i class="fa-regular fa-paper-plane"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <h6>Support</h6>
                        <p>
                            111 Bijoy sarani, Dhaka, <br />
                            DH 1515, Bangladesh.
                        </p>
                        <p>Email: info@example.com<br />Phone: 123-456-7890</p>
                    </div>

                    <div class="col">
                        <h6>Account</h6>
                        <ul class="list-unstyled">
                            @if (auth()->user())
                            <li><a href="{{ route('login') }}">My Account</a></li>
                            @else
                            <li><a href="{{ route('login') }}">My Account</a></li>
                            @endif
                            <li><a href="{{ route('login') }}">Login / Register</a></li>
                            <li><a href="{{ route('client.shopping_products') }}">Shop</a></li>
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
                                <a href="#"><i class="fa-brands fa-square-facebook social-icon"></i>Facebook</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-instagram social-icon"></i>Instagram</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-twitter social-icon"></i>Twitter</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa-brands fa-linkedin social-icon"></i>LinkedIn</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="copyright-text">
                <p>&copy; Copyright Ecommerce 2024 All right reserved</p>
            </div>
        </div>
    </footer>
    <!-- footer end -->



    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/index.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js"></script>
    <!-- Custom JavaScript -->
    <script src="{{ asset('assets/client/js/viewProduct.js') }}"></script>
    <script src="{{ asset('assets/client/js/cart.js') }}"></script>
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

    @stack('scripts')
</body>

</html>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="pirhotech - Bootstrap Webapp Responsive Dashboard Simple Admin Panel Premium HTML5 Template"
        name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords"
        content="admin, admin template, dashboard, admin dashboard, bootstrap 5, responsive, clean, ui, admin panel, ui kit, responsive admin, application, bootstrap 4, flat, bootstrap5, admin dashboard template" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Title -->
    <title>Dreamssel | {{ $title }}</title>

    <!--Favicon -->
    <link rel="icon" href="{{ asset('assets/admin/images/brand/favicon.ico') }}" type="image/x-icon" />

    <!-- selection jquery -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">


    <!-- Bootstrap css -->
    <link id="style" href="{{ asset('assets/admin/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- Style css -->
    <link href="{{ asset('assets/admin/css/style.css') }}" rel="stylesheet" />

    <!-- Plugin css -->
    <link href="{{ asset('assets/admin/css/plugin.css') }}" rel="stylesheet" />

    <!-- Animate css -->
    <link href="{{ asset('assets/admin/css/animated.css') }}" rel="stylesheet" />

    <!---Icons css-->
    <link href="{{ asset('assets/admin/plugins/web-fonts/icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/admin/plugins/web-fonts/font-awesome/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/admin/plugins/web-fonts/plugin.css') }}" rel="stylesheet" />
    @yield('custom_css')
</head>

<body class="main-body app sidebar-mini light-mode ltr">

    <!---Global-loader-->

    <div id="global-loader">
        <img src="{{ asset('assets/admin/images/svgs/loader.svg') }}" alt="loader">
    </div>

    <div class="page">
        <div class="page-main">

            <!--app header-->
            <div class="app-header header top-header">
                <div class="container-fluid main-container">
                    <div class="d-flex">
                        <div class="dropdown side-nav">
                            <div class="app-sidebar__toggle" data-bs-toggle="sidebar">
                                <a class="open-toggle" href="javascript:void(0)">
                                    <svg class="header-icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <line x1="3" y1="12" x2="21" y2="12"></line>
                                        <line x1="3" y1="6" x2="21" y2="6"></line>
                                        <line x1="3" y1="18" x2="21" y2="18"></line>
                                    </svg>
                                </a>
                                <a class="close-toggle" href="javascript:void(0)">
                                    <svg class="header-icon" xmlns="http://www.w3.org/2000/svg" height="24"
                                        viewBox="0 0 24 24" width="24">
                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                        <path
                                            d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <a class="header-brand" href="{{ route('admin.dashboard') }}">
                            <img src="{{ asset('assets/admin//images/brand/lineLogo.svg') }}"
                                class="header-brand-img desktop-lgo" alt="pirhotech logo">
                            <img src="{{ asset('assets/admin//images/brand/Line_logo_white.svg') }}"
                                class="header-brand-img dark-logo" alt="pirhotech logo">
                            <img src="{{ asset('assets/admin//images/brand/black_single_logo.svg') }}"
                                class="header-brand-img mobile-logo" alt="pirhotech logo">
                            <img src="{{ asset('assets/admin//images/brand/white_single_logo.svg') }}"
                                class="header-brand-img darkmobile-logo" alt="pirhotech logo">
                        </a>

                        <div class="d-flex order-lg-2 ms-lg-auto">
                            <button class="navbar-toggler navresponsive-toggler d-lg-none" type="button"
                                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent-4"
                                aria-controls="navbarSupportedContent-4" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon fe fe-more-vertical "></span>
                            </button>
                            <div class="navbar navbar-expand-lg navbar-nav-right responsive-navbar navbar-dark p-0">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
                                    <div class="d-flex">
                                        <a href="javascript:void(0)" data-bs-toggle="search"
                                            class="nav-link nav-link-lg d-lg-none navsearch">
                                            <svg class="header-icon search-icon" x="1008" y="1248" viewBox="0 0 24 24"
                                                height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                                focusable="false">
                                                <path d="M0 0h24v24H0V0z" fill="none" />
                                                <path
                                                    d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                            </svg>
                                        </a>
                                        <div class="mt-2 me-md-2">
                                            <form class="form-inline">
                                                <div class="search-element">
                                                    <input type="search" class="form-control header-search"
                                                        placeholder="Search…" aria-label="Search" tabindex="1">
                                                    <button class="btn btn-primary-color" type="button">
                                                        <svg class="header-icon search-icon" x="1008" y="1248"
                                                            viewBox="0 0 24 24" height="100%" width="100%"
                                                            preserveAspectRatio="xMidYMid meet" focusable="false">
                                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                                            <path
                                                                d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z" />
                                                        </svg>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <!-- SEARCH -->
                                        <div class="dropdown header-theme">
                                            <a class="nav-link icon layout-setting">
                                                <span class="dark-layout">
                                                    <svg class="header-icon" xmlns="http://www.w3.org/2000/svg"
                                                        enable-background="new 0 0 24 24" height="24px"
                                                        viewBox="0 0 24 24" width="24px" fill="#000000">
                                                        <rect fill="none" height="24" width="24" />
                                                        <circle cx="12" cy="12" opacity=".3" r="3" />
                                                        <path
                                                            d="M12,9c1.65,0,3,1.35,3,3s-1.35,3-3,3s-3-1.35-3-3S10.35,9,12,9 M12,7c-2.76,0-5,2.24-5,5s2.24,5,5,5s5-2.24,5-5 S14.76,7,12,7L12,7z M2,13l2,0c0.55,0,1-0.45,1-1s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S1.45,13,2,13z M20,13l2,0c0.55,0,1-0.45,1-1 s-0.45-1-1-1l-2,0c-0.55,0-1,0.45-1,1S19.45,13,20,13z M11,2v2c0,0.55,0.45,1,1,1s1-0.45,1-1V2c0-0.55-0.45-1-1-1S11,1.45,11,2z M11,20v2c0,0.55,0.45,1,1,1s1-0.45,1-1v-2c0-0.55-0.45-1-1-1C11.45,19,11,19.45,11,20z M5.99,4.58c-0.39-0.39-1.03-0.39-1.41,0 c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0s0.39-1.03,0-1.41L5.99,4.58z M18.36,16.95 c-0.39-0.39-1.03-0.39-1.41,0c-0.39,0.39-0.39,1.03,0,1.41l1.06,1.06c0.39,0.39,1.03,0.39,1.41,0c0.39-0.39,0.39-1.03,0-1.41 L18.36,16.95z M19.42,5.99c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06c-0.39,0.39-0.39,1.03,0,1.41 s1.03,0.39,1.41,0L19.42,5.99z M7.05,18.36c0.39-0.39,0.39-1.03,0-1.41c-0.39-0.39-1.03-0.39-1.41,0l-1.06,1.06 c-0.39,0.39-0.39,1.03,0,1.41s1.03,0.39,1.41,0L7.05,18.36z" />
                                                    </svg>
                                                </span>
                                                <span class="light-layout">
                                                    <svg class="header-icon" xmlns="http://www.w3.org/2000/svg"
                                                        enable-background="new 0 0 24 24" height="24px"
                                                        viewBox="0 0 24 24" width="24px" fill="#000000">
                                                        <rect fill="none" height="24" width="24" />
                                                        <path
                                                            d="M9.37,5.51C9.19,6.15,9.1,6.82,9.1,7.5c0,4.08,3.32,7.4,7.4,7.4c0.68,0,1.35-0.09,1.99-0.27 C17.45,17.19,14.93,19,12,19c-3.86,0-7-3.14-7-7C5,9.07,6.81,6.55,9.37,5.51z"
                                                            opacity=".3" />
                                                        <path
                                                            d="M9.37,5.51C9.19,6.15,9.1,6.82,9.1,7.5c0,4.08,3.32,7.4,7.4,7.4c0.68,0,1.35-0.09,1.99-0.27C17.45,17.19,14.93,19,12,19 c-3.86,0-7-3.14-7-7C5,9.07,6.81,6.55,9.37,5.51z M12,3c-4.97,0-9,4.03-9,9s4.03,9,9,9s9-4.03,9-9c0-0.46-0.04-0.92-0.1-1.36 c-0.98,1.37-2.58,2.26-4.4,2.26c-2.98,0-5.4-2.42-5.4-5.4c0-1.81,0.89-3.42,2.26-4.4C12.92,3.04,12.46,3,12,3L12,3z" />
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>
                                        <div class="dropdown header-fullscreen">
                                            <a class="nav-link icon full-screen-link" id="fullscreen-button">
                                                <svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24"
                                                    height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                                    focusable="false">
                                                    <path
                                                        d="M7,14 L5,14 L5,19 L10,19 L10,17 L7,17 L7,14 Z M5,10 L7,10 L7,7 L10,7 L10,5 L5,5 L5,10 Z M17,17 L14,17 L14,19 L19,19 L19,14 L17,14 L17,17 Z M14,5 L14,7 L17,7 L17,10 L19,10 L19,5 L14,5 Z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                        <div class="dropdown header-notify">
                                            <a class="nav-link icon" data-bs-toggle="dropdown">
                                                <svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24"
                                                    height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                                    focusable="false">
                                                    <path opacity=".3"
                                                        d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z">
                                                    </path>
                                                    <path
                                                        d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-11c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2v-5zm-2 6H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 013.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 013.54 6.42z">
                                                    </path>
                                                </svg>
                                                <span class="pulse "></span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow  animated">
                                                <a href="chat.html" class="dropdown-item d-flex pb-3">
                                                    <svg class="header-icon me-4" x="1008" y="1248"
                                                        viewBox="0 0 24 24" height="100%" width="100%"
                                                        preserveAspectRatio="xMidYMid meet" focusable="false">
                                                        <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                                                        <path
                                                            d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                                                    </svg>
                                                    <div>
                                                        <div class="font-weight-bold">Message Sent.</div>
                                                        <div class="small text-muted">3 hours ago</div>
                                                    </div>
                                                </a>



                                                <div class=" text-center p-2 border-top">
                                                    <a href="chat.html" class="">View All Notifications</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dropdown profile-dropdown">
                                            <a href="javascript:void(0)" class="nav-link icon leading-none"
                                                data-bs-toggle="dropdown">
                                                <span>
                                                    <img src="{{ asset($user->profile_picture) }}" alt="img"
                                                        class="avatar avatar-md brround">
                                                </span>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow animated">
                                                <div class="text-center">
                                                    <a href="javascript:void(0)"
                                                        class="dropdown-item text-center user pb-0 font-weight-bold">{{ $user->name }}</a>
                                                    <span
                                                        class="text-center user-semi-title text-capitalize">{{ $user->role_name }}</span>
                                                    <div class="dropdown-divider"></div>
                                                </div>
                                                <a class="dropdown-item d-flex" href="{{ route('admin.profile') }}">
                                                    <svg class="header-icon me-3" x="1008" y="1248"
                                                        viewBox="0 0 24 24" height="100%" width="100%"
                                                        preserveAspectRatio="xMidYMid meet" focusable="false">
                                                        <path d="M0 0h24v24H0V0z" fill="none" />
                                                        <path d="M12 16c-2.69 0-5.77 1.28-6 2h12c-.2-.71-3.3-2-6-2z"
                                                            opacity=".3" />
                                                        <circle cx="12" cy="8" opacity=".3" r="2" />
                                                        <path
                                                            d="M12 14c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4zm-6 4c.22-.72 3.31-2 6-2 2.7 0 5.8 1.29 6 2H6zm6-6c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0-6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2z" />
                                                    </svg>
                                                    <div class="mt-1">Profile</div>
                                                </a>

                                                <a class="dropdown-item d-flex" href="chat.html">
                                                    <svg class="header-icon me-3" x="1008" y="1248"
                                                        viewBox="0 0 24 24" height="100%" width="100%"
                                                        preserveAspectRatio="xMidYMid meet" focusable="false">
                                                        <path d="M15 11V4H4v8.17l.59-.58.58-.59H6z" opacity=".3" />
                                                        <path
                                                            d="M21 6h-2v9H6v2c0 .55.45 1 1 1h11l4 4V7c0-.55-.45-1-1-1zm-5 7c.55 0 1-.45 1-1V3c0-.55-.45-1-1-1H3c-.55 0-1 .45-1 1v14l4-4h10zM4.59 11.59l-.59.58V4h11v7H5.17l-.58.59z" />
                                                    </svg>
                                                    <div class="mt-1">Messages</div>
                                                </a>
                                                <a class="dropdown-item d-flex" href="{{ route('admin.logout') }}">
                                                    <svg class="header-icon me-3" x="1008" y="1248"
                                                        viewBox="0 0 24 24" height="100%" width="100%"
                                                        preserveAspectRatio="xMidYMid meet" focusable="false">
                                                        <path d="M0 0h24v24H0V0zm0 0h24v24H0V0z" fill="none" />
                                                        <path d="M6 20h12V10H6v10zm2-6h3v-3h2v3h3v2h-3v3h-2v-3H8v-2z"
                                                            opacity=".3" />
                                                        <path
                                                            d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zM8.9 6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2H8.9V6zM18 20H6V10h12v10zm-7-1h2v-3h3v-2h-3v-3h-2v3H8v2h3z" />
                                                    </svg>
                                                    <div class="mt-1">Sign Out</div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/app header-->

            <!-- main-sidebar -->
            <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
            <div class="sticky">
                <aside class="app-sidebar sidebar-scroll">
                    <div class="main-sidebar-header active">
                        <a class="desktop-logo logo-light active" href="{{ route('admin.dashboard') }}"><img
                                src="{{ asset('assets/admin//images/brand/lineLogo.svg') }}" class="main-logo"
                                alt="logo"></a>
                        <a class="desktop-logo logo-dark active" href="{{ route('admin.dashboard') }}"><img
                                src="{{ asset('assets/admin//images/brand/Line_logo_white.svg') }}" class="main-logo"
                                alt="logo"></a>
                        <a class="logo-icon mobile-logo icon-light active" href="{{ route('admin.dashboard') }}"><img
                                src="{{ asset('assets/admin//images/brand/black_single_logo.svg') }}"
                                alt="logo"></a>
                        <a class="logo-icon mobile-logo icon-dark active" href="{{ route('admin.dashboard') }}"><img
                                src="{{ asset('assets/admin//images/brand/white_single_logo.svg') }}"
                                alt="logo"></a>
                    </div>
                    <div class="main-sidemenu">
                        <div class="app-sidebar__user">
                            <div class="dropdown user-pro-body text-center">
                                <div class="user-pic">
                                    <img alt="user-img" class="avatar avatar-xl brround mb-1"
                                        src="{{ asset($user->profile_picture) }}">
                                </div>
                                <div class="user-info text-center">
                                    <h5 class=" mb-1 font-weight-bold">{{ $user->name }}</h5>
                                    <span
                                        class="text-muted app-sidebar__user-name text-sm text-capitalize">{{ $user->role_name }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">
                            <li class="slide">
                                <a href="{{ route('admin.dashboard') }}" class="side-menu__item @if ($active == 'dashboard') active @endif" data-bs-toggle="slide">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                        <polyline points="9 22 9 12 15 12 15 22"></polyline>
                                    </svg>
                                    <span class="side-menu__label">Dashboard</span>
                                </a>
                            </li>
                            @if(auth()->user()->role == 1)
                            <li class="slide">
                                <a class="side-menu__item @if ($active == 'user') active @endif"
                                    data-bs-toggle="slide" href="{{ route('admin.userlist') }}">
                                    <svg class="side-menu__icon" xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                        <polyline points="2 17 12 22 22 17"></polyline>
                                        <polyline points="2 12 12 17 22 12"></polyline>
                                    </svg>
                                    <span class="side-menu__label">User Management</span></a>

                            </li>
                            @endif

                            <li class="slide">
                                <a class="side-menu__item @if (
                                    $active == 'product' ||
                                        $active == 'product_add' ||
                                        $active == 'product_category' ||
                                        $active == 'product_subcategory' ||
                                        $active == 'product_update') active @endif"
                                    data-bs-toggle="slide" href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    <span class="side-menu__label">Product Management</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu" style="display: none;">
                                    <li class="side-menu-label1">
                                        <a href="javascript:void(0)">Product</a>
                                    </li>
                                    <li>
                                        <a class="slide-item @if ($active == 'product') active @endif"
                                            href="{{ route('admin.productManagement') }}">
                                            <span>Search Product</span></a>
                                    </li>
                                    <li>
                                        <a class="slide-item @if ($active == 'product_add') active @endif"
                                            href="{{ route('admin.product.addView') }}">
                                            <span>Add product</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="slide-item @if ($active == 'product_category') active @endif"
                                            href="{{ route('admin.product.categoryView') }}">
                                            <span>Category</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="slide-item @if ($active == 'product_subcategory') active @endif"
                                            href="{{ route('admin.product.subcategoryView') }}">
                                            <span>Sub-Category</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="slide">
                                <a class="side-menu__item @if ($active == 'carousal') active @endif"
                                    data-bs-toggle="slide" href="javascript:void(0)">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                                    </svg>
                                    <span class="side-menu__label">Resources</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu" style="display: none;">
                                    <li>
                                        <a class="slide-item @if ($active == 'carousal') active @endif"
                                            href="{{ route('admin.resource.carousal') }}">
                                            <span>Carousal Images</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>

                            <li class="slide">
                                <a class="side-menu__item @if ($active == 'announcement') active @endif"
                                    data-bs-toggle="slide" href="{{ route('admin.announcement.list') }}">

                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="side-menu__icon">
                                        <path
                                            d="M4 13.9999L5.57465 20.2985C5.61893 20.4756 5.64107 20.5642 5.66727 20.6415C5.92317 21.397 6.60352 21.9282 7.39852 21.9933C7.4799 21.9999 7.5712 21.9999 7.75379 21.9999C7.98244 21.9999 8.09677 21.9999 8.19308 21.9906C9.145 21.8982 9.89834 21.1449 9.99066 20.193C10 20.0967 10 19.9823 10 19.7537V5.49991M18.5 13.4999C20.433 13.4999 22 11.9329 22 9.99991C22 8.06691 20.433 6.49991 18.5 6.49991M10.25 5.49991H6.5C4.01472 5.49991 2 7.51463 2 9.99991C2 12.4852 4.01472 14.4999 6.5 14.4999H10.25C12.0164 14.4999 14.1772 15.4468 15.8443 16.3556C16.8168 16.8857 17.3031 17.1508 17.6216 17.1118C17.9169 17.0756 18.1402 16.943 18.3133 16.701C18.5 16.4401 18.5 15.9179 18.5 14.8736V5.1262C18.5 4.08191 18.5 3.55976 18.3133 3.2988C18.1402 3.05681 17.9169 2.92421 17.6216 2.88804C17.3031 2.84903 16.8168 3.11411 15.8443 3.64427C14.1772 4.55302 12.0164 5.49991 10.25 5.49991Z" />
                                    </svg>
                                    <span class="side-menu__label">Announcement</span>
                                </a>
                            </li>

                        </ul>

                        <div class="app-sidebar-help">
                            <div class="dropdown text-center">
                                <div class="help d-flex">
                                    <a href="javascript:void(0)" class="nav-link p-0 help-dropdown"
                                        data-bs-toggle="dropdown">
                                        <span class="font-weight-bold">Help Info</span>
                                        <i class="fa fa-angle-down ms-2"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow p-4">
                                        <div class="sidebar-dropdown-divider pb-3">
                                            <h4 class="font-weight-bold">Help</h4>
                                            <a class="d-block" href="javascript:void(0)">Contact at PiRhoTech</a>
                                            <a class="d-block" href="javascript:void(0)"
                                                mailto="customersupport@pirhotech.com">customersupport@pirhotech.com</a>
                                            <a class="d-block" href="javascript:void(0)">+8801516503109</a>
                                        </div>

                                        <a href="{{ route('admin.logout') }}">Logout</a>
                                    </div>
                                    <div class="ms-auto">
                                        <a class="nav-link icon p-0" href="javascript:void(0)">
                                            <svg class="header-icon" x="1008" y="1248" viewBox="0 0 24 24"
                                                height="100%" width="100%" preserveAspectRatio="xMidYMid meet"
                                                focusable="false">
                                                <path opacity=".3"
                                                    d="M12 6.5c-2.49 0-4 2.02-4 4.5v6h8v-6c0-2.48-1.51-4.5-4-4.5z">
                                                </path>
                                                <path
                                                    d="M12 22c1.1 0 2-.9 2-2h-4c0 1.1.9 2 2 2zm6-11c0-3.07-1.63-5.64-4.5-6.32V4c0-.83-.67-1.5-1.5-1.5s-1.5.67-1.5 1.5v.68C7.64 5.36 6 7.92 6 11v5l-2 2v1h16v-1l-2-2v-5zm-2 6H8v-6c0-2.48 1.51-4.5 4-4.5s4 2.02 4 4.5v6zM7.58 4.08L6.15 2.65C3.75 4.48 2.17 7.3 2.03 10.5h2a8.445 8.445 0 013.55-6.42zm12.39 6.42h2c-.15-3.2-1.73-6.02-4.12-7.85l-1.42 1.43a8.495 8.495 0 013.54 6.42z">
                                                </path>
                                            </svg>
                                            <span class="pulse "></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </aside>
            </div>
            <!-- main-sidebar -->



            @yield('content')



            <!-- end app-content-->
        </div>

        <!--Footer-->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                        Copyright © 2023 <a href="javascript:void(0);" class="text-primary">Dreamssel</a>. Designed
                        with
                        <span class="fa fa-heart text-danger"></span> by <a href="https://www.pirhotech.com">
                            PiRhoTech
                        </a>
                        All
                        rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer-->

    </div>

    <!-- Back to top -->
    <a href="#top" id="back-to-top">
        <svg xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24"
            class="back-to-top-icon">
            <path d="M0 0h24v24H0V0z" fill="none" />
            <path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z" />
        </svg>
    </a>

    <!-- Jquery js-->
    <script src="{{ asset('assets/admin/js/vendors/jquery.min.js') }}"></script>

    <!-- Bootstrap5 js-->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

    <!--Othercharts js-->
    <script src="{{ asset('assets/admin/plugins/othercharts/jquery.sparkline.min.js') }}"></script>

    <!-- Jquery-rating js-->
    <script src="{{ asset('assets/admin/plugins/rating/jquery.rating-stars.js') }}"></script>

    <!-- Circle-progress js-->
    <script src="{{ asset('assets/admin/js/vendors/circle-progress.min.js') }}"></script>

    <!-- P-scroll js-->
    <script src="{{ asset('assets/admin/plugins/p-scrollbar/p-scrollbar.js') }}"></script>

    <!--Sidemenu js-->
    <script src="{{ asset('assets/admin/plugins/sidemenu/sidemenu.js') }}"></script>

    <!-- Sticky js -->
    <script src="{{ asset('assets/admin/js/sticky.js') }}"></script>

    <!--Moment js-->
    <script src="{{ asset('assets/admin/plugins/moment/moment.js') }}"></script>

    <!-- Daterangepicker js-->
    <script src="{{ asset('assets/admin/plugins/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/js/daterange.js') }}"></script>

    <!-- ECharts js-->
    <script src="{{ asset('assets/admin/plugins/echarts/echarts.js') }}"></script>

    <!--Chart js -->
    <script src="{{ asset('assets/admin/plugins/chart/chart.min.js') }}"></script>

    <!-- Index js-->
    <script src="{{ asset('assets/admin/js/index4.js') }}"></script>

    <!-- Color Theme js -->
    <script src="{{ asset('assets/admin/js/themeColors.js') }}"></script>

    <!-- Switcher-Styles js -->
    <script src="{{ asset('assets/admin/js/switcher-styles.js') }}"></script>

    <!-- Custom js-->
    <script src="{{ asset('assets/admin/js/custom.js') }}"></script>

    <!--Select2 js -->
    <script src="{{ asset('assets/admin/plugins/select2/select2.full.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/select2.js') }}"></script>

    <!-- Timepicker js -->
    <script src="{{ asset('assets/admin/plugins/time-picker/jquery.timepicker.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/time-picker/toggles.min.js') }}"></script>

    <!-- Datepicker js -->
    <script src="{{ asset('assets/admin/plugins/date-picker/date-picker.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/date-picker/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/input-mask/jquery.maskedinput.js') }}"></script>

    <!-- File uploads js -->
    <script src="{{ asset('assets/admin/plugins/fileupload/js/dropify.js') }}"></script>
    <script src="{{ asset('assets/admin/js/filupload.js') }}"></script>

    <!-- Multiple select js -->
    <script src="{{ asset('assets/admin/plugins/multipleselect/multiple-select.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/multipleselect/multi-select.js') }}"></script>

    <!--Sumoselect js-->
    <script src="{{ asset('assets/admin/plugins/sumoselect/jquery.sumoselect.js') }}"></script>

    <!--jquery transfer js-->
    <script src="{{ asset('assets/admin/plugins/jQuerytransfer/jquery.transfer.js') }}"></script>

    <!--multi js-->
    <script src="{{ asset('assets/admin/plugins/multi/multi.min.js') }}"></script>

    <!-- Form Advanced Element -->
    <script src="{{ asset('assets/admin/js/formelementadvnced.js') }}"></script>
    <script src="{{ asset('assets/admin/js/form-elements.js') }}"></script>
    <script src="{{ asset('assets/admin/js/file-upload.js') }}"></script>

    <!-- WYSIWYG Editor js -->
    <script src="{{ asset('assets/admin/plugins/wysiwyag/jquery.richtext.js') }}"></script>
    <script src="{{ asset('assets/admin/js/form-editor.js') }}"></script>

    <!-- quill js -->
    <script src="{{ asset('assets/admin/plugins/quill/quill.min.js') }}"></script>
    <script src="{{ asset('assets/admin/js/form-editor2.js') }}"></script>

    <!-- poup add and cancel -->
    <script src="{{ asset('assets/admin/popup.js') }}"></script>


    @yield('custom_js')
</body>

</html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $title ? $title : 'Dreamssel Collections' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/navbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/featureProducts.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/cardStyle.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/customerSays.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/productView.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/populerProduct.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/bottomFeatureProduct.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/footer.css') }}" />
    <!-- <link rel="stylesheet" href="assets/client/css/searchFilter.css" /> -->
    <!--   tailwind css  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('assets/client/plugins/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/plugins/owl-carousel/owl.theme.default.min.css') }}" />
    @stack('styles')
</head>
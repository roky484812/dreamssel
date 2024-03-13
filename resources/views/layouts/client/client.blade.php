<!DOCTYPE html>
<html lang="en">
    @include('layouts.client.part.head')
    <body>
        @include('layouts.client.part.nav')
        @yield('content')
        <!-- footer start -->
        @include('layouts.client.part.footer')
        @include('layouts.client.part.scripts')
    </body>
</html>
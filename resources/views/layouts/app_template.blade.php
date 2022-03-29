<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Geodezist')</title>

    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/owl.theme.default.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">

</head>
<body>
        @include('layouts.header')

        <br>
        <br>
        <br>

        @yield('content')

        @include('layouts.footer')

        <!-- Go To Top Link -->
        <a href="#" class="back-to-top">
          <i class="lni-arrow-up"></i>
        </a>

        <!-- Preloader -->
        <div id="preloader">
          <div class="loader" id="loader-1"></div>
        </div>
        <!-- End Preloader -->

    <script src="{{ asset('/assets/js/jquery-min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/assets/js/color-switcher.js') }}"></script>
    <script src="{{ asset('/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.slicknav.js') }}"></script>
    <script src="{{ asset('/assets/js/wow.js') }}"></script>
    <script src="{{ asset('/assets/js/jquery.counterup.min.js') }}"></script>
    <script src="{{ asset('/assets/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('/assets/js/form-validator.min.js') }}"></script>
    <script src="{{ asset('/assets/js/contact-form-script.js') }}"></script>
    <script src="{{ asset('/assets/js/main.js') }}"></script>

    <script src="{{ asset('js/jquery.inputmask.bundle.js') }}" defer></script>
    <script src="{{ asset('js/form.js') }}" defer></script>
    <script src="{{ asset('js/dinamic-form.js') }}" defer></script>
</body>
</html>

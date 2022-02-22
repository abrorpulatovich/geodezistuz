<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/line-icons.css">
    <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/css/owl.theme.default.css">
    <link rel="stylesheet" href="/assets/css/slicknav.min.css">
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/main.css">    
    <link rel="stylesheet" href="/assets/css/responsive.css">
    
</head>
<body>
        @include('layouts.header')
    
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

    <script src="/assets/js/jquery-min.js"></script>
    <script src="/assets/js/popper.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/color-switcher.js"></script>
    <script src="/assets/js/owl.carousel.min.js"></script>     
    <script src="/assets/js/jquery.slicknav.js"></script>     
    <script src="/assets/js/wow.js"></script>   
    <script src="/assets/js/jquery.counterup.min.js"></script>      
    <script src="/assets/js/waypoints.min.js"></script>     
    <script src="/assets/js/form-validator.min.js"></script>
    <script src="/assets/js/contact-form-script.js"></script>   
    <script src="/assets/js/main.js"></script>
    
    <script src="{{ asset('js/jquery.inputmask.bundle.js') }}" defer></script>
    <script src="{{ asset('js/form.js') }}" defer></script>
    <script src="{{ asset('js/dinamic-form.js') }}" defer></script>
</body>
</html>

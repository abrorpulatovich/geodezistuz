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
{{--    <link rel="stylesheet" href="{{ asset('/assets/css/main.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('/assets/css/responsive.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}" defer></script>
    <script src="{{ asset('js/jquery.inputmask.bundle.js') }}" defer></script>
    <script src="{{ asset('js/form.js') }}" defer></script>
    <script src="{{ asset('js/dinamic-form.js') }}" defer></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Geodezist Admin
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="bi bi-box-arrow-right"></i> {{ __('Tizimdan chiqish') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    @if(Auth::user()->status == 2)
                                        <a class="dropdown-item" href="#"><i class="bi bi-eye"></i> {{ __('Korxona ma‘lumotlari') }}</a>
                                    @elseif(Auth::user()->status == 1)
                                        <a class="dropdown-item" href=""><i class="bi bi-eye"></i> {{ __('Mening ma‘lumotlarim') }}</a>
                                    @endif
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <ul class="list-group">
                            <a href="{{ route('admin.home') }}" class="list-group-item list-group-item-action @if(request()->segment(2) == 'home') active @endif"><i class="lni lni-home"></i> Bosh sahifa</a>
                            <a href="{{ route('post.index') }}" class="list-group-item list-group-item-action @if(request()->segment(2) == 'post') active @endif"><i class="lni lni-list"></i> Yangiliklar</a>
                            <a href="{{ route('admin.messages') }}" class="list-group-item list-group-item-action @if(request()->segment(2) == 'messages') active @endif"><i class="lni lni-envelope"></i> Xabarlar @if($didnt_read_messages_count > 0) <span class="badge badge-danger">{{ $didnt_read_messages_count }}</span> @endif</a>
                            <a href="{{ route('specialist.index') }}" class="list-group-item list-group-item-action @if(request()->segment(2) == 'specialist') active @endif"><i class="lni lni-users"></i> Mutaxassisliklar</a>
                            <a href="{{ route('admin.users') }}" class="list-group-item list-group-item-action @if(request()->segment(2) == 'users') active @endif"><i class="lni lni-user"></i> Foydalanuvchilar</a>
                            <a href="{{ route('admin.acceptable_vacancies') }}" class="list-group-item list-group-item-action @if(request()->segment(2) == 'accept' && (request()->segment(3) == 'vacancies' || request()->segment(3) == 'vacancy')) active @endif"><i class="lni lni-check-mark-circle"></i> Tasdiqlanishi kutilayotgan vakantlar</a>
                            <a href="{{ route('resource_type.index') }}" class="list-group-item list-group-item-action @if(request()->segment(2) == 'resource_type') active @endif"><i class="lni lni-list"></i> Resurslar turlari</a>
                            <a href="{{ route('resource.index') }}" class="list-group-item list-group-item-action @if(request()->segment(2) == 'resource') active @endif"><i class="lni lni-book"></i> Resurslar</a>
                        </ul>
                    </div>
                    <div class="col-md-9">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>
</html>

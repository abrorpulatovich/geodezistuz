<!-- Header Section Start -->
<header id="home" class="hero-area">
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
            <div class="theme-header clearfix">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                    </button>
                    <a href="{{ route('home') }}" class="navbar-brand"><img src="assets/img/logo3.png" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item dropdown @if(request()->segment(1) == null) active @endif">
                            <a class="nav-link dropdown-toggle" href="{{ route('home') }}" aria-haspopup="true" aria-expanded="false">
                                Bosh sahifa
                            </a>
                        </li>
                        @if(sizeof($resource_types) > 0)
                            <li class="nav-item dropdown @if(in_array(request()->segment(1), ['books', 'programs', 'videos'])) active @endif">
                                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Resurslar
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($resource_types as $type)
                                        <li><a class="dropdown-item" href="{{ route('resources', ['slug' => $type->slug]) }}">{{ $type->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                        <li class="nav-item @if(request()->segment(1) == 'rezumes') active @endif">
                            <a class="nav-link dropdown-toggle" href="{{ route('rezumes') }}" aria-haspopup="true" aria-expanded="false">Rezumelar</a>
                        </li>
                        <li class="nav-item @if(request()->segment(1) == 'vacancies') active @endif">
                            <a class="nav-link dropdown-toggle" href="{{ route('vacancies') }}" aria-haspopup="true" aria-expanded="false">Vakantlar</a>
                        </li>
                        <li class="nav-item dropdown @if(request()->segment(1) == 'news') active @endif">
                            <a class="nav-link dropdown-toggle" href="{{ route('news') }}" aria-haspopup="true" aria-expanded="false">
                                Yangiliklar
                            </a>
                        </li>
                        <li class="nav-item @if(request()->segment(1) == 'contact') active @endif">
                            <a class="nav-link" href="{{ route('contact') }}">
                                Biz bilan bog'lanish
                            </a>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item @if(request()->segment(1) == 'login') active @endif">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item @if(request()->segment(1) == 'register') active @endif">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" data-toggle="dropdown">
                                    <i class="lni lni-user"></i> {{ Auth::user()->name }}
                                </a>


                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    @if(in_array(auth()->user()->status, [1, 3]))
                                        <a class="dropdown-item" href="{{ route('user_profile') }}"><i class="lni lni-user"></i> {{ __('Mening profilim') }}</a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('vacancy.index') }}"><i class="lni lni-home"></i> {{ __('Mening profilim') }}</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="lni lni-exit"></i> {{ __('Tizimdan chiqish') }}</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
        <div class="mobile-menu" data-logo="assets/img/logo3.png"></div>
    </nav>
    <!-- Navbar End -->
</header>
<!-- Header Section End -->

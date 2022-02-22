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
          <a href="{{ route('template.index') }}" class="navbar-brand"><img src="assets/img/logo3.png" alt=""></a>
        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
            <li class="nav-item dropdown active">
              <a class="nav-link dropdown-toggle" href="{{ route('template.index') }}" aria-haspopup="true" aria-expanded="false">
                Bosh sahifa
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" aria-haspopup="true" aria-expanded="false">
                Yangiliklar
              </a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Resurslar
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Kitoblar</a></li>
                <li><a class="dropdown-item" href="#">Dasturlar</a></li>
                <li><a class="dropdown-item" href="#">Videolar</a></li>
              </ul>
            </li>
            @if (Route::has('login'))
              @auth
              @if(Auth::user()->status == 3)
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('companies.index') }}" aria-haspopup="true" aria-expanded="false">
                  Foydalanuvchilar
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('companies.index') }}">Korxonalar</a></li>
                  <li><a class="dropdown-item" href="{{ route('citizens.index') }}">Fuqarolar</a></li>
                </ul>
              </li>
              @endif
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('rezumes.index') }}" aria-haspopup="true" aria-expanded="false">
                  Rezume
                </a>
              @if(Auth::user()->status == 1)
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('rezumes.create') }}">Rezume qo‘shish</a></li>
                </ul>
              @endif
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="{{ route('vacancies.index') }}" aria-haspopup="true" aria-expanded="false">
                  Vakansiya
                </a>
              @if(Auth::user()->status == 2)
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="{{ route('vacancies.create') }}">Vakansiya qo‘shish</a></li>
                </ul>
              @endif
              </li>
              @endauth
            @endif
            <li class="nav-item">
              <a class="nav-link" href="#">
                Biz bilan aloqa
              </a>
            </li>
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
                      <a id="navbarDropdown" class="nav-link" href="#" data-toggle="dropdown">
                          <i class="lni lni-user"></i> {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              <i class="lni lni-exit"></i> {{ __('Tizimdan chiqish') }}
                          </a>

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
    <div class="mobile-menu" data-logo="assets/img/logo-mobile.png"></div>
  </nav>
  <!-- Navbar End -->

           
</header>
<!-- Header Section End -->
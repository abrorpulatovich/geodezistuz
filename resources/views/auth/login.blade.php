@extends('layouts.app_template')

@section('content')

<div class="page-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>{{ __('Kirish') }}</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="content" class="section-padding">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-5 col-md-6 col-xs-12">
        <div class="page-login-form box">
          <h3>
            Kirish
          </h3>
            @if(session()->has('username_or_password_incorrect'))
                <div class="alert alert-danger"><i class="lni lni-warning"></i> {{ session()->get('username_or_password_incorrect') }}</div>
            @endif
          <form method="POST" class="login-form" action="{{ route('post_login') }}">
                @csrf
                    <div class="form-group">
                      <div class="input-icon">
                        <i class="lni-user"></i>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username">

                        @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>

                    <div class="form-group">
                      <div class="input-icon">
                        <i class="lni-lock"></i>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                      </div>
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Eslab qol') }}
                            </label>
                    </div>
                        <button type="submit" class="btn btn-success log-btn">
                            {{ __('Kirish') }}
                        </button>

                        <!-- @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif -->
            </form>
            <p class="text-center"><a href="{{ route('register') }}">Ro‘yxatdan o‘tish uchun</a></p>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@extends('layouts.app_template')

@section('content')


<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>{{ __('Ro‘yxatdan o‘tish') }}</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<section id="content" class="section-padding">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9 col-md-12 col-xs-12">
        <div class="page-login-form box post-job">
          
          <h6>Foydalanuvchini tanlang!</h6>

            <input type="radio" name="user_check" class="btn-check" value="role_citizen" id="citizen" checked autocomplete="off" style="display:none;">
            <label for="citizen" class="btn btn-common mt-3">Fuqaro</label>

            <input type="radio" name="user_check" class="btn-check" value="role_company" id="company" autocomplete="off" style="display:none">
            <label for="company" class="btn btn-common mt-3">Korxona</label>

            <h3 class="mt-2" id="nameregister">
                {{ __('Fuqaro ro‘yxatdan o‘tish') }}
            </h3>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data" class="form-ad">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-4 form-group" id="passport_hide">
                        <label for="passport" class="control-label">{{ __('Passport seriya') }} <span style="color: red;">*</span></label>
                        <input id="passport" type="text" class="passport form-control @error('passport') is-invalid @enderror" name="passport" value="{{ old('passport') }}" autocomplete="passport" autofocus required="required">
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- status -->
                    <div style="display: none;">
                        <input type="number" name="status" id="status" value="1">
                    </div>

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_nameshow">
                        <label for="company_name" class="control-label">{{ __('Kompaniya nomi') }} <span style="color: red;">*</span></label>
                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" autocomplete="company_name" autofocus>
                    </div>
                    
                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_innshow">
                        <label for="company_inn" class="control-label">{{ __('Kompaniya inn') }} <span style="color: red;">*</span></label>
                        <input id="company_inn" type="text" class="inn form-control @error('company_inn') is-invalid @enderror" name="company_inn" value="{{ old('company_inn') }}" autocomplete="company_inn" autofocus>
                    </div>

                    <!-- citizen -->
                    <div class="col-md-4 form-group" id="full_namehide">
                        <label for="name" class="control-label">{{ __('F.I.O') }} <span style="color: red;">*</span></label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_directorshow">
                        <label for="director_name" class="control-label">{{ __('Korxona rahbari') }} <span style="color: red;">*</span></label>
                        <input id="director_name" type="text" class="form-control @error('director_name') is-invalid @enderror" name="director_name" value="{{ old('director_name') }}" autocomplete="director_name" autofocus>

                        @error('director_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- citizen -->
                    <div class="col-md-4 form-group" id="emailhide">
                        <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="email form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <!-- citizen -->
                    <div class="col-md-3 form-group" id="birthhide">
                        <label for="birth_date" class="control-label">{{ __('Tug‘ilgan sana') }} <span style="color: red;">*</span></label>

                        <input id="birth_date" type="text" class="birth_date form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" autocomplete="birth_date" required="required">
                    </div>                            
                </div>
                <div class="row mb-3">

                    <!-- both -->
                    <div class="col-md-4 form-group">
                        <label for="region_id" class="control-label">{{ __('Viloyat') }} <span style="color: red;">*</span></label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select name="region_id" required id="region_id" class="dropdown-product selectpicker">
                                    <option value="">Viloyatni tanlang...</option>
                                        @foreach($regions as $region)
                                            <option value="{{ $region->id }}" data-id="{{ $region->id }}" >{{ $region->name_uz }}</option>
                                        @endforeach
                                </select>
                            </label>
                        </div>
                    </div>

                    <!-- both -->
                    <div class="col-md-4 form-group">
                        <label for="city_id" class="control-label">{{ __('Tuman') }}</label>
                        <div class="search-category-container">
                            <label class="styled-select">
                                <select id="city_id" class="dropdown-product selectpicker" name="city_id">
                                    <option value="">Tumanni tanlang...</option>
                                </select>
                            </label>
                        </div>
                    </div>

                    <!-- citizen -->
                    <div class="col-md-2 form-group" id="genderhide">
                        <label for="gender" class="control-label">{{ __('Jinsi') }} <span style="color: red;">*</span></label>
                        <div class="radio">
                            <input type="radio" name="gender" id="genderM" checked value="1">
                            <label for="genderM" class="radio-label">Erkak</label><br>
                        
                            <input type="radio" name="gender" id="genderF" value="0">
                            <label for="genderF" class="radio-label">Ayol</label>
                        </div>
                    </div>

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_addressshow">
                        <label for="address" class="control-label">{{ __('Korxona manzili') }}</label>
                        <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                    </div>
                </div>

                <div class="row mb-3">

                    <!-- both -->
                    <div class="col-md-4 form-group">
                        <label for="phone_number" class="control-label">{{ __('Telefon raqam') }} <span style="color: red;">*</span></label>
                        <input id="phone_number" type="text" class="phone form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                    </div>

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_siteshow">
                        <label for="web_site" class="control-label">{{ __('Web sayt') }}</label>
                        <input id="web_site" type="web_site" class="form-control @error('web_site') is-invalid @enderror" name="web_site" value="{{ old('web_site') }}" autocomplete="web_site">
                    </div>          

                    <!-- company -->
                    <div class="col-md-4 form-group" style="display: none;" id="comp_logoshow">
                        <label for="logo" class="control-label">{{ __('Logo') }}</label>
                        <input id="logo" type="file" class="form-control" name="logo" value="{{ old('logo') }}">
                    </div>

                    <!-- citizen -->
                    <div class="col-md-4 form-group" id="specialisthide">
                        <label for="specialist" class="control-label">{{ __('Mutaxassislik') }}</label>
                        <input id="specialist" type="text" class="form-control" name="specialist" value="{{ old('specialist') }}">
                    </div>

                    <!-- citizen -->
                    <div class="col-md-4 form-group" id="avatarhide">
                        <label for="avatar" class="control-label">{{ __('Rasm') }}</label>
                        <input id="avatar" type="file" class="form-control" name="avatar" value="{{ old('avatar') }}">
                    </div>

                </div>

                <div class="row mb-3">

                    <!-- both -->
                    <div class="col-md-4 form-group">
                        <label for="username" class="control-label">{{ __('Login') }} <span style="color: red;">*</span></label>
                        <input id="username" type="text" class="form-control" required name="username" value="{{ old('username') }}">
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="password" class="control-label">{{ __('Parol') }} <span style="color: red;">*</span></label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="col-md-4 form-group">
                        <label for="password-confirm" class="control-label">{{ __('Parolni tasdiqlash') }} <span style="color: red;">*</span></label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-3 clearfix"></div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-common log-btn">
                            {{ __('Ro‘yxatdan o‘tish') }}
                        </button>
                        <p class="text-center">Allaqachon ro‘yxatdan o‘tgan?<a href="{{ route('login') }}"> Kirish</a></p>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

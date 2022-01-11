@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ro‘yxatdan o‘tish') }}</div>

                <div class="card-body">
                    <h3 class="text-center">Foydalanuvchini tanlang!</h3>
                        <input type="radio" name="user_check" class="btn-check" value="role_citizen" id="citizen" checked="checked" autocomplete="off">
                        <label for="citizen" class="btn btn-outline-primary">Citizen</label>

                        <input type="radio" name="user_check" class="btn-check" value="role_company" id="company" autocomplete="off">
                        <label for="company" class="btn btn-outline-primary">Company</label>
                    <hr>
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <!-- status -->
                            <div style="display: none;">
                                <input type="number" name="status" id="status" value="1">
                            </div>

                            <!-- company -->
                            <div class="col-md-4" style="display: none;" id="comp_nameshow">
                                <label for="company_name" class="col-form-label text-md-end">{{ __('Kompaniya nomi *') }}</label>
                                <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" autocomplete="company_name" autofocus>
                            </div>
                            
                            <!-- company -->
                            <div class="col-md-4" style="display: none;" id="comp_innshow">
                                <label for="company_inn" class="col-form-label text-md-end">{{ __('Kompaniya inn *') }}</label>
                                <input id="company_inn" type="text" class="inn form-control @error('company_inn') is-invalid @enderror" name="company_inn" value="{{ old('company_inn') }}" autocomplete="company_inn" autofocus>
                            </div>

                            <!-- both -->
                            <div class="col-md-4">
                                <label for="name" class="col-form-label text-md-end">{{ __('F.I.O *') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- citizen -->
                            <div class="col-md-4" id="emailhide">
                                <label for="email" class="col-form-label text-md-end">{{ __('E-Mail Address') }}</label>

                                <input id="email" type="email" class="email form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- citizen -->
                            <div class="col-md-3" id="birthhide">
                                <label for="birth_date" class="col-form-label text-md-end">{{ __('Tug‘ilgan yili *') }}</label>

                                <input id="birth_date" type="text" class="birth_date form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" autocomplete="birth_date" required="required">
                            </div>                            
                        </div>
                        <div class="row mb-3">

                            <!-- both -->
                            <div class="col-md-4">
                                <label for="region_id" class="col-form-label text-md-end">{{ __('Viloyat *') }}</label>
                                <select name="region_id" required id="region_id" class="form-control">
                                    <option value="">Viloyatni tanlang...</option>
                                        @foreach($regions as $region)
                                            <option value="{{ $region->id }}" data-id="{{ $region->id }}" >{{ $region->name_uz }}</option>
                                        @endforeach
                                </select>
                            </div>

                            <!-- both -->
                            <div class="col-md-4">
                                <label for="city_id" class="col-form-label text-md-end">{{ __('Tuman') }}</label>
                                <select id="city_id" class="form-control @error('city_id') is-invalid @enderror" name="city_id">
                                    <option value="">Tumanni tanlang...</option>
                                </select>
                            </div>

                            <!-- citizen -->
                            <div class="col-md-3" id="genderhide">
                                <label for="gender" class="col-form-label text-md-end">{{ __('Jinsi *') }}</label>
                                <div class="radio">
                                    <input type="radio" name="gender" id="genderM" checked value="1">
                                    <label for="genderM" class="radio-label">Erkak</label>
                                
                                    <input type="radio" name="gender" id="genderF" value="0">
                                    <label for="genderF" class="radio-label">Ayol</label>
                                </div>
                            </div>

                            <!-- company -->
                            <div class="col-md-4" style="display: none;" id="comp_addressshow">
                                <label for="address" class="col-form-label text-md-end">{{ __('Korxona manzili') }}</label>
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" autocomplete="address">
                            </div>
                        </div>

                        <div class="row mb-3">

                            <!-- both -->
                            <div class="col-md-4">
                                <label for="phone_number" class="col-form-label text-md-end">{{ __('Telefon raqam *') }}</label>
                                <input id="phone_number" type="text" class="phone form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus>
                            </div>

                            <!-- company -->
                            <div class="col-md-4" style="display: none;" id="comp_siteshow">
                                <label for="web_site" class="col-form-label text-md-end">{{ __('Web sayt') }}</label>
                                <input id="web_site" type="web_site" class="form-control @error('web_site') is-invalid @enderror" name="web_site" value="{{ old('web_site') }}" autocomplete="web_site">
                            </div>          

                            <!-- company -->
                            <div class="col-md-4" style="display: none;" id="comp_logoshow">
                                <label for="logo" class="col-form-label text-md-end">{{ __('Logo') }}</label>
                                <input id="logo" type="file" class="form-control" name="logo" value="{{ old('logo') }}">
                            </div>

                            <!-- citizen -->
                            <div class="col-md-4" id="specialisthide">
                                <label for="specialist" class="col-form-label text-md-end">{{ __('Mutaxassislik') }}</label>
                                <input id="specialist" type="text" class="form-control" name="specialist" value="{{ old('specialist') }}">
                            </div>

                            <!-- citizen -->
                            <div class="col-md-4" id="avatarhide">
                                <label for="avatar" class="col-form-label text-md-end">{{ __('Rasm') }}</label>
                                <input id="avatar" type="file" class="form-control" name="avatar" value="{{ old('avatar') }}">
                            </div>

                        </div>

                        <div class="row mb-3">

                            <!-- both -->
                            <div class="col-md-4">
                                <label for="username" class="col-form-label text-md-end">{{ __('Login *') }}</label>
                                <input id="username" type="text" class="form-control" required name="username" value="{{ old('username') }}">
                            </div>

                            <div class="col-md-4">
                                <label for="password" class="col-form-label text-md-end">{{ __('Parol *') }}</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-4">
                                <label for="password-confirm" class="col-form-label text-md-end">{{ __('Parolni tasdiqlash *') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ro‘yxatdan o‘tish') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

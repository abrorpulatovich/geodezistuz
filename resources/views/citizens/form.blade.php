<div class="row mb-3">
    <!-- citizen -->
    <div class="col-md-4">
        <label for="passport" class="col-form-label text-md-end">{{ __('Passport ') }}<span style="color: red;">*</span></label>
        <input id="passport" type="text" class="form-control" name="passport" value="{{ $citizen->passport }}" autocomplete="passport" autofocus>
    </div>
    
    <!-- citizen -->
    <div class="col-md-4">
        <label for="full_name" class="col-form-label text-md-end">{{ __('F.I.O ') }}<span style="color: red;">*</span></label>
        <input id="full_name" type="text" class="form-control" name="full_name" value="{{ $citizen->full_name }}" autocomplete="full_name" autofocus>
    </div>

    <!-- both -->
    <div class="col-md-4">
        <label for="phone_number" class="col-form-label text-md-end">{{ __('Telefon raqam ') }}<span style="color: red;">*</span></label>
        <input id="phone_number" type="text" class="form-control" name="phone_number" value="{{ $citizen->phone_number }}" required autocomplete="phone_number" autofocus>
    </div>                            
</div>
<div class="row mb-3">

    <!-- both -->
    <div class="col-md-4">
        <label for="region_id" class="col-form-label text-md-end">{{ __('Viloyat ') }}<span style="color: red;">*</span></label>
        <select name="region_id" required id="region_id" class="form-control">
            <option value="">Viloyatni tanlang...</option>
                @foreach($regions as $region)
                    @if($citizen->region_id == $region->id)
                        <option value="{{ $region->id }}" selected="selected" data-id="{{ $region->id }}">{{ $region->name_uz }}</option>
                    @endif
                    <option value="{{ $region->id }}" data-id="{{ $region->id }}" >{{ $region->name_uz }}</option>
                @endforeach
        </select>
    </div>

    <!-- both -->
    <div class="col-md-4">
        <label for="city_id" class="col-form-label text-md-end">{{ __('Tuman') }}</label>
        <select id="city_id" class="form-control" name="city_id">
            <option value="">Tumanni tanlang...</option>
            @foreach($cities as $city)
                @if($citizen->city_id == $city->id)
                    <option value="{{ $city->id }}" selected="selected" data-id="{{ $city->id }}">{{ $city->name_uz }}</option>
                @endif
                <option value="{{ $city->id }}" data-id="{{ $city->id }}" >{{ $city->name_uz }}</option>
            @endforeach
        </select>
    </div>

    <!-- citizen -->
    <div class="col-md-4">
        <label for="gender" class="col-form-label text-md-end">{{ __('Jinsi') }} <span style="color: red;">*</span></label>
        <div class="radio">
            <input type="radio" name="gender" id="genderM" checked value="1">
            <label for="genderM" class="radio-label">Erkak</label>
        
            <input type="radio" name="gender" id="genderF" value="0">
            <label for="genderF" class="radio-label">Ayol</label>
        </div>
    </div>
</div>

<div class="row mb-3">

    <!-- both -->
    <div class="col-md-4">
        <label for="specialist" class="col-form-label text-md-end">{{ __('Mutaxassislik') }}</label>
        <input id="specialist" type="text" class="form-control" name="specialist" value="{{ $citizen->specialist }}" required autocomplete="specialist" autofocus>
    </div>

    <!-- citizen -->
    <div class="col-md-4">
        <label for="birth_date" class="col-form-label text-md-end">{{ __('Tug‘ilgan sana ') }}<span style="color: red;">*</span></label>
        <input id="birth_date" type="birth_date" class="birth_date form-control" name="birth_date" value="{{ $citizen->birth_date }}" autocomplete="birth_date">
    </div>          

    <!-- citizen -->
    <!-- <div class="col-md-4">
        <label for="avatar" class="col-form-label text-md-end">{{ __('Avatar') }}</label>
        <input id="avatar" type="file" class="form-control" name="avatar" value="{{ $citizen->avatar }}">
    </div> -->

</div>

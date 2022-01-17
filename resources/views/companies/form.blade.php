<div class="row mb-3">
    <!-- company -->
    <div class="col-md-4">
        <label for="company_name" class="col-form-label text-md-end">{{ __('Kompaniya nomi *') }}</label>
        <input id="company_name" type="text" class="form-control" name="company_name" value="{{ $company->company_name }}" autocomplete="company_name" autofocus>
    </div>
    
    <!-- company -->
    <div class="col-md-4">
        <label for="company_inn" class="col-form-label text-md-end">{{ __('Kompaniya inn *') }}</label>
        <input id="company_inn" type="text" class="inn form-control" name="company_inn" value="{{ $company->company_inn }}" autocomplete="company_inn" autofocus>
    </div>

    <!-- both -->
    <div class="col-md-4">
        <label for="name" class="col-form-label text-md-end">{{ __('Korxona rahbari ismi *') }}</label>
        <input id="name" type="text" class="form-control" name="name" value="{{ $company->full_name }}" required autocomplete="name" autofocus>
    </div>                            
</div>
<div class="row mb-3">

    <!-- both -->
    <div class="col-md-4">
        <label for="region_id" class="col-form-label text-md-end">{{ __('Viloyat *') }}</label>
        <select name="region_id" required id="region_id" class="form-control">
            <option value="">Viloyatni tanlang...</option>
                @foreach($regions as $region)
                    @if($company->region_id == $region->id)
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
                @if($company->city_id == $city->id)
                    <option value="{{ $city->id }}" selected="selected" data-id="{{ $city->id }}">{{ $city->name_uz }}</option>
                @endif
                <option value="{{ $city->id }}" data-id="{{ $city->id }}" >{{ $city->name_uz }}</option>
            @endforeach
        </select>
    </div>

    <!-- company -->
    <div class="col-md-4">
        <label for="address" class="col-form-label text-md-end">{{ __('Korxona manzili') }}</label>
        <input id="address" type="text" class="form-control" name="address" value="{{ $company->address }}" autocomplete="address">
    </div>
</div>

<div class="row mb-3">

    <!-- both -->
    <div class="col-md-4">
        <label for="phone_number" class="col-form-label text-md-end">{{ __('Telefon raqam *') }}</label>
        <input id="phone_number" type="text" class="phone form-control" name="phone_number" value="{{ $company->company_phone_number }}" required autocomplete="phone_number" autofocus>
    </div>

    <!-- company -->
    <div class="col-md-4">
        <label for="web_site" class="col-form-label text-md-end">{{ __('Web sayt') }}</label>
        <input id="web_site" type="web_site" class="form-control" name="web_site" value="{{ $company->web_site }}" autocomplete="web_site">
    </div>          

    <!-- company -->
    <!-- <div class="col-md-4">
        <label for="logo" class="col-form-label text-md-end">{{ __('Logo') }}</label>
        <input id="logo" type="file" class="form-control" name="logo" value="{{ $company->logo_path }}">
    </div> -->

</div>

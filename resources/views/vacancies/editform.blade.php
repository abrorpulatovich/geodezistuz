<h4>Korxona ma‘lumotlari</h4>
<div class="row mb-3">
	<div class="col-md-3">
		<label for="company_inn" class="col-form-label text-md-end">{{ __('Korxona INN') }}</label>
		<input id="company_inn" type="text" class="form-control" name="company_inn" value="{{ $company[0]->company_inn }}" readonly>
	</div>
	<div class="col-md-4">
		<label for="company_name" class="col-form-label text-md-end">{{ __('Korxona nomi') }}</label>
		<input id="company_name" type="text" class="form-control" name="company_name" value="{{ $company[0]->company_name }}" disabled>
	</div>
	<div class="col-md-4">
	@if($company[0]->address)
		<label for="address" class="col-form-label text-md-end">{{ __('Korxona manzili') }}</label>
		<input id="address" type="text" class="form-control" name="address" value="{{ $company[0]->address }}" disabled>
	@else
		<label for="region_id" class="col-form-label text-md-end">{{ __('Hudud') }}</label>
		<input id="region_id" type="text" class="form-control" name="region_id" value="{{ $vacancy::regionName($company[0]->region_id)->name_uz }}" disabled>
	@endif
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-4">
		<label for="full_name" class="col-form-label text-md-end">{{ __('Vakansiya beruvchi hodim ismi') }}</label>
		<input id="full_name" type="text" class="form-control" name="full_name" value="{{ $company[0]->full_name }}" disabled>
	</div>
	<div class="col-md-4">
		<label for="company_phone_number" class="col-form-label text-md-end">{{ __('Telefon raqami') }}</label>
		<input id="company_phone_number" type="text" class="form-control" name="company_phone_number" value="{{ $company[0]->company_phone_number }}" disabled>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-12"><hr></div>
</div>
<div class="row mb-3">
	<div class="col-md-4">
		<label for="specialist_id" class="col-form-label text-md-end">{{ __('Mavjud vakansiyani tanlang') }}</label>
		<select name="specialist_id" required id="specialist_id" class="form-control">
            <option value="">Vakansiyani tanlang...</option>
                @foreach($specialists as $specialist)
                    @if($vacancy->specialist_id == $specialist->id)
                    	<option value="{{ $specialist->id }}" selected="selected" data-id="{{ $specialist->id }}">{{ $specialist->name }}</option>
                    @endif
                    <option value="{{ $specialist->id }}" data-id="{{ $specialist->id }}" >{{ $specialist->name }}</option>
                @endforeach
        </select>
	</div>
	<div class="col-md-3">
		<label for="skill" class="col-form-label text-md-end">{{ __('Mehnat staji') }}</label>
		<select name="skill" required id="skill" class="form-control">
            <option value="">Mehnat stajini tanlang...</option>
                @foreach($skills as $skill)
                    @if($vacancy->skill == $skill->id)
                    	<option value="{{ $skill->id }}" selected="selected" data-id="{{ $skill->id }}">{{ $skill->name }}</option>
                    @endif
                    	<option value="{{ $skill->id }}" data-id="{{ $skill->id }}">{{ $skill->name }}</option>
                @endforeach
        </select>
	</div>
</div>
<div class="row mb-3">
	<div class="col-md-3" id="salary_hidden">
		<label for="salary" class="col-form-label text-md-end">{{ __('Oylik maosh (so‘m)') }}</label>
		<input id="salary" type="text" class="form-control" name="salary" value="{{ old('salary') ?? $vacancy->salary }}" required="required">
	</div>
	<div class="col-md-3 mt-4">
		<label class="col-form-label text-md-end">
			<input type="checkbox" id="is_salary" name="is_salary" value="0" class="hide_salary"><span> {{ __('Oylikni kelishamiz') }}</span>
		</label>
	</div>
</div>

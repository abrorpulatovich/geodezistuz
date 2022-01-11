<h4>Korxona ma‘lumotlari</h4>
<div class="row mb-3">
	<div class="col-md-3">
		<label for="company_inn" class="col-form-label text-md-end">{{ __('Korxona INN') }}</label>
		<input id="company_inn" type="text" class="form-control" name="company_inn" value="{{ $company[0]->company_inn }}" disabled>
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
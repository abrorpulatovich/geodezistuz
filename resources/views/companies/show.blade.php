@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Korxona haqida ma‘lumot') }}</div>
                    <div class="card-body">
						<div class="mb-3">
							  <a href="	{{ url()->previous() }}"><button class="btn btn-primary" type="button">Orqaga <i class="bi bi-box-arrow-in-left"></i></button></a>
						 </div>
						<div class="mb-3 btn-group">
						 @if(Auth::user()->status == 2)
							 		<a type="button" href="{{ route('companies.edit', ['company' => $company->id]) }}" class="btn btn-success"><i class="bi bi-pencil"></i> Tahrirlash</a>
						 @endif
						 @if(Auth::user()->status == 3)
							 	<form action="{{ route('companies.destroy', ['company' => $company->id]) }}" method="POST">
	                                @csrf
	                                @method('DELETE')
	                                <button type="submit" style="margin-left:4px;" class="btn btn-danger" onclick="return confirm('Haqiqatdan ham ushbu korxonani o‘chirmoqchimisiz?')"><i class="bi bi-trash"></i> O‘chirish</button>
	                            </form>
						 @endif
						</div>

						<table class="table table-bordered">
							<tr>
								<td>Korxona nomi</td>
								<td>{{ $company->company_name }}</td>
							</tr>
							<tr>
								<td>Korxona INN si</td>
								<td>{{ $company->company_inn }}</td>
							</tr>
							<tr>
								<td>Korxona rahbari</td>
								<td>{{ $company->full_name }}</td>
							</tr>
							<tr>
								<td>Korxona telefon raqami</td>
								<td>{{ $company->company_phone_number }}</td>
							</tr>
							<tr>
								<td>Hudud</td>
								<td>{{ $company::regionName($company->region_id)->name_uz }}, {{ $company::cityName($company->city_id)->name_uz ?? ''}}</td>
							</tr>
							<tr>
								<td>Manzil</td>
								<td>
                                        {{ $company->address ?? 'Ko‘rsatilmagan' }} 
								</td>
							</tr>
							<tr>
								<td>Web sayt</td>
								<td>
									{{ $company->webdite ?? 'Ko‘rsatilmagan' }}
								</td>
							</tr>
							<tr>
								<td>Holati</td>
								<td>
									@if($company->status == 1)
                                        Yangi
                                    @elseif($company->status == 2)
                                        Tasdiqlangan
                                    @elseif($company->status == 3)
                                        Vaqtinchalik bloklangan
                                    @endif
								</td>
							</tr>
							<tr>
								<td>Qo'shilgan vaqt</td>
								<td>{{ $company->created_at }}</td>
							</tr>
						</table>
						@if(Auth::user()->status == 3)
							@if($company->status == 1 || $company->status == 3)
								<form action="{{ route('companies.check', ['id' => $company->id]) }}" method="POST">
	                                @csrf
	                                <button type="submit" style="margin-left:4px;" class="btn btn-success "onclick="return confirm('Haqiqatdan ham ushbu korxonani tasdiqlaysizmi?')"><i class="bi bi-check-circle"></i> Tasdiqlash</button>
	                            </form>
	                        @elseif($company->status == 2)
	                        	<form action="{{ route('companies.check', ['id' => $company->id]) }}" method="POST">
	                                @csrf
	                                <button type="submit" style="margin-left:4px;" class="btn btn-danger "onclick="return confirm('Haqiqatdan ham ushbu korxonani bloklaysizmi?')"><i class="bi bi-x-circle"></i> Vaqtinchalik bloklash</button>
	                            </form>
	                        @endif
						@endif
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>


@endsection

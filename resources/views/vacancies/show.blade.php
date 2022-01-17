@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Vakansiya haqida ma‘lumot') }}</div>
                    <div class="card-body">
						<div class="mb-3">
							  <a href="	{{ url()->previous() }}"><button class="btn btn-primary" type="button">Orqaga <i class="bi bi-box-arrow-in-left"></i></button></a>
						 </div>
						 <div class="mb-3 btn-group">
						 	@if(Auth::user()->status == 2 && $vacancy->is_published == 0)
						 		<a type="button" href="{{ route('vacancies.edit', ['vacancy' => $vacancy->id]) }}" class="btn btn-success"><i class="bi bi-pencil"></i> Tahrirlash</a>
						  	@endif
						 		<form action="{{ route('vacancies.destroy', ['vacancy' => $vacancy->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="margin-left: 4px;" onclick="return confirm('Haqiqatdan ham ushbu vakansiyani o‘chirmoqchimisiz?')"><i class="bi bi-trash"></i> O‘chirish</button>
                                </form>
						 </div>
						<table class="table table-bordered">
							<tr>
								<td>Vakansiya bergan tashkilot</td>
								<td>{{ $vacancy::company($vacancy->company_inn)->company_name }}</td>
							</tr>
							<tr>
								<td>Vakansiya bergan tashkilot INN si</td>
								<td>{{ $vacancy->company_inn }}</td>
							</tr>
							<tr>
								<td>F.I.O</td>
								<td>{{ $vacancy::company($vacancy->company_inn)->full_name }}</td>
							</tr>
							<tr>
								<td>Tashkilot telefon raqami</td>
								<td>{{ $vacancy::company($vacancy->company_inn)->company_phone_number }}</td>
							</tr>
							<tr>
								<td>Mavjud vakansiya</td>
								<td>{{ $vacancy::specialist($vacancy->specialist_id)->name }}</td>
							</tr>
							<tr>
								<td>Talab qilingan mehnat staji</td>
								<td>{{ $vacancy::skill($vacancy->skill)->name }}</td>
							</tr>
							<tr>
								<td>Taklif etilgan oylik</td>
								<td>
									@if($vacancy->salary_hidden)
                                        Ko‘rsatilmagan 
                                    @else
                                        {{ $vacancy->salary }} so‘m
                                    @endif
								</td>
							</tr>
							<tr>
								<td>Holati</td>
								<td>
									@if($vacancy->status == 1)
                                        Korilmagan 
                                    @elseif($vacancy->status == 2)
                                        Korilgan
                                    @endif
								</td>
							</tr>
							<tr>
								<td>Holati</td>
								<td>
									@if($vacancy->is_published == 0)
                                        Tasdiqlanmagan 
                                    @elseif($vacancy->is_published == 1)
                                        Tasdiqlangan
                                    @endif
								</td>
							</tr>
							<tr>
								<td>Qo'shilgan vaqt</td>
								<td>{{ $vacancy->created_at }}</td>
							</tr>
						</table>
						@if(Auth::user()->status == 3)
							@if($vacancy->is_published == 0 || $vacancy->is_published == 2)
								<form action="{{ route('vacancies.check', ['id' => $vacancy->id]) }}" method="POST">
	                                @csrf
	                                <button type="submit" style="margin-left:4px;" class="btn btn-success "onclick="return confirm('Haqiqatdan ham ushbu vakansiyani tasdiqlaysizmi?')"><i class="bi bi-check-circle"></i> Tasdiqlash</button>
	                            </form>
	                        @elseif($vacancy->is_published == 1)
	                        	<form action="{{ route('vacancies.check', ['id' => $vacancy->id]) }}" method="POST">
	                                @csrf
	                                <button type="submit" style="margin-left:4px;" class="btn btn-danger "onclick="return confirm('Haqiqatdan ham ushbu vakansiyani bloklaysizmi?')"><i class="bi bi-x-circle"></i> Bloklash</button>
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

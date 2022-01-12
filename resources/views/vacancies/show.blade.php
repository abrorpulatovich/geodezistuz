@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Vakansiya haqida ma‘lumot') }}</div>
                    <div class="card-body">
						<div class="mb-3">
							  <a href="	{{ route('vacancies.index') }}"><button class="btn btn-primary" type="button">Orqaga <i class="bi bi-box-arrow-in-left"></i></button></a>
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
                                        Yangi 
                                    @elseif($vacancy->status == 2)
                                        Tasdiqlangan
                                    @endif
								</td>
							</tr>
							<tr>
								<td>Qo'shilgan vaqt</td>
								<td>{{ $vacancy->created_at }}</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>


@endsection

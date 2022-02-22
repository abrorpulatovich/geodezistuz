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
						 	@if(Auth::user()->status == 1 && $rezume->is_published == 0)
						 		<a type="button" href="{{ route('rezumes.edit', ['rezume' => $rezume->id]) }}" class="btn btn-success"><i class="bi bi-pencil"></i> Tahrirlash</a>
						 		<form action="{{ route('rezumes.destroy', ['rezume' => $rezume->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="margin-left: 4px;" onclick="return confirm('Haqiqatdan ham ushbu rezumeni o‘chirmoqchimisiz?')"><i class="bi bi-trash"></i> O‘chirish</button>
                                </form>
						  	@endif
						 </div>
						<table class="table table-bordered">
							<tr>
								<td>Passport seriya</td>
								<td>{{ $rezume->passport }}</td>
							</tr>
							<tr>
								<td>F.I.O</td>
								<td>{{ $rezume::citizen($rezume->passport)->full_name }}</td>
							</tr>
							<tr>
								<td>Hudud</td>
								<td>{{ $rezume::regionName($rezume::citizen($rezume->passport)->region_id)->name_uz }}</td>
							</tr>
							<tr>
								<td>Mutaxassisligi</td>
								<td>{{ $rezume::specialist($rezume->specialist_id)->name }}</td>
							</tr>
							<tr>
								<td>Mehnat staji</td>
								<td>{{ $rezume::skill($rezume->skill)->name }}</td>
							</tr>
							<tr>
								<td>Oylik</td>
								<td>
									@if($rezume->salary_hidden)
                                        Ko‘rsatilmagan 
                                    @else
                                        {{ $rezume->salary }} so‘m
                                    @endif
								</td>
							</tr>
							<tr>
								<td>Holati</td>
								<td>
									@if($rezume->status == 1)
                                        Korilmagan 
                                    @elseif($rezume->status == 2)
                                        Korilgan
                                    @endif
								</td>
							</tr>
							<tr>
								<td>Holati</td>
								<td>
									@if($rezume->is_published == 0)
                                        Tasdiqlanmagan 
                                    @elseif($rezume->is_published == 1)
                                        Tasdiqlangan
                                    @endif
								</td>
							</tr>
							<tr>
								<td>Qo'shilgan vaqt</td>
								<td>{{ $rezume->created_at }}</td>
							</tr>
						</table>
						<table class="table table-bordered">
							@if($rezume->is_history)
							<tr>
								<td>Ilgari ishlagan joylari</td>
									<td>Ilgari hech qayerga ishlamagan</td>
							</tr>
							@else
							<tr>
								<td colspan="4">Ilgari ishlagan joylari</td>
							</tr>
							<tr>
								<td>Korxona nomi</td>
								<td>Qanday lavozimda ishlagan?</td>
								<td>Ishni boshlagan sana</td>
								<td>Ishdan bo‘shatilgan sana</td>
							</tr>
							@foreach($workbooks as $workbook)
								<tr>
									<td>{{ $workbook->old_company_name }}</td>
									<td>{{ $workbook->position_name }}</td>
									<td>{{ $workbook->from_date }}</td>
									<td>{{ $workbook->to_date }}</td>
								</tr>
							@endforeach
							@endif
						</table>
						@if(Auth::user()->status == 3)
							@if($rezume->is_published == 0 || $rezume->is_published == 2)
								<form action="{{ route('rezumes.check', ['id' => $rezume->id]) }}" method="POST">
	                                @csrf
	                                <button type="submit" style="margin-left:4px;" class="btn btn-success "onclick="return confirm('Haqiqatdan ham ushbu rezumeni tasdiqlaysizmi?')"><i class="bi bi-check-circle"></i> Tasdiqlash</button>
	                            </form>
	                        @elseif($rezume->is_published == 1)
	                        	<form action="{{ route('rezumes.check', ['id' => $rezume->id]) }}" method="POST">
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

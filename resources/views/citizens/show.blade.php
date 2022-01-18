@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Fuqaro haqida ma‘lumot') }}</div>
                    <div class="card-body">
						<div class="mb-3">
							  <a href="	{{ url()->previous() }}"><button class="btn btn-primary" type="button">Orqaga <i class="bi bi-box-arrow-in-left"></i></button></a>
						 </div>
						<div class="mb-3 btn-group">
						 @if(Auth::user()->status == 1)
							 		<a type="button" href="{{ route('citizens.edit', ['citizen' => $citizen->id]) }}" class="btn btn-success"><i class="bi bi-pencil"></i> Tahrirlash</a>
						 @endif
						 @if(Auth::user()->status == 3)
							 	<form action="{{ route('citizens.destroy', ['citizen' => $citizen->id]) }}" method="POST">
	                                @csrf
	                                @method('DELETE')
	                                <button type="submit" style="margin-left:4px;" class="btn btn-danger" onclick="return confirm('Haqiqatdan ham ushbu fuqaroni o‘chirmoqchimisiz?')"><i class="bi bi-trash"></i> O‘chirish</button>
	                            </form>
						 @endif
						</div>

						<table class="table table-bordered">
							<tr>
								<td>F.I.O</td>
								<td>{{ $citizen->full_name }}</td>
							</tr>
							<tr>
								<td>Passport</td>
								<td>{{ $citizen->passport }}</td>
							</tr>
							<tr>
								<td>Telefon raqam</td>
								<td>{{ $citizen->phone_number }}</td>
							</tr>
							<tr>
								<td>Hudud</td>
								<td>{{ $citizen::regionName($citizen->region_id)->name_uz }}, {{ $citizen::cityName($citizen->city_id)->name_uz ?? ''}}</td>
							</tr>
							<tr>
								<td>Jinsi</td>
								<td>
									@if($citizen->gender == 1)
                                        Erkak
                                    @elseif($citizen->gender == 2)
                                        Ayol
                                    @endif
								</td>
							</tr>
							<tr>
								<td>Ma'lumoti</td>
								<td>{{ $citizen->specialist }}</td>
							</tr>
							<tr>
								<td>Holati</td>
								<td>
									@if($citizen->status == 1)
                                        <span class="badge bg-warning text-wrap">Yangi</span>
                                    @elseif($citizen->status == 2)
                                        <span class="badge bg-success text-wrap">Tasdiqlangan</span>
                                    @elseif($citizen->status == 3)
                                        <span class="badge bg-danger text-wrap">Vaqtinchalik bloklangan</span>
                                    @endif
								</td>
							</tr>
							<tr>
								<td>Qo'shilgan vaqt</td>
								<td>{{ $citizen->created_at }}</td>
							</tr>
						</table>
						@if(Auth::user()->status == 3)
							@if($citizen->status == 1 || $citizen->status == 3)
								<form action="{{ route('citizens.check', ['id' => $citizen->id]) }}" method="POST">
	                                @csrf
	                                <button type="submit" style="margin-left:4px;" class="btn btn-success "onclick="return confirm('Haqiqatdan ham ushbu fuqaroni tasdiqlaysizmi?')"><i class="bi bi-check-circle"></i> Tasdiqlash</button>
	                            </form>
	                        @elseif($citizen->status == 2)
	                        	<form action="{{ route('citizens.check', ['id' => $citizen->id]) }}" method="POST">
	                                @csrf
	                                <button type="submit" style="margin-left:4px;" class="btn btn-danger "onclick="return confirm('Haqiqatdan ham ushbu fuqaroni bloklaysizmi?')"><i class="bi bi-x-circle"></i> Vaqtinchalik bloklash</button>
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

@extends('layouts.app')
@section('content')
 <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Korxona haqida ma‘lumot') }}</div>
                    <div class="card-body">
						<div class="mb-3">
							  <a href="	{{ route('home') }}"><button class="btn btn-primary" type="button">Orqaga <i class="bi bi-box-arrow-in-left"></i></button></a>
						 </div>
						 <div class="mb-3 btn-group">
						 		<a type="button" href="{{ route('companies.edit', ['company' => 2]) }}" class="btn btn-success"><i class="bi bi-pencil"></i> Tahrirlash</a>
						 		<form action="{{ route('companies.destroy', ['company' => 2]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="margin-left: 4px;" onclick="return confirm('Haqiqatdan ham ushbu vakansiyani o‘chirmoqchimisiz?')"><i class="bi bi-trash"></i>O‘chirish</button>
                                </form>
						 </div>
						<table class="table table-bordered">
							<tr>
								<td>Vakansiya bergan tashkilot</td>
								<td></td>
							</tr>
							<tr>
								<td>Vakansiya bergan tashkilot INN si</td>
								<td></td>
							</tr>
							<tr>
								<td>F.I.O</td>
								<td></td>
							</tr>
							<tr>
								<td>Tashkilot telefon raqami</td>
								<td></td>
							</tr>
							<tr>
								<td>Mavjud vakansiya</td>
								<td></td>
							</tr>
							<tr>
								<td>Talab qilingan mehnat staji</td>
								<td></td>
							</tr>
							<tr>
								<td>Taklif etilgan oylik</td>
								<td>
									
								</td>
							</tr>
							<tr>
								<td>Holati</td>
								<td>
									
								</td>
							</tr>
							<tr>
								<td>Qo'shilgan vaqt</td>
								<td></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>	
</div>


@endsection

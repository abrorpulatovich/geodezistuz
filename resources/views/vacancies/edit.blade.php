@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
            	<div class="card-header">{{ __('Vakasiyani tahrirlash') }}</div>
            	<div class="card-body">
            	<div class="mb-3">
					  <a href="	{{ route('vacancies.index') }}"><button class="btn btn-primary" type="button">Orqaga <i class="bi bi-box-arrow-in-left"></i></button></a>
				 </div>
				<form method="post" action="{{ route('vacancies.update', ['vacancy' => $vacancy->id]) }}">
		  		  @method('PUT')
				  @csrf
				  @include('vacancies.editform')
				 
				  <button type="submit" class="btn btn-primary">Saqlash</button>
				</form>
			</div>
			</div>
		</div>
	</div>	
</div>


@endsection

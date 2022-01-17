@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
            	<div class="card-header">{{ __('Korxona ma‘lumotlarini tahrirlash') }}</div>
            	<div class="card-body">
            	<div class="mb-3">
					  <a href="	{{ url()->previous() }}"><button class="btn btn-primary" type="button">Orqaga <i class="bi bi-box-arrow-in-left"></i></button></a>
				 </div>
				<form method="post" action="{{ route('companies.update', ['company' => $company->id]) }}">
		  		  @method('PUT')
				  @csrf
				  @include('companies.form')
				 
				  <button type="submit" class="btn btn-primary">Saqlash</button>
				</form>
			</div>
			</div>
		</div>
	</div>	
</div>


@endsection

@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <div class="card">
            	<div class="card-header">{{ __('Vakasiya qo‘shish') }}</div>
            	<div class="card-body">
					@if ($errors->any())
					    <div class="alert alert-danger">
					        <ul>
					            @foreach ($errors->all() as $error)
					                <li>{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif
				<form method="post" action="{{ route('vacancies.store') }}">
				  @csrf
				  @include('vacancies.form')
				 
				  <button type="submit" class="btn btn-primary">Saqlash</button>
				</form>
			</div>
			</div>
		</div>
	</div>	
</div>


@endsection

@extends('layouts.app_template')

@section('content')

<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Korxona</h3>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="section">
  <div class="container">        
    <div class="row justify-content-center">
      <div class="col-lg-8 col-md-8 col-xs-12">
        <div class="inner-box my-resume">
        	<div class="row">
	    		<a class="btn btn-xs btn-primary" href="{{ url()->previous() }}"><i class="lni lni-angle-double-left"></i> Ortga</a>
			</div>
    		<div class="row mt-3">
    			<div class="author-resume">
		            <div class="thumb">
		              <img src="/assets/img/resume/img-1.png" alt="">
		            </div>
		            <div class="author-info">
		              <h3>{{ $company->company_name }}</h3>
		              <p><span class="address"><i class="lni-map-marker"></i>{{ $company::regionName($company->region_id)->name_uz }}, {{ $company::cityName($company->city_id)->name_uz ?? ''}}</span></p>
		              <p><span><i class="lni lni-mobile"></i> {{ $company->company_phone_number }}</span></p>
		              <!-- <div class="social-link">  
		                <a href="#" class="Twitter"><i class="lni-twitter-filled"></i></a>
		                <a href="#" class="facebook"><i class="lni-facebook-filled"></i></a>
		                <a href="#" class="google"><i class="lni-google-plus"></i></a>
		                <a href="#" class="linkedin"><i class="lni-linkedin-fill"></i></a>
		              </div> -->
		            </div>                  
		        </div>
    		</div>
	      <table class="table table-hover">
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
                            <span class="new-time">Yangi</span>
                        @elseif($company->status == 2)
                            <span class="full-time">Tasdiqlangan</span>
                        @elseif($company->status == 3)
                            <span class="part-time">Vaqtinchalik bloklangan</span>
                        @endif
					</td>
				</tr>
				<tr>
					<td>Qo'shilgan vaqt</td>
					<td>{{ $company->created_at }}</td>
				</tr>
			</table>
			<div class="mb-3 btn-group">
				 @if(Auth::user()->status == 2)
					 		<a type="button" href="{{ route('companies.edit', ['company' => $company->id]) }}" class="btn btn-success"><i class="lni lni-pencil"></i> Tahrirlash</a>
				 @endif
				 @if(Auth::user()->status == 3)
					 	<form action="{{ route('companies.destroy', ['company' => $company->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="margin-left:4px;" class="btn btn-danger" onclick="return confirm('Haqiqatdan ham ushbu korxonani o‘chirmoqchimisiz?')"><i class="lni lni-trash"></i> O‘chirish</button>
                        </form>
				 @endif

				@if(Auth::user()->status == 3)
					@if($company->status == 1 || $company->status == 3)
						<form action="{{ route('companies.check', ['id' => $company->id]) }}" method="POST">
                            @csrf
                            <button type="submit" style="margin-left:4px;" class="btn btn-success "onclick="return confirm('Haqiqatdan ham ushbu korxonani tasdiqlaysizmi?')"><i class="lni lni-check-box"></i> Tasdiqlash</button>
                        </form>
                    @elseif($company->status == 2)
                    	<form action="{{ route('companies.check', ['id' => $company->id]) }}" method="POST">
                            @csrf
                            <button type="submit" style="margin-left:4px;" class="btn btn-danger "onclick="return confirm('Haqiqatdan ham ushbu korxonani bloklaysizmi?')"><i class="lni lni-cross-circle"></i> Vaqtinchalik bloklash</button>
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



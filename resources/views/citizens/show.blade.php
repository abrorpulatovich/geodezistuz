@extends('layouts.app_template')

@section('content')

<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Fuqaro</h3>
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
		              <h3>{{ $citizen->full_name }}</h3>
		              <p class="sub-title">Mutaxassisligi: {{ $citizen->specialist ?? 'Ko‘rsatilmagan'}}</p>
		              <p><span class="address"><i class="lni-map-marker"></i>{{ $citizen::regionName($citizen->region_id)->name_uz }}, {{ $citizen::cityName($citizen->city_id)->name_uz ?? ''}}</span></p>
		              <p><span><i class="lni lni-mobile"></i> {{ $citizen->phone_number }}</span></p>
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
					<td>{{ $citizen->specialist ?? 'Ko‘rsatilmagan'}}</td>
				</tr>
				<tr>
					<td>Holati</td>
					<td>
						@if($citizen->status == 1)
	                        <span class="new-time">Yangi</span>
	                    @elseif($citizen->status == 2)
	                        <span class="full-time">Tasdiqlangan</span>
	                    @elseif($citizen->status == 3)
	                        <span class="part-time">Vaqtinchalik bloklangan</span>
	                    @endif
					</td>
				</tr>
				<tr>
					<td>Qo'shilgan vaqt</td>
					<td>{{ $citizen->created_at }}</td>
				</tr>
			</table>
			<div class="mb-3 btn-group">
				 @if(Auth::user()->status == 1)
					 		<a type="button" href="{{ route('citizens.edit', ['citizen' => $citizen->id]) }}" class="btn btn-info"><i class="lni lni-pencil"></i> Tahrirlash</a>
				 @endif
				 @if(Auth::user()->status == 3)
					 	<form action="{{ route('citizens.destroy', ['citizen' => $citizen->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="margin-left:4px;" class="btn btn-danger" onclick="return confirm('Haqiqatdan ham ushbu fuqaroni o‘chirmoqchimisiz?')"><i class="lni lni-trash"></i> O‘chirish</button>
                        </form>
				 @endif

				@if(Auth::user()->status == 3)
					@if($citizen->status == 1 || $citizen->status == 3)
						<form action="{{ route('citizens.check', ['id' => $citizen->id]) }}" method="POST">
                            @csrf
                            <button type="submit" style="margin-left:4px;" class="btn btn-success "onclick="return confirm('Haqiqatdan ham ushbu fuqaroni tasdiqlaysizmi?')"><i class="lni lni-check-box"></i> Tasdiqlash</button>
                        </form>
                    @elseif($citizen->status == 2)
                    	<form action="{{ route('citizens.check', ['id' => $citizen->id]) }}" method="POST">
                            @csrf
                            <button type="submit" style="margin-left:4px;" class="btn btn-danger "onclick="return confirm('Haqiqatdan ham ushbu fuqaroni bloklaysizmi?')"><i class="lni lni-cross-circle"></i> Vaqtinchalik bloklash</button>
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

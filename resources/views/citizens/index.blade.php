@extends('layouts.app_template')

@section('content')

<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Fuqarolar</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<div id="content">
    <div class="container">        
        <div class="row">
           <div class="col-lg-3 col-md-12 col-xs-12">
                <div class="right-sideabr">
                  <h4>Fuqarolar</h4>
                  <ul class="list-item">
                    <li><a href="{{ route('citizens.index') }}">Fuqarolar</a></li>
                    <li><a href="{{ route('citizens.status', ['status' => 2]) }}">Tasdiqlangan fuqarolar</a></li>
                    <li><a href="{{ route('citizens.status', ['status' => 1]) }}">Yangi qo'shilganlar <span class="notinumber">{{ $count }}</span></a></li>
                    <li><a href="{{ route('citizens.status', ['status' => 3]) }}">Bloklangan fuqarolar</a></li>
                  </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="job-alerts-item">
                      @if($status == 1)
                        <h3 class="alerts-title">Yangi fuqarolar</h3>
                      @elseif($status == 2)
                        <h3 class="alerts-title">Tasdiqlangan fuqarolar</h3>
                      @elseif($status == 3)
                        <h3 class="alerts-title">Bloklangan fuqarolar</h3>
                      @else
                        <h3 class="alerts-title">Fuqarolar</h3>
                      @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>T/R</th>
                                <th>F.I.O</th>
                                <th>Telefon raqam</th>
                                <th>Qo‘shilgan sana</th>
                                <th>Holati</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($citizens) > 0)

                            @foreach($citizens as $citizen)
                                <tr>
                                    <td>{{ ($citizens->currentpage()-1)*$citizens->perpage() + $loop->index+1 }}</td>
                                    <td><a href="{{ route('citizens.show', ['citizen' => $citizen->id]) }}">
                                            {{ $citizen->full_name }}
                                        </a> </td>
                                    <td>{{ $citizen->phone_number }} </td>
                                    <td>{{ date("d.m.Y", strtotime($citizen->created_at)) }}</td>
                                    <td>
                                        @if($citizen->status == 1)
                                            <span class="new-time">Yangi</span>
                                        @elseif($citizen->status == 2)
                                            <span class="full-time">Tasdiqlangan</span>
                                        @elseif($citizen->status == 3)
                                            <span class="part-time">Bloklangan</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <span class="text-center fst-italic">Ma‘lumot yo‘q</span>
                        @endif
                        </tbody>
                    </table>
                    <ul class="pagination">              
                        <li>{{ $citizens->links() }}</li>
                    </ul>
                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

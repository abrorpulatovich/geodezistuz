@extends('layouts.app_template')

@section('content')

<div class="page-header">
  <div class="container">
    <div class="row">         
      <div class="col-lg-12">
        <div class="inner-header">
          <h3>Korxonalar</h3>
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
                  <h4>Korxonalar</h4>
                  <ul class="list-item">
                    <li><a href="{{ route('companies.index') }}">Korxonalar</a></li>
                    <li><a href="{{ route('companies.status', ['status' => 2]) }}">Tasdiqlangan korxonalar</a></li>
                    <li><a href="{{ route('companies.status', ['status' => 1]) }}">Yangi qo'shilganlar <span class="notinumber">{{ $count }}</span></a></li>
                    <li><a href="{{ route('companies.status', ['status' => 3]) }}">Bloklangan korxonalar</a></li>
                  </ul>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="job-alerts-item">
                      @if($status == 1)
                        <h3 class="alerts-title">Yangi korxonalar</h3>
                      @elseif($status == 2)
                        <h3 class="alerts-title">Tasdiqlangan korxonalar</h3>
                      @elseif($status == 3)
                        <h3 class="alerts-title">Bloklangan korxonalar</h3>
                      @else
                        <h3 class="alerts-title">Korxonalar</h3>
                      @endif
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>T/R</th>
                                <th>Korxona nomi</th>
                                <th>Telefon raqam</th>
                                <th>Qo‘shilgan sana</th>
                                <th>Holati</th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(count($companies) > 0)

                            @foreach($companies as $company)
                                <tr>
                                    <td>{{ ($companies->currentpage()-1)*$companies->perpage() + $loop->index+1 }}</td>
                                    <td>
                                        <a href="{{ route('companies.show', ['company' => $company->id]) }}">
                                            {{ $company->company_name }}
                                        </a>
                                    </td>
                                    <td>{{ $company->company_phone_number }} </td>
                                    <td>{{ date("d.m.Y", strtotime($company->created_at)) }}</td>
                                    <td>
                                        @if($company->status == 1)
                                            <span class="new-time">Yangi</span>
                                        @elseif($company->status == 2)
                                            <span class="full-time">Tasdiqlangan</span>
                                        @elseif($company->status == 3)
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
                        <li>{{ $companies->links() }}</li>
                    </ul>
                        
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

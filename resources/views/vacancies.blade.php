@extends('layouts.app_template')

@section('title', 'Vakantlar')

@section('content')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>{!! $specialist? "<span class='text-success'>" . $specialist->name . "</span>" . " bo'yicha mavjud vakantlar": "<span class='text-success'>Barcha mavjud vakantlar</span>" !!}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-xs-12">
                    @include('includes.specialists_with_vacancies_count')
                </div>
                <div class="col-lg-9 col-md-8 col-xs-12">
                    <div class="job-alerts-item candidates">
                        <div class="alerts-list">
                            <div class="row">
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <p><b>Vakant nomi</b></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <p><b>Talab qilinadigan mehnat staji</b></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <p><b>Tarmoq</b></p>
                                </div>
                                <div class="col-lg-3 col-md-3 col-xs-12">
                                    <p><b>Vakant berilgan sana</b></p>
                                </div>
                            </div>
                        </div>
                        @if(sizeof($vacancies) > 0)
                            @foreach($vacancies as $vacancy)
                                <div class="alerts-content">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-5 col-xs-12">
                                            <h3><a href="{{ route('vacancy_details', ['vacancy' => $vacancy]) }}">{{ $vacancy->name }}</a></h3>
                                            <span class="location"><i class="lni-home"></i> {{ $vacancy->company->company_name }}</span>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-xs-12">
                                            <p>{{ $vacancy->vskill->name }}</p>
                                        </div>
                                        <div class="col-lg-3 col-md-2 col-xs-12">
                                            <p>{{ $vacancy->specialist->name }}</p>
                                        </div>
                                        <div class="col-lg-3 col-md-2 col-xs-12">
                                            <p>{{ $vacancy->created_at }}</p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{ $vacancies->appends(request()->query())->links() }}
                        @else
                            <div class="alert alert-warning"><i class="lni lni-warning"></i> Vakantlar mavjud emas</div>
                        @endif
                        <br>
                        <!-- Start Pagination -->
{{--                        <ul class="pagination">--}}
{{--                            <li class="active"><a href="#" class="btn-prev"><i class="lni-angle-left"></i> prev</a></li>--}}
{{--                            <li><a href="#">1</a></li>--}}
{{--                            <li><a href="#">2</a></li>--}}
{{--                            <li><a href="#">3</a></li>--}}
{{--                            <li><a href="#">4</a></li>--}}
{{--                            <li><a href="#">5</a></li>--}}
{{--                            <li class="active"><a href="#" class="btn-next">Next <i class="lni-angle-right"></i></a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
                        <!-- End Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

@endsection

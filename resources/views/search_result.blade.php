@extends('layouts.app_template')

@section('title', $keyword . " bo'yicha topilgan natijalar")

@section('content')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3><span class="text-success">{{ $keyword }}</span> bo'yicha topilgan natijalar</h3>
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
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="job-alerts-item candidates">
                        @if(isset($result['result_data']) && sizeof($result['result_data']) > 0)
                            @foreach($result['result_data'] as $item)
                                <div class="manager-resumes-item">
                                    <div class="manager-content">
                                        @if($item['key'] == 'Vakant')
                                            <div class="manager-info">
                                                <div class="manager-name">
                                                    <a href="{{ route('vacancy_details', ['vacancy' => $item['id']]) }}">{{ $item['result'] }}</a>
                                                </div>
                                                <div class="manager-meta">
                                                    {{ $item['key'] }}
                                                </div>
                                            </div>
                                        @elseif($item['key'] == 'Rezume')
                                            <div class="manager-info">
                                                <div class="manager-name">
                                                    <a href="{{ route('rezume_details', ['rezume' => $item['id']]) }}">{{ $item['result'] }}</a>
                                                </div>
                                                <div class="manager-meta">
                                                    {{ $item['key'] }}
                                                </div>
                                            </div>
                                        @elseif($item['key'] == 'Yangilik')
                                            <div class="manager-info">
                                                <div class="manager-name">
                                                    <a href="{{ route('news_details', ['slug' => $item['slug']]) }}">{{ $item['result'] }}</a>
                                                </div>
                                                <div class="manager-meta">
                                                    {{ $item['key'] }}
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning"><i class="lni lni-warning"></i> <span class="text-success">{{ $keyword }}</span> bo'yicha topilgan natijalar topilmadi</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

@endsection

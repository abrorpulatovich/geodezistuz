@extends('layouts.app_template')

@section('title', 'Rezumelar')

@section('content')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Rezumelar</h3>
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
{{--                <div class="col-lg-4 col-md-12 col-xs-12">--}}
{{--                    @include('includes.specialists_with_rezumes_count')--}}
{{--                </div>--}}
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="job-alerts-item candidates">
                        @if(sizeof($rezumes) > 0)
                            @foreach($rezumes as $rezume)
                                <div class="manager-resumes-item">
                                    <div class="manager-content">
                                        <div class="manager-info">
                                            <div class="manager-name">
                                                <h4><a href="{{ route('rezume_details', ['rezume' => $rezume]) }}">{{ $rezume->user->citizen->full_name }}</a></h4>
                                                <h4>{{ $rezume->name }}</h4>
                                            </div>
                                            <div class="manager-meta">
                                                <span class="location"><i class="lni-map-marker"></i> {{ $rezume->user->citizen->region->name_uz }}, {{ $rezume->user->citizen->city->name_uz }}</span>
{{--                                                <span class="rate"><i class="lni-alarm-clock"></i> $55 per hour</span>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="update-date">
                                        <p class="status">
                                            <strong>Yangilangan sana:</strong> <i class="lni lni-alarm-clock"></i> {{ $rezume->updated_at }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="alert alert-warning"><i class="lni lni-warning"></i> Rezumelar mavjud emas</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

@endsection

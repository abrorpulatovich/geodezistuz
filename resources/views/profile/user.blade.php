@extends('layouts.app_template')

@section('title', $user->name)

@section('content')

    <!-- Start Content -->
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-xs-12">
                    @include('includes.user_profile_leftside')
                </div>
                <div class="col-lg-8 col-md-12 col-xs-12">
                    @if(session()->has('rezume_added_successfully'))
                        <div class="alert alert-success"><i
                                class="lni lni-check-mark-circle"></i> {{ session()->get('rezume_added_successfully') }}
                        </div>
                    @endif
                    @if(sizeof($rezumes) > 0)
                        <div class="job-alerts-item candidates">
                            @foreach($rezumes as $rezume)
                                <div class="manager-resumes-item">
                                    <div class="manager-content">
                                        <div class="manager-info">
                                            <div class="manager-name">
{{--                                                <h4><a href="#">{{ auth()->user()->name }}</a></h4>--}}
                                                <h4>{{ $rezume->specialist->name }}</h4>
                                            </div>
                                            <div class="manager-meta">
                                                <span class="location"><i class="lni-map-marker"></i> {{ $citizen->region->name_uz }}, {{ $citizen->city->name_uz }}</span>
{{--                                                <span class="rate"><i class="lni-alarm-clock"></i> $55 per hour</span>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="update-date">
                                        <p class="status">
                                            <strong>Yangilangan sana:</strong> <i class="lni lni-alarm-clock"></i> {{ $rezume->updated_at }}
                                        </p>
                                        <div class="action-btn">
{{--                                            <a class="btn btn-xs btn-gray" href="#">Hide</a>--}}
                                            <a class="btn btn-xs btn-primary" href="#"><i class="lni lni-pencil"></i> Tahrirlash</a>
                                            <a class="btn btn-xs btn-danger" href="#"><i class="lni lni-trash"></i> O'chirish</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-danger"><i class="lni lni-warning"></i> Sizda rezume yo'q</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app_template')

@section('title', $user->name)

@section('content')
    <style>
        .btn-group > .btn-group:not(:last-child) > .btn, .btn-group > .btn:not(:last-child):not(.dropdown-toggle) {
            border-top-right-radius: 30px !important;
            border-bottom-right-radius: 30px !important;
        }
    </style>
    <!-- Start Content -->
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-1 col-md-12 col-xs-12"></div>
                <div class="col-lg-3 col-md-12 col-xs-12">
                    @include('includes.user_profile_leftside')
                </div>
                <div class="col-lg-7 col-md-12 col-xs-12">
                    @if(session()->has('rezume_added_successfully'))
                        <div class="alert alert-success"><i
                                class="lni lni-check-mark-circle"></i> {{ session()->get('rezume_added_successfully') }}
                        </div>
                    @endif
                    @if(session()->has('rezume_deleted_successfully'))
                        <div class="alert alert-success"><i
                                class="lni lni-check-mark-circle"></i> {{ session()->get('rezume_deleted_successfully') }}
                        </div>
                    @endif
                    @if(session()->has('not_personal_rezume'))
                        <div class="alert alert-danger"><i
                                class="lni lni-warning"></i> {{ session()->get('not_personal_rezume') }}
                        </div>
                    @endif
                    @if(session()->has('error_occurred'))
                        <div class="alert alert-danger"><i
                                class="lni lni-warning"></i> {{ session()->get('error_occurred') }}
                        </div>
                    @endif
                    @if(sizeof($rezumes) > 0)
                        <div class="job-alerts-item candidates">
                            @foreach($rezumes as $rezume)
                                <div class="manager-resumes-item">
                                    <div class="manager-content">
                                        <div class="manager-info">
                                            <div class="manager-name">
                                                <h4><a href="#">{{ $rezume->name }}</a></h4>
                                                <h6>{{ $rezume->specialist->name }}</h6>
                                            </div>
                                            <div class="manager-meta">
                                                <span class="location"><i class="lni-map-marker"></i> {{ $citizen->region->name_uz }}, {{ $citizen->city->name_uz }}</span>
                                                {{--                                                <span class="rate"><i class="lni-alarm-clock"></i> $55 per hour</span>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="update-date">
                                        <p class="status">
                                            <strong>Yangilangan sana:</strong> <i
                                                class="lni lni-alarm-clock"></i> {{ $rezume->updated_at }}
                                        </p>
                                        <div class="action-btn btn-group">
                                            {{--                                            <a class="btn btn-xs btn-gray" href="#">Hide</a>--}}
                                            <a class="btn btn-xs btn-primary"
                                               href="{{ route('user_edit_rezume', ['rezume' => $rezume]) }}"><i class="lni lni-pencil"></i> Tahrirlash</a>
                                            <form action="{{ route('user_delete_rezume') }}" method="post" onsubmit="return confirm('Siz rostdan ham ushbu rezumeni o\'chirishni xoxlaysizmi?')">
                                                @csrf
                                                @method('delete')
                                                <input type="hidden" name="rezume_id" value="{{ $rezume->id }}"/>
                                                <button type="submit" class="btn btn-xs btn-danger"><i class="lni lni-trash"></i> O'chirish
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="alert alert-danger"><i class="lni lni-warning"></i> Sizda rezume yo'q</div>
                    @endif
                </div>
                <div class="col-lg-1 col-md-12 col-xs-12"></div>
            </div>
        </div>
    </div>
@endsection

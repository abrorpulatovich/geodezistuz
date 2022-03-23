@extends('layouts.app_template')

@section('title', $rezume->specialist->name)

@section('content')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>{{ $rezume->specialist->name }}</h3>
                        <p>{{ $rezume->user->citizen->full_name }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Start Content -->
    <div class="section">
        <div class="container">
            <div class="row">
{{--                <div class="col-lg-4 col-md-4 col-xs-12">--}}
{{--                    <div class="right-sideabr">--}}
{{--                        <h4>Manage Account</h4>--}}
{{--                        <ul class="list-item">--}}
{{--                            <li><a class="active" href="resume.html">My Resume</a></li>--}}
{{--                            <li><a href="bookmarked.html">Bookmarked Jobs</a></li>--}}
{{--                            <li><a href="notifications.html">Notifications <span class="notinumber">2</span></a></li>--}}
{{--                            <li><a href="manage-applications.html">Manage Applications</a></li>--}}
{{--                            <li><a href="job-alerts.html">Job Alerts</a></li>--}}
{{--                            <li><a href="change-password.html">Change Password</a></li>--}}
{{--                            <li><a href="index.html">Sing Out</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <div class="inner-box my-resume">
                        <div class="author-resume">
{{--                            <div class="thumb">--}}
{{--                                <img src="/assets/img/resume/img-1.png" alt="">--}}
{{--                            </div>--}}
{{--                            <div class="author-info">--}}
{{--                                <h3>Mark Anderson</h3>--}}
{{--                                <p class="sub-title">UI/UX Designer</p>--}}
{{--                                <p><span class="address"><i class="lni-map-marker"></i>Mahattan, NYC, USA</span> <span><i class="ti-phone"></i>(+01) 211-123-5678</span></p>--}}
{{--                                <div class="social-link">--}}
{{--                                    <a href="#" class="Twitter"><i class="lni-twitter-filled"></i></a>--}}
{{--                                    <a href="#" class="facebook"><i class="lni-facebook-filled"></i></a>--}}
{{--                                    <a href="#" class="google"><i class="lni-google-plus"></i></a>--}}
{{--                                    <a href="#" class="linkedin"><i class="lni-linkedin-fill"></i></a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
                            <h3>{{ $rezume->user->citizen->full_name }}</h3>
                            <h6><b>{{ $rezume->specialist->name }}</b></h6>
                            <p><span class="address"><i class="lni-map-marker"></i>{{ $rezume->user->citizen->region->name_uz }}, {{ $rezume->user->citizen->city->name_uz }}</span>
                                <br> <span><i class="lni lni-phone"></i> {{ $rezume->user->citizen->phone_number }}</span></p>
{{--                            <div class="social-link">--}}
{{--                                <a href="#" class="Twitter"><i class="lni-twitter-filled"></i></a>--}}
{{--                                <a href="#" class="facebook"><i class="lni-facebook-filled"></i></a>--}}
{{--                                <a href="#" class="google"><i class="lni-google-plus"></i></a>--}}
{{--                                <a href="#" class="linkedin"><i class="lni-linkedin-fill"></i></a>--}}
{{--                            </div>--}}
                        </div>
                        <div class="about-me item">
                            <h3>Kandidat haqida</h3>
                            {!! $rezume->about_me !!}
                        </div>
                        <div class="work-experence item">
                            <h3>Ish tajribasi</h3>
                            @if(sizeof($rezume->workbooks) > 0)
                                @foreach($rezume->workbooks as $workbook)
                                    <h4>{{ $workbook->position_name }}</h4>
                                    <h5>{{ $workbook->old_company_name }}</h5>
                                    <span class="date"><i class="lni lni-calendar"></i> {{ date('d-m-Y', strtotime($workbook->from_date)) }} - {{ date('d-m-Y', strtotime($workbook->to_date)) }}</span>
{{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero vero, dolores, officia quibusdam architecto sapiente eos voluptas odit ab veniam porro quae possimus itaque, quas! Tempora sequi nobis, atque incidunt!</p>--}}
                                    <br>
                                @endforeach
                            @else
                                <div class="alert alert-warning"><i class="lni lni-warning"></i> Ish tajribasi mavjud emas</div>
                            @endif
                        </div>
{{--                        <div class="education item">--}}
{{--                            <h3>Education</h3>--}}
{{--                            <h4>Massachusetts Institute Of Technology</h4>--}}
{{--                            <p>Bachelor of Computer Science</p>--}}
{{--                            <span class="date">2010-2014</span>--}}
{{--                            <br>--}}
{{--                            <h4>Massachusetts Institute Of Technology</h4>--}}
{{--                            <p>Bachelor of Computer Science</p>--}}
{{--                            <span class="date">2010-2014</span>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

@endsection

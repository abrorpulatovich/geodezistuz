@extends('layouts.app_template')
@section('title', 'Yangiliklar')

@section('content')
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>{{ $new->title }}</h3>
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
                <!-- Start Blog Posts -->
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <!-- Start Post -->
                    <div class="blog-post">
                        <!-- Post thumb -->
                        <div class="post-thumb">
                            <a href="#">
                                <img class="img-fluid" src="/storage/uploads/post/medium/{{ $new->image }}" width="100%" alt="{{ $new->title }}">
                            </a>
                            <div class="hover-wrap">
                            </div>
                        </div>
                        <!-- End Post post-thumb -->

                        <!-- Post Content -->
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">{{ $new->title }}</a></h3>
                            <div class="meta">
                                <span class="meta-part"><i class="lni-calendar"></i><a href="#">{{ $new->publish_date }}</a></span>
                                <span class="meta-part"><a href="#"><i class="lni-eye"></i> {{ $new->view_count }}</a></span>
                            </div>
                            <p>{!! $new->desc !!}</p>
                        </div>
                        <!-- Post Content -->
                    </div>
                    <!-- End Post -->
                </div>
                <!-- End Blog Posts -->

                <!--Sidebar-->
                <aside id="sidebar" class="col-lg-4 col-md-12 col-xs-12">
                    <!-- Popular Posts widget -->
                    <div class="widget">
                        <h5 class="widget-title">So'ngi yangiliklar</h5>
                        <div class="widget-popular-posts widget-box">
                            <ul class="posts-list">
                                @foreach($recent_news as $recent_new)
                                    <li>
                                        <div class="widget-content">
                                            <a href="#">{{ $recent_new->title }}</a>
                                            <span><i class="lni-calendar"></i> {{ $recent_new->publish_date }}</span>
                                        </div>
                                        <div class="clearfix"></div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @include('includes.specialists_with_vacancies_count')
                </aside>
                <!--End sidebar-->
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection

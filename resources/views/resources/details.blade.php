@extends('layouts.app_template')
@section('title', $resource->title)

@section('content')
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>{{ $resource->title }}</h3>
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

                        <!-- Post Content -->
                        <div class="post-content">
                            <h3 class="post-title"><a href="#">{{ $resource->title }}</a></h3>
                            <div class="meta">
                                <span class="meta-part"><i class="lni-user"></i><a href="#">{{ $resource->author }}</a></span>
                                <span class="meta-part"><a href="#"><i class="lni-eye"></i> {{ $resource->clicked_count }}</a></span>
                                <span class="meta-part"><a href="#"><i class="lni-calendar"></i> {{ $resource->created_at }}</a></span>
                            </div>
                            <p>{!! $resource->desc !!}</p>
                            <p>
                                <a href="{{ $resource->link }}" class="btn btn-success"><i class="lni lni-arrow-right"></i> Resrus manbaasi</a>
                            </p>
                        </div>
                        <!-- Post Content -->
                    </div>
                    <!-- End Post -->
                </div>
                <!-- End Blog Posts -->

                <!--Sidebar-->
                <aside id="sidebar" class="col-lg-4 col-md-12 col-xs-12">
                    @include('includes.specialists_with_vacancies_count')
                </aside>
                <!--End sidebar-->
            </div>
        </div>
    </div>
    <!-- End Content -->
@endsection

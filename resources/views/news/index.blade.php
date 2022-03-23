@extends('layouts.app_template')
@section('title', 'Yangiliklar')

@section('content')
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Yangiliklar</h3>
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
                @if(sizeof($news) > 0)
                    @foreach($news as $new)
                        <!-- Start Post -->
                        <div class="blog-post">
                        @if($new->image)
                            <!-- Post thumb -->
                            <div class="post-thumb">
                                <a href="{{ route('news_details', ['slug' => $new->slug]) }}">
                                    <img class="img-fluid" src="/storage/uploads/post/medium/{{ $new->image }}" width="100%" alt="{{ $new->title }}">
                                </a>
                                <div class="hover-wrap"></div>
                            </div>
                            <!-- End Post post-thumb -->
                        @endif
                        <!-- Post Content -->
                            <div class="post-content">
                                <h3 class="post-title"><a href="{{ route('news_details', ['slug' => $new->slug]) }}">{{ $new->title }}</a></h3>
                                <div class="meta">
                                    <span class="meta-part"><i class="lni-calendar"></i><a href="#">{{ $new->publish_date }}</a></span>
                                    <span class="meta-part"><a href="#"><i class="lni-eye"></i> {{ $new->view_count }}</a></span>
                                </div>
                                <p>{!! $new->short_desc !!}</p>
                                <a href="{{ route('news_details', ['slug' => $new->slug]) }}" class="btn btn-common">Batafsil</a>
                            </div>
                            <!-- Post Content -->
                        </div>
                        <!-- End Post -->
                        @endforeach
                    @else
                        <div class="alert alert-warning"><i class="lni lni-warning"></i> Yangiliklar topilmadi!!!</div>
                @endif

                <!-- Start Pagination -->
                {{--                    <ul class="pagination">--}}
                {{--                        <li class="active"><a href="#" class="btn-prev" ><i class="lni-angle-left"></i> prev</a></li>--}}
                {{--                        <li><a href="#">1</a></li>--}}
                {{--                        <li><a href="#">2</a></li>--}}
                {{--                        <li><a href="#">3</a></li>--}}
                {{--                        <li><a href="#">4</a></li>--}}
                {{--                        <li><a href="#">5</a></li>--}}
                {{--                        <li class="active"><a href="#" class="btn-next">Next <i class="lni-angle-right"></i></a></li>--}}
                {{--                    </ul>--}}
                <!-- End Pagination -->
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

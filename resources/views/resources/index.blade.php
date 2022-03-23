@extends('layouts.app_template')
@section('title', 'Resruslar')

@section('content')
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3><span class="text-success">{{ $resource_type->name }}</span> bo'yicha resruslar</h3>
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
                @if(sizeof($resources) > 0)
                    @foreach($resources as $resource)
                        <!-- Start Post -->
                            <div class="blog-post">
                                <!-- Post Content -->
                                <div class="post-content">
                                    <h3 class="post-title"><a
                                            href="{{ route('news_details', ['slug' => $resource->slug]) }}">{{ $resource->title }}</a>
                                    </h3>
                                    <div class="meta">
                                        <span class="meta-part"><i class="lni-user"></i><a
                                                href="#">{{ $resource->author }}</a></span>
                                        <span class="meta-part"><a href="#"><i class="lni-eye"></i> {{ $resource->clicked_count }}</a></span>
                                    </div>
                                    <p>{!! substr($resource->desc, 0, 200) !!}...</p>
                                    <a href="{{ route('resource_details', ['slug' => $resource->slug]) }}"
                                       class="btn btn-common"><i class="lni lni-arrow-right"></i> Batafsil</a>
                                </div>
                                <!-- Post Content -->
                            </div>
                            <!-- End Post -->
                        @endforeach
                        {{ $resources->appends(request()->query())->links() }}
                    @else
                        <div class="alert alert-warning"><i class="lni lni-warning"></i> {{ $resource_type->name }}
                            bo'yicha resruslar topilmadi!!!
                        </div>
                    @endif
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

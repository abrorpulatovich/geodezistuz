@extends('layouts.app_template')

@section('title', 'Bosh sahifa')

@section('content')
    <style>
        .hidden {
            display: none;
        }
    </style>
    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <h3>Saytdan qidirish</h3>
                    </div>
                    <div class="job-search-form bg-cyan job-featured-search">
                        <form method="get" action="{{ route('search') }}">
                            <div class="row justify-content-center">
                                <div class="col-lg-8 col-md-8 col-xs-12">
                                    <div class="form-group">
                                        <input class="form-control" name="keyword" id="keyword" type="text" placeholder="Saytdan qidirish..." />
                                        <div class="container">
                                            <br>
                                            <div class="row hidden" id="search_result_box">
                                                <div class="col-md-12" style="max-height: 300px; overflow: scroll;" id="search_res"></div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-1 col-md-1 col-xs-12">
                                    <button type="submit" class="button"><i class="lni-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    @if(sizeof($specialists) > 0)
        <!-- Category Section Start -->
        <section class="category section bg-gray">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Geodeziya tarmoqlari</h2>
                    <p>Geodeziya sohasi bo'yicha mavjud tarmoqlar va ularda mavjud ish o'rinlari soni</p>
                </div>
                <div class="row">
                    @foreach($specialists as $specialist)
                        <div class="col-lg-3 col-md-6 col-xs-12 f-category">
                            <a href="{{ route('vacancies', ['id' => $specialist->id]) }}">
                                <div class="icon {{ $specialist->color }}">
                                    <i class="{{ $specialist->icon }}"></i>
                                </div>
                                <h3>{{ $specialist->name }}</h3>
                                <p>({{ sizeof($specialist->vacancies) }} ta ish o'rinlari mavjud)</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Category Section End -->
    @endif
    <!-- Browse jobs Section Start -->
    <div id="browse-jobs" class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="text-wrapper">
                        <div>
                            <h3>{{ $vacancies_count }}+ dan ortiq vakantlar</h3>
                            <p>Geodezist.uz barcha Geodeziya sohasiga oid bo'sh ish o'rinlarini o'zida qamrab oluvchi onlayn manbaa hisoblanadi.</p>
                            <a class="btn btn-common" href="{{ route('vacancies') }}"><i class="lni lni-arrow-right"></i> Barcha vakantlar</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <div class="img-thumb">
                        <img class="img-fluid" src="assets/img/search.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Browse jobs Section End -->

    @if(sizeof($rezumes) > 0)
        <!-- Latest Section Start -->
        <section id="latest-jobs" class="section bg-gray">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Eng so'nggi rezumelar</h2>
    {{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et <br> metus--}}
    {{--                    effici turac fringilla lorem facilisis.</p>--}}
                </div>
                <div class="row">
                    @foreach($rezumes as $rezume)
                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="jobs-latest">
                                <div class="img-thumb">
                                    <img src="/assets/img/features/img2.png" alt="">
                                </div>
                                <div class="content">
                                    <h3><a href="{{ route('rezume_details', ['rezume' => $rezume]) }}">{{ $rezume->name }}</a></h3>
                                    <p class="brand">{{ $rezume->user->citizen->full_name }}</p>
                                    <div class="tags">
                                        <span><i class="lni-map-marker"></i> {{ $rezume->user->citizen->region->name_uz }}, {{ $rezume->user->citizen->city->name_uz }}</span>
                                        <br>
                                        <span><i class="lni-user"></i>John Smith</span>
                                    </div>
                                    <span class="full-time"><i class="lni lni-arrow-right"></i> Batafsil</span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Latest Section End -->
    @endif

    @if(sizeof($latest_news) > 0)
        <!-- Blog Section -->
        <section id="blog" class="section">
            <!-- Container Starts -->
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">So'ngi yangiliklar</h2>
    {{--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et <br> metus effici turac fringilla lorem facilisis.</p>--}}
                </div>
                <div class="row">
                    @foreach($latest_news as $new)
                        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
                            <!-- Blog Item Starts -->
                            <div class="blog-item-wrapper">
                                <div class="blog-item-img">
                                    <a href="{{ route('news_details', ['slug' => $new->slug]) }}">
                                        <img class="img-fluid" src="/storage/uploads/post/medium/{{ $new->image }}" width="100%" alt="{{ $new->title }}">
                                    </a>
                                </div>
                                <div class="blog-item-text">
                                    <h3><a href="{{ route('news_details', ['slug' => $new->slug]) }}">{{ $new->title }}</a>
                                    </h3>
                                    <p>{!! $new->short_desc !!}</p>
                                </div>
                                <a href="{{ route('news_details', ['slug' => $new->slug]) }}" class="readmore">Batafsil</a>
                            </div>
                            <!-- Blog Item Wrapper Ends-->
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- blog Section End -->
    @endif

    <script src="/js/jquery-3.6.0.min.js"></script>
    <script>

        var keyword = $('#keyword').val();
        if (keyword.length === 0) {
            $('#search_result_box').addClass('hidden');
            $('#search_res').html('');
        }

        $('#keyword').on('keyup', function () {
            var keyword = $(this).val();

            if (keyword.length >= 3) {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('search_by_keyword') }}",
                    data: {keyword: keyword},
                    success: function (data) {
                        if(data.success === false) {
                            var response = "<div class='alert alert-warning'><i class='lni lni-warning'></i>" + data.message + "</div>";
                        } else {
                            var result_html = '<ul class="list-group">';
                            data.result_data.forEach((item, index) => {
                                result_html += '<li class="list-group-item d-flex justify-content-between align-items-center">';
                                if (item.key === 'Vakant') {
                                    var link = "/vacancy/" + item.id + "/details";
                                    result_html += "<a href='"+ link + "'>" + item.result + "</a>";
                                } else if (item.key === 'Rezume') {
                                    var link = "/rezumes/" + item.id + "/details";
                                    result_html += "<a href='"+ link + "'>" + item.result + "</a>";
                                } else if (item.key === 'Yangilik') {
                                    var link = "/news/" + item.slug + "/details";
                                    result_html += "<a href='"+ link + "'>" + item.result + "</a>";
                                }
                                result_html += '<span class="badge badge-primary badge-pill">';
                                result_html += item.key;
                                result_html += '</span>';
                                result_html += '</li>';
                            });
                            result_html += '</ul>';
                            response = result_html;
                        }
                        $('#search_result_box').removeClass('hidden');
                        $('#search_res').html(response);
                    }
                });
            } else if(keyword.length == 0) {
                $('#search_result_box').addClass('hidden');
                $('#search_res').html('');
            }
        });
    </script>
@endsection

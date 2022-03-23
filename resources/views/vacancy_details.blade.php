@extends('layouts.app_template')

@section('title', $vacancy->name)

@section('content')

    <!-- Page Header Start -->
    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-xs-12">
                    <div class="breadcrumb-wrapper">
                        <div class="img-wrapper">
                            <img src="/assets/img/about/company-logo.png" alt="">
                        </div>
                        <div class="content">
                            <h3 class="product-title">{{ $vacancy->name }}</h3>
                            <p class="brand"><b><i class="lni lni-home"></i> {{ $vacancy->company->company_name }}</b></p>
                            <div class="tags">
                                <span><i class="lni-map-marker"></i> {{ $vacancy->company->region->name_uz }}, {{ $vacancy->company->city->name_uz }}</span>
                                <br>
                                <span><i class="lni-calendar"></i> {{ $vacancy->created_at }}</span>
                                <br>
                                <span><i class="lni-eye"></i> {{ $vacancy->view_count }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-xs-12">
                    <div class="month-price">
                        <span class="year">Kutilayotgan maosh</span>
                        <div class="price">
                            {{ ($vacancy->salary_hidden == 1)? 'Kelishilgan holda': $vacancy->salary }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Job Detail Section Start -->
    <section class="job-detail section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-8 col-md-12 col-xs-12">
                    <div class="content-area">
                        {!! $vacancy->desc !!}
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-xs-12">
                    @include('includes.specialists_with_vacancies_count')
                </div>
            </div>
        </div>
    </section>
    <!-- Job Detail Section End -->

@endsection

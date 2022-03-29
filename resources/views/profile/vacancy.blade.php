@extends('layouts.app_template')

@section('title', $vacancy->name)

@section('content')

    <!-- Start Content -->
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12">
                    @include('includes.company_profile_leftside')
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12">
                    @if(session()->has('saved_successfully'))
                        <div class="alert alert-success"><i class="lni lni-check-mark-circle"></i> {{ session()->get('saved_successfully') }}</div>
                    @endif
                    <table class="table table-bordered">
                        <tr>
                            <th><b>Nomi</b></th>
                            <td>{{ $vacancy->name }}</td>
                        </tr>
                        <tr>
                            <th><b>Oylik maosh (so‘m)</b></th>
                            <td>{{ ($vacancy->salary_hidden == 1)? 'Kelishilgan holda': $vacancy->salary }}</td>
                        </tr>
                        <tr>
                            <th><b>Holati</b></th>
                            <td>{!! $vacancy->getStatus() !!}</td>
                        </tr>
                        <tr>
                            <th><b>Yaratilgan sana</b></th>
                            <td>{{ $vacancy->created_at }}</td>
                        </tr>
                        <tr>
                            <th><b>Mutaxassislik</b></th>
                            <td>{{ $vacancy->specialist->name }}</td>
                        </tr>
                        <tr>
                            <th><b>Mehnat stajini tanlang</b></th>
                            <td>{{ $vacancy->vskill->name }}</td>
                        </tr>
                        <tr>
                            <th><b>Vakant haqida (To'liq matn)</b></th>
                            <td>{!! $vacancy->desc !!}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

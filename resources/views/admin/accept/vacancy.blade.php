@extends('layouts.app')

@section('title', $vacancy->name)

@section('content')
    <!-- Start Content -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>{{ __('Tasdiqlanishi kutilayotgan vakantlar') }}</b>
                            </div>
                            <div class="col-md-6 text-right">
                                @if($vacancy->is_active == 0)
                                    <a href="{{ route('admin.accept_vacancy', ['vacancy' => $vacancy]) }}" class="btn btn-primary btn-sm"><i class="lni lni-check-mark-circle"></i> Vakantni tasdiqlash(faollashtirish)</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        @if(session()->has('vacancy_accepted_successfully'))
                            <div class="alert alert-success"><i class="lni lni-check-mark-circle"></i> {{ session()->get('vacancy_accepted_successfully') }}</div>
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
    </div>
@endsection

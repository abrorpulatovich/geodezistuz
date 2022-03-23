@extends('layouts.app_template')

@section('title', $company->company_name)

@section('content')
    <!-- Start Content -->
    <div id="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-xs-12">
                    @include('includes.company_profile_leftside')
                </div>
                <div class="col-lg-9 col-md-12 col-xs-12">
                    @if(session()->has('vacancy_added_successfully'))
                        <div class="alert alert-success"><i class="lni lni-check-mark-circle"></i> {{ session()->get('vacancy_added_successfully') }}</div>
                    @endif
                    @if(sizeof($vacancies) > 0)
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>Nomi</b></th>
                                    <th><b>Oylik maosh (so‘m)</b></th>
                                    <th><b>Holati</b></th>
                                    <th><b>Yaratilgan sana</b></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($vacancies as $vacancy)
                                    <tr>
                                        <td>{{ ++$loop->index }}</td>
                                        <td>{{ $vacancy->name }}</td>
                                        <td>{{ ($vacancy->salary_hidden == 1)? 'Kelishilgan holda': $vacancy->salary }}</td>
                                        <td>{!! $vacancy->getStatus() !!}</td>
                                        <td>{{ $vacancy->created_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('vacancy.show', ['vacancy' => $vacancy]) }}" class="btn btn-common"><i class="lni lni-eye"></i> Batafsil</a>
                                                <a href="{{ route('vacancy.edit', ['vacancy' => $vacancy]) }}" class="btn btn-primary btn-sm"><i class="lni lni-pencil"> Tahrirlash</i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-danger"><i class="lni lni-warning"></i> Sizda vakantlar yo'q</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

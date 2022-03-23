@extends('layouts.app')

@section('title', 'Tasdiqlanishi kutilayotgan vakantlar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tasdiqlanishi kutilayotgan vakantlar') }}</div>
                    <div class="card-body">
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
                                                <a href="{{ route('admin.acceptable_vacancy', ['vacancy' => $vacancy]) }}" class="btn btn-primary"><i class="lni lni-eye"></i> Batafsil</a>
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
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Vakansiyalar ro‘yhati') }}</div>
                    <div class="card-body">
                        @if(Auth::user()->status == 2) 
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <a href="{{ route('vacancies.create') }}"><button class="btn btn-success" type="button"><i class="bi bi-plus-lg"></i> Vakansiya qo‘shish</button></a>
                            </div>
                        @endif
                        <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>T/R</th>
                                        <th>Korxona INN</th>
                                        <th>Korxona nomi</th>
                                        <th>F.I.O</th>
                                        <th>Telefon raqam</th>
                                        <th>Mavjud vakansiya</th>
                                        <th>Mehnat staji</th>
                                        <th>Oylik</th>
                                        <th>Qo‘shilgan sana</th>
                                        <th>Holati</th>
                                        <th>Amallar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($vacancies as $vacancy)
                                        <tr>
                                            <td>{{ ($vacancies->currentpage()-1)*$vacancies->perpage() + $loop->index+1 }}</td>
                                            <td>{{ $vacancy->company_inn }} </td>
                                            <td>{{ $vacancy::company($vacancy->company_inn)->company_name }} </td>
                                            <td>{{ $vacancy::company($vacancy->company_inn)->full_name }} </td>
                                            <td>{{ $vacancy::company($vacancy->company_inn)->company_phone_number }} </td>
                                            <td>{{ $vacancy::specialist($vacancy->specialist_id)->name }} </td>
                                            <td>{{ $vacancy::skill($vacancy->skill)->name }} </td>
                                            <td>
                                                @if($vacancy->salary_hidden)
                                                    Ko‘rsatilmagan 
                                                @else
                                                    {{ $vacancy->salary }} so‘m
                                                @endif
                                            </td>
                                            <td>{{ date("d.m.Y", strtotime($vacancy->created_at)) }}</td>
                                            <td>
                                                @if($vacancy->status == 1)
                                                    Yangi 
                                                @elseif($vacancy->status == 2)
                                                    Tasdiqlangan
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('vacancies.show', ['vacancy' => $vacancy->id]) }}"><i class="bi bi-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $vacancies->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Vakansiyalar ro‘yhati') }}</div>
                    <div class="card-body">
                        @if(Auth::user()->status == 2) 
                            <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
                            @if($company_status == 2)
                                <a href="{{ route('vacancies.create') }}"><button class="btn btn-success" type="button"><i class="bi bi-plus-lg"></i> Vakansiya qo‘shish</button></a>
                            @endif                                
                                <a href="{{ route('companies.show', ['company' => $company_id]) }}"><button class="btn btn-info" type="button"><i class="bi bi-info-circle"></i> Korxona ma‘lumotlari</button></a>
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
                                @if(count($vacancies) > 0)

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
                                                @if($vacancy->is_published == 0)
                                                    <span class="badge bg-danger text-wrap">Tasdiqlanmagan</span> 
                                                @elseif($vacancy->is_published == 1)
                                                    <span class="badge bg-success text-wrap">Tasdiqlangan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                        <a href="{{ route('vacancies.show', ['vacancy' => $vacancy->id]) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                    @if(Auth::user()->status == 2)
                                                        <a href="{{ route('vacancies.edit', ['vacancy' => $vacancy->id]) }}" class="btn btn-success" style="margin-left:4px"><i class="bi bi-pencil"></i></a>
                                                    @endif
                                                        <form action="{{ route('vacancies.destroy', ['vacancy' => $vacancy->id]) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" style="margin-left:4px;" class="btn btn-danger" onclick="return confirm('Haqiqatdan ham ushbu vakansiyani o‘chirmoqchimisiz?')"><i class="bi bi-trash"></i></button>
                                                        </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <span class="text-center fst-italic">Ma‘lumot yo‘q</span>
                                @endif
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

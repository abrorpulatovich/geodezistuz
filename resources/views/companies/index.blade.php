@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Korxonalar ro‘yhati') }}</div>
                    <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>T/R</th>
                                        <th>Korxona INN</th>
                                        <th>Korxona nomi</th>
                                        <th>Korxona rahbari ismi</th>
                                        <th>Telefon raqam</th>
                                        <th>Qo‘shilgan sana</th>
                                        <th>Holati</th>
                                        <th>Amallar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($companies) > 0)

                                    @foreach($companies as $company)
                                        <tr>
                                            <td>{{ ($companies->currentpage()-1)*$companies->perpage() + $loop->index+1 }}</td>
                                            <td>{{ $company->company_inn }} </td>
                                            <td>{{ $company->company_name }} </td>
                                            <td>{{ $company->full_name }} </td>
                                            <td>{{ $company->company_phone_number }} </td>
                                            <td>{{ date("d.m.Y", strtotime($company->created_at)) }}</td>
                                            <td>
                                                @if($company->status == 1)
                                                    Yangi
                                                @elseif($company->status == 2)
                                                    Tasdiqlangan
                                                @elseif($company->status == 3)
                                                    Vaqtinchalik bloklangan
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('companies.show', ['company' => $company->id]) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                    <form action="{{ route('companies.destroy', ['company' => $company->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="margin-left:4px;" class="btn btn-danger" onclick="return confirm('Haqiqatdan ham ushbu korxonani o‘chirmoqchimisiz?')"><i class="bi bi-trash"></i></button>
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
                            {{ $companies->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

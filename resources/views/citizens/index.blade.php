@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Fuqarolar ro‘yhati') }}</div>
                    <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>T/R</th>
                                        <th>Passport</th>
                                        <th>F.I.O</th>
                                        <th>Telefon raqam</th>
                                        <th>Qo‘shilgan sana</th>
                                        <th>Holati</th>
                                        <th>Amallar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($citizens) > 0)

                                    @foreach($citizens as $citizen)
                                        <tr>
                                            <td>{{ ($citizens->currentpage()-1)*$citizens->perpage() + $loop->index+1 }}</td>
                                            <td>{{ $citizen->passport }} </td>
                                            <td>{{ $citizen->full_name }} </td>
                                            <td>{{ $citizen->phone_number }} </td>
                                            <td>{{ date("d.m.Y", strtotime($citizen->created_at)) }}</td>
                                            <td>
                                                @if($citizen->status == 1)
                                                    <span class="badge bg-warning text-wrap">Yangi</span>
                                                @elseif($citizen->status == 2)
                                                    <span class="badge bg-success text-wrap">Tasdiqlangan</span>
                                                @elseif($citizen->status == 3)
                                                    <span class="badge bg-danger text-wrap">Bloklangan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('citizens.show', ['citizen' => $citizen->id]) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                    <form action="{{ route('citizens.destroy', ['citizen' => $citizen->id]) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" style="margin-left:4px;" class="btn btn-danger" onclick="return confirm('Haqiqatdan ham ushbu fuqaroni o‘chirmoqchimisiz?')"><i class="bi bi-trash"></i></button>
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
                            {{ $citizens->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Rezumelar ro‘yhati') }}</div>
                    <div class="card-body">
                        @if(Auth::user()->status == 1) 
                            <div class="btn-group d-grid gap-2 d-md-flex justify-content-md-end">
                            @if($citizen_status == 2)
                                <a href="{{ route('rezumes.create') }}"><button class="btn btn-success" type="button"><i class="bi bi-plus-lg"></i> Rezume qo‘shish</button></a>
                            @endif                                
                                <a href="{{ route('citizens.show', ['citizen' => $citizen_id]) }}"><button class="btn btn-info" type="button"><i class="bi bi-info-circle"></i> Fuqaro ma‘lumotlari</button></a>
                            </div>
                        @endif
                        <br>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>T/R</th>
                                        <th>Passport</th>
                                        <th>F.I.O</th>
                                        <th>Telefon raqam</th>
                                        <th>Tug‘ilgan sana</th>
                                        <th>Soha</th>
                                        <th>Mehnat staji</th>
                                        <th>Oylik</th>
                                        <th>Qo‘shilgan sana</th>
                                        <th>Holati</th>
                                        <th>Amallar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @if(count($rezumes) > 0)

                                    @foreach($rezumes as $rezume)
                                        <tr>
                                            <td>{{ ($rezumes->currentpage()-1)*$rezumes->perpage() + $loop->index+1 }}</td>
                                            <td>{{ $rezume->passport }} </td>
                                            <td>{{ $rezume::citizen($rezume->passport)->full_name }} </td>
                                            <td>{{ $rezume::citizen($rezume->passport)->phone_number }} </td>
                                            <td>{{ date("d.m.Y", strtotime($rezume::citizen($rezume->passport)->birth_date)) }} </td>
                                            <td>{{ $rezume::specialist($rezume->specialist_id)->name }} </td>
                                            <td>{{ $rezume::skill($rezume->skill)->name }} </td>
                                            <td>
                                                @if($rezume->salary_hidden)
                                                    Ko‘rsatilmagan 
                                                @else
                                                    {{ $rezume->salary }} so‘m
                                                @endif
                                            </td>
                                            <td>{{ date("d.m.Y", strtotime($rezume->created_at)) }}</td>
                                            <td>
                                                @if($rezume->is_published == 0)
                                                    <span class="badge bg-danger text-wrap">Tasdiqlanmagan</span> 
                                                @elseif($rezume->is_published == 1)
                                                    <span class="badge bg-success text-wrap">Tasdiqlangan</span>
                                                @elseif($rezume->is_published == 2)
                                                    <span class="badge bg-danger text-wrap">Bloklangan</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                        <a href="{{ route('rezumes.show', ['rezume' => $rezume->id]) }}" class="btn btn-info"><i class="bi bi-eye"></i></a>
                                                    @if(Auth::user()->status == 2)
                                                        <a href="{{ route('rezumes.edit', ['rezume' => $rezume->id]) }}" class="btn btn-success" style="margin-left:4px"><i class="bi bi-pencil"></i></a>
                                                    @endif
                                                        <form action="{{ route('rezumes.destroy', ['rezume' => $rezume->id]) }}" method="POST">
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
                            {{ $rezumes->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.app')

@section('title', 'Xabarlar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Xabarlar</div>
                    <div class="card-body">
                        @if(sizeof($messages) > 0)
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>FIO</b></th>
                                        <th><b>Telefon</b></th>
                                        <th><b>Mavzu</b></th>
                                        <th><b>Jo'natilgan vaqti</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($messages as $message)
                                        <tr class="@if(!$message->is_read) bg-warning @endif">
                                            <td>{{ ++$loop->index }}</td>
                                            <td>{{ $message->fio }}</td>
                                            <td>{{ $message->phone }}</td>
                                            <td>{{ $message->subject }}</td>
                                            <td>{{ date('d-m-Y H:i:s', strtotime($message->created_at)) }}</td>
                                            <td>
                                                <a href="{{ route('admin.message_details', ['id' => $message->id]) }}" class="btn btn-primary"><i class="lni lni-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{ $messages->appends(request()->query())->links() }}
                        @else
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Xabarlar yo'q</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

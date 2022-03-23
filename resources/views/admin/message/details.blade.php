@extends('layouts.app')

@section('title', $message->subject)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>{{ $message->fio }}</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('admin.messages') }}" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Xabarlarga qaytish</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th><b>FIO</b></th>
                                <td>{{ $message->fio }}</td>
                            </tr>
                            <tr>
                                <th><b>Telefon</b></th>
                                <td>{{ $message->phone }}</td>
                            </tr>
                            <tr>
                                <th><b>Mavzu</b></th>
                                <td>{{ $message->subject }}</td>
                            </tr>
                            <tr>
                                <th><b>Jo'natilgan vaqti</b></th>
                                <td>{{ date('d-m-Y H:i:s', strtotime($message->created_at)) }}</td>
                            </tr>
                            <tr>
                                <th><b>Xabar</b></th>
                                <td>{{ $message->message }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

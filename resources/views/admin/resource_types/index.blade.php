@extends('layouts.app')

@section('title', 'Resurs turlari')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>{{ __('Resurs turlari') }}</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('resource_type.create') }}" class="btn btn-primary btn-sm"><i class="lni lni-plus"></i> Qo'shish</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session()->has('deleted_successfully'))
                            <p class="alert alert-success"><i class="lni lni-warning"></i> {{ session()->get('deleted_successfully') }}</p>
                        @endif
                        @if(sizeof($resource_types))
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Nomi</b></th>
                                        <th><b>Tartibi</b></th>
                                        <th><b>Holati</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($resource_types as $resource_type)
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td>{{ $resource_type->name }}</td>
                                            <td>{{ $resource_type->r_order }}</td>
                                            <td>{{ $resource_type->get_statuses()[$resource_type->status] }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="btn-group">
                                                            <a href="{{ route('resource_type.show', ['resource_type' => $resource_type]) }}" class="btn btn-primary btn-sm"><i class="lni lni-eye"></i></a>
                                                            <a href="{{ route('resource_type.edit', ['resource_type' => $resource_type]) }}" class="btn btn-secondary btn-sm"><i class="lni lni-pencil"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{ $resource_types->appends(request()->query())->links() }}
                        @else
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Resurs turlari yo'q</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

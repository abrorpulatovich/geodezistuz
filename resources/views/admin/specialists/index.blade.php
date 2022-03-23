@extends('layouts.app')

@section('title', 'Mutaxassisliklar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>{{ __('Mutaxassisliklar') }}</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('specialist.create') }}" class="btn btn-primary btn-sm"><i class="lni lni-plus"></i> Qo'shish</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session()->has('deleted_successfully'))
                            <p class="alert alert-success"><i class="lni lni-warning"></i> {{ session()->get('deleted_successfully') }}</p>
                        @endif
                        @if(sizeof($specialists))
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Nomi</b></th>
                                        <th><b>Holati</b></th>
                                        <th><b>Tartibi</b></th>
                                        <th><b>Slug(URL manzilida ko'rishi)</b></th>
                                        <th><b>Ikonka</b></th>
                                        <th><b>Rang</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($specialists as $specialist)
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td>{{ $specialist->name }}</td>
                                            <td>{{ $specialist->get_status()[$specialist->status] }}</td>
                                            <td>{{ $specialist->s_order }}</td>
                                            <td>{{ $specialist->slug }}</td>
                                            <td>{{ $specialist->icon }}</td>
                                            <td>{{ $specialist->color }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="btn-group">
                                                            <a href="{{ route('specialist.show', ['specialist' => $specialist]) }}" class="btn btn-primary btn-sm"><i class="lni lni-eye"></i></a>
                                                            <a href="{{ route('specialist.edit', ['specialist' => $specialist]) }}" class="btn btn-secondary btn-sm"><i class="lni lni-pencil"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{ $specialists->appends(request()->query())->links() }}
                        @else
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Mutaxassisliklar yo'q</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

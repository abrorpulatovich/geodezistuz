@extends('layouts.app')

@section('title', 'Yangiliklar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>{{ __('Yangiliklar') }}</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('post.create') }}" class="btn btn-primary btn-sm"><i class="lni lni-plus"></i> Qo'shish</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session()->has('deleted_successfully'))
                            <p class="alert alert-success"><i class="lni lni-warning"></i> {{ session()->get('deleted_successfully') }}</p>
                        @endif
                        @if(sizeof($posts))
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th><b>#</b></th>
                                        <th><b>Sarlavha</b></th>
                                        <th><b>Sana</b></th>
                                        <th><b>Holati</b></th>
                                        <th><b>Tartibi</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($posts as $post)
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->publish_date }}</td>
                                            <td>{{ $post->get_status()[$post->status] }}</td>
                                            <td>{{ $post->p_order }}</td>
                                            <td>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="btn-group">
                                                            <a href="{{ route('post.show', ['post' => $post]) }}" class="btn btn-primary btn-sm"><i class="lni lni-eye"></i></a>
                                                            <a href="{{ route('post.edit', ['post' => $post]) }}" class="btn btn-secondary btn-sm"><i class="lni lni-pencil"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{ $posts->appends(request()->query())->links() }}
                        @else
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Yangiliklar yo'q</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

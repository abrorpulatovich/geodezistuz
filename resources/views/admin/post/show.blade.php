@extends('layouts.app')

@section('title', $post->title)

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>{{ $post->title }}</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                    <a href="{{ route('post.index') }}" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Yangiliklar</a>
                                    <a href="{{ route('post.edit', ['post' => $post]) }}" class="btn btn-success btn-sm"><i class="lni lni-pencil"></i> Tahrirlash</a>
                                    <form action="{{ route('post.destroy', ['post' => $post]) }}" method="POST" id="delete-form" onsubmit="return confirm('Ishonchingiz komilmi? Siz rostdan ham ushbu yangilikni o\'chirishni xoxlaysizmi?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger" style="border-bottom-left-radius: 0; border-top-left-radius: 0;"><i class="lni lni-trash"></i> O'chirish</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session()->has('saved_successfully'))
                            <p class="alert alert-success">{{ session()->get('saved_successfully') }}</p>
                        @endif
                        <table class="table table-bordered">
                            <tr>
                                <th><b>Sarlavha</b></th>
                                <td>{{ $post->title }}</td>
                            </tr>
                            <tr>
                                <th><b>Holadi</b></th>
                                <td>{{ $post->get_status()[$post->status] }}</td>
                            </tr>
                            <tr>
                                <th><b>Qisqacha matn</b></th>
                                <td>{!! $post->short_desc !!}</td>
                            </tr>
                            <tr>
                                <th><b>To'liq matn</b></th>
                                <td>{!! $post->desc !!}</td>
                            </tr>
                            <tr>
                                <th><b>Tartibi</b></th>
                                <td>{{ $post->p_order }}</td>
                            </tr>
                            <tr>
                                <th><b>Sanasi</b></th>
                                <td>{{ $post->publish_date }}</td>
                            </tr>
                            <tr>
                                <th><b>URL manzilida ko'rishi</b></th>
                                <td>{{ $post->slug }}</td>
                            </tr>
                            @if($post->image)
                                <tr>
                                    <th><b>Rasm</b></th>
                                    <td><img src="/storage/uploads/post/medium/{{ $post->image }}" width="800" alt="{{ $post->title }}"></td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

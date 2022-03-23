@extends('layouts.app')

@section('title', $resource->title)

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>{{ $resource->title }}</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <div class="btn-group">
                                    <a href="{{ route('resource.index') }}" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Resurslar</a>
                                    <a href="{{ route('resource.edit', ['resource' => $resource]) }}" class="btn btn-success btn-sm"><i class="lni lni-pencil"></i> Tahrirlash</a>
                                    <form action="{{ route('resource.destroy', ['resource' => $resource]) }}" method="POST" id="delete-form" onsubmit="return confirm('Ishonchingiz komilmi? Siz rostdan ham ushbu resrusni o\'chirishni xoxlaysizmi?')">
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
                                <td>{{ $resource->title }}</td>
                            </tr>
                            <tr>
                                <th><b>Muallif</b></th>
                                <td>{{ $resource->author }}</td>
                            </tr>
                            <tr>
                                <th><b>Link</b></th>
                                <td><a href="{{ $resource->link }}" target="_blank">Link</a></td>
                            </tr>
                            <tr>
                                <th><b>Holadi</b></th>
                                <td>{{ $resource->get_statuses()[$resource->status] }}</td>
                            </tr>
                            <tr>
                                <th><b>Tartibi</b></th>
                                <td>{{ $resource->r_order }}</td>
                            </tr>
                            <tr>
                                <th><b>URL manzilida ko'rishi</b></th>
                                <td>{{ $resource->slug }}</td>
                            </tr>
                            <tr>
                                <th><b>To'liq matn</b></th>
                                <td>{!! $resource->desc !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

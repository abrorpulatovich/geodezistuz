@extends('layouts.app')

@section('name', $specialist->name)

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <b>{{ $specialist->name }}</b>
                            </div>
                            <div class="col-md-8 text-right">
                                <div class="btn-group">
                                    <a href="{{ route('specialist.index') }}" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Mutaxassisliklar</a>
                                    <a href="{{ route('specialist.edit', ['specialist' => $specialist]) }}" class="btn btn-success btn-sm"><i class="lni lni-pencil"></i> Tahrirlash</a>
                                    <form action="{{ route('specialist.destroy', ['specialist' => $specialist]) }}" method="POST" id="delete-form" onsubmit="return confirm('Ishonchingiz komilmi? Siz rostdan ham ushbu yangilikni o\'chirishni xoxlaysizmi?')">
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
                                <th><b>Nomi</b></th>
                                <td>{{ $specialist->name }}</td>
                            </tr>
                            <tr>
                                <th><b>Tartibi</b></th>
                                <td>{{ $specialist->s_order }}</td>
                            </tr>
                            <tr>
                                <th><b>Holati</b></th>
                                <td>{{ $specialist->get_status()[$specialist->status] }}</td>
                            </tr>
                            <tr>
                                <th><b>Slug(URL manzilida ko'rishi)</b></th>
                                <td>{{ $specialist->slug }}</td>
                            </tr>
                            <tr>
                                <th><b>Ikonka</b></th>
                                <td>{{ $specialist->icon }}</td>
                            </tr>
                            <tr>
                                <th><b>Rang</b></th>
                                <td>{{ $specialist->color }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@extends('layouts.app')

@section('title', 'Tasdiqlanishi kutilayotgan rezumelar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Tasdiqlanishi kutilayotgan rezumelar') }}</div>
                    <div class="card-body">
                        @if(sizeof($rezumes) > 0)
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>FIO</b></th>
                                    <th><b>Mutaxasislik</b></th>
                                    <th><b>Holati</b></th>
                                    <th><b>Joylashuv</b></th>
                                    <th><b>Yaratilgan sana</b></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rezumes as $rezume)
                                    <tr>
                                        <td>{{ ++$loop->index }}</td>
                                        <td>{{ $rezume->user->citizen->full_name }}</td>
                                        <td>{{ $rezume->specialist->name }}</td>
                                        <td>{!! $rezume->getStatus() !!}</td>
                                        <td>{{ $rezume->user->citizen->region->name_uz }}, {{ $rezume->user->citizen->city->name_uz }}</td>
                                        <td>{{ $rezume->created_at }}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.acceptable_rezume', ['rezume' => $rezume]) }}" class="btn btn-primary"><i class="lni lni-eye"></i> Batafsil</a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Sizda rezumelar yo'q</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

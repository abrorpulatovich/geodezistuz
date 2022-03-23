@extends('layouts.app')

@section('title', 'Foydalanuvchilar')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <b>{{ __('Foydalanuvchilar') }}</b>
                    </div>
                    <div class="card-body">
                        @if(session()->has('deleted_successfully'))
                            <p class="alert alert-success"><i class="lni lni-warning"></i> {{ session()->get('deleted_successfully') }}</p>
                        @endif
                        @if(session()->has('accepted_successfully'))
                            <p class="alert alert-success"><i class="lni lni-warning"></i> {{ session()->get('accepted_successfully') }}</p>
                        @endif
                        @if(session()->has('changed_to_moderator_successfully'))
                            <p class="alert alert-success"><i class="lni lni-warning"></i> {{ session()->get('changed_to_moderator_successfully') }}</p>
                        @endif
                        @if(session()->has('changed_to_citizen_successfully'))
                            <p class="alert alert-success"><i class="lni lni-warning"></i> {{ session()->get('changed_to_citizen_successfully') }}</p>
                        @endif
                        @if(sizeof($users))
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th><b>#</b></th>
                                    <th><b>FIO</b></th>
                                    <th><b>Roli</b></th>
                                    <th><b>Login</b></th>
                                    <th><b>Parol</b></th>
                                    <th><b>Rezume/Vakant qo'sha oladimi?</b></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ ++$loop->index }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{!! $user->getRole() !!}</td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->password_text }}</td>
                                        <td class="text-center">{!! $user->getCanDo() !!}</td>
                                        <td>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.user_info', ['user' => $user]) }}" class="btn btn-primary btn-sm"><i class="lni lni-eye"></i> Batafsil</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <br>
                            {{ $users->appends(request()->query())->links() }}
                        @else
                            <div class="alert alert-danger"><i class="lni lni-warning"></i> Foydalanuvchilar yo'q</div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

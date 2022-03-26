@extends('layouts.app')

@section('title', $rezume->specialist->name)

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                {{ $rezume->specialist->name }} ({{ $rezume->user->citizen->full_name }})
                            </div>
                            <div class="col-md-8 text-right">
                                <div class="btn-group">
                                    <a href="{{ route('admin.acceptable_rezumes') }}" class="btn btn-primary"><i class="lni lni-arrow-right"></i> Tasdiqlanishi kutilayotgan rezumelar</a>
                                    @if($rezume->is_active == 1)
                                        <a href="{{ route('admin.accept_rezume', ['rezume' => $rezume]) }}" class="btn btn-success btn-sm"><i class="lni lni-check-mark-circle"></i> Rezumeni tasdiqlash(faollashtirish)</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @if(session()->has('rezume_accepted_successfully'))
                            <div class="alert alert-success"><i class="lni lni-check-mark-circle"></i> {{ session()->get('rezume_accepted_successfully') }}</div>
                        @endif

                        <table class="table table-bordered">
                            <tr>
                                <th><b>FIO</b></th>
                                <td>{{ $rezume->user->citizen->full_name }}</td>
                            </tr>
                            <tr>
                                <th><b>Mutaxassislik</b></th>
                                <td>{{ $rezume->specialist->name }}</td>
                            </tr>
                            <tr>
                                <th><b>Joylashuv</b></th>
                                <td>{{ $rezume->user->citizen->region->name_uz }}, {{ $rezume->user->citizen->city->name_uz }}</td>
                            </tr>
                            <tr>
                                <th><b>Telefon nomer</b></th>
                                <td>{{ $rezume->user->citizen->phone_number }}</td>
                            </tr>
                            <tr>
                                <th><b>Holati</b></th>
                                <td>{!! $rezume->getStatus() !!}</td>
                            </tr>
                            <tr>
                                <th><b>Kandidat haqida</b></th>
                                <td>{!! $rezume->about_me !!}</td>
                            </tr>
                            <tr>
                                <th><b>Ish tajribasi</b></th>
                                <td>
                                    @if(sizeof($rezume->workbooks) > 0)
                                        @foreach($rezume->workbooks as $workbook)
                                            <h4>{{ $workbook->position_name }}</h4>
                                            <h6>{{ $workbook->old_company_name }}</h6>
                                            <span class="date"><i class="lni lni-calendar"></i> {{ date('d.m.Y', strtotime($workbook->from_date)) }} - {{ date('d.m.Y', strtotime($workbook->to_date)) }}</span>
                                            {{--                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero vero, dolores, officia quibusdam architecto sapiente eos voluptas odit ab veniam porro quae possimus itaque, quas! Tempora sequi nobis, atque incidunt!</p>--}}
                                            <br>
                                        @endforeach
                                    @else
                                        <div class="alert alert-warning"><i class="lni lni-warning"></i> Ish tajribasi mavjud emas</div>
                                    @endif
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

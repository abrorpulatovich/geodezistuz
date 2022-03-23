@extends('layouts.app')

@section('title', $resourceType->name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>{{ $resourceType->name }} ni tahrirlash</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('resource_type.index') }}" class="btn btn-primary btn-sm"><i class="lni lni-arrow-right"></i> Resurs turlari</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('admin.includes.errors')
                        <form action="{{ route('resource_type.update', ['resource_type' => $resourceType]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Nomi</label>
                                    <input type="text" name="name" class="form-control" id="name" value="{{ $resourceType->name }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="status">Holati</label> <br>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">---</option>
                                        <option value="2" @if($resourceType->status == 2) selected @endif>Aktiv</option>
                                        <option value="1" @if($resourceType->status == 1) selected @endif>Aktiv emas</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="r_order">Tartibi</label> <br>
                                    <input type="number" name="r_order" class="form-control" id="r_order" value="{{ $resourceType->r_order }}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="lni lni-save"></i> Saqlash</button>
                                        <a href="{{ route('resource_type.index') }}" class="btn btn-secondary btn-sm"><i class="lni lni-arrow-left"></i> Orqaga qaytish</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


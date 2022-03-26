@extends('layouts.app')

@section('title', $specialist->name)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <b>Tahrirlash</b>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="{{ route('specialist.index') }}" class="btn btn-primary btn-sm"><i
                                        class="lni lni-arrow-right"></i> Mutaxassisliklar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        @include('admin.includes.errors')

                        <form action="{{ route('specialist.update', ['specialist' => $specialist]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="name">Nomi</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           value="{{ $specialist->name }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="status">Holati</label> <br>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">---</option>
                                        <option value="2" @if($specialist->status == 2) selected @endif>Aktiv</option>
                                        <option value="1"
                                                @if($specialist->status == 1 and $specialist->status != null) selected @endif>
                                            Aktiv emas
                                        </option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="s_order">Tartibi</label> <br>
                                    <input type="number" name="s_order" class="form-control" id="s_order"
                                           value="{{ $specialist->s_order }}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="icon">Ikonka</label> <br>
                                    <input type="text" name="icon" class="form-control" id="icon"
                                           value="{{ $specialist->icon }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="color">Rang</label> <br>
                                    <input type="text" name="color" class="form-control" id="color" value="{{ $specialist->color }}">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary btn-sm"><i
                                                class="lni lni-save"></i> Saqlash
                                        </button>
                                        <a href="{{ route('specialist.index') }}" class="btn btn-secondary btn-sm"><i
                                                class="lni lni-arrow-left"></i> Orqaga qaytish</a>
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

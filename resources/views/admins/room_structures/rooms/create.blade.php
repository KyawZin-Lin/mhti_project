@extends('admins.master')

@section('room-structure-active', 'active')

@section('room-active', 'nav-active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Create Room</b></p>

                                <a href="{{ route('admin.rooms.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.rooms.store') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Room</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Floor</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="floor_id" id="floor_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($floors as $floor)
                                                <option value="{{ $floor->id }}"
                                                    @if ($floor->id == old('floor_id')) selected @endif>
                                                    {{ $floor->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Building</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="building_id" id="building_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($buildings as $building)
                                                <option value="{{ $building->id }}"
                                                    @if ($building->id == old('building_id')) selected @endif>
                                                    {{ $building->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-4">
                                        <button type="reset" class="btn btn-sm btn-secondary w-100">Cancel</button>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-sm btn-success w-100">Save</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

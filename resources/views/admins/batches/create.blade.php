@extends('admins.master')

@section('batch-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Create Batch</b></p>

                                <a href="{{ route('admin.batches.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.batches.store') }}" method="POST" autocomplete="off">
                                @csrf


                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Course</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="degree_id" id="degree_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($degrees as $degree)
                                                <option value="{{ $degree->abbreviation }}"
                                                    @if ($degree->abbreviation == old('degree_id')) selected @endif>
                                                    {{ $degree->abbreviation }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Academic
                                            Year</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="academic_year_id" id="academic_year_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($academic_years as $academic_year)
                                                <option value="{{ $academic_year->name }}"
                                                    @if ($academic_year->name == old('academic_year_id')) selected @endif>
                                                    {{ $academic_year->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Room</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="room_id" id="room_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($rooms as $room)
                                                <option value="{{ $room->id }}"
                                                    @if ($room->name == old('room_id')) selected @endif>
                                                    {{ $room->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Quantity of
                                            Student</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="number" name="student_qty" class="form-control"
                                            value="{{ old('student_qty') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Time</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="time" name="time" class="form-control"
                                            value="{{ old('time') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Duration</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="duration" class="form-control"
                                            value="{{ old('duration') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Start
                                            Date</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="date" name="start_date" class="form-control"
                                            value="{{ old('start_date') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>End
                                            Date</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="date" name="end_date" class="form-control"
                                            value="{{ old('end_date') }}">
                                    </div>
                                </div>

                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-4">
                                        <button type="reset" class="btn btn-sm btn-danger w-100">Cancel</button>
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

@extends('admins.master')

@section('attendance-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Edit Absent</b></p>

                                <a href="{{ route('admin.absents') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.absent_update', $absent->id) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Date</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="date" name="date" class="form-control"
                                            value="{{ $absent->date }}">
                                    </div>
                                </div>

                                {{-- <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Batch /
                                            Academic
                                            Year</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="classroom_id" id="classroom_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($classrooms as $classroom)
                                                <option value="{{ $classroom->id }}"
                                                    @if ($classroom->id == old('classroom_id')) selected @endif>
                                                    {{ $classroom->batch }} / {{ $classroom->academicYear->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <input type="hidden" name="absent_id" value="{{ $absent->id }}">

                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Student
                                            Name</b></label>
                                    <div class="col-sm-6 col-md-6">

                                        <select name="student_id" id="student_id" class="myselect form-control">
                                            <option></option>
                                            {{-- @foreach ($classrooms as $classroom)
                                                <option value="{{ $classroom->id }}"
                                                    {{ in_array($classroom->id, explode(',', $absent->classroom_id)) ? 'selected' : '' }}>
                                                    {{ $classroom->student->name }} /
                                                    {{ $classroom->batch }} / {{ $classroom->student->phone }} / Year -
                                                    {{ $classroom->academicYear->name }} / Times -
                                                    {{ $classroom->academicYear->times }} </option>
                                            @endforeach --}}

                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}"
                                                    @if ($student->id == $absent->student_id) selected @endif>
                                                    {{ $student->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>



                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Remarks</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="remark" class="form-control"
                                            value="{{ $absent->remark }}">
                                    </div>
                                </div>

                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-4">
                                        <button type="reset" class="btn btn-sm btn-danger w-100">Cancel</button>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
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

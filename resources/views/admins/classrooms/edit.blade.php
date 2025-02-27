@extends('admins.master')

@section('classroom-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Edit Class</b></p>

                                <a href="{{ route('admin.classrooms.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.classrooms.update', $classroom->id) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Batch</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="batch" class="form-control"
                                            value="{{ $classroom->batch }}">
                                    </div>
                                </div>

                                {{-- <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Student
                                            Name</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="student_id" id="student_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}"
                                                    @if ($student->id == $classroom->student_id) selected @endif>{{ $student->name }} /
                                                    (📞)
                                                    {{ $student->phone }}
                                                </option>
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
                                                <option value="{{ $academic_year->id }}"
                                                    @if ($academic_year->id == $classroom->academic_year_id) selected @endif>
                                                    {{ $academic_year->name }} year /
                                                    {{ $academic_year->times }} Times</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

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

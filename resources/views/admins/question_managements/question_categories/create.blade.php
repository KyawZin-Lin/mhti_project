@extends('admins.master')

@section('qmanagement-active', 'active')

@section('qcategory-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Create Question Category</b></p>

                                <a href="{{ route('admin.question_categories.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.question_categories.store') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-2 col-md-2 text-md-end text-right"><b>Question
                                                    Name*</b></label>
                                            <div class="col-sm-9 col-md-9">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end text-right"><b>Academic
                                                    Year</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select class="myselect form-control" name="academic_year_id">
                                                    <option></option>
                                                    @foreach ($academic_years as $academic_year)
                                                        <option value="{{ $academic_year->id }}"
                                                            @if ($academic_year->id == old('academic_year_id')) selected @endif>
                                                            {{ $academic_year->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end text-right"><b>Course</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select class="myselect form-control" name="course_id">
                                                    <option></option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}"
                                                            @if ($course->id == old('course_id')) selected @endif>
                                                            {{ $course->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end text-right"><b>Module</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select class="myselect form-control" name="module_id">
                                                    <option></option>
                                                    @foreach ($modules as $module)
                                                        <option value="{{ $module->id }}"
                                                            @if ($module->id == old('module_id')) selected @endif>
                                                            {{ $module->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end text-right"><b>Remarks</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="remarks" class="form-control"
                                                    value="{{ old('remarks') }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-3">
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

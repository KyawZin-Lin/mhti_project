@extends('admins.master')

@section('course-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Create Course</b></p>

                                <a href="{{ route('admin.courses.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.courses.store') }}" method="POST" enctype="multipart/form-data"
                                autocomplete="off">
                                @csrf
                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Name</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Audio
                                            File</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="file" name="audio_file" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Academic
                                            Year</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select class="myselect form-control" name="academic_year_id">
                                            <option></option>
                                            @foreach ($academic_years as $academic)
                                                <option value="{{ $academic->id }}"
                                                    @if ($academic->id == old('academic_year_id')) selected @endif>{{ $academic->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Remarks</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="remarks" class="form-control"
                                            value="{{ old('remarks') }}">
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

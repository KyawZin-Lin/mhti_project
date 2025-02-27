@extends('admins.master')

@section('staff-leave-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Create Teacher Leave</b></p>

                                <a href="{{ route('admin.teacher_leaves.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.teacher_leaves.store') }}" method="POST" autocomplete="off">
                                @csrf

                                <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Date</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="date" name="date" class="form-control"
                                            value="{{ old('date') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Teacher</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="teacher_id" id="teacher_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}"
                                                    @if ($teacher->id == old('teacher_id'))  @endif>{{ $teacher->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Staff</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="staff_id" id="staff_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($staff as $staf)
                                                <option value="{{ $staf->id }}"
                                                    @if ($staf->id == old('teacher_id'))  @endif>{{ $staf->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Fine</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="fine" class="form-control"
                                            value="{{ old('fine') }}">
                                    </div>
                                </div> --}}

                                <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Note</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="note" class="form-control"
                                            value="{{ old('note') }}">
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

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
                                <p class="mt-3"><b>Edit Staff Leave</b></p>

                                <a href="{{ route('admin.staff_leaves.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.staff_leaves.update', $staff_leave->id) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Date</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="date" name="date" class="form-control"
                                            value="{{ $staff_leave->date }}">
                                    </div>
                                </div>

                                {{-- <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Teacher</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="teacher_id" id="teacher_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($teachers as $teacher)
                                                <option value="{{ $teacher->id }}"
                                                    @if ($teacher->id == $staff_leave->teacher_id) selected @endif>{{ $teacher->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Staff</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="staff_id" id="staff_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($staff as $staf)
                                                <option value="{{ $staf->id }}"
                                                    @if ($staf->id == $staff_leave->staff_id) selected @endif>{{ $staf->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Fine</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="fine" class="form-control"
                                            value="{{ $staff_leave->fine }}">
                                    </div>
                                </div> --}}

                                <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Note</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="note" class="form-control"
                                            value="{{ $staff_leave->note }}">
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

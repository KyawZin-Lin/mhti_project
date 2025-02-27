@extends('admins.master')

@section('course-fee-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Edit Course Fee</b></p>

                                <a href="{{ route('admin.course_fees.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.course_fees.update', $course_fee->id) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Course</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="course_id" id="course_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    @if ($course->id == $course_fee->course_id) selected @endif>
                                                    {{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Amount</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="number" name="amount" class="form-control"
                                            value="{{ $course_fee->amount }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Discount
                                            (%)</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="number" name="discount" class="form-control"
                                            value="{{ $course_fee->discount }}">
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

@extends('admins.master')

@section('finance-active', 'active')

@section('expend-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Edit Expense</b></p>

                                <a href="{{ route('admin.expends.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.expends.update', $expend->id) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('PUT')

                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label text-right"><b>
                                            Date</b></label>
                                    <div class="col-sm-6">
                                        <input type="date" name="date" id="date" class="form-control"
                                            value="{{ $expend->date }}">
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="title" class="col-sm-4 col-form-label text-right"><b>
                                            Title</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ $expend->title }}">
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="description"
                                        class="col-sm-4 col-form-label text-right"><b>Description</b></label>
                                    <div class="col-sm-6">
                                        <textarea name="description" id="description" cols="30" rows="1" class="form-control">{{ $expend->description }}</textarea>
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="particular" class="col-sm-4 col-form-label text-right"><b>
                                            Particular</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="particular" id="particular" class="form-control"
                                            value="{{ $expend->particular }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label text-right"><b>
                                            Name</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ $expend->name }}">
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label for="particular" class="col-sm-4 col-form-label text-right"><b>
                                            Choose</b></label>
                                    <div class="col-sm-6">
                                        <input type="radio" id="teacher">
                                        <label for="teacher">Teacher</label>
                                    </div>
                                </div> --}}

                                @if ($expend->teacher_id)

                                    <div class="form-group row show-teacher">
                                        <label for="" class="col-sm-4 col-md-4 text-right"><b>Teacher</b></label>
                                        <div class="col-sm-6 col-md-6">
                                            <select name="teacher_id" id="teacher_id" class="myselect form-control">
                                                <option></option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}"
                                                        @if ($teacher->id == $expend->teacher_id) selected @endif>
                                                        {{ $teacher->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                @endif

                                @if ($expend->staff_id)
                                    <div class="form-group row show-staff">
                                        <label for="" class="col-sm-4 col-md-4 text-right"><b>Staff</b></label>
                                        <div class="col-sm-6 col-md-6">
                                            <select name="staff_id" id="staff_id" class="myselect form-control">
                                                <option></option>
                                                @foreach ($staff as $staf)
                                                    <option value="{{ $staf->id }}"
                                                        @if ($staf->id == $expend->staff_id) selected @endif>
                                                        {{ $staf->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                @endif

                                {{-- <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Course</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="course_id" id="course_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    @if ($course->id == $expend->course_id) selected @endif>
                                                    {{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Batch</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="batch_id" id="batch_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($batches as $batch)
                                                <option value="{{ $batch->id }}"
                                                    @if ($batch->id == $expend->batch_id) selected @endif>
                                                    {{ $batch->batch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="amount" class="col-sm-4 col-form-label text-right"><b>Amount</b></label>
                                    <div class="col-sm-6">
                                        <input type="number" name="amount" id="amount" class="form-control"
                                            value="{{ $expend->amount }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Payment
                                            Type</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="payment_type_id" id="payment_type_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($payment_types as $payment_type)
                                                <option value="{{ $payment_type->id }}"
                                                    @if ($payment_type->id == $expend->payment_type_id) selected @endif>
                                                    {{ $payment_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="qty" class="col-sm-4 col-form-label text-right"><b>
                                            Quantity</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="qty" id="qty" class="form-control"
                                            value="{{ $expend->qty }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-sm-4 col-form-label text-right"><b>Price</b></label>
                                    <div class="col-sm-6">
                                        <input type="number" name="price" id="price" class="form-control"
                                            value="{{ $expend->price }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="thing" class="col-sm-4 col-form-label text-right"><b>Thing</b></label>
                                    <div class="col-sm-6">
                                        <textarea name="thing" id="thing" cols="30" rows="1" class="form-control">{{ $expend->thing }}</textarea>
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="price" class="col-sm-4 col-form-label text-right"><b>Bonus</b></label>
                                    <div class="col-sm-6">
                                        <input type="number" name="bonus" id="bonus" class="form-control"
                                            value="{{ $expend->bonus }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fine" class="col-sm-4 col-form-label text-right"><b>Fine</b></label>
                                    <div class="col-sm-6">
                                        <input type="number" name="fine" id="fine" class="form-control"
                                            value="{{ $expend->fine }}">
                                        </di <div class="form-group row">
                                        <label for="remark"
                                            class="col-sm-4 col-form-label text-right"><b>Remark</b></label>
                                        <div class="col-sm-6">
                                            <textarea name="remark" id="remark" cols="30" rows="1" class="form-control">{{ $expend->remark }}</textarea>
                                        </div>
                                    </div>

                                    <div class="row my-3 mb-5">
                                        <div class="col-3 offset-4">
                                            <button type="reset" class="btn btn-sm btn-secondary w-100">Cancel</button>
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

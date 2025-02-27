@extends('admins.master')

@section('finance-active', 'active')

@section('expend-active', 'active')

@section('css')
    <style>
        .select2-container .select2-selection--single {
            width: 590px;
        }
    </style>
@endsection

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Create Expense</b></p>

                                <a href="{{ route('admin.expends.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.expends.store') }}" method="POST" autocomplete="off">
                                @csrf

                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label text-right"><b>
                                            Date</b></label>
                                    <div class="col-sm-6">
                                        <input type="date" name="date" id="date" class="form-control"
                                            value="<?php echo date('Y-m-d'); ?>">
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="title" class="col-sm-4 col-form-label text-right"><b>
                                            Title</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ old('title') }}">
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="description"
                                        class="col-sm-4 col-form-label text-right"><b>Description</b></label>
                                    <div class="col-sm-6">
                                        <textarea name="description" id="description" cols="30" rows="1" class="form-control">{{ old('description') }}</textarea>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="particular" class="col-sm-4 col-form-label text-right"><b>
                                            Choose</b></label>
                                    <div class="col-sm-6">
                                        <input type="radio" id="tea" name="choose">
                                        <label for="tea">Teacher</label>
                                        <input type="radio" id="staff" name="choose">
                                        <label for="staff">Staff</label>
                                    </div>
                                </div>

                                <div class="show-teacher" style="display:none;">
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label text-right"><b>Teacher</b></label>
                                        <div class="col-sm-6">
                                            <select name="teacher_id" id="teacher_id" class="myselect form-control">
                                                <option></option>
                                                @foreach ($teachers as $teacher)
                                                    <option value="{{ $teacher->id }}"
                                                        @if ($teacher->id == old('teacher_id')) selected @endif>
                                                        {{ $teacher->name }}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label text-right"><b>Standard
                                                Salary</b></label>
                                        <div class="col-sm-6">
                                            <p class="standard-salary"></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label text-right"><b>Leave</b></label>
                                        <div class="col-sm-6 leave">

                                        </div>
                                    </div>
                                </div>

                                <div class="show-staff" style="display:none;">
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label text-right"><b>Staff</b></label>
                                        <div class="col-sm-6">
                                            <select name="staff_id" id="staff_id" class="myselect form-control">
                                                <option></option>
                                                @foreach ($staff as $staf)
                                                    <option value="{{ $staf->id }}"
                                                        @if ($staf->id == old('staff_id')) selected @endif>
                                                        {{ $staf->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 col-form-label text-right"><b>Standard
                                                Salary</b></label>
                                        <div class="col-sm-6">
                                            <p class="staff-salary"></p>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-4 col-form-label text-right"><b>Leave</b></label>
                                        <div class="col-sm-6 staff-leave">

                                        </div>
                                    </div>
                                </div>


                                {{-- <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Course</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="course_id" id="course_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    @if ($course->id == old('course_id')) selected @endif>
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
                                                    @if ($batch->id == old('batch_id')) selected @endif>
                                                    {{ $batch->batch }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="amount" class="col-sm-4 col-form-label text-right"><b>Amount</b></label>
                                    <div class="col-sm-6">
                                        <input type="number" name="amount" id="amount" class="form-control"
                                            value="{{ old('amount') }}">
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
                                                    @if ($payment_type->id == old('payment_type_id')) selected @endif>
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
                                            value="{{ old('qty') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-sm-4 col-form-label text-right"><b>Price</b></label>
                                    <div class="col-sm-6">
                                        <input type="number" name="price" id="price" class="form-control"
                                            value="{{ old('price') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="thing" class="col-sm-4 col-form-label text-right"><b>Thing</b></label>
                                    <div class="col-sm-6">
                                        <textarea name="thing" id="thing" cols="30" rows="1" class="form-control">{{ old('thing') }}</textarea>
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="price" class="col-sm-4 col-form-label text-right"><b>Bonus</b></label>
                                    <div class="col-sm-6">
                                        <input type="number" name="bonus" id="bonus" class="form-control"
                                            value="{{ old('bonus') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="fine" class="col-sm-4 col-form-label text-right"><b>Fine</b></label>
                                    <div class="col-sm-6">
                                        <input type="number" name="fine" id="fine" class="form-control"
                                            value="{{ old('fine') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="remark" class="col-sm-4 col-form-label text-right"><b>Remark</b></label>
                                    <div class="col-sm-6">
                                        <textarea name="remark" id="remark" cols="30" rows="1" class="form-control">{{ old('remark') }}</textarea>
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#tea').click(function() {
                $('.show-teacher').toggle();
                $('.show-staff').hide();
                $("#staff_id").empty();
                $(".staff-salary").empty();
            })
            $('#staff').click(function() {
                $('.show-staff').toggle();
                $('.show-teacher').hide();
                $("#teacher_id").empty();
                $(".standard-salary").empty();
                $(".leave").empty();
            })


            $('#teacher_id').change(function() {
                $teacherId = $('#teacher_id').val();

                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.teacher_ajax') }}',
                    data: {
                        teacherId: $teacherId,
                    },
                    dataType: 'json',
                    success: function(res) {
                        //console.log(res);

                        $('.standard-salary').html(res.teacher.standard_salary);

                        $(".leave").empty();
                        $.map(res.teacherLeaves, function(response) {
                            //console.log(response)

                            var dateObject = new Date(response.date);
                            var day = dateObject.getDate();
                            var monthno = dateObject.getMonth() + 1;
                            var year = dateObject.getFullYear();

                            if (monthno == 1) {
                                var month = 'Jan';
                            }
                            if (monthno == 2) {
                                var monthno = 'Feb';
                            }
                            if (monthno == 3) {
                                var monthno = 'Mar';
                            }
                            if (monthno == 4) {
                                var monthno = 'Apr';
                            }
                            if (monthno == 5) {
                                var monthno = 'May';
                            }
                            if (monthno == 6) {
                                var monthno = 'Jun';
                            }
                            if (monthno == 7) {
                                var monthno = 'Jul';
                            }
                            if (monthno == 8) {
                                var monthno = 'Aug';
                            }
                            if (monthno == 9) {
                                var monthno = 'Sep';
                            }
                            if (monthno == 10) {
                                var monthno = 'Oct';
                            }
                            if (monthno == 11) {
                                var monthno = 'Nov';
                            }
                            if (monthno == 12) {
                                var monthno = 'Dec';
                            }

                            $(".leave").append(
                                `<h6>${day} , ${month} , ${year}</h6>`
                                // `<option value='${res.id}'> ${res.township_abbreviation}</option>`
                            )


                        })
                    }
                })
            })

            $('#staff_id').change(function() {
                $staffId = $('#staff_id').val();

                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.staff_ajax') }}',
                    data: {
                        'staffId': $staffId
                    },
                    dataType: 'json',
                    success: function(res) {
                        //console.log(res);

                        $('.staff-salary').html(res.staff.standard_salary);

                        $(".staff-leave").empty();
                        $.map(res.staffLeaves, function(response) {
                            //console.log(response)

                            var dateObject = new Date(response.date);
                            var day = dateObject.getDate();
                            var monthno = dateObject.getMonth() + 1;
                            var year = dateObject.getFullYear();

                            if (monthno == 1) {
                                var month = 'Jan';
                            }
                            if (monthno == 2) {
                                var monthno = 'Feb';
                            }
                            if (monthno == 3) {
                                var monthno = 'Mar';
                            }
                            if (monthno == 4) {
                                var monthno = 'Apr';
                            }
                            if (monthno == 5) {
                                var monthno = 'May';
                            }
                            if (monthno == 6) {
                                var monthno = 'Jun';
                            }
                            if (monthno == 7) {
                                var monthno = 'Jul';
                            }
                            if (monthno == 8) {
                                var monthno = 'Aug';
                            }
                            if (monthno == 9) {
                                var monthno = 'Sep';
                            }
                            if (monthno == 10) {
                                var monthno = 'Oct';
                            }
                            if (monthno == 11) {
                                var monthno = 'Nov';
                            }
                            if (monthno == 12) {
                                var monthno = 'Dec';
                            }

                            $(".staff-leave").append(
                                `<h6>${day} , ${month} , ${year}</h6>`
                                // `<option value='${res.id}'> ${res.township_abbreviation}</option>`
                            )


                        })
                    }
                })
            })
        })
    </script>
@endsection

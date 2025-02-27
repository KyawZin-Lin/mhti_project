@extends('admins.master')

@section('teacher-active', 'active')

@section('title', 'Student')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Edit Teacher</b></p>

                                <a href="{{ route('admin.teachers.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.teachers.update', $teacher->id) }}" method="POST"
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Name</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $teacher->name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Phone</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="phone" class="form-control"
                                                    value="{{ $teacher->phone }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Position</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="position" class="form-control"
                                                    value="{{ $teacher->position }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Course</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="course_id" id="course_id" class="myselect form-control">
                                                    <option></option>
                                                    @foreach ($courses as $course)
                                                        <option value="{{ $course->id }}"
                                                            @if ($course->id == $teacher->course_id) selected @endif>
                                                            {{ $course->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Batch</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="batch_id" id="batch_id" class="myselect form-control">
                                                    <option></option>
                                                    @foreach ($batches as $batch)
                                                        <option value="{{ $batch->id }}"
                                                            @if ($batch->id == $teacher->batch_id) selected @endif>
                                                            {{ $batch->batch }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    {{--

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Degree</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="degree" class="form-control"
                                                    value="{{ $teacher->degree }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Photo</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Address</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <textarea name="address" id="address" cols="30" rows="1" class="form-control">{{ $teacher->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Standard
                                                    Salary</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="standard_salary" class="form-control"
                                                    value="{{ $teacher->standard_salary }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4"><b> Duty Assign</b></label>

                                            <div class="col-sm-8">
                                                <input type="radio" id="full_time" name="duty_assign" value="Full Time"
                                                    @if ('Full Time' == $teacher->duty_assign) checked @endif>
                                                <label for="full_time">Full Time</label>
                                                <input type="radio" id="part_time" name="duty_assign" value="Part Time"
                                                    @if ('Part Time' == $teacher->duty_assign) checked @endif>
                                                <label for="part_time">Part Time</label>
                                                <input type="radio" id="full_part_time" name="duty_assign"
                                                    value="Full Time & Part Time"
                                                    @if ('Full Time & Part Time' == $teacher->duty_assign) checked @endif>
                                                <label for="full_part_time">Full Time & Part Time</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Salary
                                                    Date</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="salary_date" class="form-control"
                                                    value="{{ $expense != null ? $expense->date : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Salary</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="salary" class="form-control"
                                                    value="{{ $expense != null ? $expense->amount : '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Payment
                                                    Type</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="payment_type_id" id="payment_type_id"
                                                    class="myselect form-control">
                                                    <option></option>
                                                    @foreach ($payment_types as $payment_type)
                                                        <option value="{{ $payment_type->id }}"
                                                            @isset($expense)
                                                                @if ($payment_type->id == $expense->payment_type_id) selected
                                                                @endif
                                                            @endisset>
                                                            {{ $payment_type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                </div>



                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-3">
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#nrc_no').change(function() {
                var nrc_no = $('#nrc_no').val();

                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.ajaxNrcAbbre') }}',
                    data: {
                        'nrc_no': nrc_no,
                    },
                    dataType: 'json',

                    success: function(response) {
                        //console.log(response.nrc_infos);
                        // if (response.nrc_infos.length) {
                        $(".nrc_abbre").empty();
                        $.map(response.nrc_infos, function(res) {
                            //console.log(res.township_abbreviation)

                            $(".nrc_abbre").append(
                                `<option value='${res.id}'> ${res.township_abbreviation}</option>`
                            )


                        })
                        //}

                        // console.log(response.nrc_infos);

                        // $('#nrc_abbre').find('.nrc_abbreviation').val(response.nrc_infos
                        //     .township_abbreviation);

                    }
                });

            });

            $('#state_id').change(function() {
                var state_id = $('#state_id').val();

                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.ajaxTownship') }}',
                    data: {
                        'state_id': state_id,
                    },
                    dataType: 'json',

                    success: function(response) {
                        //console.log(response.townships);

                        $(".township_id").empty();
                        $.map(response.townships, function(res) {
                            // console.log(res.name);
                            $(".township_id").append(
                                `<option value='${res.id}'> ${res.name}</option>`
                            )
                        })
                    }
                })
            });
        });
    </script>
@endsection

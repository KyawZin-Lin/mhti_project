@extends('admins.master')

@section('student-active', 'active')

@section('title', 'Student')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Edit Student</b></p>

                                <a href="{{ route('admin.students.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.students.update', $student->id) }}" method="POST"
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Name</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ $student->name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Photo</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-5 col-md-5"><b>Course</b></label>
                                            <div class="col-sm-7 col-md-7">
                                                <select name="degree_id" id="degree_id" class="myselect form-control">
                                                    <option></option>
                                                    @foreach ($degrees as $degree)
                                                        <option value="{{ $degree->id }}"
                                                            @if ($degree->id == $student->degree_id) selected @endif>
                                                            {{ $degree->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-sm btn-info" id="get-student-id">Get
                                            Student ID</button>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Student Course
                                                    ID</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="student_no" class="form-control student-no"
                                                    value="{{ $student->student_no }}">
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="course_id" class="course_id">
                                    <input type="hidden" name="course_abbre" class="course_abbre">
                                    <input type="hidden" name="course_no" class="course_no">
                                </div>

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Batch</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="batch_id" id="batch_id" class="myselect form-control">
                                                    <option></option>
                                                    @foreach ($batches as $batch)
                                                        <option value="{{ $batch->id }}"
                                                            @if ($batch->id == $student->batch_id) selected @endif>
                                                            {{ $batch->batch }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Age</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="age" class="form-control"
                                                    value="{{ $student->age }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Registered Date</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="date" class="form-control"
                                                    value="{{ $student->date }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Gender</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="radio" name="gender" value="Male" id="male"
                                                    @if ('Male' == $student->gender) checked @endif>
                                                <label for="male">Male</label>
                                                <input type="radio" name="gender" value="Female" id="female"
                                                    @if ('Female' == $student->gender) checked @endif>
                                                <label for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Start Date</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="start_date" class="form-control"
                                                    value="{{ $student->start_date }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>National ID
                                                    Card
                                                    No</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="national_id" class="form-control"
                                                    value="{{ $student->national_id }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>End Date</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="end_date" class="form-control"
                                                    value="{{ $student->end_date }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Father
                                                    Name</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="father_name" class="form-control"
                                                    value="{{ $student->father_name }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Date
                                                    of
                                                    Birth</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="dob" class="form-control"
                                                    value="{{ $student->dob }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Nationality</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="nationality" class="form-control"
                                                    value="{{ $student->nationality }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Religion</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="religion" class="form-control"
                                                    value="{{ $student->religion }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Marital
                                                    Status</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="radio" name="marital_status" value="Single"
                                                    id="single" @if ('Single' == $student->marital_status) checked @endif>
                                                <label for="single">Single</label>
                                                <input type="radio" name="marital_status" value="Married"
                                                    id="married" @if ('Married' == $student->marital_status) checked @endif>
                                                <label for="married">Married</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Home Phone
                                                    No</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="phone" class="form-control"
                                                    value="{{ $student->phone }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Mobile
                                                    No</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="mobile" class="form-control"
                                                    value="{{ $student->mobile }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Email</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ $student->email }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Address</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <textarea name="address" id="address" cols="30" rows="1" class="form-control">{{ $student->address }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Education</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="education" class="form-control"
                                                    value="{{ $student->education }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Other
                                                    Qualification</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="qualification" class="form-control"
                                                    value="{{ $student->qualification }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <h5><b>Language</b></h5>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>English</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="radio" name="english_language" value="Excellent"
                                                    id="excellent" @if ('Excellent' == $student->english_language) checked @endif>
                                                <label for="excellent">Excellent</label>
                                                <input type="radio" name="english_language" value="Good"
                                                    id="good" @if ('Good' == $student->english_language) checked @endif>
                                                <label for="good">Good</label>
                                                <input type="radio" name="english_language" value="Fair"
                                                    id="fair" @if ('Fair' == $student->english_language) checked @endif>
                                                <label for="fair">Fair</label>
                                                <input type="radio" name="english_language" value="Poor"
                                                    id="poor" @if ('Poor' == $student->english_language) checked @endif>
                                                <label for="poor">Poor</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Other</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="radio" name="other_language" value="Excellent"
                                                    id="excellent" @if ('Excellent' == $student->other_language) checked @endif>
                                                <label for="excellent">Excellent</label>
                                                <input type="radio" name="other_language" value="Good"
                                                    id="good" @if ('Good' == $student->other_language) checked @endif>
                                                <label for="good">Good</label>
                                                <input type="radio" name="other_language" value="Fair"
                                                    id="fair" @if ('Fair' == $student->other_language) checked @endif>
                                                <label for="fair">Fair</label>
                                                <input type="radio" name="other_language" value="Poor"
                                                    id="poor" @if ('Poor' == $student->other_language) checked @endif>
                                                <label for="poor">Poor</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Student
                                                    Status</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="radio" name="student_status" value="Employer"
                                                    id="employer" @if ('Employer' == $student->student_status) checked @endif>
                                                <label for="employer">Employer</label>
                                                <input type="radio" name="student_status" value="Employee"
                                                    id="employee" @if ('Employee' == $student->student_status) checked @endif>
                                                <label for="employee">Employee</label>
                                                <input type="radio" name="student_status" value="Student"
                                                    id="student" @if ('Student' == $student->student_status) checked @endif>
                                                <label for="student">Student</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Employer</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="employer" class="form-control"
                                                    value="{{ $student->employer }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Type of
                                                    Business</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="business_type" class="form-control"
                                                    value="{{ $student->business_type }}">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Employee</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="employee" class="form-control"
                                                    value="{{ $student->employee }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Type of
                                                    Business(Employee)</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="employee_business_type" class="form-control"
                                                    value="{{ $student->employee_business_type }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Position</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="position" class="form-control"
                                                    value="{{ $student->position }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Duties and
                                                    Responsibilities</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="duties" class="form-control"
                                                    value="{{ $student->duties }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Pay Scale</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="pay" class="form-control"
                                                    value="{{ $student->pay }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Reason For
                                                    Leaving</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="leaving" class="form-control"
                                                    value="{{ $student->leaving }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-sm-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h5><b>Future Interest</b></h5>
                                            </div>
                                            <?php $future_interest = explode(',', $student->future_interest); ?>
                                            <div class="col-sm-12">
                                                <input type="checkbox" name="future_interest[]" value="Hotel"
                                                    id="hotel" mulitple
                                                    {{ in_array('Hotel', $future_interest) ? 'checked' : '' }}>
                                                <label for="hotel">To Work in Hotel/ Restaurant/ Travel & Tour</label>
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h5><b>Future Interest</b></h5>
                                            </div>

                                            <?php $future = explode(',', $student->future_interest); ?>

                                            @foreach ($future_interests as $future_interest)
                                                <div class="col-sm-12">
                                                    <input type="checkbox" name="future_interest[]"
                                                        value="{{ $future_interest->name }}"
                                                        id="{{ $future_interest->name }}" mulitple
                                                        {{ in_array($future_interest->name, $future) ? 'checked' : '' }}>
                                                    <label
                                                        for="{{ $future_interest->name }}">{{ $future_interest->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h5><b>Source Survey</b></h5>
                                            </div>

                                            <?php $source = explode(',', $student->source_survey); ?>

                                            @foreach ($source_surveys as $source_survey)
                                                <div class="col-sm-12">
                                                    <input type="radio" name="source_survey[]"
                                                        value="{{ $source_survey->name }}"
                                                        id="{{ $source_survey->name }}" mulitple
                                                        {{ in_array($source_survey->name, $source) ? 'checked' : '' }}>
                                                    <label
                                                        for="{{ $source_survey->name }}">{{ $source_survey->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Applicant</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="applicant" class="form-control"
                                                    value="{{ $student->applicant }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Applicant
                                                    Signature</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="file" name="applicant_sign" class="form-control"
                                                    value="{{ $student->applicant_sign }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Registered By</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <p>{{ auth()->user()->name }}</p>
                                                <input type="hidden" name="registered" class="form-control"
                                                    value="{{ auth()->user()->id }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Remark</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="remark" class="form-control"
                                                    value="{{ $student->remark }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Oversea</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="checkbox" name="oversea" value="Oversea"
                                                    @if ('Oversea') == {{ $student->oversea }} checked @endif>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Registered
                                                    Signature</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="file" name="registered_sign" class="form-control"
                                                    value="{{ $student->registered_sign }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Open Day</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="open_day" class="form-control"
                                                    value="{{ $student->open_day }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Close Day</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="close_day" class="form-control"
                                                    value="{{ $student->close_day }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Location</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="location" id="location" class="myselect form-control">
                                                    <option></option>
                                                    <option value="mhti1"
                                                        @if ('mhti1' == $student->location) selected @endif>MHTI-1</option>
                                                    <option value="mhti2"
                                                        @if ('mhti2' == $student->location) selected @endif>MHTI-2</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}


                                    <div class="col-sm-12 d-none">
                                        <h5><b>Payment</b></h5>
                                    </div>

                                    <div class="col-sm-6 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Payment Date</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="payment_date" class="form-control"
                                                    value="{{ isset($income) ? $income->date : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Title</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="title" class="form-control"
                                                    value="{{ isset($income) ? $income->title : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-md-2 text-md-end"><b>Payment
                                                    Installment</b></label>
                                            <div class="col-sm-10 col-md-10">
                                                <input type="radio" name="payment_installment" value="Full"
                                                    id="full" @if ('Full' == isset($income) ? $income->payment_installment : '') checked @endif>
                                                <label for="full">Full</label>
                                                <input type="radio" name="payment_installment" value="Deposit"
                                                    id="deposit" @if ('Deposit' == isset($income) ? $income->payment_installment : '') checked @endif>
                                                <label for="deposit">Deposit</label>
                                                <input type="radio" name="payment_installment"
                                                    value="2 times installment" id="2"
                                                    @if ('2 times installment' == isset($income) ? $income->payment_installment : '') checked @endif>
                                                <label for="2">2 times installment</label>
                                                <input type="radio" name="payment_installment"
                                                    value="3 times installment" id="3"
                                                    @if ('3 times installment' == isset($income) ? $income->payment_installment : '') checked @endif>
                                                <label for="3">3 times installment</label>
                                                {{-- <input type="radio" name="payment_type" value="4 times installment"
                                                    id="4" @if ('4 times installment' == isset($income) ? $income->payment_type : '') checked @endif>
                                                <label for="4">4 times installment</label> --}}
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Payment Type</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="payment_type" id="payment_type"
                                                    class="myselect form-control">
                                                    <option></option>
                                                    @foreach ($payment_types as $payment_type)
                                                        <option value="{{ $payment_type->id }}"
                                                            @if ($payment_type->id == isset($income) ? $income->payment_type : '') selected @endif>
                                                            {{ $payment_type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-6 col-md-6"><b>Payment Complete or
                                                    Incomplete</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="radio" name="payment_complete" value="Complete"
                                                    id="complete" @if ('Complete' == isset($income) ? $income->payment_complete : '') checked @endif>
                                                <label for="complete">Complete</label>
                                                <input type="radio" name="payment_complete" value="InComplete"
                                                    id="incomplete" @if ('InComplete' == isset($income) ? $income->payment_complete : '') checked @endif>
                                                <label for="incomplete">Incomplete</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Pay Money</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="pay_money" class="form-control"
                                                    value="{{ isset($income) ? $income->amount : '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Left Money</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="left_money" class="form-control"
                                                    value="{{ isset($income) ? $income->left_money : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Password</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="password" name="password" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Confirm
                                                    Password</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="password" name="confirm_password" class="form-control">
                                            </div>
                                        </div>
                                    </div> --}}

                                {{-- <div class="col-sm-6">
                                        <div class="form-group row mb-1">
                                            <label for="" class="col-sm-4 col-md-4"><b>Role</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="roles[]" id="roles" class="myselect form-control">
                                                    <option></option>
                                                    @foreach ($roles as $key => $role)
                                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div> --}}
                                {{-- </div> --}}

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
            $('#get-student-id').click(function() {
                var course_id = $('#degree_id').val();
                // console.log(course_id);

                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.generateStudentCode') }}',
                    data: {
                        'course_id': course_id,
                    },
                    dataType: 'json',
                    success: function(res) {
                        //console.log(res);

                        $('.student-no').val(res.student_no);
                        $('.course_id').val(res.course_id);
                        $('.course_abbre').val(res.course_abbre);
                        $('.course_no').val(res.course_no);
                        // window.location.reload();
                    }
                });
            });
        })
    </script>
@endsection

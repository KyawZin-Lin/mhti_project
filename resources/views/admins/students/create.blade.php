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
                                <p class="mt-3"><b>Create Student</b></p>

                                <a href="{{ route('admin.students.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">

                            <form action="{{ route('admin.students.store') }}" method="POST" enctype="multipart/form-data"
                                autocomplete="off">
                                @csrf

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Name</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="name" class="form-control"
                                                    value="{{ old('name') }}">
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
                                                            @if ($degree->id == old('degree_id')) selected @endif>
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
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Student
                                                    Course ID</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="student_no"
                                                    class="form-control @error('student_no') is-invalid @enderror student-no"
                                                    value="{{ old('student_no') }}">
                                            </div>

                                            @error('student_no')
                                                <p class="alert alert-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <input type="hidden" name="course_id[]" class="course_id">
                                    <input type="hidden" name="course_abbre[]" class="course_abbre">
                                    <input type="hidden" name="course_no[]" class="course_no">

                                    {{-- <input type="hidden" name="course_id[]" class="course_id1">
                                    <input type="hidden" name="course_abbre[]" class="course_abbre1">
                                    <input type="hidden" name="course_no[]" class="course_no1"> --}}
                                </div>

                                {{-- <div class="row">
                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-5 col-md-5"><b>Additional Course</b></label>
                                            <div class="col-sm-7 col-md-7">
                                                <select name="additional_course_id" id="degree_id1"
                                                    class="myselect form-control">
                                                    <option></option>
                                                    @foreach ($degrees as $degree)
                                                        <option value="{{ $degree->id }}"
                                                            @if ($degree->id == old('degree_id')) selected @endif>
                                                            {{ $degree->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-2">
                                        <button type="button" class="btn btn-sm btn-info" id="get-student-id1">Get
                                            Student ID</button>
                                    </div>

                                    <div class="col-sm-5">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Student
                                                    ID</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="additional_student_no"
                                                    class="form-control student-no1"
                                                    value="{{ old('additional_student_no') }}">
                                            </div>
                                        </div>
                                    </div>

                                </div> --}}
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Batch</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="batch_id" id="batch_id" class="myselect form-control">
                                                    <option></option>
                                                    @foreach ($batches as $batch)
                                                        <option value="{{ $batch->id }}"
                                                            @if ($batch->id == old('batch_id')) selected @endif>
                                                            {{ $batch->batch }}</option>
                                                    @endforeach
                                                </select>

                                                <p id="batch-message" class="text-danger font-bold"></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Age</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="age" class="form-control"
                                                    value="{{ old('age') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Registered Date</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="date" class="form-control"
                                                    value="{{ old('date') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Gender</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="radio" name="gender" value="Male" id="male"
                                                    @if ('Male' == old('gender')) checked @endif>
                                                <label for="male">Male</label>
                                                <input type="radio" name="gender" value="Female" id="female"
                                                    @if ('Female' == old('gender')) checked @endif>
                                                <label for="female">Female</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Start Date</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="start_date" class="form-control"
                                                    value="{{ old('start_date') }}">
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
                                                    value="{{ old('national_id') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>End Date</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="end_date" class="form-control"
                                                    value="{{ old('end_date') }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Father
                                                    Name</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="father_name" class="form-control"
                                                    value="{{ old('father_name') }}">
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
                                                    value="{{ old('dob') }}">
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Nationality</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="nationality" class="form-control"
                                                    value="{{ old('nationality') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Religion</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="religion" class="form-control"
                                                    value="{{ old('religion') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Marital
                                                    Status</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="radio" name="marital_status" value="Single"
                                                    id="single" @if ('Single' == old('marital_status')) checked @endif>
                                                <label for="single">Single</label>
                                                <input type="radio" name="marital_status" value="Married"
                                                    id="married" @if ('Married' == old('marital_status')) checked @endif>
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
                                                    value="{{ old('phone') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Mobile
                                                    No</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="mobile" class="form-control"
                                                    value="{{ old('mobile') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Email</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="email" name="email" class="form-control"
                                                    value="{{ old('email') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Address</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <textarea name="address" id="address" cols="30" rows="1" class="form-control">{{ old('address') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Education</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="education" class="form-control"
                                                    value="{{ old('education') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Other
                                                    Qualification</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="qualification" class="form-control"
                                                    value="{{ old('qualification') }}">
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
                                                    id="excellent" @if ('Excellent' == old('english_language')) checked @endif>
                                                <label for="excellent">Excellent</label>
                                                <input type="radio" name="english_language" value="Good"
                                                    id="good" @if ('Good' == old('english_language')) checked @endif>
                                                <label for="good">Good</label>
                                                <input type="radio" name="english_language" value="Fair"
                                                    id="fair" @if ('Fair' == old('english_language')) checked @endif>
                                                <label for="fair">Fair</label>
                                                <input type="radio" name="english_language" value="Poor"
                                                    id="poor" @if ('Poor' == old('english_language')) checked @endif>
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
                                                    id="excellent" @if ('Excellent' == old('other_language')) checked @endif>
                                                <label for="excellent">Excellent</label>
                                                <input type="radio" name="other_language" value="Good"
                                                    id="good" @if ('Good' == old('other_language')) checked @endif>
                                                <label for="good">Good</label>
                                                <input type="radio" name="other_language" value="Fair"
                                                    id="fair" @if ('Fair' == old('other_language')) checked @endif>
                                                <label for="fair">Fair</label>
                                                <input type="radio" name="other_language" value="Poor"
                                                    id="poor" @if ('Poor' == old('other_language')) checked @endif>
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
                                                    id="employer" @if ('Employer' == old('student_status')) checked @endif>
                                                <label for="employer">Employer</label>
                                                <input type="radio" name="student_status" value="Employee"
                                                    id="employee" @if ('Employee' == old('student_status')) checked @endif>
                                                <label for="employee">Employee</label>
                                                <input type="radio" name="student_status" value="Student"
                                                    id="student" @if ('Student' == old('student_status')) checked @endif>
                                                <label for="student">Student</label>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Employer</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="employer" class="form-control"
                                                    value="{{ old('employer') }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Type of
                                                    Business</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="business_type" class="form-control"
                                                    value="{{ old('business_type') }}">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Employee</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="employee" class="form-control"
                                                    value="{{ old('employee') }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Type of
                                                    Business(Employee)</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="employee_business_type" class="form-control"
                                                    value="{{ old('employee_business_type') }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Position</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="position" class="form-control"
                                                    value="{{ old('position') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Duties and
                                                    Responsibilities</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="duties" class="form-control"
                                                    value="{{ old('duties') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Pay Scale</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="pay" class="form-control"
                                                    value="{{ old('pay') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Reason For
                                                    Leaving</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="leaving" class="form-control"
                                                    value="{{ old('leaving') }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h5><b>Future Interest</b></h5>
                                            </div>

                                            @foreach ($future_interests as $future_interest)
                                                <div class="col-sm-12">
                                                    <input type="checkbox" name="future_interest[]"
                                                        value="{{ $future_interest->name }}" id="hotel" mulitple
                                                        {{ is_array(old('future_interest')) && in_array($future_interest->name, old('future_interest')) ? 'checked' : '' }}>
                                                    <label for="hotel">{{ $future_interest->name }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <h5><b>Source Survey</b></h5>
                                            </div>

                                            @foreach ($source_surveys as $source_survey)
                                                <div class="col-sm-12">
                                                    <input type="radio" name="source_survey[]"
                                                        value="{{ $source_survey->name }}"
                                                        id="{{ $source_survey->name }}" mulitple
                                                        {{ is_array(old('source_survey')) && in_array($source_survey->name, old('source_survey')) ? 'checked' : '' }}>
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
                                                    value="{{ old('applicant') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Applicant
                                                    Signature</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="file" name="applicant_sign" class="form-control"
                                                    value="{{ old('applicant_sign') }}">
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
                                                    value="{{ old('remark') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Oversea</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="checkbox" name="oversea" value="Oversea"
                                                    @if ('Oversea') == {{ old('oversea') }} checked @endif>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Registered
                                                    Signature</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="file" name="registered_sign" class="form-control"
                                                    value="{{ old('registered_sign') }}">
                                            </div>
                                        </div>
                                    </div> --}}

                                    {{-- <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Open Day</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="open_day" class="form-control"
                                                    value="{{ old('open_day') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Close Day</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="close_day" class="form-control"
                                                    value="{{ old('close_day') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Location</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="location" id="location" class="myselect form-control">
                                                    <option></option>
                                                    <option value="mhti1" @if ('mhti1' == old('location')) selected @endif>MHTI-1</option>
                                                    <option value="mhti2" @if ('mhti2' == old('location')) selected @endif>MHTI-2</option>
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
                                                    value="{{ old('payment_date') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Title</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="title" class="form-control"
                                                    value="{{ old('title') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-md-2 text-md-end"><b>Payment
                                                    Installment</b></label>
                                            <div class="col-sm-8 col-md-8">
                                                <input type="radio" name="payment_installment" value="Full"
                                                    id="full" @if ('Full' == old('payment_installment')) checked @endif>
                                                <label for="full">Full</label>
                                                <input type="radio" name="payment_installment" value="Deposit"
                                                    id="deposit" @if ('Deposit' == old('payment_installment')) checked @endif>
                                                <label for="deposit">Deposit</label>
                                                <input type="radio" name="payment_installment"
                                                    value="1 times installment" id="1"
                                                    @if ('1 times installment' == old('payment_installment')) checked @endif>
                                                <label for="1">1 times installment</label>

                                                <input type="radio" name="payment_installment"
                                                    value="2 times installment" id="2"
                                                    @if ('2 times installment' == old('payment_installment')) checked @endif>
                                                <label for="2">2 times installment</label>
                                                <input type="radio" name="payment_installment"
                                                    value="3 times installment" id="3"
                                                    @if ('3 times installment' == old('payment_installment')) checked @endif>
                                                <label for="3">3 times installment</label>
                                                {{-- <input type="radio" name="payment_type" value="4 times installment"
                                                    id="4" @if ('4 times installment' == old('payment_type')) checked @endif>
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
                                                            @if ($payment_type->id == old('payment_type')) selected @endif>
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
                                                    id="complete" @if ('Complete' == old('payment_complete')) checked @endif>
                                                <label for="complete">Complete</label>
                                                <input type="radio" name="payment_complete" value="InComplete"
                                                    id="incomplete" @if ('InComplete' == old('payment_complete')) checked @endif>
                                                <label for="incomplete">Incomplete</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Pay Money</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="pay_money" class="form-control"
                                                    value="{{ old('pay_money') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6 d-none">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Left Money</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="left_money" class="form-control"
                                                    value="{{ old('left_money') }}">
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
                        console.log(res);

                        $('.student-no').val(res.student_no);
                        $('.course_id').val(res.course_id);
                        $('.course_abbre').val(res.course_abbre);
                        $('.course_no').val(res.course_no);
                        // window.location.reload();
                    }
                });
            });

            $('#get-student-id1').click(function() {
                var course_id = $('#degree_id1').val();
                // console.log(course_id);

                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.generateStudentCode') }}',
                    data: {
                        'course_id': course_id,
                    },
                    dataType: 'json',
                    success: function(res) {
                        console.log(res);

                        $('.student-no1').val(res.student_no);
                        $('.course_id1').val(res.course_id);
                        $('.course_abbre1').val(res.course_abbre);
                        $('.course_no1').val(res.course_no);
                        // window.location.reload();
                    }
                });
            });

            $('#batch_id').change(function() {
                var batchId = $('#batch_id').val();

                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.batchMessage') }}',
                    data: {
                        'batchId': batchId,
                    },
                    dataType: 'json',

                    success: function(res) {
                        //console.log(res.message);
                        $('#batch-message').text(res.message);
                    }
                })
            });
        });
    </script>
@endsection

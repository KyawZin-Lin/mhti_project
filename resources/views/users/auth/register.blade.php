@extends('users.auth.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-12 col-lg-8 col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create Student Account!</h1>
                                    </div>
                                    <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data"
                                        autocomplete="off">
                                        @csrf
                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>Name</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ old('name') }}">
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

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>Phone</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" name="phone" class="form-control"
                                                            value="{{ old('phone') }}">
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Guardian
                                                            Phone</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" name="mobile" class="form-control"
                                                            value="{{ old('mobile') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-4 col-md-4"><b>Student
                                                            Category</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <select name="student_category" id="student_category"
                                                            class="myselect form-control">
                                                            <option></option>
                                                            <option value="Job"
                                                                @if ('Job' == old('student_category')) selected @endif>Job
                                                            </option>
                                                            <option value="Studying"
                                                                @if ('Studying' == old('student_category')) selected @endif>Studying
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>Experience</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" name="exp" class="form-control"
                                                            value="{{ old('exp') }}">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>Gender</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="radio" name="gender" value="Male" id="male"
                                                            @if ('Male' == old('gender')) selected @endif>
                                                        <label for="male">Male</label>
                                                        <input type="radio" name="gender" value="Female" id="female"
                                                            @if ('Female' == old('gender')) selected @endif>
                                                        <label for="female">Female</label>
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
                                        </div>

                                        <div class="row">
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
                                                    <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Mother
                                                            Name</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" name="mother_name" class="form-control"
                                                            value="{{ old('mother_name') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>Remarks</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <textarea name="remarks" id="remarks" cols="30" rows="1" class="form-control">{{ old('remarks') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>Photo</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="file" name="photo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Exam
                                                            ID</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="text" name="exam_id" class="form-control"
                                                            value="{{ old('exam_id') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Exam
                                                            Photo</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="file" name="exam_photo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>Passport</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="file" name="passport_photo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-3 col-md-3 text-md-end"><b>NRC</b></label>
                                                    <div class="col-sm-3">
                                                        <select name="" id="nrc_no"
                                                            class="myselect form-control">
                                                            <option></option>
                                                            @foreach ($nrc_info_nos as $nrc_info_no)
                                                                <option value="{{ $nrc_info_no->no }}">
                                                                    {{ $nrc_info_no->no }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 list">
                                                        <select name="nrc_info_id" id="nrc_abbre"
                                                            class="nrc_abbre myselect form-control">
                                                            <option></option>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3 col-md-3">
                                                        <input type="text" name="nrc" class="form-control"
                                                            value="{{ old('nrc') }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">

                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>NRC(Front)</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="file" name="nrc_front" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>NRC(Back)</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <input type="file" name="nrc_back" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-6 col-md-6 text-md-end"><b>State/Division</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <select class="myselect form-control" name="state_id"
                                                            id="state_id">
                                                            <option value="">Select An Option</option>
                                                            @foreach ($states as $state)
                                                                <option value="{{ $state->id }}"
                                                                    @if ($state->id == old('state_id')) selected @endif>
                                                                    {{ $state->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>City/Township</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <select class="township_id myselect form-control"
                                                            name="township_id">
                                                            <option></option>
                                                            {{-- <option value="">Select An Option</option>
                                                            @foreach ($townships as $township)
                                                                <option value="{{ $township->id }}"
                                                                    @if ($township->id == old('township_id')) selected @endif>
                                                                    {{ $township->name }}
                                                                </option>
                                                            @endforeach --}}
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-4">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4 text-md-end"><b>Address</b></label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <textarea name="address" id="address" cols="30" rows="1" class="form-control">{{ old('address') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <h5>Medical Status</h5>

                                                @foreach ($medical_statuses as $medical_status)
                                                    <div class="form-group row">
                                                        <label for=""
                                                            class="col-sm-2 col-md-2 text-md-end"><b>{{ $medical_status->name }}</b></label>
                                                        <div class="col-sm-10 col-md-10">
                                                            <?php $times = $medical_status->times; ?>
                                                            @for ($i = 1; $i <= $times; $i++)
                                                                <input type="checkbox" id="medical_status"
                                                                    name="medical_status[]"
                                                                    value="{{ $medical_status->name . '_' . $i }}">
                                                                <label for="">{{ $i }}</label>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group row">
                                                    <label for="" class="col-sm-2 col-md-2 text-md-end"><b>Topik
                                                            Level</b></label>
                                                    <div class="col-sm-10 col-md-10">
                                                        <div class="row">
                                                            <div class="col-sm-2">
                                                                <input type="radio" name="topik_level"
                                                                    value="topik_level1" id="topik_level1"
                                                                    @if ('topik_level1' == old('topik_level')) checked @endif>
                                                                <label for="topik_level1"> Level 1</label>
                                                            </div>

                                                            <div class="col-sm-2">
                                                                <input type="radio" name="topik_level"
                                                                    value="topik_level2" id="topik_level2"
                                                                    @if ('topik_level2' == old('topik_level')) checked @endif>
                                                                <label for="topik_level2"> Level 2</label>
                                                            </div>

                                                            <div class="col-sm-2">
                                                                <input type="radio" name="topik_level"
                                                                    value="topik_level3" id="topik_level3"
                                                                    @if ('topik_level3' == old('topik_level')) checked @endif>
                                                                <label for="topik_level3"> Level 3</label>
                                                            </div>

                                                            <div class="col-sm-2">

                                                                <input type="radio" name="topik_level"
                                                                    value="topik_level4" id="topik_level4"
                                                                    @if ('topik_level4' == old('topik_level')) checked @endif>
                                                                <label for="topik_level4"> Level 4</label>
                                                            </div>

                                                            <div class="col-sm-2">

                                                                <input type="radio" name="topik_level"
                                                                    value="topik_level5" id="topik_level5"
                                                                    @if ('topik_level5' == old('topik_level')) checked @endif>
                                                                <label for="topik_level5"> Level 5</label>
                                                            </div>

                                                            <div class="col-sm-2">

                                                                <input type="radio" name="topik_level"
                                                                    value="topik_level6" id="topik_level6"
                                                                    @if ('topik_level6' == old('topik_level')) checked @endif>
                                                                <label for="topik_level6"> Level 6</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group row">
                                                    <label for=""
                                                        class="col-sm-4 col-md-4"><b>Password</b></label>
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
                                                        <input type="password" name="confirm_password"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

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
                                        </div>
                                        <div class="row my-3 mb-5">
                                            <div class="col-3 offset-3">
                                                <button type="reset"
                                                    class="btn btn-sm btn-secondary w-100">Cancel</button>
                                            </div>
                                            <div class="col-3">
                                                <button type="submit" class="btn btn-sm btn-success w-100">Save</button>
                                            </div>

                                        </div>
                                    </form>
                                    <hr>
                                    {{-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div> --}}
                                    <div class="text-center">
                                        <a class="small" href="{{ route('user.loginPage') }}">Already have an account?
                                            Login!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#nrc_no').change(function() {
                var nrc_no = $('#nrc_no').val();

                $.ajax({
                    type: 'get',
                    url: '{{ route('user.ajaxNrcAbbre') }}',
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
                    url: '{{ route('user.ajaxTownship') }}',
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

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
                                <p class="mt-3"><b>Create Teacher</b></p>

                                <a href="{{ route('admin.teachers.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.teachers.store') }}" method="POST" enctype="multipart/form-data"
                                autocomplete="off">
                                @csrf
                                <div class="row">

                                    <input type="hidden" name="student_category" value="Job">

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
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Email</b></label>
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
                                            <label for="" class="col-sm-4 col-md-4 text-md-end"><b>Phone</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="phone" class="form-control"
                                                    value="{{ old('phone') }}">
                                            </div>
                                        </div>
                                    </div>

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
                                </div>

                                <div class="row">

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

                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-md-2 text-md-end"><b>NRC</b></label>
                                            <div class="col-sm-3">
                                                <select name="nrc_info_id" id="nrc_no" class="myselect form-control">
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
                                    <div class="col-sm-4">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-6 col-md-6 text-md-end"><b>State/Division</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select class="myselect form-control" name="state_id" id="state_id">
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
                                                <select class="township_id myselect form-control" name="township_id">
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
                                                class="col-sm-3 col-md-3 text-md-end"><b>Address</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <textarea name="address" id="address" cols="30" rows="1" class="form-control">{{ old('address') }}</textarea>
                                            </div>
                                        </div>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Course</b></label>
                                            <div class="col-sm-6 col-md-6">
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
                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end"><b>Remarks</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <textarea name="remarks" id="remarks" cols="30" rows="1" class="form-control">{{ old('remarks') }}</textarea>
                                            </div>
                                        </div>
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
                                                        <input type="radio" name="topik_level" value="topik_level1"
                                                            id="topik_level1"
                                                            @if ('topik_level1' == old('topik_level')) checked @endif>
                                                        <label for="topik_level1"> Level 1</label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <input type="radio" name="topik_level" value="topik_level2"
                                                            id="topik_level2"
                                                            @if ('topik_level2' == old('topik_level')) checked @endif>
                                                        <label for="topik_level2"> Level 2</label>
                                                    </div>

                                                    <div class="col-sm-2">
                                                        <input type="radio" name="topik_level" value="topik_level3"
                                                            id="topik_level3"
                                                            @if ('topik_level3' == old('topik_level')) checked @endif>
                                                        <label for="topik_level3"> Level 3</label>
                                                    </div>

                                                    <div class="col-sm-2">

                                                        <input type="radio" name="topik_level" value="topik_level4"
                                                            id="topik_level4"
                                                            @if ('topik_level4' == old('topik_level')) checked @endif>
                                                        <label for="topik_level4"> Level 4</label>
                                                    </div>

                                                    <div class="col-sm-2">

                                                        <input type="radio" name="topik_level" value="topik_level5"
                                                            id="topik_level5"
                                                            @if ('topik_level5' == old('topik_level')) checked @endif>
                                                        <label for="topik_level5"> Level 5</label>
                                                    </div>

                                                    <div class="col-sm-2">

                                                        <input type="radio" name="topik_level" value="topik_level6"
                                                            id="topik_level6"
                                                            @if ('topik_level6' == old('topik_level')) checked @endif>
                                                        <label for="topik_level6"> Level 6</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
        });
    </script>
@endsection

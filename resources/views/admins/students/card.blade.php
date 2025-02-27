@extends('admins.master')

@section('student-active', 'active')

@section('title', 'Student')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-8 offset-sm-2">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-right">
                                <button type="button" class="btn btn-sm btn-success btn-print"
                                    onclick="window.print()">Print</button>

                                <a href="{{ route('admin.students.show', $student->id) }}">
                                    <button type="button" class="btn btn-sm btn-danger btn-back">Back</button>
                                </a>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 text-center">
                                    <h5 class="mt-3"><b>MHTi – Hospitality & Tourism Institute Student Registration
                                            Form</b></h5>
                                </div>
                                <div class="col-3 text-right">
                                    @if ($student->photo)
                                        <img src="{{ asset('photos/students/photos/' . $student->photo) }}"
                                            class="img-thumbnail shadow p-3 mb-5 bg-body rounded w-75" alt="">
                                    @else
                                        <div class="text-danger shadow mb-5 bg-body rounded w-75 text-center"
                                            style="height: 150px;line-height:150px;">
                                            <b>No Photo</b>
                                        </div>
                                    @endif

                                </div>
                                <div class="col-4 offset-8 text-center">
                                    <p>Date - {{ $student->date != null ? date('d-M-Y', strtotime($student->date)) : '' }}
                                    </p>
                                </div>

                                <div class="col-sm-4 text-center">
                                    {{ $qrCodes }}
                                </div>

                                <div class="col-sm-8">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tr class="print-line-height">
                                                <td>Course Registered</td>
                                                <td>: {{ $student->course_registered }}</td>
                                            </tr>

                                            <tr class="print-line-height">
                                                <td>Name</td>
                                                <td>: {{ $student->name }}</td>
                                            </tr>

                                            <tr class="print-line-height">
                                                <td>Student ID</td>
                                                <td>: {{ $student->student_id }}</td>
                                            </tr>

                                            <tr class="print-line-height">
                                                <td>National ID Card No</td>
                                                <td>: {{ $student->national_id }}</td>
                                            </tr>

                                            <tr class="print-line-height">
                                                <td>Date of Birth</td>
                                                <td>:
                                                    {{ $student->dob != null ? date('d-M-Y', strtotime($student->dob)) : '' }}
                                                </td>
                                            </tr>

                                            {{-- <tr>
                                                <td colspan="2">Student ID: {{ $student->student_id }}</td>
                                                <td>Vr No: {{ $student->vr_no }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">National ID Card No: {{ $student->national_id }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Father Name: {{ $student->father_name }}</td>
                                            </tr>
                                            <tr>
                                                <td>Date of Birth:
                                                    {{ $student->dob != null ? date('d-M-Y', strtotime($student->dob)) : '' }}
                                                </td>
                                                <td>Age: {{ $student->age }}</td>
                                                <td>Gender: {{ $student->gender }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Nationality: {{ $student->nationality }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Religion: {{ $student->religion }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Marital Status: {{ $student->marital_status }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Home Phone No: {{ $student->phone }}</td>
                                                <td>Mobile No: {{ $student->mobile }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Email: {{ $student->email }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Address: {{ $student->address }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Education: {{ $student->education }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="3">Other Qualification: {{ $student->qualification }}</td>
                                            </tr> --}}
                                        </table>
                                    </div>
                                </div>

                            </div>

                            {{-- <div class="row">
                                <div class="col-6 text-center">
                                    <p>Applicant: {{ $student->applicant }}</p>
                                </div>
                                <div class="col-6 text-center">
                                    @if ($student->applicant_sign)
                                        <img src="{{ asset('photos/students/applicant_signs/' . $student->applicant_sign) }}"
                                            class="mb-5 bg-body rounded" alt="" style="width:50px;height:50px;">
                                    @else
                                        <div class="text-danger shadow mb-5 bg-body rounded text-center"
                                            style="height: 150px;line-height:150px;">
                                            <b>-</b>
                                        </div>
                                    @endif

                                </div>
                                <div class="col-6 text-center">
                                    <p>Registered By: {{ $student->registered }}</p>
                                </div>
                                <div class="col-6 text-center">
                                    @if ($student->registered_sign)
                                        <img src="{{ asset('photos/students/registered_signs/' . $student->registered_sign) }}"
                                            class="mb-5 bg-body rounded" alt="" style="width:50px;height:50px;">
                                    @else
                                        <div class="text-danger shadow mb-5 bg-body rounded text-center"
                                            style="height: 150px;line-height:150px;">
                                            <b>-</b>
                                        </div>
                                    @endif

                                </div>
                            </div> --}}
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

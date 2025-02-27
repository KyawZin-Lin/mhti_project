@extends('admins.master')

@section('enrollment-active', 'active')

@section('title', 'Student')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <div class="btn-print">
                                    {{-- <a href="{{ route('admin.students.index') }}"><button type="button"
                                            class="btn btn-md btn-info">All</button></a>

                                    <a href="{{ route('admin.activeStudent') }}"><button type="button"
                                            class="btn btn-md btn-info">Active
                                            Student</button></a>

                                    <a href="{{ route('admin.alumnus') }}"><button type="button"
                                            class="btn btn-md btn-info">Alumnus</button></a>

                                    <a href="{{ route('admin.complete_payment_student') }}"><button type="button"
                                            class="btn btn-md btn-info">Complete Payment Student</button></a>

                                    <a href="{{ route('admin.incomplete_payment_student') }}"><button type="button"
                                            class="btn btn-md btn-info">Incomplete Payment Student</button></a> --}}
                                </div>
                                <div class="text-right">
                                    {{-- <button type="button" class="btn btn-sm btn-success btn-print"
                                        onclick="window.print()">Print</button>

                                    <a href="{{ route('admin.students.card', $student->id) }}" class="text-decoration-none">
                                        <button type="button" class="btn btn-sm btn-primary btn-card">Card</button>
                                    </a> --}}

                                    <a href="{{ route('admin.student_enrollment', $student->batch_id) }}">
                                        <button type="button" class="btn btn-sm btn-danger btn-back">Back</button>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-9 text-right">
                                    {{-- <h5 class="mt-3"><b>MHTi – Hospitality & Tourism Institute Student Registration
                                            Form</b></h5> --}}
                                </div>
                                <div class="col-3 text-right">
                                    @if ($student->photo)
                                        <img src="{{ asset('photos/students/photos/' . $student->photo) }}"
                                            class="img-thumbnail shadow p-3 mb-5 bg-body rounded w-50" alt="">
                                    @else
                                        <div class="text-danger shadow mb-5 bg-body rounded w-50 text-center"
                                            style="height: 150px;line-height:150px;">
                                            <b>No Photo</b>
                                        </div>
                                    @endif

                                </div>
                                <div class="col-3 offset-9 text-center">
                                    <p>Date - {{ $student->date != null ? date('d-M-Y', strtotime($student->date)) : '' }}
                                    </p>
                                </div>

                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-strip">
                                            <tr>
                                                <td colspan="3"><b>Personal Detail</b></td>
                                            </tr>
                                            {{-- <tr>
                                                <td colspan="3">Course Registered: {{ $student->registered }}</td>
                                            </tr> --}}
                                            <tr>
                                                <td colspan="3">Name: {{ $student->name }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">Student ID: {{ $student->student_no }}</td>
                                                <td></td>
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
                                            </tr>
                                        </table>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-strip">
                                            <tr>
                                                <td colspan="2"><b>Language</b></td>
                                            </tr>
                                            <tr>
                                                <td>English: {{ $student->english_language }}</td>
                                                <td>Other: {{ $student->other_language }}</td>
                                            </tr>

                                        </table>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-strip">
                                            <tr>
                                                <td><b>Student Status</b>: {{ $student->student_status }}</td>
                                            </tr>
                                            <tr>
                                                <td>Business Type: {{ $student->business_type }}</td>
                                            </tr>
                                            {{-- <tr>
                                                <td>Position: {{ $student->position }}</td>
                                            </tr>
                                            <tr>
                                                <td>Duties and Responsibilities: {{ $student->duties }}</td>
                                            </tr>
                                            <tr>
                                                <td>Pay Scale: {{ $student->pay }}</td>
                                            </tr>
                                            <tr>
                                                <td>Reason for Leaving: {{ $student->leaving }}</td>
                                            </tr> --}}

                                        </table>
                                    </div>
                                </div>

                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-strip">
                                            <tr>
                                                <td colspan="2"><b>Future Interest</b></td>
                                            </tr>
                                            @php $future_interest = explode(',',$student->future_interest) @endphp
                                            <tr>
                                                @if (in_array('Hotel', $future_interest))
                                                    <td>◾ To work in Hotel/Restaurant/Travel&Tour</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if (in_array('Start Business', $future_interest))
                                                    <td>◾ To start own business</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if (in_array('Manage Business', $future_interest))
                                                    <td>◾ To manage own business</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if (in_array('Management Level', $future_interest))
                                                    <td>◾ To move to management level</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if (in_array('Study', $future_interest))
                                                    <td>◾ To go for further study</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if (in_array('Oversea', $future_interest))
                                                    <td>◾ To work oversea</td>
                                                @endif
                                            </tr>
                                            <tr>
                                                @if (in_array('Other', $future_interest))
                                                    <td>◾ Other</td>
                                                @endif
                                            </tr>

                                        </table>
                                    </div>
                                </div>
                            </div>

                            <div class="row payment-history d-none">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Title</th>
                                                <th>Payment Type</th>
                                                <th>Payment Installment</th>
                                                <th>Pay Money</th>
                                                {{-- <th>Left Money</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($incomes as $income)
                                                <tr>
                                                    <td>{{ $income->date != null ? date('d-M-Y', strtotime($income->date)) : '' }}
                                                    </td>
                                                    <td>{{ $income->title }}</td>
                                                    <td>{{ $income->paymentType != null ? $income->paymentType->name : '' }}
                                                    </td>
                                                    <td>{{ $income->payment_installment }}</td>
                                                    <td>{{ $income->amount }}</td>
                                                    {{-- <td>{{ $income->left_money }}</td> --}}
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        {{-- <tfoot>
                                            <tr class="text-right">
                                                <td colspan="6">
                                                    @if ($student->payment_complete == 'Complete')
                                                        <p class="badge badge-success">Payment Complete</p>
                                                    @else
                                                        <p class="badge badge-danger">Payment Incomplete</p>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tfoot> --}}
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                {{-- <div class="col-6 text-center">
                                    <p>Applicant: {{ $student->applicant }}</p>
                                </div>
                                <div class="col-6 text-center">
                                    @if ($student->applicant_sign)
                                        <img src="{{ asset('photos/students/applicant_signs/' . $student->applicant_sign) }}"
                                            class="mb-5 bg-body rounded" alt="" style="width:50px;height:50px;">
                                    @else
                                        <p>-</p>
                                    @endif

                                </div> --}}
                                <div class="col-6 text-center">
                                    <p>Registered By: {{ $student->registered }}</p>
                                </div>
                                {{-- <div class="col-6 text-center">
                                    @if ($student->registered_sign)
                                        <img src="{{ asset('photos/students/registered_signs/' . $student->registered_sign) }}"
                                            class="mb-5 bg-body rounded" alt="" style="width:50px;height:50px;">
                                    @else
                                        <p>-</p>
                                    @endif

                                </div> --}}
                            </div>
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

@extends('admins.master')

@section('teacher-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Detail Teacher</b></p>

                                <a href="{{ route('admin.teachers.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>

                                {{-- <form action="{{ route('admin.teacher_payment_auto_delete', $teacher->id) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-danger">Auto Delete</button>
                                </form> --}}
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    @if ($teacher->photo)
                                        <img src="{{ asset('photos/teachers/photos/' . $teacher->photo) }}"
                                            class="img-thumbnail shadow p-3 mb-5 bg-body rounded w-50" alt="">
                                    @else
                                        <div class="text-danger shadow mb-5 bg-body rounded w-50 text-center"
                                            style="height: 150px;line-height:150px;">
                                            <b>No Photo</b>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-sm-2">
                                    <h6>Name</h6>
                                    <h6>Phone</h6>
                                    <h6>Position</h6>
                                    <h6>Course</h6>
                                    <h6>Batch</h6>
                                    {{-- <h6>Degree</h6> --}}
                                    <h6>Address</h6>
                                    <h6>Duty Assign</h6>
                                    <h6>Standard Salary</h6>
                                </div>

                                <div class="col-sm-6">
                                    <h6>: {{ $teacher->name }}</h6>
                                    <h6>: {{ $teacher->phone }}</h6>
                                    <h6>: {{ $teacher->position }}</h6>
                                    <h6>: {{ $teacher->course != null ? $teacher->course->name : '' }}</h6>
                                    <h6>: {{ $teacher->batch != null ? $teacher->batch->batch : '' }}</h6>
                                    {{-- <h6>: {{ $teacher->degree }}</h6> --}}
                                    <h6>: {{ $teacher->address }}</h6>
                                    <h6>: {{ $teacher->duty_assign }}</h6>
                                    <h6>: {{ $teacher->standard_salary }}</h6>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-4">
                                    <h6><b>Attendance History</b></h6>
                                    {{-- @php
                                        $jan = 1;
                                    @endphp --}}

                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 1]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 1 ? 'btn-success' : 'btn-primary' }}"
                                            value="1">January</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 2]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 2 ? 'btn-success' : 'btn-primary' }}">February</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 3]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 3 ? 'btn-success' : 'btn-primary' }}">March</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 4]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 4 ? 'btn-success' : 'btn-primary' }}">April</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 5]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 5 ? 'btn-success' : 'btn-primary' }}">May</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 6]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 6 ? 'btn-success' : 'btn-primary' }}">June</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 7]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 7 ? 'btn-success' : 'btn-primary' }}">July</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 8]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 8 ? 'btn-success' : 'btn-primary' }}">August</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 9]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 9 ? 'btn-success' : 'btn-primary' }}">September</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 10]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 10 ? 'btn-success' : 'btn-primary' }}">October</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 11]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 11 ? 'btn-success' : 'btn-primary' }}">November</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 12]) }}">
                                        <button type="button"
                                            class="btn btn-sm d-block w-100 mb-1 {{ $month == 12 ? 'btn-success' : 'btn-primary' }}">December</button>
                                    </a>
                                    {{-- <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Note</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($teacher_attendances as $teacher_attendance)
                                                    <tr>
                                                        <td>{{ $teacher_attendance->date != null ? date('d-M-Y', strtotime($teacher_attendance->date)) : '' }}
                                                        </td>
                                                        <td>{{ $teacher_attendance->note }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>


                                        </table>
                                    </div>

                                    <div class="float-right">
                                        {{ $teacher_attendances->withQueryString()->links() }}
                                    </div> --}}
                                </div>

                                <div class="col-sm-8">

                                    <div class="card">
                                        <div class="card-header">
                                            <div class="d-flex justify-content-between">
                                                <p class="mt-3"><b>
                                                        @if ($month == '1')
                                                            January
                                                        @elseif ($month == '2')
                                                            February
                                                        @elseif ($month == '3')
                                                            March
                                                        @elseif ($month == '4')
                                                            April
                                                        @elseif ($month == '5')
                                                            May
                                                        @elseif ($month == '6')
                                                            June
                                                        @elseif ($month == '7')
                                                            July
                                                        @elseif ($month == '8')
                                                            August
                                                        @elseif ($month == '9')
                                                            September
                                                        @elseif ($month == '10')
                                                            October
                                                        @elseif ($month == '11')
                                                            November
                                                        @elseif ($month == '12')
                                                            December
                                                        @endif
                                                        , {{ $year }}

                                                    </b></p>

                                                @php
                                                    $date = Carbon\Carbon::today();
                                                    $today = $date->format('d-M-Y');
                                                @endphp
                                                <p>
                                                    Today Date : {{ $today }}
                                                </p>

                                            </div>
                                        </div>

                                        <div class="card-body">
                                            <div class="row mt-5">
                                                <div class="col-sm-12">

                                                    @php
                                                        $janAttendance1 = 0;
                                                        $janAttendance2 = 0;
                                                        $janAttendance3 = 0;
                                                        $janAttendance4 = 0;
                                                        $janAttendance5 = 0;
                                                        $janAttendance6 = 0;
                                                        $janAttendance7 = 0;
                                                        $janAttendance8 = 0;
                                                        $janAttendance9 = 0;
                                                        $janAttendance10 = 0;
                                                        $janAttendance11 = 0;
                                                        $janAttendance12 = 0;
                                                        $janAttendance13 = 0;
                                                        $janAttendance14 = 0;
                                                        $janAttendance15 = 0;
                                                        $janAttendance16 = 0;
                                                        $janAttendance17 = 0;
                                                        $janAttendance18 = 0;
                                                        $janAttendance19 = 0;
                                                        $janAttendance20 = 0;
                                                        $janAttendance21 = 0;
                                                        $janAttendance22 = 0;
                                                        $janAttendance23 = 0;
                                                        $janAttendance24 = 0;
                                                        $janAttendance25 = 0;
                                                        $janAttendance26 = 0;
                                                        $janAttendance27 = 0;
                                                        $janAttendance28 = 0;
                                                        $janAttendance29 = 0;
                                                        $janAttendance30 = 0;
                                                        $janAttendance31 = 0;
                                                        foreach ($jan_attendances as $jan) {
                                                            $date = strtotime($jan->attendance_date);
                                                            $datenumber = date('d', $date);
                                                            if ($datenumber == '01') {
                                                                $janAttendance1 = '1';
                                                            } elseif ($datenumber == '02') {
                                                                $janAttendance2 = '2';
                                                            } elseif ($datenumber == '03') {
                                                                $janAttendance3 = '3';
                                                            } elseif ($datenumber == '04') {
                                                                $janAttendance4 = '4';
                                                            } elseif ($datenumber == '05') {
                                                                $janAttendance5 = '5';
                                                            } elseif ($datenumber == '06') {
                                                                $janAttendance6 = '6';
                                                            } elseif ($datenumber == '07') {
                                                                $janAttendance7 = '7';
                                                            } elseif ($datenumber == '08') {
                                                                $janAttendance8 = '8';
                                                            } elseif ($datenumber == '09') {
                                                                $janAttendance9 = '9';
                                                            } elseif ($datenumber == '10') {
                                                                $janAttendance10 = '10';
                                                            } elseif ($datenumber == '11') {
                                                                $janAttendance11 = '11';
                                                            } elseif ($datenumber == '12') {
                                                                $janAttendance12 = '12';
                                                            } elseif ($datenumber == '13') {
                                                                $janAttendance13 = '13';
                                                            } elseif ($datenumber == '14') {
                                                                $janAttendance14 = '14';
                                                            } elseif ($datenumber == '15') {
                                                                $janAttendance15 = '15';
                                                            } elseif ($datenumber == '16') {
                                                                $janAttendance16 = '16';
                                                            } elseif ($datenumber == '17') {
                                                                $janAttendance17 = '17';
                                                            } elseif ($datenumber == '18') {
                                                                $janAttendance18 = '18';
                                                            } elseif ($datenumber == '19') {
                                                                $janAttendance19 = '19';
                                                            } elseif ($datenumber == '20') {
                                                                $janAttendance20 = '20';
                                                            } elseif ($datenumber == '21') {
                                                                $janAttendance21 = '21';
                                                            } elseif ($datenumber == '22') {
                                                                $janAttendance22 = '22';
                                                            } elseif ($datenumber == '23') {
                                                                $janAttendance23 = '23';
                                                            } elseif ($datenumber == '24') {
                                                                $janAttendance24 = '24';
                                                            } elseif ($datenumber == '25') {
                                                                $janAttendance25 = '25';
                                                            } elseif ($datenumber == '26') {
                                                                $janAttendance26 = '26';
                                                            } elseif ($datenumber == '27') {
                                                                $janAttendance27 = '27';
                                                            } elseif ($datenumber == '28') {
                                                                $janAttendance28 = '28';
                                                            } elseif ($datenumber == '29') {
                                                                $janAttendance29 = '29';
                                                            } elseif ($datenumber == '30') {
                                                                $janAttendance30 = '30';
                                                            } elseif ($datenumber == '31') {
                                                                $janAttendance31 = '31';
                                                            }
                                                        }

                                                        $janLeave1 = 0;
                                                        $janLeave2 = 0;
                                                        $janLeave3 = 0;
                                                        $janLeave4 = 0;
                                                        $janLeave5 = 0;
                                                        $janLeave6 = 0;
                                                        $janLeave7 = 0;
                                                        $janLeave8 = 0;
                                                        $janLeave9 = 0;
                                                        $janLeave10 = 0;
                                                        $janLeave11 = 0;
                                                        $janLeave12 = 0;
                                                        $janLeave13 = 0;
                                                        $janLeave14 = 0;
                                                        $janLeave15 = 0;
                                                        $janLeave16 = 0;
                                                        $janLeave17 = 0;
                                                        $janLeave18 = 0;
                                                        $janLeave19 = 0;
                                                        $janLeave20 = 0;
                                                        $janLeave21 = 0;
                                                        $janLeave22 = 0;
                                                        $janLeave23 = 0;
                                                        $janLeave24 = 0;
                                                        $janLeave25 = 0;
                                                        $janLeave26 = 0;
                                                        $janLeave27 = 0;
                                                        $janLeave28 = 0;
                                                        $janLeave29 = 0;
                                                        $janLeave30 = 0;
                                                        $janLeave31 = 0;
                                                        foreach ($jan_leaves as $jan) {
                                                            $date = strtotime($jan->leave_date);
                                                            $datenumber = date('d', $date);
                                                            if ($datenumber == '01') {
                                                                $janLeave1 = '1';
                                                            } elseif ($datenumber == '02') {
                                                                $janLeave2 = '2';
                                                            } elseif ($datenumber == '03') {
                                                                $janLeave3 = '3';
                                                            } elseif ($datenumber == '04') {
                                                                $janLeave4 = '4';
                                                            } elseif ($datenumber == '05') {
                                                                $janLeave5 = '5';
                                                            } elseif ($datenumber == '06') {
                                                                $janLeave6 = '6';
                                                            } elseif ($datenumber == '07') {
                                                                $janLeave7 = '7';
                                                            } elseif ($datenumber == '08') {
                                                                $janLeave8 = '8';
                                                            } elseif ($datenumber == '09') {
                                                                $janLeave9 = '9';
                                                            } elseif ($datenumber == '10') {
                                                                $janLeave10 = '10';
                                                            } elseif ($datenumber == '11') {
                                                                $janLeave11 = '11';
                                                            } elseif ($datenumber == '12') {
                                                                $janLeave12 = '12';
                                                            } elseif ($datenumber == '13') {
                                                                $janLeave13 = '13';
                                                            } elseif ($datenumber == '14') {
                                                                $janLeave14 = '14';
                                                            } elseif ($datenumber == '15') {
                                                                $janLeave15 = '15';
                                                            } elseif ($datenumber == '16') {
                                                                $janLeave16 = '16';
                                                            } elseif ($datenumber == '17') {
                                                                $janLeave17 = '17';
                                                            } elseif ($datenumber == '18') {
                                                                $janLeave18 = '18';
                                                            } elseif ($datenumber == '19') {
                                                                $janLeave19 = '19';
                                                            } elseif ($datenumber == '20') {
                                                                $janLeave20 = '20';
                                                            } elseif ($datenumber == '21') {
                                                                $janLeave21 = '21';
                                                            } elseif ($datenumber == '22') {
                                                                $janLeave22 = '22';
                                                            } elseif ($datenumber == '23') {
                                                                $janLeave23 = '23';
                                                            } elseif ($datenumber == '24') {
                                                                $janLeave24 = '24';
                                                            } elseif ($datenumber == '25') {
                                                                $janLeave25 = '25';
                                                            } elseif ($datenumber == '26') {
                                                                $janLeave26 = '26';
                                                            } elseif ($datenumber == '27') {
                                                                $janLeave27 = '27';
                                                            } elseif ($datenumber == '28') {
                                                                $janLeave28 = '28';
                                                            } elseif ($datenumber == '29') {
                                                                $janLeave29 = '29';
                                                            } elseif ($datenumber == '30') {
                                                                $janLeave30 = '30';
                                                            } elseif ($datenumber == '31') {
                                                                $janLeave31 = '31';
                                                            }
                                                        }
                                                    @endphp

                                                    <div class="table-responsive">
                                                        <table class="table table-bordered">
                                                            <tbody class="text-center">

                                                                <tr>
                                                                    @for ($i = 1; $i <= $days; $i++)
                                                                        @if ($i <= 7)
                                                                            <td
                                                                                class="
                                                                            @if ($i == $janAttendance1) bg-success text-white
                                                                            @elseif ($i == $janAttendance2) bg-success text-white
                                                                            @elseif ($i == $janAttendance3) bg-success text-white
                                                                            @elseif ($i == $janAttendance4) bg-success text-white
                                                                            @elseif ($i == $janAttendance5) bg-success text-white
                                                                            @elseif ($i == $janAttendance6) bg-success text-white
                                                                            @elseif ($i == $janAttendance7) bg-success text-white

                                                                            @elseif($i == $janLeave1) bg-danger text-white
                                                                            @elseif($i == $janLeave2) bg-danger text-white
                                                                            @elseif($i == $janLeave3) bg-danger text-white
                                                                            @elseif($i == $janLeave4) bg-danger text-white
                                                                            @elseif($i == $janLeave5) bg-danger text-white
                                                                            @elseif($i == $janLeave6) bg-danger text-white
                                                                            @elseif($i == $janLeave7) bg-danger text-white @endif">
                                                                                {{ $i }}
                                                                            </td>
                                                                        @endif
                                                                    @endfor
                                                                </tr>
                                                                <tr>
                                                                    @for ($i = 1; $i <= $days; $i++)
                                                                        @if ($i >= 8 && $i <= 14)
                                                                            <td
                                                                                class="
                                                                                @if ($i == $janAttendance8) bg-success text-white
                                                                                @elseif ($i == $janAttendance9) bg-success text-white
                                                                                @elseif ($i == $janAttendance10) bg-success text-white
                                                                                @elseif ($i == $janAttendance11) bg-success text-white
                                                                                @elseif ($i == $janAttendance12) bg-success text-white
                                                                                @elseif ($i == $janAttendance13) bg-success text-white
                                                                                @elseif ($i == $janAttendance14) bg-success text-white

                                                                                @elseif($i == $janLeave8) bg-danger text-white
                                                                                @elseif($i == $janLeave9) bg-danger text-white
                                                                                @elseif($i == $janLeave10) bg-danger text-white
                                                                                @elseif($i == $janLeave11) bg-danger text-white
                                                                                @elseif($i == $janLeave12) bg-danger text-white
                                                                                @elseif($i == $janLeave13) bg-danger text-white
                                                                                @elseif($i == $janLeave14) bg-danger text-white @endif">
                                                                                {{ $i }}
                                                                            </td>
                                                                        @endif
                                                                    @endfor
                                                                </tr>
                                                                <tr>
                                                                    @for ($i = 1; $i <= $days; $i++)
                                                                        @if ($i >= 15 && $i <= 21)
                                                                            <td
                                                                                class="
                                                                            @if ($i == $janAttendance15) bg-success text-white
                                                                            @elseif ($i == $janAttendance16) bg-success text-white
                                                                            @elseif ($i == $janAttendance17) bg-success text-white
                                                                            @elseif ($i == $janAttendance18) bg-success text-white
                                                                            @elseif ($i == $janAttendance19) bg-success text-white
                                                                            @elseif ($i == $janAttendance20) bg-success text-white
                                                                            @elseif ($i == $janAttendance21) bg-success text-white

                                                                            @elseif($i == $janLeave15) bg-danger text-white
                                                                            @elseif($i == $janLeave16) bg-danger text-white
                                                                            @elseif($i == $janLeave17) bg-danger text-white
                                                                            @elseif($i == $janLeave18) bg-danger text-white
                                                                            @elseif($i == $janLeave19) bg-danger text-white
                                                                            @elseif($i == $janLeave20) bg-danger text-white
                                                                            @elseif($i == $janLeave21) bg-danger text-white @endif">
                                                                                {{ $i }}
                                                                            </td>
                                                                        @endif
                                                                    @endfor
                                                                </tr>
                                                                <tr>
                                                                    @for ($i = 1; $i <= $days; $i++)
                                                                        @if ($i >= 22 && $i <= 28)
                                                                            <td
                                                                                class="
                                                                            @if ($i == $janAttendance22) bg-success text-white
                                                                            @elseif ($i == $janAttendance23) bg-success text-white
                                                                            @elseif ($i == $janAttendance24) bg-success text-white
                                                                            @elseif ($i == $janAttendance25) bg-success text-white
                                                                            @elseif ($i == $janAttendance26) bg-success text-white
                                                                            @elseif ($i == $janAttendance27) bg-success text-white
                                                                            @elseif ($i == $janAttendance28) bg-success text-white

                                                                            @elseif($i == $janLeave22) bg-danger text-white
                                                                            @elseif($i == $janLeave23) bg-danger text-white
                                                                            @elseif($i == $janLeave24) bg-danger text-white
                                                                            @elseif($i == $janLeave25) bg-danger text-white
                                                                            @elseif($i == $janLeave26) bg-danger text-white
                                                                            @elseif($i == $janLeave27) bg-danger text-white
                                                                            @elseif($i == $janLeave28) bg-danger text-white @endif">
                                                                                {{ $i }}
                                                                            </td>
                                                                        @endif
                                                                    @endfor
                                                                </tr>
                                                                <tr>
                                                                    @for ($i = 1; $i <= $days; $i++)
                                                                        @if ($i >= 29 && $i <= 31)
                                                                            <td
                                                                                class="
                                                                            @if ($i == $janAttendance29) bg-success text-white
                                                                            @elseif ($i == $janAttendance30) bg-success text-white
                                                                            @elseif ($i == $janAttendance31) bg-success text-white


                                                                            @elseif($i == $janLeave29) bg-danger text-white
                                                                            @elseif($i == $janLeave30) bg-danger text-white
                                                                            @elseif($i == $janLeave31) bg-danger text-white @endif">
                                                                                {{ $i }}
                                                                            </td>
                                                                        @endif
                                                                    @endfor
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            {{-- <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <h6><b>Leave History</b></h6>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Note</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($staff_leaves as $staff_leave)
                                                    <tr>
                                                        <td>{{ $staff_leave->date != null ? date('d-M-Y', strtotime($staff_leave->date)) : '' }}
                                                        </td>
                                                        <td>{{ $staff_leave->note }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>


                                        </table>
                                    </div>

                                    <div class="float-right">
                                        {{ $staff_leaves->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div> --}}

                            <hr>

                            <div class="row">
                                <div class="col-sm-12">
                                    <h6><b>Payment History</b></h6>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Payment Type</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($expenses as $expense)
                                                    <tr>
                                                        <td>{{ $expense->date != null ? date('d-M-Y', strtotime($expense->date)) : '' }}
                                                        </td>
                                                        <td>{{ number_format($expense->amount) }}</td>
                                                        <td>{{ $expense->paymentType != null ? $expense->paymentType->name : '' }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>


                                        </table>
                                    </div>

                                    <div class="float-right">
                                        {{ $expenses->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('script')
    {{-- <script>
        function month(id, month) {

            $.ajax({
                type: 'get',
                url: '{{ route('admin.teacher_grid_view') }}',
                data: {
                    'id': id,
                    'month': month,
                },
                dataType: 'json',
                success: function(res) {
                    console.log(res);


                    if (res.month == '1') {
                        $('.date-year').html("January, " + res.year);
                    }
                    if (res.month == '2') {
                        $('.date-year').html("February, " + res.year);
                    }
                    if (res.month == '3') {
                        $('.date-year').html("March, " + res.year);
                    }
                    if (res.month == '4') {
                        $('.date-year').html("April, " + res.year);
                    }
                    if (res.month == '5') {
                        $('.date-year').html("May, " + res.year);
                    }
                    if (res.month == '6') {
                        $('.date-year').html("June, " + res.year);
                    }
                    if (res.month == '7') {
                        $('.date-year').html("July, " + res.year);
                    }
                    if (res.month == '8') {
                        $('.date-year').html("August, " + res.year);
                    }
                    if (res.month == '9') {
                        $('.date-year').html("September, " + res.year);
                    }
                    if (res.month == '10') {
                        $('.date-year').html("October, " + res.year);
                    }
                    if (res.month == '11') {
                        $('.date-year').html("November, " + res.year);
                    }
                    if (res.month == '12') {
                        $('.date-year').html("December, " + res.year);
                    }

                }
            })
        }
    </script> --}}
@endsection

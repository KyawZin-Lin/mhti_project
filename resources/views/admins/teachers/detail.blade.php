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

                                    {{-- onclick="month({{ $teacher->id }},1)" --}}

                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 1]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1 jan"
                                            value="1">January</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 2]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},2)">February</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 3]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},3)">March</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 4]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},4)">April</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 5]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},5)">May</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 6]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},6)">June</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 7]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},7)">July</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 8]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},8)">August</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 9]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},9)">September</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 10]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},10)">October</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 11]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},11)">November</button>
                                    </a>
                                    <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 12]) }}">
                                        <button type="button" class="btn btn-sm btn-primary d-block w-100 mb-1"
                                            onclick="month({{ $teacher->id }},12)">December</button>
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

                                    <p class="mt-3 date-year"><b></b></p>

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
                url: '{{ route('admin.teacher_grid_view',['id','month']) }}',
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

@extends('admins.master')

@section('teacher-attendance-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 title-bar">
                <div class="col-sm-2">
                    <div class="float-left">Teacher Attendance</div>
                </div>

                <div class="col-sm-10">
                    <a href="{{ route('admin.teacher_attendances.create') }}"><button type="button"
                            class="btn btn-md btn-success float-right"><b><i class="fas fa-plus-square"></i>
                                Create Teacher Attendance</b></button></a>
                </div>

            </div>



            <div class="row">
                <div class="col-sm-2">
                    <h5>Total - {{ $teacher_attendances->total() }}</h5>
                </div>
                <div class="col-sm-5">
                    <form action="{{ route('admin.teacher_attendances.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-6 ml-0 mr-1 p-0">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Daily</span>
                                    <input type="date" name="date" id="date" class="form-control bg-white"
                                        value="{{ request()->date }}" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>

                            <div class="col-sm-6 ml-0 mr-1 p-0">
                                <div class="input-group mb-3">
                                    <span class="input-group-text" id="inputGroup-sizing-default">Monthly</span>
                                    <input type="month" name="month" id="month" class="form-control bg-white"
                                        value="{{ request()->month }}" aria-describedby="inputGroup-sizing-default">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>

                <div class="col-sm-5 m-0 p-0">

                    <form action="{{ route('admin.teacher_attendances.index') }}" method="GET">
                        @csrf
                        <div class="input-group">
                            <span class="input-group-text">From Date</span>
                            <input type="date" name="from_date" id="from-date" class="form-control"
                                aria-label="Recipient's username with two button addons" value="{{ request()->from_date }}">
                            <span class="input-group-text">To Date</span>
                            <input type="date" name="to_date" id="to-date" class="form-control"
                                aria-label="Recipient's username with two button addons" value="{{ request()->to_date }}">
                            <button type="submit" class="btn btn-success" type="button"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="datatable table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Teacher</th>
                                    <th>Phone</th>
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($teacher_attendances as $teacher_attendance)
                                    <tr>
                                        <td>{{ $teacher_attendance->date != null ? date('d-M-Y', strtotime($teacher_attendance->date)) : '' }}
                                        </td>
                                        <td>{{ $teacher_attendance->teacher != null ? $teacher_attendance->teacher->name : '' }}
                                        </td>
                                        <td>{{ $teacher_attendance->teacher != null ? $teacher_attendance->teacher->phone : '' }}
                                        </td>
                                        <td>{{ $teacher_attendance->note }}</td>
                                        <td>

                                            <a
                                                href="{{ route('admin.teacher_attendances.edit', $teacher_attendance->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form
                                                action="{{ route('admin.teacher_attendances.destroy', $teacher_attendance->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger show_confirm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $teacher_attendances->withQueryString()->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">

                </div>

            </div>
        </div>

    </section>
@endsection

@section('script')
    <script>
        $('#date').change(function() {
            var date = $('#date').val();
            history.pushState(null, '', `?date=${date}`);
            window.location.reload();
        });

        $('#month').change(function() {
            var month = $('#month').val();
            history.pushState(null, '', `?month=${month}`);
            window.location.reload();
        });
    </script>
@endsection

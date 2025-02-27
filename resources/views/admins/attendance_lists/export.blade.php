<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="datatable table table-bordered table-border">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Student Name</th>
                            <th>Academic Year</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($attendance_lists as $attendance_list)
                            <tr>
                                <td>{{ date('d-M-Y', strtotime($attendance_list->date)) }}</td>
                                <td>{{ $attendance_list->student != null ? $attendance_list->student->name : '' }}</td>
                                <td>{{ $attendance_list->academicYear != null ? $attendance_list->academicYear->name : '' }}
                                </td>
                                <td>{{ $attendance_list->academicYear != null ? $attendance_list->academicYear->times : '' }}
                                </td>
                            </tr>
                        @empty
                            <p>No Attendance</p>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

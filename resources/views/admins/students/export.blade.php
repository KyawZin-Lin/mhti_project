<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="datatable table table-bordered table-border">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Student No</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Mobile</th>
                            <th>Address</th>

                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Payment Complete</th>



                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($students as $student)
                            <tr>
                                <td>{{ $student->student_id }}</td>
                                <td>{{ $student->student_no }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->phone }}</td>
                                <td>{{ $student->mobile }}</td>
                                <td>{{ $student->address }}</td>
                                <td>{{ $student->start_date != null ? date('d-M-Y', strtotime($student->start_date)) : '' }}</td>
                                <td>{{ $student->end_date != null ? date('d-M-Y', strtotime($student->end_date)) : '' }}</td>
                                <td>{{ $student->payment_complete }}</td>


                            </tr>
                        @empty
                            <p>No student Data</p>
                        @endforelse
                    </tbody>
                    <br>

                </table>
            </div>

        </div>
    </div>
</div>

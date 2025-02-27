@extends('admins.master')

@section('log-history-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 title-bar">
                <div class="col-sm-2">
                    <div class="float-left">Log History</div>
                </div>
                <div class="col-sm-10">

                </div>

            </div>

            <div class="row my-3">
                <div class="col-sm-6">
                    <h5 class="text-primary"><b>Students</b></h5>
                </div>

                <div class="col-sm-6">
                    <h5 class="text-right"><b>Total {{ $students->total() }}</b></h5>
                </div>

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    <th>Student Course ID</th>
                                    <th>Course</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Edited By</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->student_id }}</td>
                                        <td>{{ $student->student_no }}</td>
                                        <td>{{ $student->degree != null ? $student->degree->name : '' }}</td>
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->phone }}</td>
                                        <td>{{ $student->adminUser != null ? $student->adminUser->name : '' }}</td>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="float-right">

                        {{ $students->withQueryString()->links() }}

                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-sm-6">
                    <h5 class="text-primary"><b>Teachers</b></h5>
                </div>

                <div class="col-sm-6">
                    <h5 class="text-right"><b>Total {{ $teachers->total() }}</b></h5>
                </div>

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Edited By</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->position }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td>{{ $teacher->address }}</td>
                                        <td>{{ $teacher->adminUser != null ? $teacher->adminUser->name : '' }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="float-right">

                        {{ $teachers->withQueryString()->links() }}

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
        // $(document).on('change', '#choose', function(e) {
        //     e.preventDefault();
        //     var id = $(this).val();

        //     console.log(id);

        //     $.ajax({
        //         type: 'GET',
        //         url: '/admin/academic-year-search/' + id,
        //         success: function(response) {
        //             console.log(response);
        //             $('#tbody').html(response);
        //         }
        //     });
        // })

        $('#choose').change(function() {
            var choose = $('#choose').val();
            history.pushState(null, '', `?choose=${choose}`);
            window.location.reload();
        })

        $('#degree_id').change(function() {
            var degreeId = $('#degree_id').val();
            //console.log(degreeId);
            history.pushState(null, '', `?course_id=${degreeId}`);
            window.location.reload();
        })

        $('#batch_id').change(function() {
            var batchId = $('#batch_id').val();
            history.pushState({}, '', `?batch_id=${batchId}`);
            window.location.reload();
        })

        $('.course-select').select2({
            placeholder: "Choose Course(Currently Showing All)",
            allowClear: true
        });

        $('.batch-select').select2({
            placeholder: "Choose Batch(Currently Showing All)",
            allowClear: true
        });
    </script>
@endsection

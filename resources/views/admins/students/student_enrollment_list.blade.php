@extends('admins.master')

@section('enrollment-active', 'active')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 title-bar">
                <div class="col-sm-2">
                    <div class="float-left">Student Enrollment</div>
                </div>
                <div class="col-sm-10 text-right">
                    <a href="{{ route('admin.enrollment') }}">
                        <button type="button" class="btn btn-sm btn-danger">Back</button>
                    </a>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <h5><b>Total {{ $students->total() }}</b></h5>
                </div>

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Student ID</th>
                                    {{-- <th>Course Registered</th> --}}
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>NRC</th>
                                    <th class="w-25">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{ $student->student_no }}</td>
                                        {{-- <td>{{ $student->course_registered }}</td> --}}
                                        <td>{{ $student->name }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->phone }}</td>
                                        {{-- <td>{{ $student->nrcInfo != null ? $student->nrcInfo->no . '/' . $student->nrcInfo->township_abbreviation : '' }}
                                            {{ $student->nrc }}</td> --}}
                                        <td>{{ $student->national_id }}</td>

                                        <td>
                                            {{-- <a href="{{ route('admin.payment_by_installment_page', $student->id) }}"><button
                                                    class="btn btn-sm btn-primary float-left mr-1">Payment by
                                                    Installments</button></a> --}}

                                            <a href="{{ route('admin.student_enrollment_detail', $student->id) }}"><button
                                                    class="btn btn-sm btn-info float-left mr-1">Detail</button></a>


                                        </td>
                                    </tr>
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

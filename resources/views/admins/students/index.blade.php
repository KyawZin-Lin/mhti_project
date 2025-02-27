@extends('admins.master')

@section('student-active', 'active')

@section('all-student', 'nav-active')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 title-bar">
                <div class="col-sm-2">
                    <div class="float-left">Students</div>
                </div>
                <div class="col-sm-10 text-end">

                    @if ($limit->limit_student >= count($students))
                        <a href="{{ route('admin.students.create') }}"><button type="button" class="btn btn-md btn-success"
                                style="float:right;"><b><i class="fas fa-plus-square"></i>
                                    New Student</b></button></a>
                    @endif

                    @if (auth()->user()->getRoleNames()[0] == 'Superadmin')
                        <a href="{{ route('admin.increase_student', $limit->id) }}"><button type="button"
                                class="btn btn-md btn-success mr-1" style="float:right;"><i class="fas fa-plus-circle"></i>
                                Increase Limit</button></a> &nbsp;
                    @endif
                </div>

                <div class="col-sm-12">
                    @include('admins.students.student_nav')
                </div>

            </div>

            <div class="modal fade" id="stuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <form action="#" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-white" id="exampleModalLabel">Excel Import</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-4 col-md-2 text-md-end text-right text-white"><b>File :
                                                </b></label>
                                            <div class="col-sm-7 col-md-9">
                                                <input type="file" name="excel_file" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3">
                    <h5><b>Total {{ count($students) }}</b></h5>
                </div>

                <div class="col-sm-3">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-md-3"><b>Course</b></label>
                        <div class="col-sm-9 col-md-9">
                            <select name="degree_id" id="degree_id" class="course-select form-control">
                                <option></option>
                                @foreach ($degrees as $degree)
                                    <option value="{{ $degree->id }}" @if ($degree->id == request('course_id')) selected @endif>
                                        {{ $degree->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-md-3"><b>Batch</b></label>
                        <div class="col-sm-9 col-md-9">
                            <select name="batch_id" id="batch_id" class="batch-select form-control">
                                <option></option>
                                @foreach ($batches as $batch)
                                    <option value="{{ $batch->id }}" @if ($batch->id == request('batch_id')) selected @endif>
                                        {{ $batch->batch }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <form action="{{ route('admin.students.index') }}" method="GET">
                        @csrf


                        <div class="form-group row">
                            <div class="col-sm-8 m-0 p-0">

                                <input type="text" name="search" id="search" class="form-control bg-white"
                                    value="{{ request()->search }}" placeholder="Search Name...">
                            </div>

                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-md btn-theme btn-success w-100">Search</button>
                            </div>
                        </div>

                    </form>
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
                                    <th>Status</th>
                                    <th class="w-25">Action</th>
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
                                        <td>
                                            @php
                                                $start_date = Carbon\Carbon::parse($student->start_date);
                                                $end_date = Carbon\Carbon::parse($student->end_date);
                                                $today = Carbon\Carbon::today();
                                                // dd($start_date, $end_date,$today)
                                            @endphp

                                            @if ($end_date >= $today && $start_date <= $today)
                                                <p class="badge badge-success">Active</p>
                                            @elseif($today >= $end_date)
                                                <p class="badge badge-danger">Alumnus</p>
                                            @endif
                                        </td>
                                        <td>
                                            {{-- <a href="{{ route('admin.payment_by_installment_page', $student->id) }}"><button
                                                    class="btn btn-sm btn-primary float-left mr-1">Payment by
                                                    Installments</button></a> --}}

                                            <a href="{{ route('admin.students.show', $student->id) }}"><button
                                                    class="btn btn-sm btn-info float-left mr-1">Detail</button></a>

                                            <a href="{{ route('admin.students.edit', $student->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.students.destroy', $student->id) }}"
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

@extends('admins.master')

@section('student-active', 'active')

@section('oversea-student', 'nav-active')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 title-bar">
                <div class="col-sm-2">
                    <div class="float-left">Oversea</div>
                </div>
                <div class="col-sm-10 text-right">
                    @include('admins.students.student_nav')
                    <button type="button" class="btn btn-md btn-danger" onclick="history.back()">Back</button>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-6">
                    <h5><b>Total {{ count($students) }}</b></h5>
                </div>

                <div class="col-sm-6">
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

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
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

        $('.course-select').select2({
            placeholder: "Choose Course(Currently Showing All)",
            allowClear: true
        });
    </script>
@endsection

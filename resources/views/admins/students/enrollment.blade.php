@extends('admins.master')

@section('enrollment-active', 'active')

@section('enrollment-student', 'nav-active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 title-bar">
                <div class="col-sm-2">
                    <div class="float-left">Enrollment</div>
                </div>
                <div class="col-sm-10 text-right">
                    {{-- @include('admins.students.student_nav')
                    <button type="button" class="btn btn-md btn-danger" onclick="history.back()">Back</button> --}}
                </div>

            </div>

            <div class="row">
                <div class="col-sm-6">
                    <h5><b>Total {{ $batches->total() }}</b></h5>
                </div>

                <div class="col-sm-6">
                    <form action="{{ route('admin.enrollment') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="text" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search Batch...">
                                    </div>

                                    <div class="col-sm-5">
                                        <button type="submit"
                                            class="btn btn-md btn-theme btn-success w-100">Search</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Batch</th>
                                    <th>Available Student</th>
                                    <th>Enrolled Student</th>
                                    <th>Vacant Student</th>
                                    <th>Room</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>

                                {{-- class="
                                    @if ($batch->enrolled_student >= $batch->student_qty) bg-danger text-white
                                    @elseif($batch->enrolled_student >= (int) $batch->student_qty - 5 && $batch->enrolled_student < $batch->student_qty)
                                    bg-warning text-white
                                    @else
                                    bg-success text-white @endif
                                    " --}}
                                @foreach ($batches as $batch)
                                    <tr
                                        class="
                                    @if ($batch->enrolled_student >= $batch->student_qty) bg-danger text-white
                                    @elseif($batch->enrolled_student >= (int) $batch->student_qty - 5 && $batch->enrolled_student < $batch->student_qty)
                                    bg-warning text-white
                                    @else
                                    bg-success text-white @endif
                                    ">
                                        <td>{{ $batch->batch }}</td>
                                        <td>{{ $batch->student_qty }}</td>
                                        <td>{{ $batch->enrolled_student }}</td>
                                        <td>{{ $batch->student_qty - $batch->enrolled_student }}</td>
                                        <td>{{ $batch->room != null ? $batch->room->name : '' }}</td>
                                        <td>

                                            <a href="{{ route('admin.student_enrollment', $batch->id) }}"
                                                class="text-decoration-none">
                                                <button type="button" class="btn btn-sm btn-primary">Student List</button>
                                            </a>
                                            <a href="{{ route('admin.teacher_enrollment', $batch->id) }}">
                                                <button type="button" class="btn btn-sm btn-primary">Teacher List</button>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="float-right">

                        {{ $batches->withQueryString()->links() }}

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

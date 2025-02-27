@extends('admins.master')

@section('qmanagement-active', 'active')

@section('reading-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Student Answer List (Reading)</div>

                    @include('admins.student_answers.nav')
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $student_answers_count }}</h5>
                </div>
                <div class="col-sm-10">
                    {{-- <form action="{{ route('admin.student_answers.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="date" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search Student Name...">
                                    </div>

                                    <div class="col-sm-5">
                                        <button type="submit"
                                            class="btn btn-md btn-theme btn-success w-100">Search</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form> --}}
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Student Name</th>
                                    <th>Phone</th>
                                    <th>Exam ID</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($student_answers as $student_answer)
                                    <?php
                                    $studentId = $student_answer->student_id;
                                    $total = [];
                                    $sum = 0;
                                    $date = [];

                                    foreach ($students as $student) {
                                        if ($student->student_id == $studentId) {
                                            // array_push($total, $student->student_id);
                                            $total = (array) $student->student_id;
                                            $sum += sizeof($total);

                                            $date = $student->created_at;
                                        }
                                    }
                                    ?>


                                    <tr>

                                        <td>{{ date('d-M-Y h:i:s A', strtotime($date)) }}</td>
                                        <td>{{ $student_answer->student != null ? $student_answer->student->name : '' }}
                                        </td>
                                        <td>{{ $student_answer->student != null ? $student_answer->student->phone : '' }}
                                        </td>
                                        <td>{{ $student_answer->student != null ? $student_answer->student->exam_id : '' }}
                                        </td>
                                        <td>

                                            {{-- {{ $sum }} --}}

                                            @if ($sum >= 20)
                                                <span class="badge badge-success">Complete</span>
                                            @else
                                                <span class="badge badge-danger">Incomplete</span>
                                            @endif

                                        </td>
                                        <td style="width:150px;">
                                            <a
                                                href="{{ route('admin.student_answers_detail_list', $student_answer->student_id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Detail</button></a>

                                            <form
                                                action="{{ route('admin.student_answers.destroy', $student_answer->student_id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger btn-flat show-alert-delete-box"
                                                    data-toggle="tooltip" title='Delete'>Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $student_answers->withQueryString()->links() }}
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
    <script type="text/javascript">
        $('.show-alert-delete-box').click(function(event) {
            var form = $(this).closest("form");
            var name = $(this).data("name");
            event.preventDefault();
            swal({
                title: "Are you sure you want to delete this record?",
                // text: "If you delete this, it will be gone forever.",
                icon: "warning",
                type: "warning",
                buttons: ["Cancel", "Yes"],
                confirmButtonColor: '#000080',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((willDelete) => {
                if (willDelete) {
                    form.submit();
                }
            });
        });
    </script>
@endsection

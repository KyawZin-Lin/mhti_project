@extends('admins.master')

@section('degree-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>{{ $degree->name }}</b></p>

                                <a href="{{ route('admin.degrees.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>

                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5><b>Total {{ $students->total() }}</b></h5>
                                </div>

                                <div class="col-sm-1">

                                </div>

                                <div class="col-sm-4">

                                </div>

                                <div class="col-sm-4">
                                    <form action="{{ route('admin.degrees.show', $degree->id) }}" method="GET">
                                        @csrf

                                        <div class="input-group mb-3">

                                            <input type="text" name="search" class="form-control"
                                                placeholder="Search Name,Phone..." value="{{ request()->search }}">
                                            <button class="btn btn-success" type="submit" id="button-addon2">🔍</button>

                                        </div>
                                    </form>
                                </div>


                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Student ID</th>
                                                    <th>Course Student ID</th>
                                                    <th>Course</th>
                                                    <th>Name</th>
                                                    <th>Phone</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($students as $student)
                                                    <tr>
                                                        <td>{{ $student->student_id }}</td>
                                                        <td>{{ $student->student_no }}</td>
                                                        <td>{{ $student->degree != null ? $student->degree->name : '' }}
                                                        </td>
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
                                                                <p class="badge badge-danger">Alumni</p>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a
                                                                href="{{ route('admin.degrees.student_detail', $student->id) }}"><button
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
                </div>

            </div>
        </div>

    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.batch-select').change(function() {
                var batch_id = $(this).val();
                history.pushState({}, '', `?search=${search}`);
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
        })
    </script>
@endsection

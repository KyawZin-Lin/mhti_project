@extends('admins.master')

@section('attendance-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Attendance List</div>
                    <div>
                        {{-- <a href="{{ route('admin.attendance_lists_export') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-file-excel"></i> Export</b></button></a> --}}
                        <a href="{{ route('admin.attendance_lists.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    Create Absent</b></button></a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $attendance_listsCount }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.attendance_lists.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="date" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search Date...">
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
                                    <th>Date</th>
                                    <th>Student Name</th>
                                    <th>Year</th>
                                    <th>Times</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($attendance_lists as $attendance_list)
                                    <tr>
                                        <td>{{ date('d-M-Y', strtotime($attendance_list->date)) }}</td>
                                        <td>{{ $attendance_list->student != null ? $attendance_list->student->name : '' }}
                                        </td>
                                        <td>{{ $attendance_list->academicYear != null ? $attendance_list->academicYear->name : '' }}
                                        </td>
                                        <td>{{ $attendance_list->academicYear != null ? $attendance_list->academicYear->times : '' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.attendance_lists.edit', $attendance_list->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form
                                                action="{{ route('admin.attendance_lists.destroy', $attendance_list->id) }}"
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

                    <div class="float-right">
                        {{ $attendance_lists->withQueryString()->links() }}
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
    <script></script>
@endsection

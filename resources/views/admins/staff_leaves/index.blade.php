@extends('admins.master')

@section('staff-leave-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Staff Leave List</div>
                    <div>
                        <a href="{{ route('admin.staff_leaves.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    New Staff Leave</b></button></a>
                        <a href="{{ route('admin.teacher_leaves.index') }}"><button type="button"
                                class="btn btn-md btn-danger"><b>
                                    Back</b></button></a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ count($staff_leaves) }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.staff_leaves.index') }}" method="GET">
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
                                    {{-- <th>Teacher</th> --}}
                                    <th>Staff</th>
                                    {{-- <th>Fine</th> --}}
                                    <th>Note</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($staff_leaves as $staff_leave)
                                    <tr>
                                        <td>{{ $staff_leave->date != null ? date('d-M-Y', strtotime($staff_leave->date)) : '' }}
                                        </td>
                                        {{-- <td>{{ $staff_leave->teacher != null ? $staff_leave->teacher->name : '' }}</td> --}}
                                        <td>{{ $staff_leave->staff != null ? $staff_leave->staff->name : '' }}</td>
                                        {{-- <td>{{ $staff_leave->fine }}</td> --}}
                                        <td>{{ $staff_leave->note }}</td>
                                        <td>
                                            <a href="{{ route('admin.staff_leaves.edit', $staff_leave->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.staff_leaves.destroy', $staff_leave->id) }}"
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

                    <div class="float-right">
                        {{ $staff_leaves->withQueryString()->links() }}
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

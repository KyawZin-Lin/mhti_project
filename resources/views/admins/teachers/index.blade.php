@extends('admins.master')

@section('teacher-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 title-bar">
                <div class="col-sm-2">
                    <div class="float-left">Teacher List</div>
                </div>
                <div class="col-sm-2">

                    {{-- <select name="choose" id="choose-year" class="form-control myselect">
                        <option>Select Academic Year...</option>
                        <option value="0">All</option>
                        @foreach ($academic_years as $academic)
                            <option value="{{ $academic->id }}" @if ($academic->id == request()->choose) selected @endif>
                                {{ $academic->name }}
                            </option>
                        @endforeach
                    </select> --}}
                </div>

                <div class="col-sm-2">
                    {{-- <form action="{{ route('teacherApproveAll') }}" method="GET">
                        @csrf

                        <button type="submit" class="btn btn-sm btn-primary">Approve All</button>
                    </form> --}}
                </div>

                <div class="col-sm-2">
                    {{-- <a href="{{ route('teacher-export') }}"><button type="button"
                            class="btn btn-md btn-primary">Export</button></a>
                    <button type="button" class="btn btn-md btn-primary" data-toggle="modal"
                        data-target="#stuModal">Import</button> --}}
                </div>

                {{-- <div class="modal fade" id="stuModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
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
                </div> --}}

                <div class="col-sm-4">

                    @if ($limit->limit_teacher >= count($teachers))
                        <a href="{{ route('admin.teachers.create') }}"><button type="button"
                                class="btn btn-md btn-success float-right"><b><i class="fas fa-plus-square"></i>
                                    New Teacher</b></button></a>
                    @endif

                    @if (auth()->user()->getRoleNames()[0] == 'Superadmin')
                        <a href="{{ route('admin.increase_teacher', $limit->id) }}"><button type="button"
                                class="btn btn-md btn-success mr-1" style="float:right;"><i class="fas fa-plus-circle"></i>
                                Increase Limit</button></a> &nbsp;
                    @endif
                </div>
            </div>



            <div class="row">
                <div class="col-sm-2">
                    <h5>Total - {{ $teachers_count }}</h5>
                </div>
                <div class="col-sm-2">

                </div>
                <div class="col-sm-8">
                    <form action="{{ route('admin.teachers.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="text" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search Name...">
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
                        <table class="datatable table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($teachers as $teacher)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->position }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td>{{ $teacher->address }}</td>
                                        <td>
                                            {{-- <form action="{{ route('teacher-approve', $teacher->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                @if ($teacher->approve_status == 0)
                                                    <button type="submit"
                                                        class="btn btn-sm btn-success mb-1">Approve</button>
                                                @endif
                                            </form>

                                             --}}

                                            <a href="{{ route('admin.teacher_grid_view', [$teacher->id, 1]) }}"><button
                                                    class="btn btn-sm btn-info float-left mr-1">Detail</button></a>

                                            <a href="{{ route('admin.teachers.edit', $teacher->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.teachers.destroy', $teacher->id) }}"
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
        // $('#choose-course').change(function() {
        //     var choose = $('#choose-course').val();
        //     history.pushState(null, '', `?choose=${choose}`);
        //     window.location.reload();
        // });

        // $('#choose-year').change(function() {
        //     var choose_year = $('#choose-year').val();
        //     //console.log(choose_year);
        //     history.pushState(null, '', `?choose_year=${choose_year}`);
        //     window.location.reload();
        // })
    </script>
@endsection

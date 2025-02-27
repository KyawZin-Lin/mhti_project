@extends('admins.master')

@section('enrollment-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2 title-bar">
                <div class="col-sm-2">
                    <div class="float-left">Teacher Enrollment</div>
                </div>
                <div class="col-sm-10 text-right">
                    <a href="{{ route('admin.enrollment') }}">
                        <button type="button" class="btn btn-sm btn-danger">Back</button>
                    </a>
                </div>

            </div>
            <div class="row">
                <div class="col-sm-2">
                    <h5>Total - {{ $teachers->total() }}</h5>
                </div>
                <div class="col-sm-2">

                </div>
                <div class="col-sm-8">
                    {{-- <form action="{{ route('admin.teachers.index') }}" method="GET">
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
                    </form> --}}
                </div>

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="datatable table table-bordered table-hover">
                            <thead>
                                <tr>
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
                                        <td>{{ $teacher->name }}</td>
                                        <td>{{ $teacher->position }}</td>
                                        <td>{{ $teacher->phone }}</td>
                                        <td>{{ $teacher->address }}</td>
                                        <td>

                                            <a href="{{ route('admin.teacher_enrollment_detail', $teacher->id) }}"><button
                                                    class="btn btn-sm btn-info float-left mr-1">Detail</button></a>


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

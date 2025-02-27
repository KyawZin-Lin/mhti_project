@extends('admins.master')

@section('dashboard-active', 'active')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
            {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.students.index') }}">
                    <div class="card border-left-primary shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Students</div>
                                    {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-user-graduate fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.teachers.index') }}">
                    <div class="card border-left-danger shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Teachers</div>
                                    {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.degrees.index') }}">
                    <div class="card border-left-success shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Courses</div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.academic_years.index') }}">
                    <div class="card border-left-warning shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Academic Years</div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.courses.index') }}">
                    <div class="card border-left-warning shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Courses</div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-file-alt fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.jobs.index') }}">
                    <div class="card border-left-primary shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Job Positions</div>
                                    {{-- <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div> --}}
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-layer-group fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.announcements.index') }}">
                    <div class="card border-left-warning shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Announcements</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-bullhorn fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.forums.index') }}">
                    <div class="card border-left-primary shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Forum</div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-align-right fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.absents') }}">
                    <div class="card border-left-danger shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Absent Lists</div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            {{-- <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.classrooms.index') }}">
                    <div class="card border-left-success shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Class</div>

                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-house-user fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.modules.index') }}">
                    <div class="card border-left-success shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Modules</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-boxes fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-xl-3 col-md-6 mb-4">
                <a href="{{ route('admin.lessons.index') }}">
                    <div class="card border-left-warning shadow h-100 py-2 dashboard">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-uppercase mb-1">
                                        Lessons</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-book fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div> --}}

        </div>

    </div>
@endsection

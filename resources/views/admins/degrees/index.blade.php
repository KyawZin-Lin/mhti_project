@extends('admins.master')

@section('degree-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Course List</div>
                    <div>
                        <a href="{{ route('admin.academic_years.index') }}" class="text-decoration-none">
                            <button type="button" class="btn btn-md btn-success"><b>
                                    <i class="fas fa-calendar-alt"></i>
                                    Academic Years
                                </b></button>
                        </a>
                        <a href="{{ route('admin.batches.index') }}" class="text-decoration-none">
                            <button type="button" class="btn btn-md btn-success"><b>
                                    <i class="fas fa-list"></i>
                                    Batch
                                </b></button>
                        </a>
                        <a href="{{ route('admin.degrees.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    New Course</b></button></a>
                    </div>

                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $degrees_count }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.degrees.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="text" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search Course...">
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
                                    <th>Course</th>
                                    <th>Course Abbreviation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($degrees as $degree)
                                    <tr>
                                        <td>{{ $degree->name }}</td>
                                        <td>{{ $degree->abbreviation }}</td>
                                        <td>
                                            <a href="{{ route('admin.degrees.show', $degree->id) }}"><button
                                                    class="btn btn-sm btn-primary float-left mr-1">Detail</button></a>

                                            <a href="{{ route('admin.batch_detail', $degree->id) }}"><button
                                                    class="btn btn-sm btn-info float-left mr-1">Grid View</button></a>

                                            <a href="{{ route('admin.degrees.edit', $degree->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.degrees.destroy', $degree->id) }}"
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
                        {{ $degrees->withQueryString()->links() }}
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

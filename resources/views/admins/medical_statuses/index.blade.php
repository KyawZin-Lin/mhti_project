@extends('admins.master')

@section('setting-active', 'active')

@section('medical_status-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Medical Status List</div>
                    <div>
                        <a href="{{ route('admin.medical_statuses.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    New Medical Status</b></button></a>

                        <a href="{{ route('admin.students.index') }}"><button type="button"
                                class="btn btn-md btn-danger"><b>Back</b></button></a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $medical_statuses_count }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.medical_statuses.index') }}" method="GET">
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
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Times</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($medical_statuses as $medical_status)
                                    <tr>
                                        <td>{{ $medical_status->name }}</td>
                                        <td><span class="badge bg-info text-white">{{ $medical_status->times }}</span></td>
                                        <td>
                                            <a href="{{ route('admin.medical_statuses.edit', $medical_status->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form
                                                action="{{ route('admin.medical_statuses.destroy', $medical_status->id) }}"
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
                        {{ $medical_statuses->withQueryString()->links() }}
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

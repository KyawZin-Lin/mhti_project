@extends('admins.master')

@section('sm-active', 'active')

@section('sm-role-active', 'active')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Roles

                    </div>
                    <div>
                        <a href="{{ route('admin.student_roles.create') }}">
                            <button type="button" class="btn btn-sm btn-info btn-color">Create</button>
                        </a>

                        {{-- <a href="{{ route('student_users.index') }}">
                            <button type="button" class="btn btn-sm btn-info btn-color">User</button>
                        </a> --}}

                        <a href="{{ route('admin.student_permissions.index') }}">
                            <button type="button" class="btn btn-sm btn-info btn-color">Permission</button>
                        </a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $student_roles_count }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.student_roles.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="text" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search Role Name...">
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
                                    <th>Role Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($student_roles as $student_role)
                                    <tr>
                                        <td>{{ $student_role->name }}</td>
                                        <td class="d-flex justify-content-start">
                                            <a href="{{ route('admin.student_roles.show', $student_role->id) }}"><button
                                                    type="button" class="btn btn-sm btn-info btn-color">Detail</button></a>

                                            &nbsp;

                                            <a href="{{ route('admin.student_roles.edit', $student_role->id) }}"><button
                                                    type="button" class="btn btn-sm btn-warning">Edit</button></a>

                                            &nbsp;

                                            <form action="{{ route('admin.student_roles.destroy', $student_role->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No role found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $student_roles->withQueryString()->links() }}
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

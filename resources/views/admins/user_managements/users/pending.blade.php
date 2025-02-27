@extends('admins.master')

@section('user-management-active', 'active')

@section('user-active', 'active')

@section('content')

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Pending List</div>
                    <div class="text-decoration-none">

                        <a href="{{ route('admin.users.index') }}">
                            <button type="button" class="btn btn-sm btn-danger">Back</button>
                        </a>

                        {{-- <a href="{{ route('admin.roles.index') }}">
                            <button type="button" class="btn btn-sm btn-info btn-color">Role</button>
                        </a> --}}
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $usersCount }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.pending_page') }}" method="GET">
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
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if (!empty($user->getRoleNames()))
                                                @foreach ($user->getRoleNames() as $v)
                                                    <label class="badge bg-success text-white">{{ $v }}</label>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            {{-- @if (auth()->user()->name == 'MMcities')
                                                <a href="{{ route('admin.increase_count_page', $user->id) }}">
                                                    <button type="button" class="btn btn-sm btn-outline-info mr-1"
                                                        style="float:left;"><i class="fas fa-plus-circle"></i></button>
                                                </a>

                                                <a href="{{ route('admin.change_password_page', $user->id) }}"
                                                    style="float: left;">
                                                    <button type="button" class="btn btn-sm btn-outline-primary mr-1"
                                                        style="float:left;"><i class="fas fa-key"></i></button>
                                                </a>
                                            @endif --}}

                                            <form action="{{ route('admin.approve', $user->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')

                                                <button type="submit" class="btn btn-sm btn-outline-success mr-1"
                                                    style="float: left;"><i class="fas fa-check"></i></button>
                                            </form>

                                            <a href="{{ route('admin.users.edit', $user->id) }}"><button type="button"
                                                    class="btn btn-sm btn-outline-warning mr-1" style="float:left;"><i
                                                        class="fas fa-edit"></i></button></a>

                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-outline-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">No user found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        {{ $users->withQueryString()->links() }}
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

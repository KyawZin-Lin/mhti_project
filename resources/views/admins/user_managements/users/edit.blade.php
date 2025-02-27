@extends('admins.master')

@section('user-management-active', 'active')

@section('user-active', 'active')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Edit User</b></p>

                                <a href="{{ route('admin.users.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            id="name" name="name" value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            id="email" name="email" value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-8">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="password_confirmation" class="col-sm-3 col-form-label">Confirm
                                        Password</label>
                                    <div class="col-sm-8">
                                        <input type="password"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            id="password_confirmation" name="password_confirmation">
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <label for="role" class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-8">
                                        <select name="roles[]" id="roles" class="select2 form-control">
                                            <option>Select Option...</option>
                                            @foreach ($roles as $key => $role)
                                                <option value="{{ $role->name }}"
                                                    @if ($role->name == $userRole) selected @endif>{{ $role->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-3">
                                        <button type="reset" class="btn btn-sm btn-danger w-100">Cancel</button>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection

@section('scripts')

@endsection

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
                                <p class="mt-3"><b>Increase Count</b></p>

                                <a href="{{ route('admin.users.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.increase_count', $user->id) }}" method="POST">
                                @csrf

                                <div class="row mb-3">
                                    <label for="old_password" class="col-sm-3 col-form-label">Limit User</label>
                                    <div class="col-sm-8">
                                        <input type="number" name="limit_user" class="form-control" autocomplete="off"
                                            value="{{ $user->limit_user }}">
                                    </div>
                                </div>

                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-4">
                                        <button type="reset" class="btn btn-sm btn-danger w-100">Cancel</button>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-sm btn-success w-100">Save</button>
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

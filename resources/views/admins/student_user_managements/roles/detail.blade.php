@extends('admins.master')

@section('sm-active', 'active')

@section('sm-role-active', 'active')

@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Detail Role</b></p>

                                <a href="{{ route('admin.student_roles.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="col-xs-6 offset-xs-3 col-sm-6 offset-sm-3 col-md-6 offset-md-3 my-3">
                                <strong class="text-warning">Name:</strong>
                                {{ $role->name }}
                            </div>
                            <div class="col-xs-6 offset-xs-3 col-sm-6 offset-sm-3 col-md-6 offset-md-3">
                                <strong class="text-warning">Permissions:</strong>
                                <ol>
                                    @if (!empty($rolePermissions))
                                        @foreach ($rolePermissions as $v)
                                            <li>{{ $v->name }}</li>
                                        @endforeach
                                    @endif
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>

@endsection

@section('scripts')

@endsection

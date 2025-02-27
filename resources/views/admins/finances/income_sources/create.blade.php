@extends('admins.master')

@section('finance-active', 'active')

@section('income-source-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Create Income Source</b></p>

                                <a href="{{ route('admin.income_sources.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.income_sources.store') }}" method="POST" autocomplete="off">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 col-form-label text-right"><b>
                                            Name</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="name" id="name" class="form-control"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-4">
                                        <button type="reset" class="btn btn-sm btn-secondary w-100">Cancel</button>
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

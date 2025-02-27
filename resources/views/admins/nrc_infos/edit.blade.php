@extends('admins.master')

@section('setting-active', 'active')

@section('nrc-info-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Edit NRC Info</b></p>

                                <a href="{{ route('admin.nrc_infos.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.nrc_infos.update', $nrc_info->id) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('PUT')
                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Township
                                            No</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="no" class="form-control"
                                            value="{{ $nrc_info->no }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Township
                                            Abbreviation</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="township_abbreviation" class="form-control"
                                            value="{{ $nrc_info->township_abbreviation }}">
                                    </div>
                                </div>

                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-4">
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

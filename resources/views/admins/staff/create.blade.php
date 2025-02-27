@extends('admins.master')

@section('staff-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Create Staff</b></p>

                                <a href="{{ route('admin.staff.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.staff.store') }}" method="POST" autocomplete="off">
                                @csrf
                                <div class="form-group row mt-3">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Name</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Position</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="position" class="form-control"
                                            value="{{ old('position') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>NRC</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="nrc" class="form-control"
                                            value="{{ old('nrc') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Phone</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ old('phone') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Address</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="address" class="form-control"
                                            value="{{ old('address') }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Standard Salary</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="number" name="standard_salary" class="form-control"
                                            value="{{ old('standard_salary') }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Salary
                                            Date</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="date" name="salary_date" class="form-control"
                                            value="{{ old('salary_date') }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Salary</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="number" name="salary" class="form-control"
                                            value="{{ old('salary') }}">
                                    </div>
                                </div>



                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Payment
                                            Type</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="payment_type_id" id="payment_type_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($payment_types as $payment_type)
                                                <option value="{{ $payment_type->id }}"
                                                    @if ($payment_type->id == old('payment_type_id')) selected @endif>
                                                    {{ $payment_type->name }}</option>
                                            @endforeach
                                        </select>
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

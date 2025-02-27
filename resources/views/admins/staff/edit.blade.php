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
                                <p class="mt-3"><b>Edit Staff</b></p>

                                <a href="{{ route('admin.staff.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.staff.update', $staff->id) }}" method="POST" autocomplete="off">
                                @csrf
                                @method('PUT')

                                <div class="form-group row mt-3">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Name</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $staff->name }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Position</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="position" class="form-control"
                                            value="{{ $staff->position }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>NRC</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="nrc" class="form-control"
                                            value="{{ $staff->nrc }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Phone</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $staff->phone }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Standard
                                            Salary</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="number" name="standard_salary" class="form-control"
                                            value="{{ $staff->standard_salary }}">
                                    </div>
                                </div>

                                <div class="form-group row mt-2">
                                    <label for=""
                                        class="col-sm-4 col-md-4 text-md-end text-right"><b>Address</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $staff->address }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Salary
                                            Date</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="date" name="salary_date" class="form-control"
                                            value="{{ $expense->date }}">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Salary</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="number" name="salary" class="form-control"
                                            value="{{ $expense->amount }}">
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
                                                    @if ($payment_type->id == $expense->payment_type_id) selected @endif>
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

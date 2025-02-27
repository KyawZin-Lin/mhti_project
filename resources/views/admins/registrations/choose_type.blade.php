@extends('admins.master')

@section('registration-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6 offset-3">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-center">
                                <p class="mt-3"><b>Choose Type</b></p>

                                <div>

                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.registrations.create') }}" method="GET" autocomplete="off">
                                @csrf

                                <div class="form-group">
                                    <div class="col-sm-4 offset-sm-5">
                                        <input type="radio" name="registration_type" value="Student" id="student">
                                        <label for="student">Student</label>

                                    </div>
                                    <div class="col-sm-4 offset-sm-5">
                                        <input type="radio" name="registration_type" value="Office" id="office">
                                        <label for="office">Office</label>
                                    </div>
                                </div>


                                <div class="row my-3 mb-5">
                                    <div class="col-4 offset-4">
                                        <button type="submit" class="btn btn-sm btn-primary w-100">Next</button>
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

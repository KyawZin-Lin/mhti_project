@extends('admins.auth.master')
@section('content')
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-8 col-md-8 mt-5">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                    </div>
                                    <form action="{{ route('admin.login.store') }}" method="POST">
                                        @csrf


                                        <div class="d-flex align-items-center justify-content-between mb-3">
                                            {{-- <a href="index.html" class="">
                                                <h3 class="text-primary">{{ config('app.name', 'Laravel') }}</h3>
                                            </a>
                                            <h3>Sign In</h3> --}}
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-sm-4 col-md-4"><b>Email
                                                    address</b></label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="email" class="form-control" id="floatingInput" name="email"
                                                    value="{{ old('email') }}">
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="col-sm-4 col-md-4"><b>Password</b></label>
                                            <div class="col-sm-12 col-md-12">
                                                <input type="password" class="form-control" id="floatingPassword"
                                                    name="password">
                                            </div>
                                        </div>
                                        {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                            </div>
                                            <a href="">Forgot Password</a>
                                        </div> --}}
                                        <button type="submit" class="btn btn-color py-3 w-100 mb-4">Sign In</button>

                                    </form>
                                    <hr>
                                    {{-- <div class="text-center">
                                        <a class="small" href="forgot-password.html">Forgot Password?</a>
                                    </div> --}}
                                    <div class="text-center">
                                        <a class="small" href="{{ route('admin.register') }}">Create an Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection

@extends('admins.auth.master')
@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-8">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                            <div class="col-md-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                                    </div>
                                    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="name" class="col-sm-4 col-md-4"><b>Username</b></label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <input type="text" class="form-control" id="name"
                                                            name="name" value="{{ old('name') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-md-12"><b>Email
                                                            address</b></label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <input type="email" class="form-control" id="floatingInput"
                                                            name="email" value="{{ old('email') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-md-12"><b>Password</b></label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <input type="password" class="form-control" id="floatingPassword"
                                                            name="password">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="password_confirmation"
                                                        class="col-sm-12 col-md-12"><b>Confirm
                                                            Password</b></label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <input type="password" class="form-control"
                                                            id="password_confirmation" name="password_confirmation">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="role" class="col-sm-12 col-md-12"><b>Role</b></label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <select name="roles[]" id="roles" class="form-control">
                                                            <option>Select Role...</option>
                                                            @foreach ($roles as $key => $role)
                                                                <option value="{{ $role->name }}">{{ $role->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="phone" class="col-md-12"><b>Phone</b></label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <input type="text" class="form-control" id="phone"
                                                            name="phone" value="{{ old('phone') }}">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="" class="col-sm-12"><b>Course</b></label>
                                                    <div class="col-sm-12">
                                                        <select name="course_id" id="course_id" class="form-control">
                                                            <option></option>
                                                            @foreach ($courses as $course)
                                                                <option value="{{ $course->id }}"
                                                                    @if ($course->id == old('course_id')) selected @endif>
                                                                    {{ $course->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="" class="col-sm-12"><b>Batch</b></label>
                                                    <div class="col-sm-12">
                                                        <select name="batch_id" id="batch_id"
                                                            class="myselect form-control">
                                                            <option></option>
                                                            @foreach ($batches as $batch)
                                                                <option value="{{ $batch->id }}"
                                                                    @if ($batch->id == old('batch_id')) selected @endif>
                                                                    {{ $batch->batch }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="" class="col-sm-12"><b>Photo</b></label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <input type="file" name="photo" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="" class="col-sm-12"><b>Address</b></label>
                                                    <div class="col-sm-12 col-md-12">
                                                        <textarea name="address" id="address" cols="30" rows="1" class="form-control">{{ old('address') }}</textarea>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        {{-- <div class="form-floating mb-3">
                                            <input type="file"
                                                class="form-control @error('profile_photo_path') is-invalid @enderror"
                                                id="profile_photo_path" name="profile_photo_path">
                                        </div> --}}
                                        {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                            </div>
                                            <a href="">Forgot Password</a>
                                        </div> --}}
                                        <button type="submit" class="btn btn-color py-3 w-100 mb-4">Sign Up</button>
                                    </form>
                                    <hr>
                                    {{-- <div class="text-center">
                            <a class="small" href="forgot-password.html">Forgot Password?</a>
                        </div> --}}
                                    <div class="text-center">
                                        <a class="small" href="{{ route('admin.login') }}">Already have an account?
                                            Login!</a>
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

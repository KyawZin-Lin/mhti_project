@extends('admins.master')

@section('teacher-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4 class="mt-2"><b>Increase Teacher Limit</b></h4>
                            <div class="justify-content-end">

                                <a href="{{ route('admin.teachers.index') }}"><button type="button"
                                        class="btn btn-danger">Back</button></a>
                            </div>


                        </div>

                        <form action="{{ route('admin.increase_teacher.update', $teacher_limit->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="card-body">

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-md-end text-right"><b>Limit
                                            Teacher</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="number" name="limit_teacher" class="form-control" autocomplete="off"
                                            value="{{ $teacher_limit->limit_teacher }}">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-10 offset-sm-2 my-0 text-center my-3">
                                        <button type="submit" class="btn btn-md btn-save btn-color w-25 submit-button"><i
                                                class="fas fa-check-double"></i> <b>Save</b></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

@section('script')
    <script></script>
@endsection

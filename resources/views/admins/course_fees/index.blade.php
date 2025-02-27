@extends('admins.master')

@section('course-fee-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Course Fee List</div>

                    <div>


                        <a href="{{ route('admin.course_fees.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    New Course Fee</b></button></a>

                        <a href="{{ route('admin.dashboard') }}"><button type="button" class="btn btn-md btn-danger"><b><i
                                        class="fas fa-home"></i>
                                    Home</b></button></a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $course_fees->total() }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.course_fees.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-6 m-0 p-0">
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-md-3"><b>Course</b></label>
                                    <div class="col-sm-9 col-md-9">
                                        <select name="course_id" id="course_id" class="course-select form-control">
                                            <option></option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    @if ($course->id == request('course_id')) selected @endif>
                                                    {{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Course</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($course_fees as $course)
                                    <tr>
                                        <td>{{ $course->course != null ? $course->course->name : '' }}</td>
                                        <td>{{ $course->amount }}</td>
                                        <td>{{ $course->discount }}</td>

                                        <td>
                                            <a href="{{ route('admin.course_fees.edit', $course->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.course_fees.destroy', $course->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                    class="btn btn-sm btn-danger show_confirm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $course_fees->withQueryString()->links() }}
                    </div>

                </div>

            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">

                </div>

            </div>
        </div>

    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {

            $('.course-select').select2({
                placeholder: "Choose Course(Currently Showing All)",
                allowClear: true
            });

            $('#course_id').change(function() {
                var courseId = $('#course_id').val();
                //console.log(courseId);
                history.pushState(null, '', `?course_id=${courseId}`);
                window.location.reload();
            })

        })
    </script>
@endsection

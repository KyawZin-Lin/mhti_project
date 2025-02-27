@extends('admins.master')

@section('batch-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Batch List</div>
                    <div>
                        <a href="{{ route('admin.batches.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    New Batch</b></button></a>

                        <a href="{{ route('admin.degrees.index') }}"><button type="button"
                                class="btn btn-md btn-danger"><b><i class="fas fa-arrow-left"></i> Back</b></button></a>
                    </div>
                </div>
                <div class="col-sm-5">
                    <h5>Total - {{ $batches->total() }}</h5>
                </div>
                <div class="col-sm-4">
                    <div class="form-group row">
                        <label for="" class="col-sm-3 col-md-3"><b>Course</b></label>
                        <div class="col-sm-9 col-md-9">
                            <select name="degree_id" id="degree_id" class="course-select form-control">
                                <option></option>
                                @foreach ($degrees as $degree)
                                    <option value="{{ $degree->abbreviation }}"
                                        @if ($degree->abbreviation == request('course_id')) selected @endif>
                                        {{ $degree->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <form action="{{ route('admin.batches.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">

                            <div class="row">
                                <div class="col-sm-7 m-0 p-0">

                                    <input type="text" name="search" id="search" class="form-control bg-white"
                                        value="{{ request()->search }}" placeholder="Search Batch...">
                                </div>

                                <div class="col-sm-5">
                                    <button type="submit" class="btn btn-md btn-theme btn-success w-100">Search</button>
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
                                    <th>Batch</th>
                                    <th>Room</th>
                                    <th>Time</th>
                                    <th>Duration</th>
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($batches as $batch)
                                    <tr>
                                        <td>{{ $batch->batch }}</td>
                                        <td>{{ $batch->room != null ? $batch->room->name : '' }}</td>
                                        <td>{{ $batch->time != null ? date('h:i a', strtotime($batch->time)) : '' }}</td>
                                        <td>{{ $batch->duration }}</td>
                                        <td>{{ $batch->start_date != null ? date('d-M-Y', strtotime($batch->start_date)) : '' }}
                                        </td>
                                        <td>{{ $batch->end_date != null ? date('d-M-Y', strtotime($batch->end_date)) : '' }}
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.batches.edit', $batch->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.batches.destroy', $batch->id) }}" method="POST">
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
                        {{ $batches->withQueryString()->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.course-select').select2({
                placeholder: "Choose Course(Currently Showing All)",
                allowClear: true
            });

            $('.course-select').change(function() {
                var degreeId = $('.course-select').val();
                history.pushState(null, '', `?course_id=${degreeId}`);
                window.location.reload();
            })
        })
    </script>
@endsection

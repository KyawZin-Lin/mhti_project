@extends('admins.master')

@section('degree-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-8 offset-md-2">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Course</b></p>

                                @if (request('year'))
                                    <a href="{{ route('admin.batch_detail', $degree->id) }}">
                                        <button type="button" class="btn btn-sm btn-danger">Back</button>
                                    </a>
                                @else
                                    <a href="{{ route('admin.degrees.index') }}">
                                        <button type="button" class="btn btn-sm btn-danger">Back</button>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <td>Course Name</td>
                                            <td>{{ $degree->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Course Abbreviation</td>
                                            <td>{{ $degree->abbreviation }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>


                            @if (request('year'))
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Batch</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($years as $year)
                                                <tr>
                                                    <td>{{ $year->batch }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Academic Year</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @foreach ($years as $year)
                                                <tr>
                                                    <td>

                                                        <button class="btn btn-sm btn-info year" id="year"
                                                            value="{{ $year->academic_year_id }}">
                                                            {{ $year->academic_year_id }}
                                                        </button>


                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.year').click(function() {

                var year = $(this).val();
                history.pushState({}, '', `?year=${year}`);
                window.location.reload();
            })
        })
    </script>
@endsection

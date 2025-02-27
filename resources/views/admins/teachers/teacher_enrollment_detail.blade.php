@extends('admins.master')

@section('enrollment-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Teacher Enrollment</b></p>

                                <a href="{{ route('admin.teacher_enrollment', $teacher->batch_id) }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4 text-center">
                                    @if ($teacher->photo)
                                        <img src="{{ asset('photos/teachers/photos/' . $teacher->photo) }}"
                                            class="img-thumbnail shadow p-3 mb-5 bg-body rounded w-50" alt="">
                                    @else
                                        <div class="text-danger shadow mb-5 bg-body rounded w-50 text-center"
                                            style="height: 150px;line-height:150px;">
                                            <b>No Photo</b>
                                        </div>
                                    @endif
                                </div>

                                <div class="col-sm-2">
                                    <h6>Name</h6>
                                    <h6>Phone</h6>
                                    <h6>Position</h6>
                                    <h6>Course</h6>
                                    <h6>Batch</h6>
                                    {{-- <h6>Degree</h6> --}}
                                    <h6>Address</h6>
                                </div>

                                <div class="col-sm-6">
                                    <h6>: {{ $teacher->name }}</h6>
                                    <h6>: {{ $teacher->phone }}</h6>
                                    <h6>: {{ $teacher->position }}</h6>
                                    <h6>: {{ $teacher->course != null ? $teacher->course->name : '' }}</h6>
                                    <h6>: {{ $teacher->batch != null ? $teacher->batch->batch : '' }}</h6>
                                    {{-- <h6>: {{ $teacher->degree }}</h6> --}}
                                    <h6>: {{ $teacher->address }}</h6>
                                </div>
                            </div>

                            {{-- <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Date</th>
                                                    <th>Amount</th>
                                                    <th>Payment Type</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($expenses as $expense)
                                                    <tr>
                                                        <td>{{ $expense->date != null ? date('d-M-Y', strtotime($expense->date)) : '' }}
                                                        </td>
                                                        <td>{{ number_format($expense->amount) }}</td>
                                                        <td>{{ $expense->paymentType != null ? $expense->paymentType->name : '' }}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>


                                        </table>
                                    </div>

                                    <div class="float-right">
                                        {{ $expenses->withQueryString()->links() }}
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@section('script')
    <script></script>
@endsection

@extends('admins.master')

@section('attendance-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Absent List</div>
                    <div>
                        {{-- <a href="{{ route('admin.absent_lists_export') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-file-excel"></i> Export</b></button></a> --}}
                        <a href="{{ route('admin.absents.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    Create Absent</b></button></a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $absents->count() }}</h5>
                </div>
                <div class="col-sm-2">
                    {{-- <form action="{{ route('admin.absents') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-sm-7 m-0 p-0">

                                <select name="student_id" id="student_id" class="myselect form-control">
                                    <option></option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            @if ($student->id == request()->student_id) selected @endif>
                                            {{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-md btn-theme btn-success w-100">Search</button>
                            </div>
                        </div>
                    </form> --}}
                </div>

                <div class="col-sm-5">
                    <form action="{{ route('admin.absents') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-sm-5 m-0 p-0">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 text-center">From</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="from_date" id="from_date" class="form-control bg-white"
                                            value="{{ request()->from_date }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5 m-0 p-0">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 text-center"> To</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="to_date" id="to_date" class="form-control bg-white"
                                            value="{{ request()->to_date }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-md btn-theme btn-success w-100">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="col-sm-3">
                    <form action="{{ route('admin.absents') }}" method="GET">
                        @csrf
                        <div class="row">
                            <div class="col-sm-7 m-0 p-0">

                                <input type="date" name="search" id="search" class="form-control bg-white"
                                    value="{{ request()->search }}" placeholder="Search Date...">
                            </div>

                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-md btn-theme btn-success w-100">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    {{-- <th>Academic Year</th> --}}
                                    <th>Absent</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($absents as $absent)
                                    <tr>
                                        <td>{{ date('d-M-Y', strtotime($absent->date)) }}</td>
                                        {{-- <td>
                                            @foreach ($classrooms as $classroom)
                                                @if ($classroom->id == $absent->classroom_id)
                                                    {{ $classroom->academicYear->name }}
                                                @endif
                                            @endforeach
                                        </td> --}}
                                        <td>

                                            {{-- @foreach ($classrooms as $classroom)
                                                @if (in_array($classroom->id, explode(',', $absent->classroom_id)))
                                                    <ul style="list-style-type: none;">
                                                        <li> Student Name -
                                                            {{ $classroom->student != null ? $classroom->student->name : '' }}
                                                            / Father Name -
                                                            {{ $classroom->student != null ? $classroom->student->father_name : '' }}
                                                            /
                                                            Batch -{{ $classroom->batch }} /
                                                            Academic Year -
                                                            {{ $classroom->academicYear != null ? $classroom->academicYear->name : '' }}
                                                            /
                                                            @foreach ($students as $student)
                                                                @if ($student->id == $classroom->student_id)
                                                                    Course -
                                                                    {{ $student->degree != null ? $student->degree->name : '' }}
                                                                @endif
                                                            @endforeach

                                                        </li>
                                                    </ul>
                                                @endif
                                            @endforeach --}}

                                            {{ $absent->student != null ? $absent->student->name : '' }}

                                        </td>
                                        <td>
                                            <a href="{{ route('admin.absent_edit', $absent->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.absent_delete', $absent->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $absents->withQueryString()->links() }}
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
    <script></script>
@endsection

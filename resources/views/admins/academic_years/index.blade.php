@extends('admins.master')

@section('academic-year-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Academic Year List</div>
                    <div>
                        <a href="{{ route('admin.academic_years.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    New Academic Year</b></button></a>

                        <a href="{{ route('admin.degrees.index') }}"><button type="button"
                                class="btn btn-md btn-danger"><b><i class="fas fa-arrow-left"></i> Back</b></button></a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $academic_yearsCount }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.academic_years.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="text" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search Year...">
                                    </div>

                                    <div class="col-sm-5">
                                        <button type="submit"
                                            class="btn btn-md btn-theme btn-success w-100">Search</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </form>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Year Name</th>
                                    {{-- <th>Times</th> --}}
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($academic_years as $academic)
                                    <tr>

                                        <td>{{ $academic->name }}</td>
                                        {{-- <td>{{ $academic->times }}</td> --}}
                                        {{-- <td>{{ $academic->degree != null ? $academic->degree->name : '' }}</td> --}}
                                        <td>{{ $academic->remarks }}</td>
                                        <td>
                                            {{-- {{ route('admin.academic_years.destroy', $academic->id) }} --}}
                                            <a href="{{ route('admin.academic_years.edit', $academic->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.academic_years.destroy', $academic->id) }}"
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
                        {{ $academic_years->withQueryString()->links() }}
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

@extends('admins.master')

@section('qmanagement-active', 'active')

@section('qcategory-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Question Category List</div>
                    <a href="{{ route('admin.question_categories.create') }}"><button type="button"
                            class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                New Question Category</b></button></a>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="datatable table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Question Name</th>
                                    <th>Course</th>
                                    <th>Academic Year</th>
                                    <th>Created By</th>
                                    <th>Remarks</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                {{-- @foreach ($qcategories as $qcategory)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ $qcategory->name }}</td>
                                        <td>{{ $qcategory->course != null ? $qcategory->course->name : '' }}</td>
                                        <td>{{ $qcategory->academicYear != null ? $qcategory->academicYear->name : '' }}
                                        </td>
                                        <td>{{ $qcategory->user != null ? $qcategory->user->name : '' }}</td>
                                        <td>{{ $qcategory->remarks }}</td>
                                        <td>
                                            <a href="{{ route('qcategory.edit', $qcategory->id) }}"><button
                                                    class="btn btn-sm btn-warning">Edit</button></a>

                                            <button class="btn btn-sm btn-danger delete"
                                                id="{{ $qcategory->id }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
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

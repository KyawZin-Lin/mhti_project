@extends('admins.master')

@section('qmanagement-active', 'active')

@section('listening-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Student Answer List (Listening)</div>

                    @include('admins.student_answers.nav')
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $student_answers_count }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.sa_detail_list', $id) }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="date" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search Student Name...">
                                    </div>

                                    <div class="col-sm-5">
                                        <button type="submit"
                                            class="btn btn-md btn-theme btn-success w-100">Search</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                                <a href="{{ route('admin.student_answers_listenings.index') }}">
                                    <button type="button" class="btn btn-md btn-danger">Back</button>
                                </a>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Student Name</th>
                                    <th>Question Title</th>
                                    <th>Answer</th>
                                    <th>True Answer</th>
                                    <th>Marks</th>
                                    {{-- <th>Action</th> --}}
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($student_answers as $student_answer)
                                    <tr>
                                        <td>{{ $student_answer->student != null ? $student_answer->student->name : '' }}
                                        </td>
                                        <td>{{ $student_answer->question != null ? $student_answer->question->title : '' }}
                                        </td>
                                        <td>
                                            {{ $student_answer->answer }}
                                        </td>

                                        <td class="badge badge-success mt-1">
                                            {{ $student_answer->question != null ? $student_answer->question->true_answer : '' }}
                                        </td>
                                        <td>
                                            @if ($student_answer->answer == $student_answer->question->true_answer)
                                                {{ $student_answer->question != null ? $student_answer->question->mark : '' }}
                                            @else
                                                0
                                            @endif
                                        </td>
                                        {{-- <td>
                                            <a href="{{ route('admin.degrees.edit', $degree->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.degrees.destroy', $degree->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $student_answers->withQueryString()->links() }}
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

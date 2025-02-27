@extends('admins.master')

@section('qmanagement-active', 'active')

@section('question-active', 'active')


@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Question List</div>

                    <div>
                        <a href="{{ route('admin.question_export') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-file-excel"></i> Export</b></button></a>
                        <a href="{{ route('admin.questions.create') }}"><button type="button"
                                class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                    New Question</b></button></a>
                    </div>
                </div>
                <div class="col-sm-2">
                    <h5>Total - {{ $questionsCount }}</h5>
                </div>
                <div class="col-sm-10">
                    <form action="{{ route('admin.questions.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">
                            <div class="col-sm-4 m-0 p-0">
                                <div class="row">
                                    <div class="col-sm-7 m-0 p-0">

                                        <input type="text" name="search" id="search" class="form-control bg-white"
                                            value="{{ request()->search }}" placeholder="Search Question...">
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
                                    <th>Question</th>
                                    <th>Question Type</th>
                                    <th>Mark</th>
                                    <th>Created By</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($questions as $question)
                                    <tr>
                                        <td>{{ Illuminate\Support\Str::limit($question->question_name, 50) }}</td>
                                        </td>
                                        <td>{{ $question->qtype == 0 ? 'True or Fale' : 'Multiple Choice' }}
                                        </td>
                                        <td>{{ $question->mark }}</td>
                                        <td>{{ $question->adminUser != null ? $question->adminUser->name : '' }}</td>
                                        <td>
                                            <a href="{{ route('admin.questions.show', $question->id) }}"><button
                                                    class="btn btn-sm btn-info float-left mr-1"><i
                                                        class="fas fa-eye"></i></button></a>
                                            <a href="{{ route('admin.questions.edit', $question->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1"><i
                                                        class="fas fa-edit"></i></button></a>

                                            <form action="{{ route('admin.questions.destroy', $question->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $questions->withQueryString()->links() }}
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

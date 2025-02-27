@extends('admins.master')

@section('qmanagement-active', 'active')

@section('question-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12 d-flex justify-content-between mb-4 title-bar">
                    <div>Question Detail</div>
                    <div>
                        <a href="{{ route('admin.questions.index') }}"><button type="button"
                                class="btn btn-md btn-danger">Back</button></a>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <tbody>
                                <tr>
                                    <td>Question Title</td>
                                    <td>:</td>
                                    <td>{{ $question->title }}</td>
                                </tr>
                                <tr>
                                    <td>Question</td>
                                    <td>:</td>
                                    <td>{{ $question->question_name }}</td>
                                </tr>
                                <tr>
                                    <td>Question Type</td>
                                    <td>:</td>
                                    <td>{{ $question->qtype == 0 ? 'True or False' : 'Multiple Choice' }}</td>
                                </tr>
                                {{-- <tr>
                                    <td>Answer Reason</td>
                                    <td>:</td>
                                    <td>{{ $question->answer_reason }}</td>
                                </tr> --}}
                                <tr>
                                    <td>True Answer</td>
                                    <td>:</td>
                                    <td>{{ $question->true_answer }}</td>
                                </tr>
                                <tr>
                                    <td>Mark</td>
                                    <td>:</td>
                                    <td>{{ $question->mark }}</td>
                                </tr>
                                <tr>
                                    <td>Created By</td>
                                    <td>:</td>
                                    <td>{{ $question->adminUser != null ? $question->adminUser->name : '' }}</td>
                                </tr>
                                <tr>
                                    <td>Remarks</td>
                                    <td>:</td>
                                    <td>{{ $question->remarks }}</td>
                                </tr>
                                <tr>
                                    <td>Photo</td>
                                    <td>:</td>
                                    <td>
                                        @if (isset($question->photo))
                                            <img src="{{ asset('photos/questions/reading_questions/' . $question->photo) }}"
                                                alt=""
                                                class="question-img img-thumbnail shadow p-3 mb-5 bg-body rounded"
                                                style="width:200px;height:200px;">
                                        @endif
                                    </td>
                                </tr>
                                {{-- <tr>
                                    <td>Audio File</td>
                                    <td>:</td>
                                    <td>
                                        <audio controls>
                                            <source src="{{ asset('audios/questions/' . $question->audio_file) }}"
                                                type="audio/mp3">
                                            <source src="{{ asset('audios/questions/' . $question->audio_file) }}"
                                                type="audio/m4a">
                                            Your browser does not support the audio element.
                                        </audio>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($question->qtype != 0)
                    <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="bg-color">
                                    <tr>
                                        <th>No.</th>
                                        <th>Answer</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($q_answers as $q_answer)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $q_answer->answer }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection

@section('script')
    <script></script>
@endsection

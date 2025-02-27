@extends('users.master')

@section('exam-active', 'active')

@section('listening-active', 'btn-info text-white')

@section('content')
    <div class="container">

        @include('users.exams.nav')

        <div class="row">
            <h5 class="mt-4">Listening (7) {{ $question->title != null ? $question->title : '' }}</h5>
            @forelse ($questions as $question)
                <div class="col-sm-12">
                    <div class="card my-3">
                        <div class="card-body">

                            <h6>{{ $loop->index + 1 }} . {{ $question->question_name }}</h6>

                            <audio controls>
                                <source src="{{ asset('audios/questions/' . $question->audio_file) }}" type="audio/mp3">
                                <source src="{{ asset('audios/questions/' . $question->audio_file) }}" type="audio/m4a">
                                Your browser does not support the audio element.
                            </audio>

                            @if ($question->q_photo)
                                <div class="text-center">
                                    <img src="{{ asset('photos/questions/listening_questions/' . $question->q_photo) }}"
                                        alt="" class="question-img img-thumbnail shadow p-3 mb-5 bg-body rounded"
                                        style="width:200px;height:200px;">
                                </div>
                            @endif

                            <form action="{{ route('user.student_answers_listenings.store') }}" method="POST">
                                @csrf

                                <div class="form-group row">

                                    <input type="hidden" name="question_id" value="{{ $question->id }}">
                                    <input type="hidden" name="student_id" value="{{ auth()->user()->student_id }}">
                                    <div class="col-sm-3">
                                        <input type="radio" name="answer" value="{{ $question->answer1 }}"
                                            id="answer1">
                                        <label for="answer1"> {{ $question->answer1 }}</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="radio" name="answer" value="{{ $question->answer2 }}"
                                            id="answer2">
                                        <label for="answer2"> {{ $question->answer2 }}</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="radio" name="answer" value="{{ $question->answer3 }}"
                                            id="answer3">
                                        <label for="answer3"> {{ $question->answer3 }}</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="radio" name="answer" value="{{ $question->answer4 }}"
                                            id="answer4">
                                        <label for="answer4"> {{ $question->answer4 }}</label>
                                    </div>

                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-md btn-color mt-3">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @empty

                <div class="col-sm-12 text-center text-danger">
                    <h3>No Question.</h3>
                </div>
            @endforelse


        </div>

        <div class="row my-3">
            <div class="col-sm-12 text-center">

                <a href="{{ route('user.examListeningType6') }}" class="text-decoration-none">
                    <button type="button" class="btn btn-md btn-outline-primary"><i
                            class="fas fa-angle-double-left"></i></button>
                </a>

                <a href="{{ route('user.examListeningType8') }}">
                    <button type="button" class="btn btn-md btn-outline-primary"><i
                            class="fas fa-angle-double-right"></i></button>
                </a>
            </div>
        </div>
    </div>
@endsection

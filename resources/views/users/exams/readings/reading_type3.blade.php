@extends('users.master')

@section('exam-active', 'active')

@section('reading-active', 'btn-info text-white')

@section('content')
    <div class="container">

        @include('users.exams.nav')

        <div class="row">

            <h5 class="mt-4">Reading (3) {{ $question->title != null ? $question->title : '' }}.</h5>

            @forelse ($questions as $question)
                <div class="col-sm-12">
                    <div class="card my-3">
                        <div class="card-body">
                            {{-- <h4>{{ $question->title }}</h4> --}}

                            <h6>{{ $loop->index + 1 }} . {{ $question->question_name }}</h6>

                            {{-- <audio controls>
                                <source src="{{ asset('audios/questions/' . $question->audio_file) }}" type="audio/mp3">
                                <source src="{{ asset('audios/questions/' . $question->audio_file) }}" type="audio/m4a">
                                Your browser does not support the audio element.
                            </audio> --}}

                            @if ($question->photo)
                                <div class="text-center">
                                    <img src="{{ asset('photos/questions/reading_questions/' . $question->photo) }}"
                                        alt="" class="question-img img-thumbnail shadow p-3 mb-5 bg-body rounded"
                                        style="width:200px;height:200px;">
                                </div>
                            @endif

                            <form action="{{ route('user.student_answers.store') }}" method="POST">
                                @csrf

                                <div class="form-group row">
                                    @foreach ($question_answers as $qa)
                                        @if ($qa->question_id == $question->id)
                                            <input type="hidden" name="question_id" value="{{ $question->id }}">
                                            <input type="hidden" name="student_id"
                                                value="{{ auth()->user()->student_id }}">
                                            <div class="col-sm-6">
                                                <input type="radio" name="answer" value="{{ $qa->answer }}">
                                                <label for=""> {{ $qa->answer }}</label>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-sm btn-color mt-3">Submit</button>
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
                {{-- {{ $questions->withQueryString()->links() }} --}}

                <a href="{{ route('user.examReadingType2') }}" class="text-decoration-none">
                    <button type="button" class="btn btn-md btn-outline-primary"><i
                            class="fas fa-angle-double-left"></i></button>
                </a>

                <a href="{{ route('user.examReadingType4') }}">
                    <button type="button" class="btn btn-md btn-outline-primary"><i
                            class="fas fa-angle-double-right"></i></button>
                </a>
            </div>
        </div>
    </div>
@endsection

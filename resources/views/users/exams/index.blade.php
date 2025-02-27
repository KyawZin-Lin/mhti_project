@extends('users.master')

@section('exam-active', 'active')

@section('content')
    <div class="container">
        <div class="row">
            @foreach ($questions as $question)
                <div class="col-sm-12">
                    <div class="card my-3">
                        <div class="card-body">
                            <h4><b>{{ $question->title }}</b></h4>

                            <audio controls>
                                <source src="{{ asset('audios/questions/' . $question->audio_file) }}" type="audio/mp3">
                                <source src="{{ asset('audios/questions/' . $question->audio_file) }}" type="audio/m4a">
                                Your browser does not support the audio element.
                            </audio>

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

                                <button type="submit" class="btn btn-sm btn-color mt-3">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- x --}}
                {{-- @endif
                @endforeach --}}
            @endforeach


        </div>

        <div class="row">
            <div class="col-sm-12">
                {{ $questions->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection

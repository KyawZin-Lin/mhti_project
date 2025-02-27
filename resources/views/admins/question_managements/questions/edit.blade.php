@extends('admins.master')

@section('qmanagement-active', 'active')

@section('question-active', 'active')


@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Edit Question (R)</b></p>

                                <a href="{{ route('admin.questions.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.questions.update', $question->id) }}" method="POST"
                                autocomplete="off" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">

                                    <div class="col-sm-12">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-2 col-md-2 text-md-end text-right"><b>Title</b></label>
                                            <div class="col-sm-9 col-md-9">
                                                <textarea name="title" id="title" class="form-control" cols="30" rows="2">{{ $question->title }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-2 col-md-2 text-md-end text-right"><b>Question</b></label>
                                            <div class="col-sm-9 col-md-9">
                                                <textarea name="question_name" id="question_name" cols="30" rows="2" class="form-control">{{ $question->question_name }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-4">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-6 col-md-6 text-md-end text-right"><b>Reading Type</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="reading_type" id="reading_type" class="myselect form-control">
                                                    <option></option>
                                                    <option value="1"
                                                        @if (1 == $question->reading_type) selected @endif>1</option>
                                                    <option value="2"
                                                        @if (2 == $question->reading_type) selected @endif>2</option>
                                                    <option value="3"
                                                        @if (3 == $question->reading_type) selected @endif>3</option>
                                                    <option value="4"
                                                        @if (4 == $question->reading_type) selected @endif>4</option>
                                                    <option value="5"
                                                        @if (5 == $question->reading_type) selected @endif>5</option>
                                                    <option value="6"
                                                        @if (6 == $question->reading_type) selected @endif>6</option>
                                                    <option value="7"
                                                        @if (7 == $question->reading_type) selected @endif>7</option>
                                                    <option value="8"
                                                        @if (8 == $question->reading_type) selected @endif>8</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-2 col-md-2 text-md-end text-right"><b>Question
                                                    Type*</b></label>
                                            <div class="col-sm-9 col-md-9">
                                                <select class="myselect form-control qtype" name="qtype" id="qtype">
                                                    <option></option>
                                                    <option value="1"
                                                        @if (1 == $question->qtype) selected @endif>Multiple Choice
                                                    </option>
                                                    {{-- <option value="0"
                                                        @if (0 == $question->qtype) selected @endif>True or False
                                                    </option> --}}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row" style="display: none;" id="tof">
                                    <div class="col-sm-12">
                                        <div class="form-group row mt-3">
                                            <label for="" class="col-sm-2 col-md-2 text-md-end text-right"><b>True
                                                    Or
                                                    False*</b></label>
                                            <div class="col-sm-8 col-md-8 offset-sm-1 offset-md-1">
                                                <input type="radio" name="true_false" id="true_ans" value="True"
                                                    @if ('True' == $question->true_false) checked @endif>
                                                <label for="true_ans">True</label>
                                                <input type="radio" name="true_false" id="false_ans" value="False"
                                                    @if ('False' == $question->true_false) checked @endif>
                                                <label for="false_ans">False</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="qa">
                                    <div class="row" id="mul">
                                        <div class="col-sm-12">
                                            <div class="form-group row mt-3">
                                                <label for=""
                                                    class="col-sm-2 col-md-2 text-md-end text-right"><b>True
                                                        Answer*</b></label>
                                                <div class="col-sm-9 col-md-9">
                                                    <textarea name="true_answer" id="true_answer" class="form-control" cols="30" rows="2">{{ $question->true_answer }}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-sm-11 offset-sm-1">
                                            <h5 class="text-primary"><b>Question of Answer</b></h5>
                                        </div>

                                        @foreach ($q_answers as $q_answer)
                                            <input type="hidden" name="q_answer_id[]" value="{{ $q_answer->id }}">
                                            <div class="col-sm-12">
                                                <div class="form-group row mt-3">
                                                    <label for=""
                                                        class="col-sm-2 col-md-2 text-md-end text-right"><b>Answer
                                                            {{ $loop->index + 1 }}</b></label>
                                                    <div class="col-sm-9 col-md-9">
                                                        <textarea name="answer[]" id="ans-two" class="form-control" cols="30" rows="2">{{ $q_answer->answer }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach

                                        {{-- <div class="col-sm-10 offset-sm-2">
                                            <button type="button" class="btn btn-sm btn-success"
                                                onclick="addAnswer()">Add
                                                Answer</button>
                                        </div> --}}
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-6 col-md-6 text-md-end text-right"><b>Marks*</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="mark" class="form-control"
                                                    value="{{ $question->mark }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-6 col-md-6 text-md-end text-right"><b>Remarks</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="remarks" class="form-control"
                                                    value="{{ $question->remarks }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end text-right"><b>Photo</b></label>
                                            <div class="col-sm-8 col-md-8">
                                                <input type="file" name="photo" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                    {{-- <div class="col-sm-3">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-4 col-md-4 text-md-end text-right"><b>Audio
                                                    File</b></label>
                                            <div class="col-sm-8 col-md-8">
                                                <input type="file" name="audio_file" class="form-control">
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="row">

                                    <div class="col-sm-4">
                                        <div class="form-group row mt-3">
                                            <label for=""
                                                class="col-sm-6 col-md-6 text-md-end text-right"><b>Student
                                                    Category</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="student_category" id="student_category"
                                                    class="myselect form-control">
                                                    <option></option>
                                                    <option value="Job"
                                                        @if ('Job' == $question->student_category) selected @endif>Job</option>
                                                    <option value="Studying"
                                                        @if ('Studying' == $question->student_category) selected @endif>Studying
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-3">
                                        <button type="reset" class="btn btn-sm btn-secondary w-100">Cancel</button>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

@section('script')
    <script>
        $('#qtype').change(function() {
            var qtype = $('#qtype').val();
            if (qtype == 0) {
                $('#tof').show();
                $('#mul').hide();
            } else {
                $('#mul').show();
                $('#tof').hide();
            }
        })

        var count = 4;

        function addAnswer() {
            var row = count + 1;
            count++;
            $(".qa").append(
                '<div class="mt-1 row row_' + row + '">' +
                '<div class="col-12">' +
                '<div class="form-group row">' +
                '<label for="" class="col-sm-2 col-md-2 text-md-end text-right">Answer ' + row + '</label>' +

                '<div class="col-sm-8 col-md-8">' +
                '<textarea name="answer[]" id="answer_' + row +
                '" rows="2" class="form-control"></textarea>' +
                '</div>' +
                '<div class="col-sm-1 col-md-1">' +
                '<button type="button" onClick="remove(' + row +
                ')" class="btn btn-danger btn-md float-right"><i class="fas fa-times"></i></button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>'
            );

        }

        function remove(row) {
            $(".row_" + row).remove();
            count--;
        }
    </script>
@endsection

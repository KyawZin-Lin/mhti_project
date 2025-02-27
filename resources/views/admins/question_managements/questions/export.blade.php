<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="datatable table table-bordered table-border">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Question</th>
                            <th>Question Type</th>
                            <th>Reading Type</th>
                            <th>True Answer</th>
                            <th>Mark</th>
                            <th>Remark</th>
                            <th>Student Category</th>
                            <th>Answer1</th>
                            <th>Answer2</th>
                            <th>Answer3</th>
                            <th>Answer4</th>

                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($questions as $question)
                            <tr>
                                <td>{{ $question->title }}</td>
                                <td>{{ $question->question_name }}</td>
                                <td>{{ $question->qtype == 0 ? 'True or Fale' : 'Multiple Choice' }}</td>
                                <td>{{ $question->reading_type }}</td>
                                <td>{{ $question->true_answer }}</td>
                                <td>{{ $question->mark }}</td>
                                <td>{{ $question->remarks }}</td>
                                <td>{{ $question->student_category }}</td>

                                @foreach ($q_answers as $q_answer)
                                    @if ($q_answer->question_id == $question->id)
                                        <td>{{ $q_answer->answer }}</td>
                                    @endif
                                @endforeach

                            </tr>
                        @empty
                            <p>No Question</p>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

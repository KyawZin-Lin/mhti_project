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
                            <th>Listening Type</th>
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
                                <td>{{ $question->listening_type }}</td>
                                <td>{{ $question->true_answer }}</td>
                                <td>{{ $question->mark }}</td>
                                <td>{{ $question->remarks }}</td>
                                <td>{{ $question->student_category }}</td>
                                <td>{{ $question->answer1 }}</td>
                                <td>{{ $question->answer2 }}</td>
                                <td>{{ $question->answer3 }}</td>
                                <td>{{ $question->answer4 }}</td>
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

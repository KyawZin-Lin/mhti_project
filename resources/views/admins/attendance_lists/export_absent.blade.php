<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Absent</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($absents as $absent)
                            <tr>
                                <td>{{ date('d-M-Y', strtotime($absent->date)) }}</td>
                                <td>

                                    @foreach ($classrooms as $classroom)
                                        @if (in_array($classroom->id, explode(',', $absent->classroom_id)))
                                            <ul style="list-style-type: none;">
                                                <li>◾ {{ $classroom->student->name }}
                                                    ({{ $classroom->academicYear->name }} /
                                                    {{ $classroom->academicYear->times }} times)
                                                </li>
                                            </ul>
                                        @endif
                                    @endforeach

                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                </table>

            </div>

        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="datatable table table-bordered table-border">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Title</th>
                            <th>Student</th>
                            <th>Payment Type</th>
                            {{-- <th>Amount</th> --}}
                            <th>Remark</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($incomes as $income)
                            <tr>
                                <td>{{ $income->date != null ? date('d-M-Y', strtotime($income->date)) : '' }}</td>
                                <td>{{ $income->title }}</td>
                                <td>{{ $income->student != null ? $income->student->name : '' }}</td>
                                <td>{{ $income->paymentType != null ? $income->paymentType->name : '' }}</td>
                                {{-- <td>{{ $income->amount }}</td> --}}
                                <td>{{ $income->remark }}</td>
                            </tr>
                        @empty
                            <p>No Income Data</p>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="datatable table table-bordered table-border">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Teacher Name</th>
                            <th>Staff</th>
                            <th>Amount</th>
                            <th>Payment Type</th>
                            {{-- <th>Quantity</th> --}}
                            <th>Bonus</th>
                            <th>Fine</th>
                            <th>Remark</th>
                            <th style="width:150px;">Action</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($expends as $expend)
                            <tr>
                                <td>{{ date('d-M-Y', strtotime($expend->date)) }}</td>
                                <td>{{ $expend->teacher != null ? $expend->teacher->name : '' }}</td>
                                <td>{{ $expend->staff != null ? $expend->staff->name : '' }}</td>
                                <td>{{ number_format($expend->amount) }}</td>
                                <td>{{ $expend->paymentType != null ? $expend->paymentType->name : '' }}</td>
                                <td>{{ $expend->bonus }}</td>
                                <td>{{ $expend->fine }}</td>
                                <td>{{ $expend->remark }}</td>
                            </tr>
                        @empty
                            <p>No Expense Data</p>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

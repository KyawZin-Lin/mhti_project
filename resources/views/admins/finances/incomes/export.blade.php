<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="table-responsive">
                <table class="datatable table table-bordered table-border">
                    <thead>
                        <tr>
                            <th>Voucher No</th>
                            <th>Date</th>
                            {{-- <th>Title</th> --}}
                            <th>Student</th>
                            <th>Payment Type</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Amount</th>
                            <th>Pay Money</th>
                            <th>Left Money</th>


                            <th>Remark</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($incomes as $income)
                            <tr>
                                <td>{{ $income->voucher_no }}</td>
                                <td>{{ $income->date != null ? date('d-M-Y', strtotime($income->date)) : '' }}</td>
                                {{-- <td>{{ $income->title }}</td> --}}
                                <td>{{ $income->student != null ? $income->student->name : '' }}</td>
                                <td>{{ $income->paymentType != null ? $income->paymentType->name : '' }}</td>
                                <td>{{ $income->price }}</td>
                                <td>{{ $income->discount }}</td>

                                <td>{{ $income->amount }}</td>
                                <td>{{ $income->pay_money }}</td>
                                <td>{{ $income->left_money }}</td>

                                <td>{{ $income->remark }}</td>
                            </tr>
                        @empty
                            <p>No Income Data</p>
                        @endforelse
                    </tbody>
                    <br>
                    <tfoot>
                        <tr>
                            <td colspan="7" >Total Amount: </td>
                            <td>{{ $incomes->sum('pay_money') }}</td>
                        </tr>

                    </tfoot>
                </table>
            </div>

        </div>
    </div>
</div>

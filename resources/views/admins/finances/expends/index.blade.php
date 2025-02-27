@extends('admins.master')

@section('finance-active', 'active')

@section('expend-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <h6>Expense List</h6>
                </div>

                <div class="col-sm-3">
                    <form action="{{ route('admin.expends.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">

                            <div class="col-sm-6 m-0 p-0">

                                <input type="date" name="daily_search" id="daily_search" class="form-control bg-white"
                                    value="{{ request()->daily_search }}">
                            </div>

                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-md btn-theme btn-success w-100">Search(Daily)</button>
                            </div>



                        </div>
                    </form>
                </div>

                <div class="col-sm-4">
                    <form action="{{ route('admin.expends.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">

                            <div class="col-sm-6 m-0 p-0">

                                <input type="month" name="monthly_search" id="monthly_search"
                                    class="form-control bg-white" value="{{ request()->monthly_search }}">
                            </div>

                            <div class="col-sm-6">
                                <button type="submit"
                                    class="btn btn-md btn-theme btn-success w-100">Search(Monthly)</button>
                            </div>



                        </div>
                    </form>
                </div>
                <div class="col-sm-3 text-right">
                    <a href="{{ route('admin.expense_export') }}"><button type="button"
                            class="btn btn-md btn-success"><b><i class="fas fa-file-excel"></i> Export</b></button></a>

                    <a href="{{ route('admin.expends.create') }}"><button type="button"
                            class="btn btn-md btn-success"><b><i class="fas fa-plus-square"></i>
                                New Expense</b></button></a>
                </div>
            </div>


            <hr>
            <div class="row">


                <div class="col-sm-3">
                    <h5>Total - {{ $expends->count() }}</h5>
                </div>
                <div class="col-sm-9">
                    <form action="{{ route('admin.expends.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">

                            <div class="col-sm-5 m-0 p-0">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 text-center">From</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="from_date" id="from_date" class="form-control bg-white"
                                            value="{{ request()->from_date }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-5 m-0 p-0">
                                <div class="form-group row">
                                    <label for="" class="col-sm-4 text-center"> To</label>
                                    <div class="col-sm-8">
                                        <input type="date" name="to_date" id="to_date" class="form-control bg-white"
                                            value="{{ request()->to_date }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-md btn-theme btn-success w-100">Search</button>
                            </div>



                        </div>
                    </form>
                </div>
                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    {{-- <th>Title</th> --}}
                                    <th>Teacher Name</th>
                                    <th>Staff</th>
                                    <th>Amount</th>
                                    <th>Payment Type</th>
                                    {{-- <th>Quantity</th> --}}
                                    <th>Bonus</th>
                                    <th>Fine</th>
                                    <th>Description</th>
                                    <th>Remark</th>
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $total = 0;
                                ?>
                                @foreach ($expends as $expend)
                                    <?php
                                    $amount = (int) $expend->amount;
                                    $total += $amount;
                                    ?>

                                    <tr>

                                        <td>{{ date('d-M-Y', strtotime($expend->date)) }}</td>
                                        {{-- <td>{{ $expend->title }}</td> --}}
                                        {{-- <td>{{ $expend->particular }}</td> --}}
                                        <td>{{ $expend->teacher != null ? $expend->teacher->name : '' }}</td>
                                        <td>{{ $expend->staff != null ? $expend->staff->name : '' }}</td>
                                        <td>{{ number_format($expend->amount) }}</td>
                                        <td>{{ $expend->paymentType != null ? $expend->paymentType->name : '' }}</td>
                                        <td>{{ $expend->bonus }}</td>
                                        <td>{{ $expend->fine }}</td>
                                        <td>{{ $expend->description }}</td>
                                        <td>{{ $expend->remark }}</td>
                                        <td>
                                            <a href="{{ route('admin.expends.edit', $expend->id) }}"><button
                                                    class="btn btn-sm btn-warning float-left mr-1">Edit</button></a>

                                            <form action="{{ route('admin.expends.destroy', $expend->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">Total :</td>
                                    <td colspan="7">{{ number_format($total) }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $expends->withQueryString()->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">

                </div>

            </div>
        </div>

    </section>
@endsection

@section('script')
    <script></script>
@endsection

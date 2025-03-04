@extends('admins.master')

@section('registration-active', 'active')

@section('list-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-4">
                    <h6>Registration List</h6>

                    <h5><b>Total {{ $incomes->count() }}</b></h5>

                </div>

                <div class="col-sm-3">
                    {{-- <form action="{{ route('admin.registrations.index') }}" method="GET">
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
                    </form> --}}
                </div>

                <div class="col-sm-4">
                    {{-- <form action="{{ route('admin.registrations.index') }}" method="GET">
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
                    </form> --}}
                </div>

                <div class="col-sm-1 text-right">
                    <a href="{{ route('admin.registrations.index') }}">
                        <button type="button" class="btn btn-sm btn-danger">Back</button>
                    </a>
                </div>

            </div>

            <hr>
            <div class="row">

                <div class="col-sm-2 offset-sm-2">
                    {{-- <form action="{{ route('admin.registrations.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">

                            <div class="col-sm-8 m-0 p-0">

                                <input type="text" name="student_name" class="form-control" placeholder="Student Name..."
                                    value="{{ request()->student_name }}">

                            </div>

                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-md btn-theme btn-success w-100">Search</button>
                            </div>



                        </div>
                    </form> --}}
                </div>
                {{-- <div class="col-12 d-flex d-flex justify-content-between ">

                    <div class="row">
                        <form action="{{ route('admin.registrations.index') }}" method="GET">
                            @csrf

                            <div class="d-flex ">

                                <div class="col-sm-5 m-0 p-0">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-center">From</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="from_date" id="from_date"
                                                class="form-control bg-white" value="{{ request()->from_date }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-5 m-0 p-0">
                                    <div class="form-group row">
                                        <label for="" class="col-sm-4 text-center"> To</label>
                                        <div class="col-sm-8">
                                            <input type="date" name="to_date" id="to_date"
                                                class="form-control bg-white" value="{{ request()->to_date }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-md  btn-success ">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="row">
                        <div class="col-sm-2">
                            <a href="{{route('admin.registrations.deleted-history')}}">
                                <button  class="btn btn-md  btn-danger ">History</button>
                            </a>
                        </div>
                    </div>
                </div> --}}

                <div class="col-sm-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Voucher No</th>

                                    <th>Date</th>
                                    {{-- <th>Description</th> --}}
                                    <th>Student</th>
                                    <th>Payment Type</th>
                                    {{-- <th>Amount</th> --}}
                                    <th>Remark</th>
                                    {{-- <th>Status</th> --}}
                                    <th style="width:150px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $total = 0;
                                ?>
                                @foreach ($incomes as $income)
                                    <?php
                                    $amount = (int) $income->amount;
                                    $total += $amount;
                                    ?>
                                    <tr>
                                        <td>{{ $income->voucher_no }}</td>

                                        <td>{{ date('d-M-Y', strtotime($income->date)) }}</td>
                                        {{-- <td>{{ $income->title }}</td> --}}
                                        <td>{{ $income->student != null ? $income->student->name : '' }}</td>
                                        <td>{{ $income->paymentType != null ? $income->paymentType->name : '' }}</td>
                                        {{-- <td>{{ $income->particular }}</td>
                                        <td>{{ $income->group }}</td> --}}
                                        {{-- <td>{{ number_format($income->amount) }}</td> --}}
                                        <td>{{ $income->remark }}</td>
                                        {{-- <td>
                                            @if ($income->status == 'Student')
                                                <span class="badge badge-success">Student Receipt</span>
                                            @elseif ($income->status == 'Office')
                                                <span class="badge badge-success">Office Receipt</span>
                                            @endif
                                        </td> --}}
                                        <td class="d-flex justify-content-start">
                                            <a href="{{ route('admin.registrations.edit', $income->id) }}"><button
                                                    class="btn btn-sm btn-warning"
                                                    style="float:left;margin-right:1px;">Edit</button></a>

                                            <a href="{{ route('admin.registrations.show', $income->id) }}"><button
                                                    class="btn btn-sm btn-info"
                                                    style="float:left;margin-right:1px;">Detail</button></a>

                                            <form action="{{ route('admin.registrations.destroy', $income->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                            {{-- <tfoot>
                                <tr>
                                    <td colspan="3" class="text-right">Total :</td>
                                    <td colspan="3">{{ number_format($total) }}</td>
                                </tr>
                            </tfoot> --}}
                        </table>
                    </div>

                    <div class="float-right">
                        {{ $incomes->withQueryString()->links() }}
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

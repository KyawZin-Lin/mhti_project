@extends('admins.master')

@section('finance-active', 'active')

@section('income-active', 'active')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-2">
                    <h6>Income List</h6>
                </div>

                <div class="col-sm-3">
                    <form action="{{ route('admin.incomes.index') }}" method="GET">
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
                    <form action="{{ route('admin.incomes.index') }}" method="GET">
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
                    <a href="{{ route('admin.income_export') }}"><button type="button"
                            class="btn btn-md btn-success mr-1"><b><i class="fas fa-file-excel"></i> Export</b></button></a>

                    {{-- <a href="{{ route('admin.incomes.create') }}"><button type="button" class="btn btn-md btn-success"
                            style="float:right;"><b><i class="fas fa-plus-square"></i>
                                New Income</b></button></a> --}}
                </div>

            </div>

            <hr>
            <div class="row">


                <div class="col-sm-2">
                    <h5>Total - {{ $incomes->count() }}</h5>
                </div>

                <div class="col-sm-4">
                    {{-- <form action="{{ route('admin.incomes.index') }}" method="GET">
                        @csrf

                        <div class="d-flex justify-content-end mb-2">

                            <div class="col-sm-6 m-0 p-0">

                                <select name="student_id" id="student_id" class="myselect form-control">
                                    <option></option>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}"
                                            @if ($student->id == request()->student_id) selected @endif>
                                            {{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-sm-6">
                                <button type="submit"
                                    class="btn btn-md btn-theme btn-success w-100">Search(Student)</button>
                            </div>



                        </div>
                    </form> --}}
                </div>
                <div class="col-sm-6">
                    <form action="{{ route('admin.incomes.index') }}" method="GET">
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
                                    <th>Student</th>
                                    <th>Course</th>
                                    <th>Batch</th>
                                    <th>Payment Type</th>
                                    {{-- <th>Amount</th> --}}
                                    <th>Remark</th>
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

                                        <td>{{ $income->date != null ? date('d-M-Y', strtotime($income->date)) : '' }}</td>
                                        {{-- <td>{{ $income->title }}</td> --}}
                                        <td>{{ $income->student != null ? $income->student->name : '' }}</td>
                                        <td>{{ $income->student != null ? ($income->student->degree != null ? $income->student->degree->name : '') : '' }}
                                        </td>
                                        <td>{{ $income->student != null ? ($income->student->batch != null ? $income->student->batch->batch : '') : '' }}
                                        </td>

                                        <td>{{ $income->paymentType != null ? $income->paymentType->name : '' }}</td>
                                        {{-- <td>{{ $income->particular }}</td>
                                        <td>{{ $income->group }}</td> --}}
                                        {{-- <td>{{ number_format($income->amount) }}</td> --}}
                                        <td>{{ $income->remark }}</td>
                                        <td>
                                            {{-- <a href="{{ route('admin.incomes.edit', $income->id) }}"><button
                                                    class="btn btn-sm btn-warning"
                                                    style="float:left;margin-right:1px;">Edit</button></a> --}}

                                            <form action="{{ route('admin.incomes.destroy', $income->id) }}"
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

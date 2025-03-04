@extends('admins.master')

@section('registration-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="text-right btn-print">

                                <a href="{{ route('admin.registrations.edit', $income->id) }}"><button
                                        class="btn btn-sm btn-success" style="margin-right:1px;">Edit</button></a>

                                <button type="button" class="btn btn-sm btn-success"
                                    onclick="window.print()">Print</button>

                                <a href="{{ route('admin.registrations.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-2 text-right">

                                    <img src="{{ asset('photos/icons/logo.png') }}" class="img-thumbnail p-2" alt=""
                                        style="width:170px;height:110px;background-color: #704002;">

                                    {{-- <div class="text-danger shadow mb-5 bg-body rounded w-75 text-center"
                                        style="height: 130px;line-height:130px;">
                                        <b>No Photo</b>
                                    </div> --}}

                                </div>

                                <div class="col-10 text-center">
                                    <h5 class="mt-3"><b>MHTi – Hospitality & Tourism Institute Co.,Ltd.</b></h5>
                                    <h6>No. 647, Mya Kan Thar Street (1), (2) Quarter, Kamayut Township, Yangon , Myanmar
                                    </h6>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-sm-12 text-center">
                                    @if ($income->status == 'Student')
                                        <h4><b>School Fee Receipt</b></h4>
                                    @else
                                        <h4><b>Official Cash Receipt</b></h4>
                                    @endif
                                </div>

                                <div class="col-sm-8 offset-sm-2">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tr class="text-center">
                                                <th colspan="2">Student Details</th>
                                                <th>Receipt No</th>
                                            </tr>

                                            <tr>
                                                <td class="text-right p-0">Student ID</td>
                                                <td class="p-0">:
                                                    {{ $income->student != null ? $income->student->student_no : '' }}</td>
                                                <td class="text-center p-0">{{ $income->voucher_no }}</td>
                                            </tr>
                                            <tr>
                                                <td class="text-right p-0">Name</td>
                                                <td class="p-0">:
                                                    {{ $income->student != null ? $income->student->name : '' }}</td>
                                                <td class="text-center p-0"></td>
                                            </tr>

                                            <tr>
                                                <td class="text-right p-0">Contact No</td>
                                                <td class="p-0">:
                                                    {{ $income->student != null ? $income->student->phone : '' }}</td>
                                                <td class="text-center p-0"></td>
                                            </tr>

                                            <tr>
                                                <td class="text-right p-0">NRC NO</td>
                                                <td class="p-0">:
                                                    {{ $income->student != null ? $income->student->national_id : '' }}</td>
                                                <td class="text-center p-0">Date</td>
                                            </tr>

                                            <tr>
                                                <td class="text-right p-0">Address</td>
                                                <td class="p-0">:
                                                    {{ $income->student != null ? $income->student->address : '' }}</td>
                                                <td class="text-center p-0">

                                                    {{ $income->date != null ? date('d-M-Y', strtotime($income->date)) : '' }}
                                                    {{-- @if ($income->student)
                                                        {{ $income->student->date != null ? date('d-M-Y', strtotime($income->student->date)) : '' }}
                                                    @endif --}}
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>

                            @if ($income->status == 'Student')
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    {{-- <th>No</th> --}}
                                                    <th>Code</th>
                                                    {{-- <th>Description</th> --}}
                                                    <th>Course</th>
                                                    <th>Batch</th>
                                                    <th>Price</th>
                                                    <th>Discount</th>
                                                    <th>Amount</th>



                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $total = 0;
                                                ?>
                                                {{-- @foreach ($incomes as $inc) --}}
                                                @php
                                                    $total += (int) $income->amount;
                                                @endphp
                                                <tr>
                                                    <td>{{ $income->code }}</td>
                                                    {{-- <td>{{ $income->title }}</td> --}}
                                                    <td>

                                                        {{ $income->student->degree != null ? $income->student->degree->name : '' }}

                                                    </td>
                                                    <td>

                                                        {{ $income->student->batch != null ? $income->student->batch->batch : '' }}

                                                    </td>
                                                    {{-- <td>{{ $income->paymentType != null ? $income->paymentType->name : '' }}
                                                    </td>--}}
                                                    <td>{{ $income->price }}</td>
                                                    <td>{{ $income->discount }}</td>

                                                    <td>{{ $income->amount }}</td>



                                                </tr>
                                                {{-- @endforeach --}}
                                            </tbody>

                                            <tfoot>
                                                <tr>
                                                    <td colspan="5" class="text-right">Total Amount: </td>
                                                    <td>{{ $total }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-right">Pay Money: </td>
                                                    <td>{{ $income->pay_money }}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" class="text-right">Left Money: </td>
                                                    <td>{{ $income->left_money }}</td>
                                                </tr>
                                            </tfoot>

                                        </table>
                                    </div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    {{-- <th>No</th> --}}
                                                    <th>Code</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>

                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                $total = 0;
                                                ?>

                                                @foreach ($incomeDetails as $income_detail)
                                                    @php
                                                        $total += (int) $income_detail->amount;
                                                    @endphp
                                                    <tr>
                                                        <td>{{ $income_detail->code }}</td>
                                                        <td>

                                                            {{ $income_detail->description }}

                                                        </td>

                                                        <td>{{ $income_detail->amount }}</td>

                                                    </tr>
                                                @endforeach
                                            </tbody>

                                            <tfoot>
                                                <tr>

                                                    <td colspan="3" class="text-center">Total Amount:
                                                        {{ $total }}
                                                    </td>
                                                    {{-- <td>{{ $total }}</td> --}}
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            @endif

                            <div class="row">
                                <div class="col-6">
                                    <p>Payment Method: {{ $income->paymentType != null ? $income->paymentType->name : '' }}
                                    </p>
                                </div>
                                {{-- <div class="col-6">
                                    <h6>Total Amount : {{ $income->amount }}</h6>
                                </div> --}}
                            </div>

                            <div class="row">
                                <div class="col-4 text-center">
                                    <h6>Paid by:</h6>
                                    <h6>{{ $income->paid_by }}</h6>
                                </div>

                                <div class="col-4 text-center">
                                    <h6>Received by:</h6>
                                    <h6>{{ $income->adminUser != null ? $income->adminUser->name : '' }}</h6>
                                </div>

                                <div class="col-4 text-center">
                                    <h6>Checked by:</h6>
                                    <h6>{{ $income->adminUser != null ? $income->adminUser->name : '' }}</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

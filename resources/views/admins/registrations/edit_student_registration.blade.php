@extends('admins.master')

@section('registration-active', 'active')

@section('create-registration-active', 'active')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Edit Student Registration</b></p>

                                <div>
                                    <a href="{{ route('admin.registrations.index') }}">
                                        <button type="button" class="btn btn-sm btn-danger">Back to List</button>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.registrations.update', $income->id) }}" method="POST"
                                autocomplete="off">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="status" value="Student">

                                <div class="form-group row">
                                    <label for="voucher_no" class="col-sm-4 col-form-label text-right"><b>
                                            Voucher No</b></label>
                                    <div class="col-sm-6">
                                        <p class="mt-1">{{ $income->voucher_no }}</p>

                                        {{-- <input type="hidden" name="voucher_no" value="{{ $voucher_no }}"> --}}
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="date" class="col-sm-4 col-form-label text-right"><b>
                                            Date</b></label>
                                    <div class="col-sm-6">
                                        <input type="date" name="date" id="date" class="form-control"
                                            value="{{ $income->date }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Student</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="student_id" id="student_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($students as $student)
                                                <option value="{{ $student->id }}"
                                                    @if ($student->id == $income->student_id) selected @endif>
                                                    {{ $student->name }} / {{ $student->student_no }} /
                                                    {{ $student->phone }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- <div class="form-group row">
                                    <label for="title" class="col-sm-4 col-form-label text-right"><b>
                                            Description</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="title" id="title" class="form-control"
                                            value="{{ $income->title }}">
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Course</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        {{-- <select name="course_id" id="course_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($courses as $course)
                                                <option value="{{ $course->id }}"
                                                    @if ($course->id == $income->course_id) selected @endif>
                                                    {{ $course->name }}</option>
                                            @endforeach
                                        </select> --}}

                                        <p class="course">
                                            {{ $income->student->degree != null ? $income->student->degree->name : '' }}</p>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Batch</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        {{-- <select name="batch_id" id="batch_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($batches as $batch)
                                                <option value="{{ $batch->id }}"
                                                    @if ($batch->id == $income->batch_id) selected @endif>
                                                    {{ $batch->batch }}</option>
                                            @endforeach
                                        </select> --}}
                                        <p class="batch">
                                            {{ $income->student->batch != null ? $income->student->batch->batch : '' }}
                                        </p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="code" class="col-sm-4 col-form-label text-right"><b>
                                            Code</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="code" id="code" class="form-control"
                                            value="{{ $income->code }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 text-right"><b>Payment Installment</b></label>

                                    <div class="col-sm-6">
                                        <input type="radio" name="payment_installment" value="1 times installment"
                                            id="1" @if ('1 times installment' == $income->payment_installment) checked @endif>
                                        <label for="1">1 times installment</label>

                                        <input type="radio" name="payment_installment" value="2 times installment"
                                            id="2" @if ('2 times installment' == $income->payment_installment) checked @endif>
                                        <label for="2">2 times installment</label>
                                        <input type="radio" name="payment_installment" value="3 times installment"
                                            id="3" @if ('3 times installment' == $income->payment_installment) checked @endif>
                                        <label for="3">3 times installment</label>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Payment Type</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="payment_type" id="payment_type" class="myselect form-control">
                                            <option></option>
                                            @foreach ($payment_types as $payment_type)
                                                <option value="{{ $payment_type->id }}"
                                                    @if ($payment_type->id == $income->payment_type) selected @endif>
                                                    {{ $payment_type->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Payment Complete or
                                            Incomplete</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <input type="radio" name="payment_complete" value="Complete" id="complete"
                                            @if ('Complete' == $income->payment_complete) checked @endif>
                                        <label for="complete">Complete</label>
                                        <input type="radio" name="payment_complete" value="InComplete" id="incomplete"
                                            @if ('InComplete' == $income->payment_complete) checked @endif>
                                        <label for="incomplete">Incomplete</label>
                                    </div>
                                </div>


                                {{-- <div class="form-group row">
                                    <label for="" class="col-sm-4 col-md-4 text-right"><b>Income Source</b></label>
                                    <div class="col-sm-6 col-md-6">
                                        <select name="income_source_id" id="income_source_id" class="myselect form-control">
                                            <option></option>
                                            @foreach ($incomeSources as $incomeSource)
                                                <option value="{{ $incomeSource->id }}"
                                                    @if ($incomeSource->id == $income->income_source_id) selected @endif>
                                                    {{ $incomeSource->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div> --}}

                                {{-- <div class="form-group row">
                                    <label for="particular" class="col-sm-4 col-form-label text-right"><b>
                                            Particular</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="particular" id="particular" class="form-control"
                                            value="{{ $income->particular }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="group" class="col-sm-4 col-form-label text-right"><b>
                                            Group</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="group" id="group" class="form-control"
                                            value="{{ $income->group }}">
                                    </div>
                                </div> --}}

                                <div class="form-group row">
                                    <label for="particular" class="col-sm-4 col-form-label text-right"><b>
                                            Price</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="price form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="group" class="col-sm-4 col-form-label text-right"><b>
                                            Discount</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" class="discount form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="amount" class="col-sm-4 col-form-label text-right"><b>Amount</b></label>
                                    <div class="col-sm-6">


                                        <input type="text" name="amount" class="amount form-control"
                                            value="{{ $income->amount }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="paid_by" class="col-sm-4 col-form-label text-right"><b>
                                            Paid By</b></label>
                                    <div class="col-sm-6">
                                        <input type="text" name="paid_by" id="paid_by" class="form-control"
                                            value="{{ $income->paid_by }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="received_by" class="col-sm-4 col-form-label text-right"><b>
                                            Received By</b></label>
                                    <div class="col-sm-6">
                                        <p>{{ auth()->user()->name }}</p>
                                        <input type="hidden" name="received_by" id="received_by" class="form-control"
                                            value="{{ auth()->user()->id }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="checked_by" class="col-sm-4 col-form-label text-right"><b>
                                            Checked By</b></label>
                                    <div class="col-sm-6">
                                        <p>{{ auth()->user()->name }}</p>
                                        <input type="hidden" name="checked_by" id="checked_by" class="form-control"
                                            value="{{ auth()->user()->id }}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="remark" class="col-sm-4 col-form-label text-right"><b>Remark</b></label>
                                    <div class="col-sm-6">
                                        <textarea name="remark" id="remark" cols="30" rows="1" class="form-control">{{ $income->remark }}</textarea>
                                    </div>
                                </div>

                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-4">
                                        <button type="reset" class="btn btn-sm btn-secondary w-100">Cancel</button>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-sm btn-success w-100">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#student_id').change(function() {
                var studentId = $('#student_id').val();

                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.courseBatchAjax') }}',
                    data: {
                        'studentId': studentId,
                    },
                    dataType: 'json',

                    success: function(res) {
                        console.log(res);
                        $('.course').text(res.course);
                        $('.batch').text(res.batch);
                        $('.price').val(res.price);
                        $('.discount').val(res.discount + '%');
                        $('.amount').val(res.amount);
                    }
                })
            })
        })
    </script>
@endsection

@extends('admins.master')

@section('student-active', 'active')

@section('title', 'Student')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <p class="mt-3"><b>Payment By Installments</b></p>

                                <a href="{{ route('admin.students.index') }}">
                                    <button type="button" class="btn btn-sm btn-danger">Back</button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('admin.payment_by_installment', $student->id) }}" method="POST"
                                enctype="multipart/form-data" autocomplete="off">
                                @csrf
                                @method('put')

                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Title</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="text" name="title" class="form-control"
                                                    value="{{ old('title') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Date</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="date" name="payment_date" class="form-control"
                                                    value="{{ old('payment_date') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Pay Money</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="pay_money" class="form-control"
                                                    value="{{ old('pay_money') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4"><b>Left Money</b></label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="number" name="left_money" class="form-control"
                                                    value="{{ old('left_money') }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-2 col-md-2">Payment Installment</label>

                                            <div class="col-sm-6">
                                                <input type="radio" name="payment_installment" value="1 times installment"
                                                    id="1" @if ('1 times installment' == old('payment_installment')) checked @endif>
                                                <label for="1">1 times installment</label>

                                                <input type="radio" name="payment_installment" value="2 times installment"
                                                    id="2" @if ('2 times installment' == old('payment_installment')) checked @endif>
                                                <label for="2">2 times installment</label>
                                                <input type="radio" name="payment_installment" value="3 times installment"
                                                    id="3" @if ('3 times installment' == old('payment_installment')) checked @endif>
                                                <label for="3">3 times installment</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-4 col-md-4">Payment Type</label>
                                            <div class="col-sm-6 col-md-6">
                                                <select name="payment_type" id="payment_type" class="myselect form-control">
                                                    <option></option>
                                                    @foreach ($payment_types as $payment_type)
                                                        <option value="{{ $payment_type->id }}"
                                                            @if ($payment_type->id == isset($income) ? $income->payment_type : '') selected @endif>
                                                            {{ $payment_type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group row">
                                            <label for="" class="col-sm-6 col-md-6">Payment Complete or
                                                Incomplete</label>
                                            <div class="col-sm-6 col-md-6">
                                                <input type="radio" name="payment_complete" value="Complete"
                                                    id="complete" @if ('Complete' == old('payment_complete')) checked @endif>
                                                <label for="complete">Complete</label>
                                                <input type="radio" name="payment_complete" value="InComplete"
                                                    id="incomplete" @if ('InComplete' == old('payment_complete')) checked @endif>
                                                <label for="incomplete">Incomplete</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row my-3 mb-5">
                                    <div class="col-3 offset-3">
                                        <button type="reset" class="btn btn-sm btn-secondary w-100">Cancel</button>
                                    </div>
                                    <div class="col-3">
                                        <button type="submit" class="btn btn-sm btn-success w-100">Save</button>
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
            $('#nrc_no').change(function() {
                var nrc_no = $('#nrc_no').val();

                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.ajaxNrcAbbre') }}',
                    data: {
                        'nrc_no': nrc_no,
                    },
                    dataType: 'json',

                    success: function(response) {
                        //console.log(response.nrc_infos);
                        // if (response.nrc_infos.length) {
                        $(".nrc_abbre").empty();
                        $.map(response.nrc_infos, function(res) {
                            //console.log(res.township_abbreviation)

                            $(".nrc_abbre").append(
                                `<option value='${res.id}'> ${res.township_abbreviation}</option>`
                            )


                        })
                        //}

                        // console.log(response.nrc_infos);

                        // $('#nrc_abbre').find('.nrc_abbreviation').val(response.nrc_infos
                        //     .township_abbreviation);

                    }
                });

            });

            $('#state_id').change(function() {
                var state_id = $('#state_id').val();

                $.ajax({
                    type: 'get',
                    url: '{{ route('admin.ajaxTownship') }}',
                    data: {
                        'state_id': state_id,
                    },
                    dataType: 'json',

                    success: function(response) {
                        //console.log(response.townships);

                        $(".township_id").empty();
                        $.map(response.townships, function(res) {
                            // console.log(res.name);
                            $(".township_id").append(
                                `<option value='${res.id}'> ${res.name}</option>`
                            )
                        })
                    }
                })
            });
        });
    </script>
@endsection

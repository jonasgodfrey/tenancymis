@extends('layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">

                        <h4 class="page-title">Payment Edit</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <!-- end row -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Record Payments</h4>
                            <br>
                            <div id="alert">
                                @include('partials.flash')
                                @include('partials.modal')
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="/tenancy-payments/update/{{$payment->id}}" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Payment Category</label>
                                            <select class="form-select" name="paycat_id" id="example-select">
                                                <option value="1">Rent</option>
                                                <option value="2">Facility Fee</option>
                                                <option value="3">Taxes</option>
                                                <option value="4">Rent Balance</option>
                                                <option value="5">Others</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Amount Paid</label>
                                            <input type="text" id="example-email" name="amount" class="form-control"
                                                placeholder="NGN" value="{{ $payment->amount }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Payment Method</label>
                                            <select class="form-select" name="paymethod" id="example-select">
                                                <option value="Cash">Cash</option>
                                                <option value=">Bank Transfer">Bank Transfer</option>
                                                <option value="Online">Online</option>
                                                <option value="Cryptos">Cryptos</option>
                                                <option value="Others">Others</option>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Payment Status</label>
                                            <select class="form-select" name="paystatus_id" id="example-select">
                                                <option value="1">Fully Paid</option>
                                                <option value="2">Partly Paid</option>
                                                <option value="3">Partly Renewed</option>
                                                <option value="4">Fully Renewed</option>
                                                <option value="5">Not Paid</option>
                                            </select>
                                        </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <form>

                                        <div class="mb-3">
                                            <label for="example-password" class="form-label">Start Date</label>
                                            <input type="date" id="example-password" name="startdate" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($payment->startdate)->format('Y-m-d') }}">
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-date" class="form-label">Due Date</label>
                                            <input type="date" name="duedate" class="form-control"
                                                value="{{ \Carbon\Carbon::parse($payment->duedate)->format('Y-m-d') }}" placeholder="11/02/2020">
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Duration</label>
                                            <select class="form-select" name="duration" id="example-select">
                                                <option value="{{$payment->duration}}" style="display:none"> {{$payment->duration}}</option>
                                                <option value="6 Months">6 Months</option>
                                                <option value="1 Year">1 Year</option>
                                                <option value="2 Years">2 Years</option>
                                                <option value="3 Years">3 Years</option>
                                                <option value="4 Years">4 Years</option>
                                                <option value="5 Years">5 Years</option>
                                                <option value="10 Years">10 Years</option>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Upload Evidence</label>
                                            <input name="file" type="file" id="example-fileinput" class="form-control">
                                        </div>


                                </div> <!-- end col -->

                                <div class="col-12">
                                    <div class="mb-3">
                                        <input type="submit" name="submit" class="btn btn-secondary btn-md"
                                            value="Save Changes">
                                        <a href="{{ route('payments.index') }}" style="margin-left: 10px"
                                            class="btn btn-primary btn-md">Go Back</a>
                                    </div>
                                </div>

                            </div>
                            <!-- end row-->
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection

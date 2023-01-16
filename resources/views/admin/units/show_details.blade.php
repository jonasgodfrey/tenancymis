@extends('layouts.app')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->


        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">

                    <h4 class="page-title">Unit Information</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class=" row">
                        <div class="col-md-6">
                            <div style="flex-direction:row; flex: 1; align-items: center; justify-content: center;">
                                <img style="margin: 0 auto;" width="100%" height="400" src="{{asset('storage/unit/'.$unit->image)}}" />
                            </div>
                        </div>
                        <div class="details col-md-6">
                            <h3 class="product-title">{{$unit->property->propname}}({{$unit->name}})</h3>

                            <br>
                            <h4 class="price">Rent/Lease Amount:</h4>
                            <p class="vote">{{$unit->leaseAmount}}</p>
                            <h4 class="price">Description</h4>
                            <p class="product-description">{{$unit->unitDesc}}</p>
                            <br>

                            <h4 style="margin-bottom: 0px;">TENANT DETAILS</h4>
                            <hr style="margin-top: 10px;">

                            @if($unit->status == 'occupied')
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="price">Name:</h4>
                                    <p class="vote">{{$unit->tenant->user->name}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="price">Occupation</h4>
                                    <p class="product-description">{{$unit->tenant->user->occupation}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="price">Occupancy Type:</h4>
                                    <p class="product-description">{{$unit->tenant->bizcat}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="price">Email</h4>
                                    <p class="product-description">{{$unit->tenant->user->email}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="price">Phone:</h4>
                                    <p class="product-description">{{$unit->tenant->user->phone}}</p>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="price">Rent Period:</h4>
                                    <p class="product-description">{{ $unit->tenant->start_date != null ? \Carbon\Carbon::createFromTimestamp(strtotime($unit->tenant->start_date))->format('d M Y')}} - {{\Carbon\Carbon::createFromTimestamp(strtotime($unit->tenant->due_date))->format('d M Y') : 'Not Assigned'}}</p>
                                </div>
                            </div>
                            @endif

                            @if($unit->status == 'empty')
                            <div class="row">
                                <div class="col-md-12">
                                    <h4 class="price">
                                        No Tenants Available yet
                                    </h4>
                                </div>

                            </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="page-title-box page-title-box-alt">

                            <h4 class="page-title"> Tenants Payment Information</h4>
                        </div>
                    </div>
                    <div class="col-md-6">
                        @if($unit->status == 'occupied')

                        <div class="page-title-box page-title-box-alt">
                            <div style="flex-direction:row; justify-content: flex-end;">
                                <h4 class="page-title" style="text-align: right;">
                                    <button id="show-add-tenant" name="submit" class="btn btn-primary btn-md">
                                        Update payment</button>
                                </h4>


                            </div>

                        </div>
                        @endif
                    </div>
                </div>

                <!-- end page title -->
                <div id="alert">
                    @include('partials.flash')
                    @include('partials.modal')
                </div>
                @if($unit->status == 'occupied')
                <div class="row" id="add-tenants-div" style="display: none;">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">
                                <h4 class="header-title">{{ $unit->tenant->start_date == null ? 'New Tenant Payment' : 'Update Tenant Payment'}}</h4>
                                <br>


                                <div class="row">
                                    <form role="form" action="{{ route('payments.updatepayment') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="row" id="newTenantDiv">
                                                <div class="mb-3 col-lg-4">
                                                    <label for="amount" class="form-label">Expected Amount</label>
                                                    <input type="number" min="0" name="amount" id="amount" class="form-control" placeholder="Amount">
                                                    <p id="amount_error" style="color: red; font-size: 13px; display: none"></p>
                                                </div>

                                                <div class="mb-3 col-lg-4">
                                                    <label for="discount" class="form-label">Discount</label>
                                                    <input type="text" min="0" name="discount" id="discount" class="form-control" value="0">
                                                    <p id="discount_error" style="color: red; font-size: 13px; display: none"></p>
                                                </div>

                                                <div class="mb-3 col-lg-4">
                                                    <label for="amount_paid" class="form-label">Amount Paid</label>
                                                    <input type="number" min="0" readonly name="amount_paid" id="amount_paid" class="form-control" placeholder="Amount Paid">
                                                    <p id="amount_paid_error" style="color: red; font-size: 13px; display: none"></p>
                                                </div>

                                                <div class="mb-3 col-lg-4">
                                                    <label for="duration" class="form-label">Duration</label>
                                                    <input type="text" name="duration" id="duration" class="form-control" placeholder="" readonly>
                                                    <p id="duration_error" style="color: red; font-size: 13px; display: none"></p>

                                                </div>

                                                <div class="mb-3 col-lg-4">
                                                    <label for="start_date" class="form-label">{{$unit->tenant->start_date != null ? 'Last Due Date' : 'Start Date' }}</label>
                                                    <input type="date" name="start_date" id="start_date" value="{{$unit->tenant->start_date != null ? $unit->tenant->due_date : '' }}" class="form-control" placeholder="" required {{$unit->tenant->start_date != null ? 'readonly' : ''}}>
                                                    <p id="start_date_error" style="color: red; font-size: 13px; display: none"></p>

                                                </div>

                                                <div class="mb-3 col-lg-4">
                                                    <label for="due_date" class="form-label">{{$unit->tenant->start_date != null ? 'New Due Date' : 'Due Date' }}</label>
                                                    <input type="date" name="due_date" id="due_date" readonly class="form-control" placeholder="">
                                                    <input type="hidden" name="unit_id" value="{{$unit->id}}" />
                                                    <input type="hidden" name="tenant_id" value="{{$unit->tenant->id}}" />
                                                    <input type="hidden" name="property_id" value="{{$unit->property->id}}" />
                                                    <input type="hidden" name="lease_amount" id="lease_amount" value="{{$unit->leaseAmount}}" />
                                                    <input type="hidden" name="payment_update_type" id="payment_update_type" value="{{$unit->tenant->start_date != null ? 'update' : 'new'}}" />
                                                    <input type="hidden" name="total_months" id="total_months" />
                                                    <p id="due_date_error" style="color: red; font-size: 13px; display: none"></p>

                                                </div>

                                                <div class="mb-3 col-lg-4">
                                                    <label for="example-select" class="form-label ">Payment Category</label>
                                                    <select class="form-select payment_category" name="payment_category" id="payment_category">
                                                        <!-- <option style="display: none">Select Payment Category</option> -->
                                                        @foreach ($payment_categories as $payment_category)
                                                        <option value="{{ $payment_category->id }}">{{ $payment_category->payment_category_name }}</option>
                                                        @endforeach
                                                    </select>
                                                    <p id="payment_category_error" style="color: red; font-size: 13px; display: none"></p>

                                                </div>

                                                <div class="mb-3 col-lg-4">
                                                    <label for="example-select" class="form-label">Payment Method</label>
                                                    <select class="form-select" name="payment_method" id="example-select">
                                                        <option value="Cash">Cash</option>
                                                        <option value=">Bank Transfer">Bank Transfer</option>
                                                        <option value="Online">Online</option>
                                                        <option value="Cryptos">Cryptos</option>
                                                        <option value="Others">Others</option>
                                                    </select>
                                                    <p id="payment_method_error" style="color: red; font-size: 13px; display: none"></p>

                                                </div>

                                                <div class="mb-3 col-lg-4">
                                                    <label for="example-fileinput" class="form-label">Upload Evidence</label>
                                                    <input name="file" type="file" id="example-fileinput" class="form-control">
                                                </div>
                                            </div>

                                            <div class="row" id="existingTenantDiv" style="display: none;">

                                                <div class="mb-3 col-lg-6">
                                                    <label for="simpleinput" class="form-label">Tenant's Mobile No</label>
                                                    <input type="text" name="mobile" id="mobile" class="form-control" placeholder="" disabled>
                                                </div>

                                                <div class="mb-3 col-lg-6">
                                                    <label for="simpleinput" class="form-label">Tenant's Email</label>
                                                    <input type="text" name="email" id="email" class="form-control" placeholder="" disabled>
                                                </div>

                                                <div class="mb-3 col-lg-6">
                                                    <label for="simpleinput" class="form-label">Tenant's Occupation</label>
                                                    <input type="text" name="bizname" id="bizname" class="form-control" disabled placeholder="">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <button type="submit" name="submit" class="btn btn-primary btn-md">Add Payment</button>
                                            </div>
                                        </div>
                                        <!-- end row-->
                                    </form>
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div>

                <div class="card">
                    <div class="card-body">
                        <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Payment Ref</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Duration</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($payment_records as $unit)
                                <tr>
                                    <td>{{ $unit->payment_reference }}</td>
                                    <td>{{ $unit->amount }}</td>
                                    <td>{{ $unit->discount }}</td>
                                    <td>{{ $unit->startdate }}</td>
                                    <td>{{ $unit->duedate }}</td>
                                    <td>{{ $unit->duration }}</td>
                                    <td>{{ $unit->payment_date }}</td>

                                </tr>
                                @empty
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                @if($unit->status == 'empty')
                <div class="row">
                    <div class="col-12">
                        <div class="card">

                            <div class="card-body">

                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>No Tenant Payment Information Found</h3>
                                    </div>

                                    <!-- end row-->
                                </div>
                            </div> <!-- end card-body -->
                        </div> <!-- end card -->
                    </div><!-- end col -->
                </div>

                @endif
            </div>
        </div>
        <!-- end row -->




    </div> <!-- container-fluid -->

</div> <!-- content -->
@endsection
@section('js')
<script src="dist/js/selectField.js"></script>
<script>
    $('#add-property-div').hide();

    $('#show-add-tenant').on('click', function(e) {
        $('#add-tenants-div').toggle();
    });

    let years = 0;
    let monthsRemaining = 0
    let isAmountValid = false;

    $('#amount').on('input', function(e) {

        console.log(e.target.value);
        let leaseAmount = $('#lease_amount').val();

        if (leaseAmount / 12 > e.target.value) {
            $("#amount_error").show();
            $("#duration").val("");
            $("#amount_error").text("Minimum amount is " + formatMoney(leaseAmount / 12))
        } else {
            $("#amount_error").hide();
            var amountPermonth = leaseAmount / 12;
            if (parseInt(e.target.value / amountPermonth) < 12) {
                $("#duration").val(parseInt(e.target.value / amountPermonth) + " months")
            } else {
                var months = parseInt(e.target.value / amountPermonth);
                years = parseInt(months / 12);
                monthsRemaining = months % 12;

                var yearsRemainingTxt = years == 1 ? years + "year " : years <= 0 ? "" : years + "years ";
                var monthsRemainingText = monthsRemaining == 1 ? monthsRemaining + "month" : monthsRemaining <= 0 ? "" : monthsRemaining + "months";

                $("#duration").val(yearsRemainingTxt + monthsRemainingText);
            }

            var validAmount = e.target.value - $('#discount').val();

            $("#amount_paid").val(validAmount);
            isAmountValid = validAmount >= 0 ? true : false;

            console.log($('#ayment_update_type').val());

            if ($('#payment_update_type').val() == 'update') {
                calculateDueDate();
            }
        }
    });

    $('#discount').on('input', function(e) {
        $("#amount_paid").val($('#amount').val() - e.target.value)
    });


    $('#start_date').on('input', function(e) {
        calculateDueDate();
    });

    function calculateDueDate() {
        if (isAmountValid) {

            var totalMonths = (years * 12) + monthsRemaining;
            var startDate = new Date($('#start_date').val())
            var numberOfMonthsToAdd = totalMonths;
            var result = new Date(startDate.setMonth(startDate.getMonth() + numberOfMonthsToAdd));

            result = formatDate(result);
            console.log(result);

            $("#total_months").val(totalMonths)
            $("#due_date").val(result)
        }
    }

    $(".single-unit-btn").click(function() {
        $(".single-unit-card").toggle();
        $(".multi-unit-card").hide();
    });

    $(".multi-unit-btn").click(function() {
        $(".single-unit-card").hide();
        $(".multi-unit-card").toggle();
    });



    $('#multi_unitno').keyup(function() {
        // Update the button text with the current value of the input field
        $('#gen-btn').html($(this).val());
    });
</script>
@endsection
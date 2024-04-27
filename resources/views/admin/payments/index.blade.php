@extends('layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->

        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">

                    <h4 class="page-title"> Payments</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


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
                            <form role="form" action="{{ route('payments.updatepayment') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="mb-3 col-lg-4">
                                        <label for="example-select" class="form-label">Property Name</label>
                                        <select class="form-select property_name" name="property_id" id="example-select" required>
                                            <option style="display: none">Select Property</option>
                                            @foreach ($properties as $property)
                                            <option value="{{ $property->id }}">{{ $property->property_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3 col-lg-4">
                                        <label for="example-select" class="form-label">Unit Name</label>
                                        <select class="form-select units" name="unit_id" id="example-select units" disabled required>
                                            <option style="display: none">loading..</option>
                                        </select>
                                    </div>


                                    <div class="mb-3 col-lg-4">
                                        <label for="example-select" class="form-label">Occupant/Business
                                            Name</label>
                                        <select class="form-select tenant" name="tenant_name" id="example-select tenant" disabled required>
                                            <option style="display: none">loading..</option>
                                        </select>
                                    </div>

                                    <div class="row" id="paymentDetailsDiv" style="display: none;">
                                        <div class="mb-3 col-lg-4">
                                            <label for="amount" class="form-label">Unit Payment </label>
                                            <input type="text" name="unit_payment" id="unit_payment" readonly class="form-control" placeholder="Amount">
                                        </div>
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
                                            <label for="start_date" class="form-label" id="startDateLabel"></label>
                                            <input type="date" name="start_date" id="start_date" class="form-control" placeholder="" required>
                                            <p id="start_date_error" style="color: red; font-size: 13px; display: none"></p>

                                        </div>

                                        <div class="mb-3 col-lg-4">
                                            <label for="due_date" class="form-label" id="dueDateLabel">Due Date</label>
                                            <input type="date" name="due_date" id="due_date" readonly class="form-control" placeholder="">
                                            <input type="hidden" name="tenant_id" id="tenant_id" />
                                            <input type="hidden" id="payment_duration_id" name="payment_duration_id" />
                                            <input type="hidden" name="lease_amount" id="lease_amount" />
                                            <input type="hidden" name="payment_update_type" id="payment_update_type" />
                                            <input type="hidden" name="total_months" id="total_months" />
                                            <input type="hidden" name="total_days" id="total_months" />
                                            <p id="due_date_error" style="color: red; font-size: 13px; display: none"></p>

                                        </div>

                                        <div class="mb-3 col-lg-4">
                                            <label for="example-select" class="form-label ">Payment Category</label>
                                            <select class="form-select payment_category" name="payment_category" id="payment_category">
                                                <!-- <option style="display: none">Select Payment Category</option> -->
                                                @foreach ($payment_categories as $payment_category)
                                                <option value="{{ $payment_category->id }}">{{ $payment_category->payment_category }}</option>
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

                                    <div class="col-12">
                                        <button type="submit" name="submit" class="btn btn-primary btn-md">Add Payment
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Payments</h4>
                        <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Payment Reference</th>
                                    <th>Amount</th>
                                    <th>Property</th>
                                    <th>Tenant</th>
                                    <th>Payment Date</th>
                                    <th>End date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($tenants as $tenant)
                                @php
                                $count++;


                                @endphp

                                <tr>

                                    <td>{{ $count }}</td>
                                    <td>{{ $tenant->payment_reference }}</td>
                                    <td>{{ moneyFormat($tenant->amount) }}</td>
                                    <td>{{ $tenant->property_name }}</td>
                                    <td>{{ $tenant->first_name }} {{ $tenant->last_name }}</td>
                                    <td>{{ $tenant->payment_date }}</td>
                                    <td>{{ $tenant->duedate }}</td>
                                    @if ($tenant->duration_status == 3)
                                    <td>
                                        <span class="badge bg-success">active</span>
                                    </td>
                                    @endif
                                    @if ($tenant->duration_status == 2)
                                    <td><span class="badge bg-warning text-black">expiring soon</span>
                                    </td>
                                    @endif
                                    @if ($tenant->duration_status == 1)
                                    <td><span class="badge bg-danger">expired</span>
                                    </td>
                                    @endif
                                    <td>
                                        <div class="row">

                                            <div class="col-md-3">
                                                <a href="#"><i class="fas fa-eye"></i></a>
                                            </div>

                                            <div class="col-md-3">
                                                <a href="/tenancy-payments/edit/{{ $tenant->id }}"><i class="fas fa-pen"></i></a>
                                            </div>
                                            <!--modal begin-->

                                            <div class="col-md-3">
                                                <a href="#"><i class="fas fa-file"></i></a>
                                            </div>

                                            <div class="col-md-3">
                                                <i class="fa fa-trash delete" id="{{ $tenant->id }}" style="color: red"></i>
                                            </div>
                                        </div>
                                    </td>

                                </tr>
                                @empty
                                @endforelse


                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->


    </div> <!-- container-fluid -->

</div> <!-- content -->
@endsection
@section('js')
<script src="/assets/js/payments.js"></script>
<script>
    $(document).ready(function() {
        $('.delete').click(function() {
            $(document).on('click', '.delete', function() {
                var id = $(this).attr('id');
                console.log(id);
                swal.fire({
                    title: 'Are you sure?',
                    text: "This payment record would be deleted !!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                    .attr('content')
                            }
                        });
                        $.ajax({
                                url: "{{ route('payments.delete') }}",
                                type: 'POST',
                                data: {
                                    id: id
                                },
                            })
                            .done(function(response) {
                                console.log(response);
                                swal.fire('Deleted!', response, response
                                    .status);
                            })
                            .fail(function(error) {
                                console.log(error);
                                swal.fire('Oops...',
                                    'Something went wrong when deleting !',
                                    'error');
                            });
                    }
                })
            });
        });
    });
</script>
@endsection
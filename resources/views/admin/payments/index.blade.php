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
                                <div class="col-lg-6">
                                    <form role="form" action="{{ route('payments.store') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Property Name</label>
                                             <select class="form-select propname" name="propname" id="example-select" required>
                                                <option style="display: none">Select Property</option>
                                                @foreach ($properties as $property)
                                                    <option value="{{ $property->id }}">{{ $property->propname }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Unit Name</label>
                                            <select class="form-select units" name="unit" id="example-select units"
                                                name="units" disabled required>
                                                <option style="display: none">loading..</option>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Occupant/Business Name</label>
                                                <select class="form-select tenant" name="tenant" id="example-select tenant"
                                                disabled required>
                                                <option style="display: none">loading..</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Payment Category</label>
                                            <select class="form-select" name="paycat" id="example-select">
                                                <option value="1">Rent</option>
                                                <option value="2">Facility Fee</option>
                                                <option value="3">Taxes</option>
                                                <option value="4">Rent Balance</option>
                                                <option value="5">Others</option>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Amount Paid</label>
                                            <input type="text" id="example-email" name="payamount"
                                                class="form-control" placeholder="NGN">
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


                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <form>

                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Payment Date</label>
                                            <input type="date" id="example-email" name="paydate"
                                                class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-password" class="form-label">Start Date</label>
                                            <input type="date" id="example-date" name="startdate" class="form-control" value="">
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-password" class="form-label">Due Date</label>
                                            <input type="date" id="example-date" name="duedate" class="form-control" value="">
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Duration</label>
                                            <select class="form-select" name="duration" id="example-select">
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
                                            <label for="example-select" class="form-label">Payment Status</label>
                                            <select class="form-select" name="paystatus" id="example-select">
                                                <option value="1">Fully Paid</option>
                                                <option value="2">Partly Paid</option>
                                                <option value="3">Partly Renewed</option>
                                                <option value="4">Fully Renewed</option>
                                                <option value="5">Not Paid</option>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Upload Evidence</label>
                                            <input name="file" type="file" id="example-fileinput" class="form-control">
                                        </div>


                                </div> <!-- end col -->

                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-md">Add Payment</button>
                                </div>

                            </div>
                            <!-- end row-->
                        </form>
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
                                        <th>Tenants</th>
                                        <th>Payment</th>
                                        <th>Amount</th>
                                        <th>Shop</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>Rent</td>
                                        <td>₦150,000</td>
                                        <td>Shop 61</td>
                                        <td><span class="badge bg-success">Fully Paid</span></td>
                                        <td><a href="#"><i class="fas fa-eye"></i></a> <span><a href="#"> <i
                                                        class="fas fa-pen"></i></a></span></td>
                                    </tr>

                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>Facility Fee</td>
                                        <td>₦150,000</td>
                                        <td>Shop 22</td>
                                        <td><span class="badge bg-info">Partialy Paid</span></td>
                                        <td><a href="/invoice"><i class="fas fa-eye"></i></a> <span><a href="#"> <i
                                                        class="fas fa-pen"></i></a></span> </td>
                                    </tr>

                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>Taxes</td>
                                        <td>₦150,000</td>
                                        <td>Shop 3</td>
                                        <td><span class="badge bg-danger">Overdue</span></td>
                                        <td><a href="/invoice"><i class="fas fa-eye"></i></a> <span><a href="#"> <i
                                                        class="fas fa-pen"></i></a></span> <span><a href="/invoice"> <i
                                                        class="fas fa-file"></i></a></span></td>
                                    </tr>


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
@endsection

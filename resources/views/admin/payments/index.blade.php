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

                                <div class="row">
                                    <div class="col-lg-6">
                                        <form>

                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Property Unit</label>
                                                <select class="form-select" name="" id="example-select">
                                                    <option>Shop 1</option>
                                                    <option>House 2</option>
                                                    <option>Flat 3</option>
                                                    <option>Room 4</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Tenant</label>
                                                <select class="form-select" name="" id="example-select">
                                                    <option>Tenant 1</option>
                                                    <option>Tenant 2</option>
                                                    <option>Tenant 3</option>
                                                    <option>Tenant 4</option>
                                                    <option>Tenant 5</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Paid For</label>
                                                <select class="form-select" name="" id="example-select">
                                                    <option>Rent</option>
                                                    <option>Facility Fee</option>
                                                    <option>Taxes</option>
                                                    <option>Rent Balance</option>
                                                    <option>Others</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-email" class="form-label">Amount Paid</label>
                                                <input type="text" id="example-email" name="example-email" class="form-control" placeholder="NGN">
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-email" class="form-label">Payment Date</label>
                                                <input type="date" id="example-email" name="example-email" class="form-control" placeholder="">
                                            </div>


                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <form>

                                            <div class="mb-3">
                                                <label for="example-password" class="form-label">Start Date</label>
                                                <input type="date" id="example-date" class="form-control" value="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-password" class="form-label">Due Date</label>
                                                <input type="date" id="example-date" class="form-control" value="">
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Duration</label>
                                                <select class="form-select" name="" id="example-select">
                                                    <option>6 Months</option>
                                                    <option>1 Year</option>
                                                    <option>2 Years</option>
                                                    <option>3 Years</option>
                                                    <option>4 Years</option>
                                                    <option>5 Years</option>
                                                    <option>10 Years</option>
                                                </select>
                                            </div>

                                            <div class="mb-3">
                                                <label for="example-select" class="form-label">Payment Status</label>
                                                <select class="form-select" name="" id="example-select">
                                                    <option>Fully Paid</option>
                                                    <option>Partly Paid</option>
                                                    <option>Partly Renewed</option>
                                                    <option>Fully Renewed</option>
                                                    <option>Not Paid</option>
                                                </select>
                                            </div>


                                            <div class="mb-3">
                                                <label for="example-fileinput" class="form-label">Upload Evidence</label>
                                                <input type="file" id="example-fileinput" class="form-control">
                                            </div>



                                        </form>
                                    </div> <!-- end col -->

                                    <div class="col-12">
                                        <a href="#" type="submit" name="submit" class="btn btn-primary btn-lg">Submit Payment</a href="pricing.html">
                                    </div>

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
                                        <td><a href="#"><i class="fas fa-eye"></i></a>      <span><a href="#">  <i class="fas fa-pen"></i></a></span></td>
                                    </tr>

                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>Facility Fee</td>
                                        <td>₦150,000</td>
                                        <td>Shop 22</td>
                                        <td><span class="badge bg-info">Partialy Paid</span></td>
                                        <td><a href="#"><i class="fas fa-eye"></i></a>      <span><a href="#">  <i class="fas fa-pen"></i></a></span> </td>
                                    </tr>

                                    <tr>
                                        <td>Tiger Nixon</td>
                                        <td>Taxes</td>
                                        <td>₦150,000</td>
                                        <td>Shop 3</td>
                                        <td><span class="badge bg-danger">Overdue</span></td>
                                        <td><a href="#"><i class="fas fa-eye"></i></a>      <span><a href="#">  <i class="fas fa-pen"></i></a></span> <span><a href="/invoice">  <i class="fas fa-file"></i></a></span></td>
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
    <script src="dist/js/selectField.js"></script>
@endsection

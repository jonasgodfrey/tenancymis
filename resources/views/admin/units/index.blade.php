@extends('layouts.app')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
    <!-- start page title -->

        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">

                    <h4 class="page-title">Units</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Add Units</h4>
                                       <br>

                                    <div class="row">
                                            <div class="col-lg-6">
                                        <form>

                                                    <div class="mb-3">
                                                        <label for="example-select" class="form-label">Select Property</label>
                                                        <select class="form-select" name="" id="example-select" name="propcat" required>
                                                            <option>Plaza name</option>
                                                            <option>Mall name</option>
                                                            <option>Shopping Centre name</option>
                                                            <option>Market Square name</option>
                                                            <option>Recreational Park name</option>
                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-select" class="form-label">Unit Name</label>
                                                        <select class="form-select" name="" id="example-select" name="propcat" required>
                                                            <option>Shop</option>
                                                            <option>Store</option>
                                                            <option>House</option>
                                                            <option>Room</option>
                                                            <option>Block</option>
                                                            <option>Plot</option>
                                                            <option>Flat</option>
                                                            <option>Others</option>

                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-password" class="form-label">Unit No</label>
                                                        <input type="number" name="" id="example-password" class="form-control" value="">
                                                    </div>



                                            </div> <!-- end col -->

                                            <div class="col-lg-6">


                                                    <div class="mb-3">
                                                        <label for="example-password" class="form-label">Unit Description</label>
                                                        <input type="tel" name="" id="" class="form-control" value="">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="example-password" class="form-label">Rent/Lease Amount</label>
                                                        <input type="text" name="" id="example-password" class="form-control" placeholder="₦100,000/Year">
                                                    </div>


                                                    <div class="mb-3">
                                                        <label for="example-fileinput" class="form-label">Unit Picture</label>
                                                        <input type="file" name="" id="example-fileinput" class="form-control">
                                                    </div>



                                        </form>
                                                </div> <!-- end col -->
                                                <div class="col-12">
                                                    <a href="tenants.html" type="submit" name="submit" class="btn btn-success btn-lg">Add Unit</a href="pricing.html">
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
                                        <h4 class="mt-0 header-title">Units</h4>
                                       <br>
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                            <thead>
                                            <tr>
                                                <th>Property</th>
                                                <th>Unit Name/No</th>
                                                <th>Amount/Year</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            <tr>
                                                <td>EFAB Sunshine Estate</td>
                                                <td>House 9</td>
                                                <td>₦100,000</td>
                                                <td>hello@gmail.com</td>
                                                <td><span class="badge bg-success">Occupied</span></td>
                                                <td><a href="#"><i class="fas fa-eye"></i></a>      <span><a href="#">  <i class="fas fa-pen"></i></a></span></td>
                                            </tr>

                                            <tr>
                                                <td>Axion Plaza</td>
                                                <td>Shop 24</td>
                                                <td>₦100,000</td>
                                                <td>hello@gmail.com</td>
                                                <td><span class="badge bg-danger">Vacant</span></td>
                                                <td><a href="#"><i class="fas fa-eye"></i></a><span><a href="#">  <i class="fas fa-pen"></i></a></span></td>
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
@extends('layouts.app')

@section('content')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->

        <div class="row">
        <div class="col-12">
        <div class="page-title-box page-title-box-alt">

        <h4 class="page-title"> Tenants</h4>
        </div>
        </div>
        </div>
        <!-- end page title -->


        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
        <h4 class="header-title">Assign Tenant</h4>
        <br>

        <div class="row">
            <div class="col-lg-6">
                <form>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Tenant's Name</label>
                        <input type="text" name="tenantname" id="simpleinput" class="form-control" placeholder="" required>
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Tenant's Mobile No</label>
                        <input type="text" name="mobile" id="simpleinput" class="form-control" placeholder="" required>
                    </div>

                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Tenant's Email</label>
                        <input type="text" name="email" id="simpleinput" class="form-control" placeholder="" required>
                    </div>





                </div> <!-- end col -->

                <div class="col-lg-6">


                    <div class="mb-3">
                        <label for="simpleinput" class="form-label">Tenant's Business Name</label>
                        <input type="text" name="tenantname" id="simpleinput" class="form-control" placeholder="" required>
                    </div>

                    <div class="mb-3">
                        <label for="example-select" class="form-label">Business Category</label>
                        <select class="form-select" id="example-select" name="bizcat" required>
                            <option>Electronics</option>
                            <option>Fashion</option>
                            <option>Furnitures</option>
                            <option>IT Gadget Centres</option>
                            <option>Offices</option>
                            <option>Residential</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="example-select" class="form-label">Assign Unit</label>
                        <select class="form-select" id="example-select" name="bizcat" required>
                            <option>House 5</option>
                            <option>Flat 24</option>
                            <option>Room 4</option>
                            <option>Shop 40</option>
                        </select>
                    </div>
            </form>
            </div> <!-- end col -->

            <div class="col-12">
                <a href="pricing.html" type="submit" name="submit" class="btn btn-primary btn-lg">Create Tenant</a href="pricing.html">
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
                        <h4 class="mt-0 header-title">Tenants</h4>
                       <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Tenant</th>
                                <th>Shop</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Business Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            <tr>
                                <td>Enangha Jonas</td>
                                <td>Shop 4</td>
                                <td>hello@gmail.com</td>
                                <td>08162445607</td>
                                <td>Axion Shop</td>
                                <td><span class="badge bg-success">Fully Paid</span></td>
                                <td><a href="#"><i class="fas fa-eye"></i></a>    <span><a href="#"><i class="fas fa-pen"></i></a></span></td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->




    </div> <!-- container-fluid -->

</div>

@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection
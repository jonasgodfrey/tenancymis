@extends('layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->

<div class="row">
<div class="col-12">
<div class="page-title-box page-title-box-alt">

<h4 class="page-title"> Property</h4>
</div>
</div>
</div>
<!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create Property</h4>
                       <br>

                        <div class="row">
                            <div class="col-lg-6">
                                <form>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Property Name</label>
                                        <input type="text" name="propname" id="simpleinput" class="form-control" placeholder="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Property Category</label>
                                        <select class="form-select" id="example-select" name="propcat" required>
                                            <option>Select Category</option>
                                            <option>Commercial Property</option>
                                            <option>Residential Property</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Property Type</label>
                                        <select class="form-select" id="example-select" name="propcat" required>
                                            <option>Select Type</option>
                                            <option>Plaza</option>
                                            <option>Mall</option>
                                            <option>Shopping Centre</option>
                                            <option>Market Square</option><br>
                                            <option>Row Houses</option>
                                            <option>Self Contain</option>
                                            <option>Block of Flats</option>
                                            <option>Penthouses</option>
                                            <option>Mansion</option>
                                            <option>Duplexes</option>
                                            <option>Bungalow</option>
                                            <option>Bungalo with Penthouse</option>
                                            <option>Fully Detatched Bungalo</option>
                                            <option>Terrace Bungalo</option>
                                            <option>Semi-Detached Bungalo</option>
                                           <option>Detached Bungalo</option>
                                           <option>Terrace Duplexes</option>
                                           <option>Penthouse Duplexes</option>
                                           <option>Low Rise Building</option>
                                           <option>High Rise Building</option>
                                            <option>Others</option>

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Description</label>
                                        <textarea maxlength="" class="form-control" rows="10" placeholder="Kindly describe your property"></textarea>
                                    </div>




                                </div> <!-- end col -->

                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Address</label>
                                        <input type="text" name="" id="simpleinput" class="form-control" placeholder="property address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Email</label>
                                        <input type="email" id="example-email" name="example-email" class="form-control" placeholder="Email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-tel" class="form-label">Mobile No</label>
                                        <input type="tel" name="mobile" id="example-tel" class="form-control" placeholder="contact no" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Country</label>
                                        <select class="form-select" id="example-select" name="country">
                                            <option>Nigeria</option>
                                            <option>Kenya</option>
                                            <option>Rwanda</option>
                                            <option>Ghana</option>
                                            <option>S.Africa</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">State</label>
                                        <select class="form-select" id="example-select" name="state">
                                            <option>Abuja</option>
                                            <option>Lagos</option>
                                            <option>Nassarawa</option>
                                            <option>Benin</option>
                                            <option>Calabar</option>
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Upload Logo</label>
                                        <input type="file" name="logo" id="example-fileinput" class="form-control">
                                    </div>


                                </form>
                             </div> <!-- end col -->

                             <div class="col-12">
                                <a href="pricing.html" type="submit" name="submit" class="btn btn-primary btn-lg">Create</a href="pricing.html">
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
                        <h4 class="mt-0 header-title">Properties</h4>
                       <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Property</th>
                                <th>Address</th>
                                <th>State</th>
                                <th>Country</th>
                                <th>Contact Email</th>
                                <th>Tel</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            <tr>
                                <td>Axion Plaza</td>
                                <td>Jabi Abuja</td>
                                <td>Nigeria</td>
                                <td>Abuja</td>
                                <td>shop@gmail.com</td>
                                <td>08162445607</td>
                                <td><a href="#"><i class="fas fa-eye"></i></a><span><a href="#"><i class="fas fa-pen"></i></a></span></td>
                            </tr>

                            <tr>
                                <td>EFAB Sunshine Estate</td>
                                <td>Apo Abuja</td>
                                <td>Nigeria</td>
                                <td>Abuja</td>
                                <td>tenant@gmail.com</td>
                                <td>08162445607</td>
                                <td><a href="#"><i class="fas fa-eye"></i></a><span><a href="#"><i class="fas fa-pen"></i></a></span></td>
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

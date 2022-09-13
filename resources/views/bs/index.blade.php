@extends('layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">MyTenants MIS</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            </ol>
                        </div>
                        <h4 class="page-title">Dashboard</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Listed Property(s)</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#00FF12" value="0" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                            <div class="widget-detail-1 text-end">
                                <a href="#">
                                <button type="submit" class="btn btn-success btn-xs text-white modal-btn capital-w" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" style="color:#f05050">Add Property <i class="mdi mdi-domain me-1"></i>
                                </button>
                                </a>
                            </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Units</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#00FF12" value="0" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <a href="#">
                                    <button type="submit" class="btn btn-success btn-xs text-white modal-btn capital-w" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal2" style="color:#f05050">Add Unit <i class="mdi mdi-domain me-1"></i>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">No of Subscribers</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#00FF12" value="0" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <a href="#">
                                    <button type="submit" class="btn btn-success btn-xs text-white modal-btn capital-w" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal3">Add Subscribers <i class="mdi mdi-account-group me-1"></i>
                                    </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Amount Paid(₦)</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#00FF12" value="0" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />

                                </div>


                                <div class="widget-detail-1 text-end">
                                <a href="#">
                                <button type="submit" class="btn btn-success btn-xs text-white modal-btn capital-w" data-bs-toggle="modal"
                                data-bs-target="#exampleModal4">Payments <i class="mdi mdi-account-group me-1"></i>
                                </button>
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body widget-user">
                            <div class="text-center">
                                <h2 class="fw-normal text-primary" data-plugin="counterup">0</h2>
                                <h5>Plan A Subscribers</h5>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body widget-user">
                            <div class="text-center">
                                <h2 class="fw-normal text-pink" data-plugin="counterup">N0</h2>
                                <h5><h5>Plan B Subscribers</h5></h5>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body widget-user">
                            <div class="text-center">
                                <h2 class="fw-normal text-warning" data-plugin="counterup">N0</h2>
                                <h5><h5>Plan C Subscribers</h5></h5>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body widget-user">
                            <div class="text-center">
                                <h2 class="fw-normal text-info" data-plugin="counterup">N0</h2>
                                <h5><h5>Plan D Subscribers</h5></h5>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->

            <div class="row">

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                    <!-- item-->
                                    <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                                </div>
                            </div>

                            <h4 class="header-title mt-0 mb-3">Subscribers</h4>

                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-hover mb-0 dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Property</th>
                                            <th>Unit</th>
                                            <th>Subscriber</th>
                                            <th>Subscriber Tel</th>
                                            <th>Payment Made</th>
                                            <th>Balance Payment</th>
                                            <th>Date Paid</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>


                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div><!-- end col -->

            </div>
            <!-- end row -->








        </div> <!-- container-fluid -->



        <!-- Add Property Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">List Property</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="col-lg-12">

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Asset Name</label>
                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                placeholder="" required>
                        </div>

                        <div class="mb-3">
                            <label for="example-select" class="form-label">Asset Category</label>
                            <select class="form-select" id="example-select" name="propcat" required>
                                <option style="display: none">Select Category</option>
                                    <option value="">Build to Sell</option>
                                    <option value="">Land Banking</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Asset Description</label>
                            <textarea maxlength="" name="propdesc" class="form-control" rows="10"
                            placeholder="Kindly describe your property"
                                required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Address:</label>
                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                placeholder="Kindly provide Addresss" required>
                        </div>

                        <div class="mb-3">
                            <label for="example-select" class="form-label">Location</label>
                            <select class="form-select" id="example-select" name="proptype" required>
                                <option style="display: none">Select State</option>
                                <option value="Lagos">Lagos</option>
                                <option value="Abuja">Abuja</option>
                                <option value="Kogi">Kogi</option>

                            </select>
                        </div>

                    </div> <!-- end col -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>

      <!-- Add Unit Modal -->
      <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel2">List Units</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="col-lg-12">

                        <div class="mb-3">
                            <label for="example-select" class="form-label">Asset Name</label>
                            <select class="form-select" id="example-select" name="propcat" required>
                                <option style="display: none">Select Asset</option>
                                    <option value="">Asset 1</option>
                                    <option value="">Asset 2</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Unit Name:</label>
                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                placeholder="No 5 or Plot 108 or House 9" required>
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Unit Description</label>
                            <textarea maxlength="" name="propdesc" class="form-control" rows="2"
                            placeholder="Three bedroom duplex with swimming pool and BQ"
                                required></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Unit Address:</label>
                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                placeholder="First Avenue Street" required>
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Cost of Unit:</label>
                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                placeholder="Enter the cost of this Unit e.g N1,000,000" required>
                        </div>

                    </div> <!-- end col -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Submit</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Add Subscriber Modal -->
    <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Add Subscribers</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="col-lg-12">

                        <div class="mb-3">
                            <label for="example-select" class="form-label">Asset Name</label>
                            <select class="form-select" id="example-select" name="propcat" required>
                                <option style="display: none">Select Asset</option>
                                    <option value="">Asset 1</option>
                                    <option value="">Asset 2</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="example-select" class="form-label">Assign Unit</label>
                            <select class="form-select" id="example-select" name="propcat" required>
                                <option style="display: none">Select Unit</option>
                                    <option value="">Unit 1</option>
                                    <option value="">Unit 2</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Subscriber Name:</label>
                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                placeholder="Name" required>
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Subscriber Email:</label>
                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                placeholder="Email" required>
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Subscriber Phone:</label>
                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                placeholder="0901339322" required>
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Subscriber Location:</label>
                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                placeholder="State/Country of Residence" required>
                        </div>

                        <div class="mb-3">
                            <label for="example-select" class="form-label">Payment Plan</label>
                            <select class="form-select" id="example-select" name="propcat" required>
                                <option style="display: none">Select Plan</option>
                                    <option value="">Plan A</option>
                                    <option value="">Plan B</option>
                                    <option value="">Plan C</option>
                                    <option value="">Plan D</option>
                            </select>
                        </div>

                    </div> <!-- end col -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Submit</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Add Payment Modal -->
    <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel4" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel4">Add Payment Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    <div class="col-lg-12">

                        <div class="mb-3">
                            <label for="example-select" class="form-label">Subscriber Name</label>
                            <select class="form-select" id="example-select" name="propcat" required>
                                <option style="display: none">Select Subscriber</option>
                                    <option value="">Subscriber 1</option>
                                    <option value="">Subscriber 2</option>
                            </select>
                        </div>


                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Amount Paid:</label>
                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                placeholder="1,000,000" required>
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Date Paid:</label>
                            <input type="date" name="propname" id="simpleinput" class="form-control"
                                placeholder="" required>
                        </div>



                        <div class="mb-3">
                            <label for="example-select" class="form-label">Payment Method</label>
                            <select class="form-select" id="example-select" name="propcat" required>
                                <option style="display: none">Select method</option>
                                    <option value="">Cash</option>
                                    <option value="">Bank Transfer</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="simpleinput" class="form-label">Upload Evidence:</label>
                            <input type="file" name="propname" id="simpleinput" class="form-control"
                                placeholder="" required>
                        </div>

                    </div> <!-- end col -->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success">Submit</button>
            </div>
            </div>
        </div>
    </div>


    </div> <!-- content -->
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection

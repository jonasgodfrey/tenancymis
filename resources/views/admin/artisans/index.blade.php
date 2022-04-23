@extends('layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box page-title-box-alt">

<h4 class="page-title">Vendors Task</h4>
</div>
</div>
</div>
<!-- end page title -->


        <div class="row">
            <div class="col-sm-4">
                <a href="#" class="btn btn-purple rounded-pill w-md waves-effect waves-light mb-3"  data-bs-toggle="modal" data-bs-target="#custom-modal"><i class="mdi mdi-plus"></i> Assign Task</a>
            </div>
            <div class="col-sm-8">
                <div class="float-end">
                        <form class="row g-2 align-items-center mb-2 mb-sm-0">
                            <div class="col-auto">
                                <div class="d-flex">
                                    <label class="d-flex align-items-center">Status
                                        <select class="form-select form-select-sm d-inline-block ms-2">
                                            <option>All Status</option>
                                            <option>Completed</option>
                                            <option>Progress</option>
                                            <option>Overdue</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="d-flex">
                                    <label class="d-flex align-items-center">Sort
                                        <select class="form-select form-select-sm d-inline-block ms-2">
                                        <option>Date</option>
                                            <option>Name</option>
                                            <option>End date</option>
                                            <option>Start Date</option>
                                        </select>
                                    </label>
                                </div>
                            </div>
                        </form>
                </div>
            </div><!-- end col-->
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body project-box">
                        <div class="badge bg-success float-end">Completed</div>
                        <h4 class="mt-0"><a href="" class="text-dark">Electrical Repairs</a></h4>
                        <p class="text-success text-uppercase font-13">Description</p>
                        <p class="text-muted font-13">Light switch went bad and needs to be repaired
                            <!-- <a href="#" class="text-primary">View more</a> -->
                        </p>
                       <div class="project-members mb-2">
                            <h5 class="float-start me-3">Vendor Assigned: Ajah & Sons Electronics</h5>
                            <h5>Shop: No 4</h5>
                        </div>
                    </div>
                </div>

            </div><!-- end col-->

            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body project-box">
                        <div class="badge bg-danger float-end">Overdue</div>
                        <h4 class="mt-0"><a href="" class="text-dark">Electrical Repairs</a></h4>
                        <p class="text-success text-uppercase font-13">Description</p>
                        <p class="text-muted font-13">Light switch went bad and needs to be repaired
                            <!-- <a href="#" class="text-primary">View more</a> -->
                        </p>
                       <div class="project-members mb-2">
                            <h5 class="float-start me-3">Vendor Assigned: Ajah & Sons Electronics</h5>
                            <h5>Shop: No 4</h5>
                        </div>
                    </div>
                </div>

            </div><!-- end col-->
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body project-box">
                        <div class="badge bg-info float-end">In Progress</div>
                        <h4 class="mt-0"><a href="" class="text-dark">Electrical Repairs</a></h4>
                        <p class="text-success text-uppercase font-13">Description</p>
                        <p class="text-muted font-13">Light switch went bad and needs to be repaired
                            <!-- <a href="#" class="text-primary">View more</a> -->
                        </p>
                       <div class="project-members mb-2">
                            <h5 class="float-start me-3">Vendor Assigned: Ajah & Sons Electronics</h5>
                            <h5>Shop: No 4</h5>
                        </div>
                    </div>
                </div>

            </div><!-- end col-->
        </div>
        <!-- end row -->



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Vendors Listing</h4>
                       <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Current Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>


                            <tbody>
                            <tr>
                                <td>Sony and Sons Electronics</td>
                                <td>Electrical</td>
                                <td>08162445607</td>
                                <td>vendor@gmail.com</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td><a href="#"><i class="fas fa-eye"></i></a><span><a href="#"><i class="fas fa-pen"></i></a></span></td>
                            </tr>
                            <tr>
                                <td>Sony and Sons Electronics</td>
                                <td>Electrical</td>
                                <td>08162445607</td>
                                <td>vendor@gmail.com</td>
                                <td><span class="badge bg-danger">Inactive</span></td>
                                <td><a href="#"><i class="fas fa-eye"></i></a><span><a href="#"><i class="fas fa-pen"></i></a></span></td>
                            </tr>

                            <tr>
                                <td>Sony and Sons Electronics</td>
                                <td>Electrical</td>
                                <td>08162445607</td>
                                <td>vendor@gmail.com</td>
                                <td><span class="badge bg-info">Pending</span></td>
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

</div> <!-- content -->
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection

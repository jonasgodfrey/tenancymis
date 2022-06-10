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

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection

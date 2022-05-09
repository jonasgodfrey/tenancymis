@extends('layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">

                        <h4 class="page-title">Settings</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            {{-- Settings for Properties and Units --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Property & Unit Settings</h4>
                            <br>

                            <div class="row">
                                <div class="col-lg-4">

                                    <div class="mb-3">
                                        <button class="btn btn-lg btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#cat-modal">Add New Property Category</button>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <button class="btn btn-lg btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#type-modal">Add New Property Type</button>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <button class="btn btn-lg btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#unit-modal">Add New Unit Name</button>
                                    </div>
                                </div>
                                <!-- end col -->



                            </div>
                            <!-- end row-->

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->

            {{-- Settings for Payment Records --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Payment Settings</h4>
                            <br>

                            <div class="row">
                                <div class="col-lg-4">

                                    <div class="mb-3">
                                        <button class="btn btn-lg btn-success" data-bs-toggle="modal"
                                            data-bs-target="#pay-cat">Add New Payment Category</button>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <button class="btn btn-lg btn-success" data-bs-toggle="modal"
                                            data-bs-target="#pay-duration">Add New Payment Duration</button>
                                    </div>
                                </div>
                                <!-- end col -->

                                <div class="col-lg-4">
                                    <div class="mb-3">
                                        <button class="btn btn-lg btn-success" data-bs-toggle="modal"
                                            data-bs-target="#pay-method">Add New Payment Method</button>
                                    </div>
                                </div>
                                <!-- end col -->



                            </div>
                            <!-- end row-->

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Property</h4>
                            <br>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Property</th>
                                        <th>Property Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Commercial</td>
                                        <td>Plaza</td>
                                        <td><a href="#"><i class="fas fa-eye"></i></a> <span><a href="#"> <i
                                                        class="fas fa-pen"></i></a></span></td>
                                    </tr>

                                    <tr>
                                        <td>1</td>
                                        <td>Commercial</td>
                                        <td>Plaza</td>
                                        <td><a href="#"><i class="fas fa-eye"></i></a> <span><a href="#"> <i
                                                        class="fas fa-pen"></i></a></span></td>
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

        {{-- Property Category Modal --}}
        <div class="modal fade" id="cat-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Add Property</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('settings.addpropertycat') }}" id="catform" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="" id="catname" name="catname" class="form-control" value="" placeholder="">
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light propcat">Add</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

        {{-- Property Type Modal --}}
        <div class="modal fade" id="type-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Add Property Type</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('settings.addpropertytype') }}" id="typeform" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="typename" class="form-control" name="typename"
                                    placeholder="Property Type name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Category</label>
                                <select class="form-select" id="pt_catname" name="catname" id="example-select" name="bizcat"
                                    required>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        {{-- Property Type Modal --}}
        <div class="modal fade" id="unit-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Add Unit Name</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('settings.addunitname') }}" id="unitform" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="unitname" name="unitname" class="form-control"
                                    placeholder="Unit name">
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Property Category</label>
                                <select class="form-select" id="ut_catname" name="catname" id="example-select" name="bizcat"
                                    required>
                                    @foreach ($category as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>


                            <button type="submit" class="btn btn-success waves-effect waves-light">Add</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->

        {{-- Payment Category Modal --}}
        <div class="modal fade" id="pay-cat" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Add Payment Category</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('settings.addpropertycat') }}" id="catform" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Category Name</label>
                                <input type="" id="catname" name="paycat" class="form-control" value="" placeholder="Rent or Lease or Taxes, Facility/Maintenance Fees">
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light propcat">Add</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        {{-- Payment Duration Modal --}}
        <div class="modal fade" id="pay-duration" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Add Payment Duration</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('settings.addpropertycat') }}" id="catform" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Payment Duration</label>
                                <input type="" id="catname" name="payduration" class="form-control" value="" placeholder="6 Months or 1 Year or 3 year plus">
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light propcat">Add</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
         {{-- Payment Method Modal --}}
         <div class="modal fade" id="pay-method" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Add Payment Method</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('settings.addpropertycat') }}" id="catform" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Method Name</label>
                                <input type="" id="catname" name="paymethod" class="form-control" value="" placeholder="Cash or Bank Transfer or Online or Gift or Crypto">
                            </div>

                            <button type="submit" class="btn btn-success waves-effect waves-light propcat">Add</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->

    </div>
    <!-- content -->
@endsection
@section('js')
    <script src="assets/js/settingspage.js"></script>
@endsection

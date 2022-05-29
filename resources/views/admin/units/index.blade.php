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
                            <div id="alert">
                                @include('partials.flash')
                                @include('partials.modal')
                            </div>

                            <form role="form" action="{{ route('units.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">


                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Select Property</label>
                                            <select class="form-select" name="propname" id="example-select required>
                                            <option style=" display: none">Select Property</option>
                                                @foreach ($properties as $property)
                                                    <option value="{{ $property->id }}">{{ $property->propname }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Unit Type</label>
                                            <select class="form-select" name="unittype" id="example-select" required>
                                                <option style="display: none">Select Unit Type</option>
                                                @foreach ($unitstype as $unit)
                                                    <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-password" class="form-label">Unit No</label>
                                            <input type="number" name="unitno" id="example-password" class="form-control"
                                                value="" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-password" class="form-label">Unit Name</label>
                                            <input type="text" name="unitname" id="example-password" class="form-control"
                                                value="" placeholder="" required>
                                        </div>


                                    </div> <!-- end col -->

                                    <div class="col-lg-6">


                                        <div class="mb-3">
                                            <label for="example-password" class="form-label">Unit Description</label>
                                            <input type="tel" name="unitdesc" id="" class="form-control" value=""
                                                required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-password" class="form-label">Rent/Lease Amount</label>
                                            <input type="text" name="rentamount" id="example-password"
                                                class="form-control" placeholder="₦100,000/Year" required>
                                        </div>


                                        <div class="mb-3">
                                            <label for="example-fileinput" class="form-label">Unit Picture</label>
                                            <input type="file" name="unitpics" id="example-fileinput"
                                                class="form-control">
                                        </div>




                                    </div> <!-- end col -->
                                    <div class="col-12">
                                        <button type="submit" name="submit" class="btn btn-success btn-md">Add
                                            Unit</button>
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
                            <h4 class="mt-0 header-title">Units</h4>
                            <br>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Property</th>
                                        <th>Unit</th>
                                        <th>Description</th>
                                        <th>Amount/Year</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @forelse ($units as $unit)
                                        <tr>
                                            <td>{{ $unit->property->propname }}</td>
                                            <td>{{ $unit->name }}</td>
                                            <td>{{ $unit->unitDesc }}</td>
                                            <td>{{ $unit->leaseAmount }}</td>                                            
                                            @if ($unit->status == 'occupied')
                                                <td><span class="badge bg-secondary">{{ $unit->status }}</span></td>
                                            @endif
                                            @if ($unit->status == 'empty')
                                                <td><span class="badge bg-success">{{ $unit->status }}</span></td>
                                            @endif
                                            <td>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="#"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                    <div class="col-6">
                                                        <span><a href="#"><i class="fas fa-pen"></i></a></span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <h6 class="text-center">no property yet</h6>
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
    <script src="dist/js/selectField.js"></script>
@endsection
